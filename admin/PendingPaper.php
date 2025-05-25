<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pending Papers</title>
    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>
    <?php
    require_once '../includes/dbh.inc.php';
    include 'paperdata.classes.php';
    include 'adminheader.php';
    $Paperdata = new Paperdata_classes();
    $PendingPapers = $Paperdata->getPendingPapers();


    if (isset($_GET['status']) && isset($_GET['paper_id'])) {
        $action = $_GET['status'];
        $paperId = (int) $_GET['paper_id'];

        if ($action === 'approved') {
            $Paperdata->updatePaperStatus($paperId, 'approved');
        } elseif ($action === 'reject') {
            $Paperdata->updatePaperStatus($paperId, 'rejected');
        }
    }
    ?>


    <!-- Main Content -->
    <div class="pendingmain-content">
        <div class="page-title">Pending Papers</div>

        <div class="pending-table">
            <h3>Review Submissions</h3>
            <table id="pendingPapersTable">
                <thead>
                    <tr>
                        <th class="paper-desc1">Title</th>
                        <th class="paper-desc1">Researcher</th>
                        <th class="paper-desc1">Submitted On</th>
                        <th class="paper-desc1">File</th>
                        <th class="paper-desc1">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($PendingPapers as $paper): ?>
                        <tr>
                            <td class="paper-desc"><?php echo $paper['p_title']; ?></td>
                            <?php
                            $rid = $paper['r_id'];
                            $ResearcherInfo = $Paperdata->researcherDetails($rid); // Assume this returns an associative array
                            echo '<td class="paper-desc">' . $ResearcherInfo['r_fullname'] . '</td>';
                            ?>
                            <!-- <td class="paper-desc"><?php echo $paper['p_submitted_on']; ?></td> -->
                            <td>2025-05-24</td>
                            <td class="paper-desc">
                                <a href="../PDF/<?php echo $paper['p_pdf'] ?>" target="_blank" class="btn btn-view">View</a>
                            </td>
                            <td class="action-btns paper-desc">
                                <a href="PendingPaper.php?status=approved&paper_id=<?php echo $paper['p_id']; ?>"
                                    class="btn btn-approve">Approve</a>
                                <a href="PendingPaper.php?statys=reject&paper_id=<?php echo $paper['p_id']; ?>"
                                    class="btn btn-reject">Reject</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                </thead>

            </table>
        </div>
    </div>

</body>

</html>