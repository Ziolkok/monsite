<?php
include('config.php');
$q = "UPDATE produit SET signale = '1' WHERE id = ?";
$req = $bdd->prepare($q);
$req->execute(array($_GET['id']));

header("Location: produit.php?id=".$_GET['id']);


  ?>
