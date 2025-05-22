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
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
    }

    

    .main-content {
      flex: 1;
      background-color: #f4f4f4;
      padding: 30px;
    }

    .upload-header {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .upload-container {
      background: white;
      padding: 20px;
      border-radius: 10px;
      max-width: 700px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .upload-form label {
      display: block;
      margin-top: 15px;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .upload-form input,
    .upload-form textarea,
    .upload-form select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .upload-form textarea {
      resize: vertical;
      height: 120px;
    }

    .upload-btn {
      margin-top: 20px;
      background-color: #007bff;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .upload-btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  

  <div class="main-content">
    <div class="upload-header">Upload Research Paper</div>

    <div class="upload-container">
      <form class="upload-form" method="POST" action="upload.php" enctype="multipart/form-data">
        <label for="title">Paper Title</label>
        <input type="text" id="title" name="title" required />

        <label for="abstract">Abstract</label>
        <textarea id="abstract" name="abstract" required></textarea>

        <label for="keywords">Keywords (comma-separated)</label>
        <input type="text" id="keywords" name="keywords" required />

        <label for="category">Field of Study</label>
        <select id="category" name="category" required>
          <option value="">-- Select Field --</option>
          <option value="Computer Science">Computer Science</option>
          <option value="Engineering">Engineering</option>
          <option value="Medicine">Medicine</option>
          <option value="Environmental Science">Environmental Science</option>
          <option value="Economics">Economics</option>
          <option value="Others">Others</option>
        </select>

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
