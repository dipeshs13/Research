<?php

session_start();
if(!isset($_SESSION['researcherId'])){
    header('location: ResearcherLogin.php');
    exit();
}
if(isset($_SESSION['researcherId'])){
    $researcherId = $_SESSION['researcherId'];
    $researcherFullname = $_SESSION['researcherfullname'];
}

?>

    <div class="sidebar">
        <div class="logo">Researcher Panel</div>
            <ul class="menu">
                <li class="active">
                    <a href="ResearcherDashboard.php">
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li>
                    <a href="ResearcherProfile.php">
                        <span>
                            Profile
                        </span>
                    </a>
                </li>
                <li>
                    <a href="ResearcherUpload.php">
                        <span>
                            Upload Research Paper
                        </span>
                    </a>
                </li>
                <li>
                    <a href="ResearcherSubmission.php">
                        <span>
                            My Submissions
                        </span>
                    </a>
                </li>
                <li>
                    <a href="ResearcherCitations.php">
                        <span>
                            Citations
                        </span>
                    </a>
                </li>
                <li>
                    <a href="ResearcherReviews.php">
                        <span>
                            Reviews
                        </span>
                    </a>
                </li>
    
                <?php 
                if($researcherId){
                    echo '
                    <li>
                    
                        <a href="logout.php" class="logout">
                            <span>
                                Logout
                            </span>
                        </a>
                    </li>';
                }
                ?>
            </ul>
        
    </div>
