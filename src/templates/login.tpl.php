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
        <h1><?= $nom; ?></h1>
    </header>
    <nav>
        <ul>
            <li>
                <a href="?url=register">REGISTER</a>
            </li>
            <li>
                <a href="?url=home">HOME</a>
            </li>
        </ul>
    </nav>
    <section>
        <article>
            <?php if (isset($_COOKIE['errorAuth'])) : ?>
                <p>Les dades introduides no son correctes.</p><br>
            <?php endif ?>

            <?php if (isset($_COOKIE['regCorrecte'])) : ?>
                <p>T'has registrat correctament, ara inicia sessio.</p><br>
            <?php endif ?>

            <?php if (isset($_COOKIE['guardar'])) : ?>
                <p><?= $_COOKIE['ultimaConexion'] ?></p><br>
            <?php endif ?>

            <form action="?url=loginAction" method="post">
                <?php if (!isset($_COOKIE['guardar'])) : ?>
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="passwd" placeholder="Password">
                <?php else : ?>
                    <input type="email" name="email" value="<?= $_COOKIE['emailUser'] ?>">
                    <input type="password" name="passwd" value="<?= $_COOKIE['passwdUser'] ?>">
                <?php endif ?>
                <br>
                <input type="checkbox" id="guardar" name="guardar" value="1">
                <label for="guardar">Mante la sessio iniciada</label><br><br>
                <button type="submit">Login</button>
            </form>
            <br>
            <form action="?url=resetAction" method="post">
                <button type="submit">Elimina les dades d'inici de sessio</button>
            </form>
        </article>  
    </section>

</body>

</html>