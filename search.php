<?php
require_once 'includes/dbh.inc.php';
require_once 'classes/InvertedIndex.classes.php';

// $searchResults = [];
// $searchPerformed = false;

// if (isset($_GET['query']) && !empty($_GET['query'])) {
//     $searchPerformed = true;
//     $query = $_GET['query'];
    
//     $indexer = new InvertedIndex();
//     $stmt = $indexer->search($query);
//     $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
// }
?>
<?php
require_once 'includes/dbh.inc.php';
require_once 'classes/InvertedIndex.classes.php';
include 'ResearcherHeader.php';


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
    <!-- <link rel="stylesheet" href="css/Researcher.css"> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            margin-bottom: 30px;
        }

        .input-group {
            display: flex;
        }

        .input-group input[type="text"] {
            flex: 1;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px 0 0 4px;
        }

        .input-group button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }

        .input-group button:hover {
            background-color: #0056b3;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333;
        }

        .card-subtitle {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 15px;
            margin-bottom: 10px;
        }

        .btn-primary {
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 15px;
            background-color: #e0f7fa;
            border: 1px solid #b2ebf2;
            color: #00796b;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search Research Papers</h1>

        <form method="GET" action="">
            <div class="input-group">
                <input type="text" name="query" placeholder="Enter search terms..."
                       value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
                <button type="submit">Search</button>
            </div>
        </form>

        <?php if ($searchPerformed): ?>
            <div class="results">
                <?php if (!empty($searchResults)): ?>
                    <h2>Search Results</h2>
                    <?php foreach ($searchResults as $paper): ?>
    <div class="card">
        <h5 class="card-title"><?php echo htmlspecialchars($paper['p_title']); ?></h5>
        <p class="card-text"><strong>Abstract:</strong><br><?php echo htmlspecialchars(substr($paper['p_abstract'], 0, 300)) . '...'; ?></p>
         <p><strong>Citation Code:</strong> <?php echo htmlspecialchars($paper['citation_code']); ?></p>
        <p class="card-text"><strong>Keywords:</strong> <?php echo htmlspecialchars($paper['p_keywords']); ?></p>
        <p class="card-text"><strong>Field of Study:</strong> <?php echo htmlspecialchars($paper['p_fieldofstudy']); ?></p>
        <a href="<?php echo htmlspecialchars($paper['p_pdf']); ?>" class="btn-primary" target="_blank">View PDF</a>
    </div>
<?php endforeach; ?>
                <?php else: ?>
                    <div class="alert">
                        No results found for your search query.
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
