<?php
session_start();
include_once('session.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['select'])) {
        $id = $_POST['id'];
        $sql = "SELECT * FROM students WHERE id='$id'";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION['id'] = $id;
            $result = $db->query($sql);
            while ($row = $result->fetch_assoc()) {
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $dob = $row['dob'];
                $gender = $row['gender'];
                $ssn = $row['ssn'];
                $class = $row['class'];
                $section = $row['section'];
                $classroom = $row['classroom'];
                $specialization = $row['specialization'];
            }
        } else
            $error = "The student doesn't exist";
    }
    if (isset($_POST['modify'])) {
        $firstname1 = $_POST['firstname'];
        $lastname1 = $_POST['lastname'];
        $dob1 = $_POST['dob'];
        $gender1 = $_POST['gender'];
        $ssn1 = $_POST['ssn'];
        $class1 = $_POST['class'];
        $section1 = $_POST['section'];
        $classroom1 = $_POST['classroom'];
        $specialization1 = $_POST['specialization'];
        $sql1 = "UPDATE students SET firstname='$firstname1',lastname='$lastname1',dob='$dob1',gender='$gender1',ssn='$ssn1',class='$class1',section='$section1',classroom='$classroom1',specialization='$specialization1' WHERE id=" . $_SESSION['id'];
        if ($db->query($sql1) == true) {
            header('location:welcome');
            exit();
        } else
            $error = 'Retry';
    }
}
?>
<html>

<head>
    <title>Modify Students</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/table.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="form" style="position:absolute; bottom:50%; left:-20%;">
        <div class="a-container">
            <div class="b-container"><b>Student Id</b></div>

            <div style="margin:30px">

                <form action="" method="post">
                    <label>Id:</label><input type="number" name="id" min="1" class="box" /><br /><br />
                    <input type="submit" value="Select" name="select" /><br />
                </form>

                <div class="error">
                    <?php echo $error; ?>
                </div>

            </div>

        </div>

    </div>

    <div class="form" style="padding-top: 20px;">
        <div class="a-container">
            <div class="b-container"><b>Modify Students</b></div>

            <div style="margin:30px">

                <form action="" method="post">
                    <?php

                    ?>
                    <label>FirstName:</label><input type="text" maxlength="20" name="firstname" class="box" value="<?php echo $firstname ?>" /><br /><br />
                    <label>LastName:</label><input type="text" name="lastname" class="box" value="<?php echo $lastname ?>" /><br /><br />
                    <label>DateOfBirth:</label><input type="date" name="dob" class="box" value="<?php echo $dob ?>" /><br /><br />
                    <label>Gender(M/F):</label><input type="text" name="gender" maxlength="1" class="box" value="<?php echo $gender ?>" /><br /><br />
                    <label>SSN:</label><input type="text" name="ssn" maxlength="20" class="box" value="<?php echo $ssn ?>" /><br /><br />
                    <label>Class:</label><input type="number" name="class" min="1" max="5" class="box" value="<?php echo $class ?>" /><br /><br />
                    <label>Section:</label><input type="text" name="section" class="box" value="<?php echo $section ?>" /><br /><br />
                    <label>Classroom:</label><input type="text" maxlength="10" name="classroom" class="box" value="<?php echo $classroom ?>" /><br /><br />
                    <label>Specialization:</label><input type="text" maxlength="30" name="specialization" class="box" value="<?php echo $specialization ?>" /><br /><br />
                    <input type="submit" value="Modify" name="modify" /><br />
                </form>

                <div class="error">
                    <?php echo $error; ?>
                </div>

            </div>

        </div>

    </div>

</body>

</html>