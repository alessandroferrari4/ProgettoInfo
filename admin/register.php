<?php
session_start();
include_once('session.php');
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
        header('location:../public/login');
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname1 = $_POST['firstname'];
    $lastname1 = $_POST['lastname'];
    $dob1 = $_POST['dob'];
    $gender1 = $_POST['gender'];
    $ssn1 = $_POST['ssn'];
    $class1 = $_POST['class'];
    $section1 = $_POST['section'];
    $classroom1 = $_POST['classroom'];
    $specialization1 = $_POST['specialization'];

    $newdate = date('Y-m-d', strtotime($dob1));

    $sql = "UPDATE students SET firstname='$firstname1',lastname='$lastname1',dob='$newdate1',gender='$gender1',ssn='$ssn1',class='$class1',section='$section1',classroom='$classroom1',specialization='$specialization1' WHERE id='$id1'";

    if ($id) {
        $db->query($sql);
        header('location:welcome');
        exit();
    } else {
        $error = 'tua sorella morta';
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
                    <label>Password:</label><input type="password" name="password" class="box" required=""  /><br /><br />
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