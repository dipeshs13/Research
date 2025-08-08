<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rejected Papers</title>
    <link rel="stylesheet" href="css/Researcher.css">
    <style>
        /* your styles here */
        .rejmain-content {
            margin-left: 220px;
            padding: 30px;
            background-color: #f4f4f4;
            min-height: 100vh;
        }

        /* ... rest of your CSS ... */
    </style>
</head>

<body>

    <?php
    require_once 'includes/dbh.inc.php';
    include 'ResearcherHeader.php';  // This already contains session check, so you can remove the session check above if you want
    include 'classes/researcherdata.classes.php';

    if (!isset($_SESSION['researcherId'])) {
        header('location: ResearcherLogin.php');
        exit();
    }
    $researcherId = $_SESSION['researcherId'];
    $researcherFullname = $_SESSION['researcherfullname'];

    $researcherData = new Researcherdata_classes();
    $rejectedPapers = $researcherData->Rejected_Papers($researcherId);
    ?>

    <div class="rejmain-content">
        <div class="page-title">Rejected Research Papers</div>

        <table class="rejected-table">
            <thead>
                <tr>
                    <th>Paper Title</th>
                    <th>Submitted By</th>
                    <th>Submitted On</th>
                    <th>Status</th>
                    <th>Rejection Reason</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($rejectedPapers)): ?>
                    <?php foreach ($rejectedPapers as $paper): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($paper['p_title']); ?></td>
                            <?php
                            $rid = $paper['r_id'];
                            $ResearcherInfo = $researcherData->researcherDetails($rid);
                            echo '<td>' . htmlspecialchars($ResearcherInfo['r_fullname']) . '</td>';
                            ?>
                            <td><?php echo htmlspecialchars($paper['Timestamp']); ?></td>
                            <td><span class="status-rejected"><?php echo htmlspecialchars($paper['status']); ?></span></td>
                            <td><?php echo htmlspecialchars($paper['reason'] ?? 'No reason provided'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align:center; padding: 20px;">No rejected papers found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>

</html>