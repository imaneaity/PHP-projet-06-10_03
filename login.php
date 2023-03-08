<?php
    session_start();
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