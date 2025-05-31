<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Paper</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ancizar+Serif:ital,wght@0,300..900;1,300..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>
    <?php include 'header.php';
    
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
    <section class="main-content">
        <div class="main-container">
            <div class="main-text">
                <h3 class="main-heading">RESEARCH PAPERS</h3>
                <span class="small-heading">in one place</span>
                <p class="main-description">Easily manage, upload and access academic papers in seconds.<br>Our system
                    simplifies organization for students, researchers, and admins.
                
                </p>
                
            </div>
        </div>
        <div class="main-image">
        <img src="images/pdf1.jpg" alt="" srcset="" >
    </section>

    <section id="search-section">
        <h3>Search Here</h3>
        <div class="search-container">
                    <form method="GET" action="" class="mb-4">
            <div class="input-group">
                <input type="text" name="query" id="search-input" placeholder="Enter search terms..." 
                       value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
                <button type="submit" id="search-button">Search</button>
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
                                <a href="PDF/<?php echo htmlspecialchars($paper['p_pdf']); ?>" class="btn btn-primary" target="_blank">
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
    </section>
        
    </section>
    <?php include 'footer.php'; ?>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>