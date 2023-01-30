<?php
require_once 'connexion.php';

$id = $_GET['id'];
$etat = $_GET['etat'];
$sqlState = $pdo->prepare('UPDATE command SET valide = ? WHERE id = ?');
$sqlState->execute([$etat, $id]);
header('location: detaille_commande.php?id=' . $id);
?>


