<?php
require_once 'Dbh.classes.php';

class InvertedIndex extends Dbh {
    private $conn;
    
    public function __construct() {
        $this->conn = $this->connect();
    }
    
    private function tokenize($text) {
        // Convert to lowercase and remove special characters
        $text = strtolower($text);
        $text = preg_replace('/[^a-z0-9\s]/', '', $text);
        
        // Split into words and remove stopwords
        $words = explode(' ', $text);
        $stopwords = array('a', 'an', 'and', 'are', 'as', 'at', 'be', 'by', 'for', 'from', 'has', 'he', 'in', 'is', 'it',
                          'its', 'of', 'on', 'that', 'the', 'to', 'was', 'were', 'will', 'with');
        
        return array_values(array_diff($words, $stopwords));
    }
    
    public function indexDocument($paperId, $title, $abstract, $keywords) {
        // Combine all text fields
        $fullText = $title . ' ' . $abstract . ' ' . $keywords;
        $tokens = $this->tokenize($fullText);
        
        // Calculate term frequencies
        $termFreq = array_count_values($tokens);
        
        // Store terms and update document frequencies
        foreach ($termFreq as $term => $freq) {
            // Skip empty terms
            if (empty($term)) continue;
            
            // Get or create term_id
            $stmt = $this->conn->prepare("INSERT IGNORE INTO terms (term, idf, doc_frequency) VALUES (?, 0, 1)");
            $stmt->execute([$term]);
            
            if ($stmt->rowCount() === 0) {
                // Term exists, update doc_frequency
                $stmt = $this->conn->prepare("UPDATE terms SET doc_frequency = doc_frequency + 1 WHERE term = ?");
                $stmt->execute([$term]);
            }
            
            // Get term_id
            $stmt = $this->conn->prepare("SELECT term_id FROM terms WHERE term = ?");
            $stmt->execute([$term]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $termId = $row['term_id'];
            
            // Calculate normalized term frequency (tf)
            $tf = $freq / count($tokens);
            
            // Store positions
            $position = 0;
            foreach ($tokens as $index => $token) {
                if ($token === $term) {
                    $stmt = $this->conn->prepare("INSERT INTO inverted_index (term_id, paper_id, tf, position) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$termId, $paperId, $tf, $position]);
                    $position++;
                }
            }
        }
        
        // Update IDF values for all terms
        $this->updateIDF();
    }
    
    private function updateIDF() {
        // Get total number of documents
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM paper");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalDocs = $row['total'];
        
        if ($totalDocs > 0) {
            // Update IDF for all terms
            $stmt = $this->conn->prepare("UPDATE terms SET idf = LOG10(:total / doc_frequency)");
            $stmt->execute(['total' => $totalDocs]);
        }
    }
    
    public function search($query) {
        $tokens = $this->tokenize($query);
        if (empty($tokens)) {
            return $this->conn->query("SELECT * FROM paper WHERE 1=0"); // Return empty result set
        }
        
        $placeholders = str_repeat('?,', count($tokens) - 1) . '?';
        
        // Build query for TF-IDF calculation
        $sql = "SELECT p.*, 
                SUM(i.tf * t.idf) as relevance_score 
                FROM paper p 
                INNER JOIN inverted_index i ON p.p_id = i.paper_id 
                INNER JOIN terms t ON i.term_id = t.term_id 
                WHERE t.term IN ($placeholders)
                GROUP BY p.p_id 
                ORDER BY relevance_score DESC";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($tokens);
        
        return $stmt;
    }
} 