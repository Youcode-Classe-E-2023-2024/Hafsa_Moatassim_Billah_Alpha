<!-- <?php

if (isset($_GET['selector']) && isset($_GET['validator'])) {
    $selector = $_GET['selector'];
    $validator = $_GET['validator'];

    // Require your database connection here
    // $db = mysqli_connect("hostname", "username", "password", "database_name");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $currentDate = date("U");

    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "si", $selector, $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (!$row = mysqli_fetch_assoc($result)) {
            echo "You need to re-submit your reset request.";
            exit();
        } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row['pwdResetToken']);

            if (!$tokenCheck) {
                echo "You need to re-submit your reset request.";
                exit();
            } else {
                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT * FROM users WHERE email=?";
                $stmt = mysqli_stmt_init($db);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "There was an error";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);

                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "There was an error.";
                        exit();
                    } else {
                        $newPassword = password_hash("new_password", PASSWORD_DEFAULT);

                        $sql = "UPDATE users SET password=? WHERE email=?";
                        $stmt = mysqli_stmt_init($db);

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an error";
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, "ss", $newPassword, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            // Delete the reset request from the pwdReset table
                            $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                            $stmt = mysqli_stmt_init($db);

                            if (mysqli_stmt_prepare($stmt, $sql)) {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                echo "Your password has been reset successfully!";
                            } else {
                                echo "There was an error.";
                            }
                        }
                    }
                }
            }
        }
    }

    mysqli_close($db);
} else {
    echo "Invalid request.";
}
?> -->
