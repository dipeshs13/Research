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
    require_once '../classes/PaperRejection.php';
    include 'adminheader.php';

    $Paperdata = new Paperdata_classes();

    // Handle POST request for rejection
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status']) && $_POST['status'] === 'reject') {
        $paperId = (int) $_POST['paper_id'];
        $reason = trim($_POST['reason']);
        $adminId = 1; // TODO: get logged-in admin id dynamically
    
        // Save rejection reason
        $rejection = new PaperRejection();
        $rejection->saveRejection($paperId, $adminId, $reason);

        // Update paper status
        $Paperdata->updatePaperStatus($paperId, 'rejected');

        header("Location: PendingPaper.php");
        exit();
    }

    // Handle GET request for approval
    if (isset($_GET['status']) && isset($_GET['paper_id'])) {
        $action = $_GET['status'];
        $paperId = (int) $_GET['paper_id'];

        if ($action === 'approved') {
            $Paperdata->updatePaperStatus($paperId, 'approved');
        }
    }

    $PendingPapers = $Paperdata->getPendingPapers();
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
                        <th class="paper-desc1">Abstract</th>
                        <th class="paper-desc1">Keywords</th>
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
                            <td class="paper-desc"><?php echo $paper['p_abstract']; ?></td>
                            <td class="paper-desc"><?php echo $paper['p_keywords']; ?></td>
                            <!-- <td class="paper-desc"><?php echo $paper['p_submitted_on']; ?></td> -->
                            <!-- <td>2025-05-24</td> -->
                            <td class="paper-desc"><?php echo $paper['Timestamp']; ?></td>
                            <td class="paper-desc">
                                <a href="../PDF/<?php echo $paper['p_pdf'] ?>" target="_blank" class="btn btn-view">View</a>
                            </td>
                            <td class="action-btns paper-desc">
                                <a href="PendingPaper.php?status=approved&paper_id=<?php echo $paper['p_id']; ?>"
                                    class="btn btn-approve">Approve</a>

                                <!-- Reject button triggers form -->
                                <button type="button" class="btn btn-reject"
                                    onclick="showRejectForm(<?php echo $paper['p_id']; ?>)">
                                    Reject
                                </button>

                                <!-- Hidden reject form -->
                                <form method="POST" action="PendingPaper.php" class="reject-form"
                                    id="reject-form-<?php echo $paper['p_id']; ?>" style="display:none;">
                                    <textarea name="reason" placeholder="Enter rejection reason..." required></textarea>
                                    <input type="hidden" name="paper_id" value="<?php echo $paper['p_id']; ?>">
                                    <input type="hidden" name="status" value="reject">
                                    <button type="submit" class="btn btn-reject-confirm">Submit</button>
                                </form>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
                </thead>

            </table>
        </div>
    </div>
    <script>
        function showRejectForm(paperId) {
            document.getElementById('reject-form-' + paperId).style.display = 'block';
        }
    </script>

</body>

</html>