<!-- Réalisez un Labyrinthe !
Le joueur contrôle un chat qui doit se déplacer dans un labyrinthe jusqu’à trouver
la souris. Pour cela, vous aurez quelques règles à respecter :
➢ Le chat doit se déplacer grâce à 4 boutons (haut, bas, gauche, droite) qui le
feront bouger de 1 case
➢ Un brouillard de guerre est dispersé dans tout le labyrinthe, seules les 4 cases
autour du chat sont visibles
➢ Des murs sont positionnés dans le labyrinthe, vous ne pourrez pas vous
déplacer vers eux ni vous déplacer en dehors des cases du labyrinthe
➢ Vous créerez au moins 2 labyrinthes différents, le labyrinthe sera choisi
aléatoirement à chaque fois que vous recommencez
➢ Pour aller plus loin (facultatif) : Réalisez une génération automatisée des
labyrinthes, plus besoin de les écrire à la main ! A chaque nouvelle partie, un
labyrinthe sera choisi aléatoirement entre les labyrinthes pré faits que vous
avez réalisés précédemment et une dizaine de labyrinthes automatisés. -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>

<body>

    <h1>Chassez la souris !</h1>

    <!-- 0 = Espaces, 1 = Murs, 2 = Chat, 3 = Souris; -->
    <?php

    session_start();
    $mazes = [
        [
            [2, 0, 0, 0, 1, 0, 0, 0],
            [0, 1, 0, 0, 1, 0, 0, 1],
            [0, 1, 0, 1, 0, 1, 0, 1],
            [1, 1, 0, 0, 0, 0, 1, 1],
            [0, 0, 1, 1, 0, 0, 0, 3],
        ],
        [
            [2, 1, 0, 0, 1, 0, 0, 3],
            [0, 0, 1, 0, 1, 0, 0, 1],
            [0, 0, 0, 1, 0, 0, 1, 1],
            [1, 1, 0, 0, 0, 0, 1, 1],
            [0, 0, 1, 1, 0, 1, 0, 0],
        ],
        [
            [2, 1, 0, 0, 1, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 1],
            [0, 0, 1, 1, 1, 0, 1, 1],
            [1, 1, 0, 0, 0, 0, 1, 1],
            [0, 0, 1, 3, 0, 1, 0, 0],
        ],
        [
            [2, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1],
            [0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0],
            [0, 0, 1, 1, 1, 0, 0, 0, 1, 0, 1, 1, 0, 0, 1],
            [1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0],
            [0, 0, 1, 1, 0, 1, 0, 0, 1, 0, 0, 0, 3, 0, 0],
            [1, 1, 0, 0, 1, 0, 1, 1, 1, 0, 1, 1, 0, 1, 0],
            [0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0],
        ],
        [
            [2, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 3, 1],
            [0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0],
            [0, 0, 1, 1, 1, 0, 0, 0, 1, 0, 1, 1, 0, 0, 1],
            [1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0],
            [0, 0, 1, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0],
            [1, 1, 0, 0, 1, 0, 1, 1, 1, 0, 1, 1, 0, 1, 0],
            [0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0],
        ],
        [
            [2, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1],
            [0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0],
            [0, 0, 1, 1, 1, 0, 0, 0, 1, 0, 1, 1, 0, 0, 1],
            [1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0],
            [0, 0, 1, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0],
            [1, 1, 0, 0, 1, 0, 1, 1, 1, 0, 1, 1, 0, 1, 0],
            [0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0],
            [1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0],
            [0, 0, 1, 1, 0, 1, 0, 0, 1, 0, 0, 0, 3, 0, 0],
        ],
        [
            [2, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 3, 1],
            [0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 1, 0, 0, 1],
            [0, 0, 1, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 0, 1, 0, 1, 0, 0, 1],
            [1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 1, 1, 0, 1, 1],
            [0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1],
            [1, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 1, 0, 0, 1],
            [0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 1],
            [1, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 1],
            [0, 0, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1],
        ]
    ];

    if (!isset($_SESSION['maze'])) {
        $random_index = rand(0, count($mazes) - 1);
        $_SESSION['maze'] = $mazes[$random_index];
    }

    $maze = $_SESSION['maze'];


    if (!isset($_SESSION['pos'])) {
        $_SESSION['pos'] = [0, 0];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["reset"])) {
            session_destroy();
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
        if (isset($_POST['dir'])) {
            $maze[0][0] = 0;
            switch ($_POST['dir']) {
                case 'up':
                    if ($_SESSION['pos'][0] - 1 >= 0 && $maze[$_SESSION["pos"][0] - 1][$_SESSION["pos"][1]] != 1) {
                        $_SESSION['pos'][0] = $_SESSION['pos'][0] - 1;
                        if ($maze[$_SESSION['pos'][0]][$_SESSION['pos'][1]] == 3) {
                            $_SESSION["gameOver"] = true;
                        }
                    }
                    $maze[$_SESSION['pos'][0]][$_SESSION['pos'][1]] = 2;
                    break;
                case 'down':
                    if ($_SESSION['pos'][0] < count($maze) - 1 && $maze[$_SESSION["pos"][0] + 1][$_SESSION["pos"][1]] != 1) {
                        $_SESSION['pos'][0] = $_SESSION['pos'][0] + 1;
                        if ($maze[$_SESSION['pos'][0]][$_SESSION['pos'][1]] == 3) {
                            $_SESSION["gameOver"] = true;
                        }
                    }
                    $maze[$_SESSION['pos'][0]][$_SESSION['pos'][1]] = 2;

                    break;
                case 'left':
                    if ($_SESSION['pos'][1] > 0 && $maze[$_SESSION["pos"][0]][$_SESSION["pos"][1] - 1] != 1) {
                        $_SESSION['pos'][1] = $_SESSION['pos'][1] - 1;
                        if ($maze[$_SESSION['pos'][0]][$_SESSION['pos'][1]] == 3) {
                            $_SESSION["gameOver"] = true;
                        }
                    }
                    $maze[$_SESSION['pos'][0]][$_SESSION['pos'][1]] = 2;
                    break;
                case 'right':
                    if ($_SESSION['pos'][1] < count($maze[$_SESSION["pos"][0]]) - 1 && $maze[$_SESSION["pos"][0]][$_SESSION["pos"][1] + 1] != 1) {
                        $_SESSION['pos'][1] = $_SESSION['pos'][1] + 1;
                        if ($maze[$_SESSION['pos'][0]][$_SESSION['pos'][1]] == 3) {
                            $_SESSION["gameOver"] = true;
                        }
                    }
                    $maze[$_SESSION['pos'][0]][$_SESSION['pos'][1]] = 2;
                    break;
                default:
                    break;
            }
        }
    }
    foreach ($maze as $i => $line) {
        $playerPos = $_SESSION['pos'];
        foreach ($line as $j => $cell) {
            if (!(($i === $playerPos[0] && $j === $playerPos[1])
                || ($i === $playerPos[0] + 1 && $j == $playerPos[1])
                || ($i === $playerPos[0] - 1 && $j == $playerPos[1])
                || ($i === $playerPos[0] && $j == $playerPos[1] + 1)
                || ($i === $playerPos[0] && $j == $playerPos[1] - 1)
            )) {
                $maze[$i][$j] = 4;
            }
        }
    }
    ?>
    <?php if (isset($_SESSION["gameOver"]) && $_SESSION["gameOver"] === true) :
        session_destroy();
    ?>
        <p id="gagne">Bravo ! Vous avez attrapé la souris !</p>
        <form method="post">
            <input id="rejou" type="submit" name="replay" value="Rejouer">
        </form>
    <?php else : ?>
        <table>
            <?php
            foreach ($maze as $row) {
                echo ('<tr>');
                foreach ($row as $value) {
                    switch ($value) {
                        case 0:
                            echo ('<td class="space"></td>');
                            break;
                        case 1:
                            echo ('<td class="img"> <img src="./assets/images/mur.png"> </td>');
                            break;
                        case 2:
                            echo ('<td class="img"> <img src="./assets/images/chat-noir.png"> </td>');
                            break;
                        case 3:
                            echo ('<td class="img"> <img src="./assets/images/souris.png"> </td>');
                            break;
                        case 4:
                            echo ('<td class="img"> <img src="./assets/images/brume.png"> </td>');
                            break;

                        default:
                            # code...
                            break;
                    }
                }
                echo ('</tr>');
            }
            ?>
        </table>
        <form action="" method="post">
            <input id="up" type="submit" name="dir" value="up">
            <input id="down" type="submit" name="dir" value="down">
            <input id="left" type="submit" name="dir" value="left">
            <input id="right" type="submit" name="dir" value="right">
            <input id="reset" type="submit" name="reset" value="reset">
        </form>
    <?php endif; ?>
</body>

</html>