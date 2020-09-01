<?php 
include('config.php');


if (isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
	$supprime = (int) $_GET['supprime'];

	$req = $bdd->prepare('DELETE FROM site_user WHERE user_id = ?');
	$req->execute(array($supprime));
}

$site_user = $bdd->query('SELECT * FROM site_user ORDER BY user_id DESC');
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Adminsitrator</title>
 	<link rel="stylesheet" type="text/css" href="css/listeuser.css">
 </head>
 <body>
 	<a href="../" class="btn-retour">Retour</a>

 	<main>
 		<?php while($m = $site_user->fetch()) { ?>
 			<table>
 				<thead>
 					<tr>
			  			<th colspan="3"><h2>ID:<?= $m['user_id'] ?></h2> </th>						
 					</tr>
 				</thead>

 				<tbody>
 					<tr>
 						<th align="left">Prenom:</th>
 						<td><?= $m['first_name'] ?></td>
 						<td><a href="prenom.php?user_id=<?= $m['user_id'] ?>">modifier</a></td>
 					</tr>

  					<tr>
 						<th align="left">Nom:</th>
 						<td><?= $m['last_name'] ?></td>
 						<td><a href="nom.php?user_id=<?= $m['user_id'] ?>">modifier</a></td>
 					</tr>

  					<tr>
 						<th align="left">Insciption:</th>
 						<td colspan="2"><?= $m['signup_date'] ?></td>
 					</tr>

  					<tr>
 						<th align="left">Mail:</th>
 						<td><?= $m['mail'] ?></td>
 						<td><a href="mail.php?user_id=<?= $m['user_id'] ?>">modifier</a></td>
 					</tr>

 					<tr>
 						<th align="left">Pseudo:</th>
 						<td><?= $m['pseudo'] ?></td>
 						<td><a href="pseudo.php?user_id=<?= $m['user_id'] ?>">modifier</a></td>
 					</tr>

 					<tr>
 						<th colspan="3"><a href="listeuser.php?supprime=<?= $m['user_id'] ?>">Supprimer</a></th>
 					</tr>
 				</tbody>
 			</table>
		<?php } ?>
	</main>

 	


 
 </body>
 </html>