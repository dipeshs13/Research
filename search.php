<?php
require_once 'includes/dbh.inc.php';
require_once 'classes/InvertedIndex.classes.php';

$searchResults = [];
$searchPerformed = false;

if (isset($_GET['query']) && !empty($_GET['query'])) {
    $searchPerformed = true;
    $query = $_GET['query'];
    
    $indexer = new InvertedIndex();
    $stmt = $indexer->search($query);
    $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Paper Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Search Research Papers</h1>
        
        <form method="GET" action="" class="mb-4">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Enter search terms..." 
                       value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <?php if ($searchPerformed): ?>
            <div class="results">
                <?php if (!empty($searchResults)): ?>
                    <h2>Search Results</h2>
                    <?php foreach ($searchResults as $paper): ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($paper['p_title']); ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    Relevance Score: <?php echo number_format($paper['relevance_score'], 4); ?>
                                </h6>
                                <p class="card-text">
                                    <strong>Abstract:</strong><br>
                                    <?php echo htmlspecialchars(substr($paper['p_abstract'], 0, 300)) . '...'; ?>
                                </p>
                                <p class="card-text">
                                    <strong>Keywords:</strong> <?php echo htmlspecialchars($paper['p_keywords']); ?>
                                </p>
                                <p class="card-text">
                                    <strong>Field of Study:</strong> <?php echo htmlspecialchars($paper['p_fieldofstudy']); ?>
                                </p>
                                <a href="<?php echo htmlspecialchars($paper['p_pdf']); ?>" class="btn btn-primary" target="_blank">
                                    View PDF
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-info">
                        No results found for your search query.
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 