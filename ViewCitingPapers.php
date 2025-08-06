<?php
include 'ResearcherHeader.php';

require_once 'classes/CitationData.classes.php';

$citationData = new CitationData();
$researcherId = $_SESSION['researcherId'] ?? null;

if (!$researcherId) {
    echo "Researcher not logged in.";
    exit();
}

if (isset($_GET['paper_id']) && !empty($_GET['paper_id'])) {
    // Show citing papers for this specific paper
    $paperId = intval($_GET['paper_id']);
    $originalPaper = $citationData->getPaperById($paperId);
    $citingPapers = $citationData->getCitingPapers($paperId);
} else {
    // No paper_id - list all papers by this researcher for selection
    $originalPaper = null;
    $citingPapers = [];
    $allPapers = $citationData->getPapersWithCitations($researcherId);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>
    <?= isset($originalPaper) && $originalPaper ? 
          "Papers Citing: " . htmlspecialchars($originalPaper['p_title']) : 
          "Select a Paper to View Citing Papers" ?>
  </title>
  <link rel="stylesheet" href="css/Researcher.css" />
  <style>
    .citation-list { max-width: 900px; margin: 20px auto; }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 10px; border: 1px solid #ccc; }
    th { background: #eee; }
    a.pdf-link { color: blue; text-decoration: underline; }
  </style>
</head>
<body>

<div class="citation-list">
  <?php if (isset($originalPaper) && $originalPaper): ?>
    <h2>Papers citing: <?= htmlspecialchars($originalPaper['p_title']) ?></h2>

    <?php if (count($citingPapers) > 0): ?>
      <table>
        <thead>
          <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Citation Code</th>
            <th>PDF</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($citingPapers as $paper): ?>
            <tr>
              <td><?= htmlspecialchars($paper['p_title']) ?></td>
              <td><?= htmlspecialchars($paper['author_name']) ?></td>
              <td><?= htmlspecialchars($paper['citation_code']) ?></td>
              <td>
                <?php if (!empty($paper['p_pdf'])): ?>
                  <a class="pdf-link" href="/Research/PDF/<?= rawurlencode(basename($paper['p_pdf'])) ?>" target="_blank">View PDF</a>

                <?php else: ?>
                  No PDF
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>No papers have cited this paper yet.</p>
    <?php endif; ?>

  <?php else: ?>
    <h2>Select a Paper to View Citing Papers</h2>
    <?php if (count($allPapers) > 0): ?>
      <table>
        <thead>
          <tr>
            <th>Paper Title</th>
            <th>Total Citations</th>
            <th>Last Cited On</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($allPapers as $paper): ?>
            <tr>
              <td><?= htmlspecialchars($paper['p_title']) ?></td>
              <td><?= $paper['total_citations'] ?></td>
              <td><?= $paper['last_cited_on'] ?? '—' ?></td>
              <td>
                <a href="ViewCitingPapers.php?paper_id=<?= $paper['p_id'] ?>">View Citing Papers</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>You have no papers to display.</p>
    <?php endif; ?>
  <?php endif; ?>
</div>

</body>
</html>
