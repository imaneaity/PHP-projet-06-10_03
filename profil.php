<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<?php
    $title = "Page de profil";
    include_once "./components/head.php"
?>
<body>
<?php
    include_once "./components/navbar.php"
?>

    <div>
        <img id="avatar" src="<?= $_SESSION['avatarURL']?>"  >
        <p> <?= $_SESSION['email']?> </p>

        <p>Changer la photo de profil ici:</p>
        <form action="/TODO/routes/uploadAvatar.php" method="POST">
            <input type="text" name="avatarURL" >
            <button>Enregistrer</button>
        </form>
    </div>



</body>
</html>