<?php
include 'adminheader.php';
require_once '../classes/CitationData.classes.php';

$paperReference = new CitationData();
$references = $paperReference->getAllReferencesWithResearcher();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>All Citations</title>
  <link rel="stylesheet" href="../css/admin.css" />
</head>
<body>

  <!-- Main Content -->
  <div class="citationsmain-content">
    <div class="page-title">All Citations</div>

    <div class="citation-container">
      <?php if (!empty($references)) : ?>
        <?php foreach ($references as $ref): ?>
          <div class="citation-card">
  <div class="paper-title"><?php echo htmlspecialchars($ref['p_title']); ?></div>
  <div class="citation-meta">
    Cited by: <?php echo htmlspecialchars($ref['r_fullname']); ?>
  </div>
  <div class="citation-source">
    Citation Text: <?php echo htmlspecialchars($ref['reference_text']); ?>
  </div>
  <div class="citation-code">
    Citation Code: <?php echo htmlspecialchars($ref['cited_citation_code'] ?? 'N/A'); ?>
  </div>
</div>

        <?php endforeach; ?>
      <?php else : ?>
        <p>No citations found.</p>
      <?php endif; ?>
    </div>
  </div>

</body>
</html>