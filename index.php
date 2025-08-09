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
     <style>
        /* Results */
        .results {
            margin-top: 30px;
            width: 800px;
            position: relative;
            left: 25%;
            padding-bottom: 50px;
        }

        .results h2 {
            font-size: 1.5rem;
            color: #34495e;
            margin-bottom: 20px;
            text-align: center;
        }

        .card {
            background: #fff;
            border: 1px solid #e3e6ea;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 1px 8px rgba(0,0,0,0.04);
            transition: box-shadow 0.2s;
                ;
        }

        .card:hover {
            box-shadow: 0 4px 18px rgba(0,0,0,0.10);
        }

        .card-body {
            padding: 24px 28px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2d3436;
            margin-bottom: 8px;
            font-family: 'Ancizar Serif', serif;
        }

        .card-subtitle {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 12px;
        }

        .card-text {
            font-size: 1rem;
            color: #444;
            margin-bottom: 10px;
            line-height: 1.6;
        }

        .card-text strong {
            color: #007bff;
        }

        .btn.btn-primary {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 22px;
            border-radius: 5px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s;
            display: inline-block;
        }

        .btn.btn-primary:hover {
            background: #0056b3;
            color: #fff;
        }

        .alert-info {
            background: #eaf4fb;
            color: #31708f;
            border: 1px solid #bce8f1;
            padding: 16px 20px;
            border-radius: 6px;
            margin-top: 20px;
            text-align: center;
            font-size: 1.1rem;
        }
</style>
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
        <?php if (isset($_SESSION['userId'])): ?>
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
                                    <p class="card-text"><strong>Abstract:</strong><br>
                                        <?php echo htmlspecialchars(substr($paper['p_abstract'], 0, 300)) . '...'; ?>
                                    </p>
                                    <p class="card-text"><strong>Keywords:</strong> <?php echo htmlspecialchars($paper['p_keywords']); ?></p>
                                    <p class="card-text"><strong>Field of Study:</strong> <?php echo htmlspecialchars($paper['p_fieldofstudy']); ?></p>
                                    <p class="card-text"><strong>Citation Code:</strong> <?php echo htmlspecialchars($paper['citation_code']); ?></p>
                                    <p class="card-text"><strong>Researcher name:</strong> <?php echo htmlspecialchars($paper['r_fullname']); ?></p>
                                    <p class="card-text"><strong>Institution:</strong> <?php echo htmlspecialchars($paper['r_institution']); ?></p>
                                    <p class="card-text"><strong>Country:</strong> <?php echo htmlspecialchars($paper['r_country']); ?></p>
                                    
                                    <a href="PDF/<?php echo htmlspecialchars($paper['p_pdf']); ?>" class="btn btn-primary" target="_blank">View PDF</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-info">No results found for your search query.</div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="alert alert-info">
                You must <a href="UserLogin.php">log in</a> to perform a search.
            </div>
        <?php endif; ?>
    </div>
</section>

        
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include 'footer.php'; ?>
</body>


</html>