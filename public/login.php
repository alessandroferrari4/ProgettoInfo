<?php
include_once('../admin/dbconfig.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$myusername'";
    $result = $db->query($sql);
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
        if(password_verify($mypassword,$row['passcode'])){
                header("location:../admin/welcome.php");
                exit();
        }
        else{
            $error="password sbagliata";
        }
    }else{
        $error="username o password sbagliati";
        }
    }

?>
<html>

<head>
    <title>Login Page</title>

    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        label {
            font-weight: bold;
            width: 100px;
            font-size: 14px;
        }

        .box {
            border: #666666 solid 1px;
        }
    </style>

</head>

<body bgcolor="#FFFFFF">

    <div align="center">
        <div style="width:300px; border: solid 1px #333333; " align="left">
            <div style="background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

            <div style="margin:30px">

                <form action="" method="post">
                    <label>UserName :</label><input type="text" name="username" class="box" /><br /><br />
                    <label>Password :</label><input type="password" name="password" class="box" /><br /><br />
                    <input type="submit" value=" Submit " /><br />
                </form>

                <div style="font-size:11px; color:#cc0000; margin-top:10px">
                    <?php echo $error; ?>
                </div>

            </div>

        </div>

    </div>

</body>

</html>