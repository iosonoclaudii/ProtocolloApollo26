<?php
session_start();
require_once 'functions.php';

if (!isset($_SESSION['has_key'])) $_SESSION['has_key'] = false;
if (!isset($_SESSION['has_flame'])) $_SESSION['has_flame'] = false;
if (!isset($_SESSION['key_scene'])) $_SESSION['key_scene'] = [5, 10, 17][array_rand([5, 10, 17])];

$scene_id = isset($_GET['scene']) ? (int)$_GET['scene'] : 1;
$scene = getScene($scene_id);

if (!$scene) {
    echo "Scena non trovata.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protocollo Apollo 26</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<h1>Protocollo Apollo 26</h1>
<div class="container">
    <p><?= nl2br(htmlspecialchars($scene['description'])) ?></p>

    <?php
    // Prima aggiorna lo stato se pickup=1
    if (isset($_GET['pickup']) && $scene_id == $_SESSION['key_scene']) {
        $_SESSION['has_key'] = true;
        echo "<p><em>Hai raccolto la chiave di attivazione. Ti servirà per uscire dalla nave.</em></p>";
    }

    // Poi mostra il bottone solo se non hai già la chiave
    if ($scene_id == $_SESSION['key_scene'] && $_SESSION['has_key'] == false) {
        echo "<p><strong>Noti qualcosa: una chiave con incisioni aliene è stretta nella mano del corpo.</strong></p>";
        echo "<p><a href='play.php?scene=$scene_id&pickup=1'>Raccogli la chiave</a></p>";
    }

    if ($scene_id == 13 && $_SESSION['has_flame'] == false) {
        $_SESSION['has_flame'] = true;
        echo "<p><em>Hai preso il lanciafiamme. Ora puoi affrontare la creatura, se mai la incontrerai.</em></p>";
    }

    if ($scene_id == 15 || $scene_id == 25) {
        if ($_SESSION['has_key']) {
            echo "<p><strong>La chiave si incastra perfettamente. La capsula si accende. Sei salvo!</strong></p>";
            echo "<p><a href='index.php'>Ricomincia</a></p>";
        } else {
            echo "<p><strong>La porta non si apre. Non hai la chiave. Un suono ti blocca il respiro dietro di te...</strong></p>";
            echo "<p><a href='index.php'>Ricomincia (sei morto)</a></p>";
        }
        exit();
    }

    if ($scene_id == 26) {
        if ($_SESSION['has_flame']) {
            echo "<p>La creatura salta fuori. Riesci a spaventarla col lanciafiamme. Scappa via urlando, ferita. Hai un attimo per correre.</p>";
            echo "<a href='play.php?scene=15'>Vai alla capsula</a> ";
            echo "<a href='play.php?scene=5'>Torna a cercare la chiave</a>";
        } else {
            echo "<p>La creatura esce dal condotto. Sei disarmato. Ti raggiunge prima ancora che tu possa urlare.</p>";
            echo "<p><strong>Fine del gioco: failure</strong></p>";
            echo "<p><a href='index.php'>Ricomincia</a></p>";
        }
        exit();
    }

    if ($scene_id == 27) {
        if ($_SESSION['has_flame']) {
            if ($_SESSION['has_key']) {
                echo "<p>La creatura ti salta addosso, ma sei pronto. Il lanciafiamme ruggisce, e lei si ritira in fiamme. Hai la chiave. Corri verso la capsula.</p>";
                echo "<a href='play.php?scene=15'>Vai alla capsula</a>";
            } else {
                echo "<p>La creatura ti salta addosso, ma sei pronto. Il lanciafiamme la costringe alla fuga. Tuttavia... ti rendi conto di non avere la chiave.</p>";
                echo "<p><strong>Ti salvi, ma devi tornare a cercare la chiave se vuoi uscire da questa maledetta nave.</strong></p>";
                echo "<a href='play.php?scene=5'>Torna al laboratorio</a>";
            }
        } else {
            echo "<p>Ti avvicini troppo al condotto. La creatura era lì. Ti salta addosso prima che tu possa reagire.</p>";
            echo "<p><strong>Fine del gioco: failure</strong></p>";
            echo "<p><a href='index.php'>Ricomincia</a></p>";
        }
        exit();
    }
    ?>

    <?php if (!$scene['is_end']): ?>
        <ul>
            <?php if ($scene['choice1']): ?>
                <li><a href="play.php?scene=<?= $scene['choice1_next'] ?>"><?= htmlspecialchars($scene['choice1']) ?></a></li>
            <?php endif; ?>
            <?php if ($scene['choice2']): ?>
                <li><a href="play.php?scene=<?= $scene['choice2_next'] ?>"><?= htmlspecialchars($scene['choice2']) ?></a></li>
            <?php endif; ?>
            <?php if ($scene['choice3']): ?>
                <li><a href="play.php?scene=<?= $scene['choice3_next'] ?>"><?= htmlspecialchars($scene['choice3']) ?></a></li>
            <?php endif; ?>
        </ul>
    <?php else: ?>
        <p><strong>Fine del gioco: <?= htmlspecialchars($scene['ending_type']) ?></strong></p>
        <p><a href="index.php">Ricomincia</a></p>
    <?php endif; ?>
</div>
</body>
</html>
