<?php
if ($_SERVER['REQUEST_URI'] == '/ProgettoInfo/public/login')
    include_once('logintemp.php');
else if ($_SERVER['REQUEST_URI'] == '/ProgettoInfo/admin/register')
    include_once('registertemp.php');
?>

<body>

    <div class="form">
        <div class="a-container">
            <div class="b-container"><b> <?php echo $title; ?></b></div>

            <div style="margin:30px">

                <form action="" method="post">
                    <label>UserName:</label><input type="text" name="username" class="box" required="" /><br /><br />
                    <label>Password:</label><input type="password" name="password" class="box" required="" /><br /><br />
                    <input type="submit" value="<?php echo $title; ?>" /><br />
                </form>

                <div class="error">
                    <?php echo $error; ?>
                </div>

            </div>

        </div>

    </div>

</body>