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
                <a href="?url=login">LOGIN</a>
            </li>
            <li>
                <a href="?url=home">HOME</a>
            </li>
        </ul>
    </nav>
    <section>
        <article><?php
                    if (isset($_COOKIE['errorReg'])) {
                        echo 'Les dades introduides no son correctes.<br>';
                    }
                    ?>
            <form action="?url=registerAction" method="post">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="passwd" placeholder="Password">
                <input type="text" name="nom" placeholder="Nom"><br>

                <input type="radio" id="alumne" name="rol" value="alumne">
                <label for="alumne">Alumne</label><br>
                <input type="radio" id="profe" name="rol" value="professor">
                <label for="profe">Professor</label><br>

                <button type="submit">Register</button>
            </form>
        </article>

    </section>

</body>

</html>