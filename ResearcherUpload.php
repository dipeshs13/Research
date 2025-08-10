<?php
include 'ResearcherHeader.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Upload Research Paper</title>
  <link rel="stylesheet" href="css/Researcher.css" />
</head>

<body>


  <div class="upload-content">
    <div class="upload-header">Upload Research Paper</div>
      <?php
  // Display messages at top of page based on URL parameters
  if (isset($_GET['upload'])) {
    $uploadStatus = htmlspecialchars($_GET['upload']);
    if ($uploadStatus === 'success') {
      echo '<div style="color: green;">Paper uploaded successfully!</div>';
    }
  }

  if (isset($_GET['error'])) {
    $errorMsg = htmlspecialchars($_GET['error']);
    echo '<div style="color: red;">Error: ' . $errorMsg . '</div>';
  }
  ?>
    <div class="upload-container">
      <form class="upload-form" method="POST" action="includes/pdf.inc.php" enctype="multipart/form-data">
        <input type="hidden" name="researcher_id" value="<?php echo $researcherId; ?>" />
        <label for="title">Paper Title</label>
        <input type="text" id="title" name="title" required />

        <label for="abstract">Abstract</label>
        <textarea id="abstract" name="abstract" required></textarea>

        <label for="keywords">Keywords </label>
        <input type="text" id="keywords" name="keywords" required />

        <label for="fieldofstudy">Field of Study</label>
        <input type="text" id="fieldofstudy" name="fieldofstudy" placeholder="Enter Field of Study" />

        <label for="coauthors">Co-Author(s) Name(s)</label>
        <input type="text" id="coauthors" name="coauthors" placeholder="Optional" />

        <label for="pdf">Upload PDF</label>
        <input type="file" id="pdf" name="pdf" accept="application/pdf" required />

        <label for="references">References (one per line)</label>
        <small style="color: gray;">
          Please include the citation code (e.g., BCA2025-0003) if you are citing a paper from this system.
        </small>
        <textarea id="references" name="references" rows="5" placeholder="Example:
Sharma, A. (2024). Machine Learning in Agriculture. BCA2025-0003
John, D. (2022). AI in Health."></textarea>

        <button type="submit" class="upload-btn">Submit Paper</button>
      </form>
    </div>
  </div>
</body>

</html>