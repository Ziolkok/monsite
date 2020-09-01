<?php
include('config.php');
$q = "SELECT nom FROM ingredient";
$req = $bdd->prepare($q);
$req->execute();

  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">

    <input type="text" name="nom">

    <select class="" name="id_ing1">
      <?php while ($resu = $req->fetch()) {?>
        <option value="<?php echo $resu['nom']; ?>"><?php echo $resu['nom']; ?></option>
        <?php

      } ?>
    </select>
    <select class="" name="id_ing2">
      <?php
      $q = "SELECT nom FROM ingredient";
      $req = $bdd->prepare($q);
      $req->execute();
       while ($resu = $req->fetch()) {?>
        <option value="<?php echo $resu['nom']; ?>"><?php echo $resu['nom']; ?></option>
        <?php

      } ?>
    </select>
    <select class="" name="id_ing3">
      <?php $q = "SELECT nom FROM ingredient";
      $req = $bdd->prepare($q);
      $req->execute();
      while ($resu = $req->fetch()) {?>
        <option value="<?php echo $resu['nom']; ?>"><?php echo $resu['nom']; ?></option>
        <?php

      } ?>
    </select>
    <select class="" name="id_ing4">
      <?php $q = "SELECT nom FROM ingredient";
      $req = $bdd->prepare($q);
      $req->execute();
      while ($resu = $req->fetch()) {?>
        <option value="<?php echo $resu['nom']; ?>"><?php echo $resu['nom']; ?></option>
        <?php

      } ?>
    </select>
    <select class="" name="categorie">

      <option value="pizza">pizza</option>
      <option value="Sandwich">Sandwich</option>
      <option value="Burger">Burger</option>
      <option value="Salade">Salade</option>
    </select>

    <input type="number" name="score" max="100" min="0">



    <input type="submit" name="Ajouter" value="Ajouter">
	</form>
</body>
</html>
<?php
if (isset($_POST['Ajouter'])) {

  $insertsql = $bdd->prepare('INSERT INTO produit(nom, score,categorie, ing1, ing2, ing3, ing4) VALUES (?, ?,?, ?, ?, ?, ?)');
  $insertsql->execute(array($_POST['nom'], $_POST['score'],$_POST['categorie'], $_POST['id_ing1'], $_POST['id_ing2'], $_POST['id_ing3'], $_POST['id_ing4']));


}
 ?>
