<?php
session_start();
include_once('../dbconfig.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $myusername);
    $result = $stmt->execute();
    $stmt->close();

    if ($result) {
        $result = $db->query("SELECT passcode FROM users WHERE username='$myusername'");
        $row = $result->fetch_assoc();
        if (password_verify($mypassword, $row['passcode'])) {
            $_SESSION['login_user'] = $myusername;
            header("location:../admin/welcome");
            exit();
        } else {
            $error = "Wrong username or password!";
        }
    }
}

?>
<html>

<head>

    <title>Login Page</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

</head>

<body>

    <div class="form">
        <div class="a-container">
            <div class="b-container"><b>Login</b></div>

            <div style="margin:30px">

                <form action="" method="post">
                    <label>UserName:</label><input type="text" name="username" class="box" /><br /><br />
                    <label>Password:</label><input type="password" name="password" class="box" /><br /><br />
                    <input type="submit" value=" Submit " /><br />
                </form>

                <div class="error">
                    <?php echo $error; ?>
                </div>

            </div>

        </div>

    </div>

</body>

</html>