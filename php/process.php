<?php
include_once 'school.php';
if(isset($_POST['save']))
{	 
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