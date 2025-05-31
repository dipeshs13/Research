<?php
include 'ResearcherHeader.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Peer Reviews</title>
    <link rel="stylesheet" href="css/Researcher.css" />

</head>

<body>



    <div class="reviews-content">
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
                Excellent work. The paper covers modern algorithms thoroughly. Just make sure to cite the latest journal
                papers.
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
                The topic is great, but the methodology section is too vague. Please add more experimental results and
                discussion.
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