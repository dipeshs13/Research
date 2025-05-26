<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rejected Papers</title>
    <link rel="stylesheet" href="css/Researcher.css">
    <style>
        .rejmain-content {
            margin-left: 220px;
            padding: 30px;
            background-color: #f4f4f4;
            min-height: 100vh;
        }

        .page-title {
            font-size: 26px;
            margin-bottom: 20px;
        }

        .rejected-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .rejected-table th,
        .rejected-table td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .rejected-table th {
            background-color: #a83232;
            color: white;
        }

        .rejected-table tr:hover {
            background-color: #fbe9e9;
        }

        .status-rejected {
            color: red;
            font-weight: bold;
        }

        .view-btn {
            padding: 6px 12px;
            border: none;
            background-color: #a83232;
            color: white;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }

        .view-btn:hover {
            background-color: #821f1f;
        }
    </style>
</head>

<body>

    <?php
    require_once 'includes/dbh.inc.php';
    include 'ResearcherHeader.php';
    include 'classes/researcherdata.classes.php';
    $researcherData = new Researcherdata_classes();
    $rejectedPapers = $researcherData->RejectedPapers($researcherId); // Fetch rejected papers for the researcher
    
    ?>

    <!-- Main Content -->
    <div class="rejmain-content">
        <div class="page-title">Rejected Research Papers</div>

        <table class="rejected-table">
            <thead>
                <tr>
                    <th>Paper Title</th>
                    <th>Submitted By</th>
                    <th>Submitted On</th>
                    <th>Status</th>
                    <th>Reason</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example row -->
                <?php foreach ($rejectedPapers as $paper): ?>
                    <tr>
                        <td><?php echo $paper['p_title']; ?></td>
                        <?php
                        $rid = $paper['r_id'];
                        $ResearcherInfo = $researcherData->researcherDetails($rid); // Assume this returns an associative array
                        echo '<td>' . $ResearcherInfo['r_fullname'] . '</td>';
                        ?>
                        <td><?php echo $paper['Timestamp']; ?></td>
                        <td><span class="status-rejected"><?php echo $paper['status']; ?></span></td>
                        <td><a href="ViewPaper.php?id=1" class="view-btn">View</a></td>
                    </tr>
                <?php endforeach; ?>
                <!-- Add dynamic PHP rows here -->
            </tbody>
        </table>
    </div>

</body>

</html>