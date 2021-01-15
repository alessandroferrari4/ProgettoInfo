<?php
if ($_SERVER['REQUEST_URI'] == '/ProgettoInfo/admin/delete')
    include_once('deletetemp.php');
else if ($_SERVER['REQUEST_URI'] == '/ProgettoInfo/admin/modify')
    include_once('modifytemp.php');
?>

<div class="form">
    <div class="a-container">
        <div class="b-container"><b><?php echo $title; ?></b></div>
        <div style="margin:30px">
            <form action="" method="post">
                <label>Id:</label><input type="number" name="id" min="1" required="" class="box" /><br /><br />
                <input type="submit" value="<?php echo $button; ?>" name="select" /><br />
            </form>
            <div class="error">
                <?php echo $error; ?>
            </div>
        </div>
    </div>
</div>