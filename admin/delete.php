<?php
session_start();
include_once('session.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $stmt = $db->prepare("SELECT id FROM students WHERE id=?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    if ($result) {
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

</head>

<body>

    <div class="form" style="padding-top: 80px;">
        <div class="a-container">
            <div class="b-container"><b>Delete</b></div>

            <div style="margin:30px">

                <form action="" method="post">
                    <label>Id:</label><input type="number" name="id" min="1" required="" class="box" /><br /><br />
                    <input type="submit" value="Delete" /><br />
                </form>

                <div class="error">
                    <?php echo $error; ?>
                </div>

            </div>

        </div>

    </div>

</body>

</html>