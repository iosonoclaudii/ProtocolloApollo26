<?php
session_start();
session_unset();    // Rimuove tutte le variabili di sessione
session_destroy();  // Distrugge la sessione stessa
session_start();    // Avvia una nuova sessione pulita

header('Location: play.php?scene=1');
exit();
?>
