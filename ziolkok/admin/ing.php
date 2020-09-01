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
		<input type="text" name="ingredient">
    <input type="submit" name="Ajouter" value="Ajouter">
	</form>
</body>
</html>
<?php
if (isset($_POST['Ajouter'])) {

  $insertsql = $bdd->prepare('INSERT INTO ingredient(nom) VALUES (?)');
  $insertsql->execute(array($_POST['ingredient']));


}
 ?>
