<?php
session_start();
if (!isset($_SESSION['adminid'])) {
    header("location: ./login.php");
    exit();
}
?>

    <div class="sidebar">
        <div class="logo">Admin Panel</div>
        <ul class="menu">
            <li class="active">
                <a href="admindashboard.php">
                    <span>
                        Dashboard
                    </span>
                </a>
            </li>
            <li>
                <a href="PendingPaper.php">
                    <span>
                        Pending Papers
                    </span>
                </a>
            </li>
            <li>
                <a href="ApprovedPaper.php">
                    <span>
                        Approved Papers
                    </span>
                </a>
            </li>
            <li>
                <a href="AllPapers.php">
                    <span>
                        All Papers
                    </span>
                </a>
            </li>

            <li>
                <a href="AllReviews.php">
                    <span>
                        All Reviews
                    </span>
                </a>
            </li>
            <li>
                <a href="AllCitations.php">
                    <span>
                        All Citations
                    </span>
                </a>
            </li>
            <li>
                <a href="Researchers.php">
                    <span>
                        Researchers
                    </span>
                </a>
            </li>
            <li>
                <a href="User.php">
                    <span>
                        Users
                    </span>
                </a>
            </li>

            <?php
            if (isset($_SESSION['adminid'])) {
                echo '
        <li class="logout">
        <a href="#">
        <span><a href="logout.php">Logout</a></span>
        </a>
        </li>
        </ul>
        ';
            }
            ?>

    </div>

