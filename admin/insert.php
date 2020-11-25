<?php
include('dbconfig.php');
if (isset($_POST['save'])) {
    $name = $_POST['namee'];
    $surname = $_POST['surname'];
    $dob = $_POST['dob'];
    $class = $_POST['class'];
    $classroom = $_POST['classroom'];
    $subject = $_POST['subjectt'];
    $sql = "INSERT INTO students (namee,surname,dob,class,classroom,subjectt)
	 VALUES ('$name','$surname','$dob','$class','$classroom','$subject')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
    mysqli_close($conn);
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
    <form method="post" action="php/insert.php" style="text-align: center; padding-top:100px">
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
        <input type="text" name="subjectt">
        <br><br>
        <input type="submit" name="save" value="Submit">
    </form>
</body>

</html>