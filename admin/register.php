<?php
include_once('dbconfig.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $myusername = mysqli_real_escape_string($db, $_POST['username']);;
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);;

    $hashPassword = password_hash($mypassword, PASSWORD_DEFAULT);

    $sql1 = "SELECT username FROM users WHERE username = '$myusername'";
    $result = $db->query($sql1);
    if($result->num_rows>0){
        $error="Username già occupato";
    }
    else{
        $sql = "INSERT INTO users (username, passcode) values('$myusername','$hashPassword')";
        $db->query($sql);
        header('location:../public/login.php');
        exit();
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../css/data.css">
</head>

<body>

    <div class="form">
        <div class="a-container">
            <div class="b-container"><b>Sign Up</b></div>

            <div style="margin:30px">

                <form action="" method="post">
                    <label>UserName:</label><input type="text" name="username" class="box" /><br /><br />
                    <label>Password:</label><input type="password" name="password" class="box" /><br /><br />
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