<?php
session_start();
include_once('session.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    $hashPassword = password_hash($mypassword, PASSWORD_DEFAULT);

    $stmt = $db->prepare("SELECT username FROM users WHERE username=?");
    $stmt->bind_param("s", $myusername);
    $result = $stmt->execute();
    if ($result) {
        $error = "Username già occupato";
        $stmt->close();
    } else {
        $stmt = $db->prepare("INSERT INTO users (username,passcode) VALUES(?,?)");
        $stmt->bind_param("ss", $myusername, $hashPassword);
        $stmt->execute();
        $stmt->close();
        header('location:../public/login');
        exit();
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../css/styleS.css">
</head>

<body>

    <div class="form">
        <div class="a-container">
            <div class="b-container"><b>Sign Up</b></div>

            <div style="margin:30px">

                <form action="" method="post">
                    <label>UserName:</label><input type="text" name="username" class="box" required="" /><br /><br />
                    <label>Password:</label><input type="password" name="password" class="box" required="" /><br /><br />
                    <input type="submit" value="Sign Up" /><br />
                </form>

                <div class="error">
                    <?php echo $error; ?>
                </div>

            </div>

        </div>

    </div>

</body>

</html>