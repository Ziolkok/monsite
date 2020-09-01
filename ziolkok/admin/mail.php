<?php
include('config.php');

  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		<input type="text" name="mail" placeholder="Prenom">
    <input type="submit" name="modifier" value="modifier">
	</form>
	<a href="listeuser.php">Retour liste</a>
</body>
</html>
<?php

$id=$_GET['user_id'];



if (isset($_POST['mail'])){

  $insertsql = $bdd->prepare("UPDATE site_user SET mail=? WHERE user_id = '{$id}'");
  $insertsql->execute(array($_POST['mail']));


}
 ?>