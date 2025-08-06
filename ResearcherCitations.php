<?php 
include 'ResearcherHeader.php'; // This starts the session and sets $researcherId

require_once 'classes/CitationData.classes.php';
$citation = new CitationData();
$papers = $citation->getPapersWithCitations($researcherId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Citations</title>
  <link rel="stylesheet" href="css/Researcher.css" />
  <style>

  </style>
</head>
<body>

<div class="citations-content">
  <div class="citations-header">Citations Overview</div>

  <div class="citation-table-container">
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
        <?php if (count($papers) > 0): ?>
          <?php foreach ($papers as $paper): ?>
            <tr>
              <td><?= htmlspecialchars($paper['p_title']) ?></td>
              <td><?= $paper['total_citations'] ?></td>
              <td><?= $paper['last_cited_on'] ?? '—' ?></td>
              <td>
                <?php if ($paper['total_citations'] > 0): ?>
  <a href="ViewCitingPapers.php?paper_id=<?= $paper['p_id'] ?>" class="view-btn">View Citing Papers</a>
<?php else: ?>
  <button disabled>No Citing Papers</button>
<?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="4">No papers found.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div class="chart-placeholder">
    Citation trend graph (optional visualization)
  </div>
</div>

</body>
</html>
