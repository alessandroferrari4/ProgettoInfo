<?php
include_once('dbconfig.php');

$sql = "SELECT specialization FROM students WHERE specialization = 'Informatica'";
$result = $db->query($sql);
$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
