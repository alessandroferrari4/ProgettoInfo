<?php
session_start();
include_once('session.php');
?>
<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script defer src="../js/table.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">E-Register</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Manage Students
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="insert">Insert</a>
                        <a class="dropdown-item" href="modify">Modify</a>
                        <a class="dropdown-item" href="delete">Delete</a>
                        <a class="dropdown-item" href="../public/chart">Chart</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Manage Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="logout">Sign Out</a>
                        <a class="dropdown-item" href="register">Sign In</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container" style="padding-top: 60px; padding-right: 90px;">
        <table id="students">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Date of birth</th>
                    <th scope="col">Gender</th>
                    <th scope="col">SSN</th>
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
                    echo " <tr> <th scope='row'>" . $row['id'] . "</th>";
                    echo "<td>" . $row['firstname'] . "</td>";
                    echo "<td>" . $row['lastname'] . "</td>";
                    echo "<td>" . $row['dob'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['ssn'] . "</td>";
                    echo "<td>" . $row['class'] . "</td>";
                    echo "<td>" . $row['section'] . "</td>";
                    echo "<td>" . $row['classroom'] . "</td>";
                    echo "<td>" . $row['specialization'] . "</td> </tr>";
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>