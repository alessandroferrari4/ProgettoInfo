<?php
session_start();
include_once('../admin/dbconfig.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$myusername'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($mypassword, $row['passcode'])) {
            $_SESSION['login_user'] = $myusername;
            header("location:../admin/welcome.php");
            exit();
        } else {
            $error = "Password sbagliata";
        }
    } else {
        $error = "Username o password sbagliati";
    }
}

?>
<html>

<head>

    <title>Login Page</title>
    <link rel="stylesheet" href="../css/data.css">
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