<?php
    session_start();

    $inscriptionEmailError = "";
    $inscriptionPasswordError= "";

    $connexionEmailError = "";
    $connexionPasswordError="";

    if(isset($_GET['inscription'])){
        if(isset($_GET['emailError'])){
            $inscriptionEmailError = $_GET['emailError'] === "InputInvalid" ? "Email incorrecte" : "Email existe déjà!";
        }

        if(isset($_GET['passwordError'])){
            $inscriptionPasswordError = $_GET['passwordError'] === "InputInvalid" ? "Mot de passe trop court" : "";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<?php
    $title = "Connexion";
    include_once "./components/head.php"
?>


<body>
    
<?php
    include_once "./components/navbar.php"
?>

    <h1>Se connecter</h1>

    <main>
        <section>
            <h2> Inscription </h2>
            <form action="routes/signup.php" method="post">
                <input 
                class="<?= $inscriptionEmailError !== "" ? "inputError" : "" ?>"
                    type="text"
                    name="email"
                    placeholder="exemple@gmail.com"
                />
                <!-- Tester si la clé errorEmail existe dans la tableau $_GET-->
                <p class="error">
                    <?= $inscriptionEmailError ?>
                </p>


                <input 
                class="<?= $inscriptionPasswordError !== "" ? "inputError" : "" ?>"
                type="password"
                name="password"
                placeholder="Mot De Passe"
                >
                <p class="error">
                    <?= $inscriptionPasswordError ?>
                </p>

                <button>Valider</button>
            </form>
        </section>


        <section>
            <h2>Connexion</h2>
            <form action="routes/signin.php" method="post">
                <input 
                    type="email"
                    name="email"
                    placeholder="exemple@gmail.com"
                />
                <input 
                type="password"
                name="password"
                placeholder="Mot De Passe"
                >

                <button>Valider</button>
            </form>
        </section>
    </main>

</body>
</html>