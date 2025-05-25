<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>All Reviews</title>
  <link rel="stylesheet" href="../css/admin.css" />
  <style>
    
  </style>
</head>
<body>

  <?php 
  include 'adminheader.php';
  ?>

  <!-- Main Content -->
  <div class="reviewmain-content">
    <div class="page-title">All Reviews</div>

    <div class="reviews-container">
      <!-- Example Review Card -->
      <div class="review-card">
        <div class="paper-title">AI in Healthcare</div>
        <div class="review-meta">Reviewed by Dr. Anita Sharma | 2025-05-22</div>
        <div class="review-content">
          The paper provides a strong overview of AI applications in diagnostics, though more data analysis would improve credibility.
        </div>
        <div class="rating excellent">Excellent</div>
      </div>

      <div class="review-card">
        <div class="paper-title">Cybersecurity Trends</div>
        <div class="review-meta">Reviewed by Mr. Ramesh Joshi | 2025-05-20</div>
        <div class="review-content">
          Good structure and citations, but lacks depth in recent AI-based cybersecurity threats.
        </div>
        <div class="rating good">Good</div>
      </div>

      <div class="review-card">
        <div class="paper-title">IoT for Smart Cities</div>
        <div class="review-meta">Reviewed by Ms. Pooja Thapa | 2025-05-18</div>
        <div class="review-content">
          Well-written but needs more case studies to back claims.
        </div>
        <div class="rating fair">Fair</div>
      </div>
    </div>
  </div>

</body>
</html>
