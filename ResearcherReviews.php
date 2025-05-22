<?php 
include 'ResearcherHeader.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Peer Reviews</title>
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

    .reviews-header {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .review-box {
      background: white;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .review-box h3 {
      margin: 0 0 10px 0;
      color: #333;
    }

    .review-meta {
      font-size: 14px;
      color: #777;
      margin-bottom: 10px;
    }

    .review-status {
      font-weight: bold;
      padding: 5px 10px;
      border-radius: 5px;
      display: inline-block;
      font-size: 13px;
    }

    .approved {
      background-color: #d0f0c0;
      color: #2e7d32;
    }

    .rejected {
      background-color: #ffcdd2;
      color: #c62828;
    }

    .revision {
      background-color: #fff3cd;
      color: #856404;
    }

    .rating {
      margin-top: 8px;
      color: #ff9800;
    }

    .review-comment {
      margin-top: 10px;
      font-size: 15px;
      color: #444;
    }

    .stars {
      color: #ffb400;
    }
  </style>
</head>
<body>
  


  <div class="main-content">
    <div class="reviews-header">Peer Reviews</div>

    <!-- Review 1 -->
    <div class="review-box">
      <h3>Paper: Machine Learning in Finance</h3>
      <div class="review-meta">
        Reviewed by: Reviewer#1 &nbsp;|&nbsp; Date: 2025-05-15
        <span class="review-status approved">Approved</span>
      </div>
      <div class="rating">Rating: ⭐⭐⭐⭐☆</div>
      <div class="review-comment">
        Excellent work. The paper covers modern algorithms thoroughly. Just make sure to cite the latest journal papers.
      </div>
    </div>

    <!-- Review 2 -->
    <div class="review-box">
      <h3>Paper: Neural Networks for Image Recognition</h3>
      <div class="review-meta">
        Reviewed by: Anonymous &nbsp;|&nbsp; Date: 2025-05-10
        <span class="review-status revision">Needs Revision</span>
      </div>
      <div class="rating">Rating: ⭐⭐⭐☆☆</div>
      <div class="review-comment">
        The topic is great, but the methodology section is too vague. Please add more experimental results and discussion.
      </div>
    </div>

    <!-- Review 3 -->
    <div class="review-box">
      <h3>Paper: Big Data & Privacy Concerns</h3>
      <div class="review-meta">
        Reviewed by: Reviewer#2 &nbsp;|&nbsp; Date: 2025-04-25
        <span class="review-status rejected">Rejected</span>
      </div>
      <div class="rating">Rating: ⭐⭐☆☆☆</div>
      <div class="review-comment">
        The subject is important, but the paper lacks original contribution and has multiple grammatical issues.
      </div>
    </div>

  </div>
</body>
</html>
