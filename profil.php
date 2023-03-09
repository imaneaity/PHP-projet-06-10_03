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

    <div class="profil-infos">
        <img id="avatar" src="<?= $_SESSION['avatarURL']?>"  >
        <p> <?= $_SESSION['email']?> </p>

        <p>Changer la photo de profil ici:</p>
        <form action="/TODO/routes/uploadAvatar.php" method="POST">
            <input type="text" name="avatarURL" >
            <button type="submit">Enregistrer</button>
        </form>
    </div>


    <section>
        <h2>Todos</h2>
        <form action="/TODO/routes/addTodo.php" method="POST">
            <input type="text" name="todo" placeholder="Ajouter une tache" />
            <button>Ajouter +</button>
        </form>
    </section>





</body>
</html>