<?php 
include 'ResearcherHeader.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Upload Research Paper</title>
  <link rel="stylesheet" href="css/Researcher.css" />
</head>
<body>

  <div class="upload-content">
    <div class="upload-header">Upload Research Paper</div>
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

        <button type="submit" class="upload-btn">Submit Paper</button>
      </form>
    </div>
  </div>
</body>
</html>
