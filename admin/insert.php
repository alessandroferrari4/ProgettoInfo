<?php
include_once('dbconfig.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['namee'];
    $surname = $_POST['surname'];
    $dob = $_POST['dob'];
    $class = $_POST['class'];
    $classroom = $_POST['classroom'];
    $subject = $_POST['subject'];

    $newdate = date('Y-m-d', strtotime($dob));

    $sql = "INSERT INTO students (namee,surname,dob,class,classroom,subjectt)
     VALUES ('$name','$surname','$newdate','$class','$classroom','$subject')";
    $sql1 = "SELECT * FROM students";
    $result = $db->query($sql1);
    $db->query($sql);
    if($result->num_rows==$result+1){
        header('location:welcome.php');
        exit();
    }else{
        
    }

}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Insert students</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
    <script rel="stylesheet" href="css/style.css"></script>
</head>

<body>
    <form method="post" action="" style="text-align: center; padding-top:100px">
        <br>Name:
        <br>
        <input type="text" name="namee">
        <br> Surname:<br>
        <input type="text" name="surname">
        <br> Date of Birth:<br>
        <input type="date" name="dob">
        <br> Class:<br>
        <input type="value" name="class">
        <br> Classroom:<br>
        <input type="text" name="classroom">
        <br> Subject:<br>
        <input type="text" name="subject">
        <br><br>
        <input type="submit" name="save" value="Submit">
    </form>
</body>

</html>