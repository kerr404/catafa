<?php 
if (isset($_POST["login-submit"])) {
    require "../includes/db_conn.php";

    $emailPhone = $_POST['login-email-phone'];
    $pass = $_POST['login-password'];

    if (empty($emailPhone)) {
        header("Location: ../login.php?error=empty_email_phone");
        exit();
    } elseif (empty($pass)) {
        header("Location: ../login.php?error=empty_password&email_phone=".$emailPhone);
        exit();
    } else {
        $sql = "SELECT * FROM admins where admin_username = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error=sql_error");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $emailPhone);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $dbPass = $row['admin_password'];
                if (password_verify($pass, $dbPass)) {
                    session_start();
                    $_SESSION['ADMIN_USER'] = $row['admin_username'];
                    header("Location: ../index.php?login=success");
                } else {
                    header("Location: ../login.php?error=password_incorrect");
                    exit();
                }
            } else {
                header("Location: ../login.php?error=user_not_found");
                exit();
            }
        }
    }
    mysqli_close($conn);
} else {
    echo "Direct access is prohibited!";
}
