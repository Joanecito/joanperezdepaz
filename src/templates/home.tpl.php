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
                <a href="?url=register">REGISTER</a>
            </li>
        </ul>
    </nav>
</body>

</html>