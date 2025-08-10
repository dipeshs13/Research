<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Researcher Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <div class="researcher-reg-form">
        <?php
           if (isset($_GET['error'])) {
        $error = htmlspecialchars($_GET['error']);
        echo '<div style="color: red; text-align: center; margin: 10px 0;">Error: ' . $error . '</div>';
    }   
    ?>
        <h2>Researcher Registration</h2>
        <form action="includes/researcherreg.inc.php" method="POST">
            <div class="form-grid">
                <div>
                    <label for="fullname">Full Name:</label>
                    <input type="text" id="fullname" name="fullname" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div>
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <div>
                    <label for="institution">Institution:</label>
                    <input type="text" id="institution" name="institution" required>
                </div>
                <div>
                    <label for="field_of_research">Field of Research:</label>
                    <input type="text" id="field_of_research" name="field_of_research" required>
                </div>
                <div>
                    <label for="country">Country:</label>
                    <input type="text" id="country" name="country" required>
                </div>
                <div>
                    <label for="biography">Biography:</label>
                    <textarea id="biography" name="biography" rows="4" required></textarea>
                </div>
                <div>
                    <label for="research_interests">Research Interests:</label>
                    <input type="text" id="research_interests" name="research_interests" required>
                </div>
            </div>
            <div class="button-container">
                <button type="submit">Register</button>
            </div>
        </form>
        <div>
            <p id="researcherpara">Already have an account? <a href="ResearcherLogin.php" id="researcher-login-link">Login here</a></p>
        </div>
    </div>
</body>

</html>