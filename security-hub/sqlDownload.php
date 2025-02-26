<form action="" method="post">
    <input type="submit" value="Esegui ora" class="greenBtn" name="backupNow">
</form>

<?php
    require_once 'backupDB.php';
    if(isset($_POST['backupNow'])){
        WPSH_backupDB();

    }
?>