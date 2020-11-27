<?php
include_once('admin/dbconfig.php');
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">E-Register</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="public/login.php">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="public/chart.php">Chart</a>
                </li>

            </ul>

        </div>
    </nav>

    <div class="container" style="padding-top: 100px; padding-right: 90px;">
        <table id="students">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Class</th>
                    <th scope="col">Section</th>
                    <th scope="col">Classroom</th>
                    <th scope="col">Specialization</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM students";
                $result = $db->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $row = $result->fetch_assoc();
                    echo " <tr> <th scope='row'>" . $row['firstname'] . "</th>";
                    echo "<td>" . $row['lastname'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['class'] . "</td>";
                    echo "<td>" . $row['section'] . "</td>";
                    echo "<td>" . $row['classroom'] . "</td>";
                    echo "<td>" . $row['specialization'] . "</td> </tr>";
                } ?>
            </tbody>
        </table>
    </div>

</body>

<script>
    $(document).ready(function() {
        $('#students').dataTable();
    });
</script>

</html>