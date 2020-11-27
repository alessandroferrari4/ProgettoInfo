<?php
include_once('../admin/dbconfig.php');

$sql = "SELECT * FROM students";
$result = $db->query($sql);
$data = array();

while ($row = $result->fetch_assoc()) {
    $row = $result->fetch_assoc();
    $data[] = $row;
}

echo json_encode($data);
?>
