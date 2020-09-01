<?php
session_start();
include('config.php');


$pdoStat = $bdd->prepare('SELECT * FROM produit');

$executeIsOk = $pdoStat->execute();

$contact = $pdoStat->fetchAll();

//var_dump($contact);

?>

<!DOCTYPE html>
<html>
<head>
	<title>testvoir</title>
</head>
<body>

<h1>Liste</h1>

<ul>
	<?php foreach ($contact as $contact): ?>

		<li>
			<?= $contact['id'] ?> - <?= $contact['nom'] ?> - <?= $contact['ing1'] ?> / <?= $contact['ing2'] ?> / <?= $contact['ing3'] ?> / <?= $contact['ing4'] ?> <?= $contact['categorie'] ?> <?php if ($contact['signale'] == 1): ?>

			<?php echo ' --- LE PRODUIT A ETE SIGNALE'; ?>
				
			<?php endif ?>
		</li>

	<?php endforeach; ?>

</ul>


</body>
</html>
