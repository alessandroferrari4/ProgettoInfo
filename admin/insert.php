<?php
session_start();
include_once('session.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $ssn = $_POST['ssn'];
    $class = $_POST['class'];
    $section = $_POST['section'];
    $classroom = $_POST['classroom'];
    $specialization = $_POST['specialization'];

    $stmt = $db->prepare("SELECT ssn FROM students WHERE ssn=?");
    $stmt->bind_param("s", $ssn);
    $result = $stmt->execute();
    $stmt->close();

    $stmt = $db->prepare("INSERT INTO students (firstname,lastname,dob,gender,ssn,class,section,classroom,specialization) VALUES(?,?,?,?,?,?,?,?,?)");

    if ($result) {
        $error = 'Student already insert';
    } else {
        $stmt->bind_param("sssssisss", $firstname, $lastname, $dob, $gender, $ssn, $class, $section, $classroom, $specialization);
        $stmt->execute();
        $stmt->close();
        header('location:welcome');
        exit();
    }
}

?>
<html>

<head>

    <title>Insert Students</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

</head>

<body>

    <div class="form" style="padding-top: 80px;">
        <div class="a-container">
            <div class="b-container"><b>Insert Students</b></div>

            <div style="margin:30px">

                <form action="" method="post">
                    <label>FirstName:</label><input type="text" maxlength="20" name="firstname" required="" class="box" /><br /><br />
                    <label>LastName:</label><input type="text" name="lastname" required="" class="box" /><br /><br />
                    <label>DateOfBirth:</label><input type="date" name="dob" required="" class="box" /><br /><br />
                    <label>Gender(M/F):</label><input type="text" name="gender" maxlength="1" required="" class="box" /><br /><br />
                    <label>SSN:</label><input type="text" name="ssn" maxlength="20" required="" class="box" /><br /><br />
                    <label>Class:</label><input type="number" name="class" min="1" max="5" required="" class="box" /><br /><br />
                    <label>Section:</label><input type="text" name="section" required="" class="box" /><br /><br />
                    <label>Classroom:</label><input type="text" maxlength="10" name="classroom" required="" class="box" /><br /><br />
                    <label>Specialization:</label><input type="text" maxlength="30" name="specialization" required="" class="box" /><br /><br />
                    <input type="submit" value="Insert" /><br />
                </form>

                <div class="error">
                    <?php echo $error; ?>
                </div>

            </div>

        </div>

    </div>

</body>

</html>