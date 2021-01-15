<?php
session_start();
include_once('session.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $stmt = $db->prepare("SELECT id FROM students WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $numrow = $result->num_rows;

    if ($numrow > 0) {
        $stmt->close();
        $stmt = $db->prepare("DELETE FROM students WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        header('location:welcome');
        exit();
    } else {
        $error = "The student doesn't exist";
    }
}
?>
<html>

<head>
    <title>Delete Students</title>
    <link rel="stylesheet" href="../css/delete.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>

<body>
    <?php
    include_once('../template/template_2.php');
    ?>
</body>

</html>