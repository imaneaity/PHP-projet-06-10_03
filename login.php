<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
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
    </main>

</body>
</html>