<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1><?= $nom; ?> de <?= $_COOKIE['activeUser'] ?></h1>
    </header>
    <nav>
        <h4>Modifica les teves dades</h4>
    </nav>
    <section>
        <article>
            <form action="?url=updateAction" method="post">
                <label for="nomUpdate">Introdueix el teu nou nom:</label>
                <input type="text" name="nomUpdate" placeholder="Nom">
                <br>
                <label for="passwdUpdate">Introdueix el teu nou password:</label>
                <input type="password" name="passwdUpdate" placeholder="Password">
                <br>
                <label for="passwdUpdateDoubleCheck">Confirma la contrasenya:</label>
                <input type="password" name="passwdUpdateDoubleCheck" placeholder="Password">
                <br>
                <button type="submit">Guarda els canvis</button>
            </form>
            <br>
            <a href="?url=dashboard">Torna al Dashboard</a>
        </article>
    </section>
</body>

</html>