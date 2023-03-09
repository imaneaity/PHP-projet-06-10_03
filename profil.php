<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT']."/TODO/controllers/UserController.php";
    $userController = UserController::createUserFromId($_SESSION['id']);
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
        <i class="bi bi-check2-all"></i>
        <?php foreach($userController->getTodos() as $key => $todoTab):?>
            <div class= 'todo <?= ($todoTab['isDone']? "todoDone" : "todoNotDone") ?>' >
            <p> <?= $todoTab["contenu"]?></p>

            </div>





        <?php endforeach?>
    </section>





</body>
</html>