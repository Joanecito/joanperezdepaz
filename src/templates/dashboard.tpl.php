<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div id="title">
            <h1><?= $nom; ?></h1>
        </div>
        <div id="menuSup">
            <form action="?url=logoutAction" method="post">
                <button type="submit">TANCAR SESSIO</button>
            </form>
        </div>
    </header>
    <nav>
        <h3>Hola <?= $_COOKIE['activeUser'] ?>, benvingut/da al teu dashboard!</h3>
    </nav>
    <section>
        <article id="tasks">
            
            <h4>Llistat de Tasques</h4>
            <br>
            <?php if ($quedenTasques) : ?>
                <table>
                    <tr>
                        <th>Nom de la tasca</th>
                        <th>Estat</th>
                    </tr>
                    <?php
                    for ($i = 0; $i < count($llistatTasques); $i++) {
                        for ($j = 0; $j < count($llistatTasques[$i]); $j++) {
                            echo '<tr>' . '<td>' . $llistatTasques[$i][$j]['item'] . '</td>';
                            if ($llistatTasques[$i][$j]['completed']) {
                                echo '<td>Acabat/ada</td></tr>';
                            } else {
                                echo '<td>Per acabar</td></tr>';
                            }
                        }
                    }
                    ?>
                </table>
            <?php else : ?>
                <p>No tens tasques per realitzar</p>
            <?php endif ?>
        </article>
        <article id="perfil">
            <h4>Gestió del perfil</h4>
            <br>
            <p>Nom: <?= $_COOKIE['activeUser'] ?></p>
            <a href="?url=perfil">Modifica el perfil</a>
        </article>
    </section>
</body>

</html>