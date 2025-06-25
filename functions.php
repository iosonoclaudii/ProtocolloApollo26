<?php
require_once 'db.php';

function getScene($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM scenes WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}
?>
