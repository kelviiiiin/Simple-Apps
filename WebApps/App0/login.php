// The login logic
<?php
// Start the session and include connection
session_start();
require_once "config.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD" == "POST"]) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare a SELECT statement to find the user
    $sql = "SELECT id, username, password FROM users WHERE username = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind the username to the '?' placeholder
        mysqli_stmt_bind_param($stmt, "s", $username);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            // Check if username exists
            if ($user = mysqli_fetch_assoc($result)) {
                // Verify hashed password from db against user input
                if (password_verify($password, $user['password'])) {
                    // Start new session
                    session_regenerate_id();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_id'] = $user['id'];

                    // Redirect to dashboard
                    header("location: dashboard.php");
                } else {
                    echo "Invalid password.";
                }
            } else {
                echo "No account found with that username.";
            }
        }
    mysqli_stmt_close($stmt);
    }
}
mysqli_close($link);
?>