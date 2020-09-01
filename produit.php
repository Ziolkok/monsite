<?php
  // Initialisation
  include('config.php');
  session_start();

  // Récupère tous les Noms des produits
  $bdd_produits = $bdd->query('SELECT nom FROM produit');
  $all_produits = array();
  while ($ligne_produit = $bdd_produits->fetch()) {
      array_push($all_produits, strtolower($ligne_produit['nom']));
  }

  // Récupère tous les ID des produits
  $bdd_id_produits = $bdd->query('SELECT id FROM produit');
  $all_id_produits = array();
  while ($ligne_produit = $bdd_id_produits->fetch()) {
      array_push($all_id_produits, $ligne_produit['id']);
  }

  // Création d'un array qui a pour clé les id et pour valeur les noms des produits
  $combinaison = array();
  for ($i=0; $i<count($all_id_produits) ; $i++) { 
    $combinaison[$all_id_produits[$i]] = $all_produits[$i];
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Produits</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <link rel="stylesheet" type="text/css" href="css/produit.css">
</head>
<body>

</body>
</html>

  <header>   <!-- DEBUT header -->
    <h1><a href="index.php">Mon site</a></h1>      

    <nav>
      <ul>
        <li><a href="index.php">Recherche</a></li>
        <li><a href="produit.php" class="actif">Produits</a></li>
        <li><a href="connexion.php">Se connecter</a></li>
        <li><a href="inscription.php">S'inscrire</a></li>     
      </ul>
    </nav>
  </header>   <!-- FIN header -->

  <?php 

      if(isset($_POST['produit_recherche'])) {
        // Stocke la valeur recherché par l'utilisateur
        $produit_recherche = strtolower(htmlspecialchars($_POST['produit_recherche']));

        // Verification de l'existence de la valeur recherché par l'utilisateur
        if(in_array($produit_recherche, $all_produits)) {
          $id_produit_recherche = array_search($produit_recherche, $combinaison);
          $afficherProduit = True;
        } else {
          $afficherProduit = False;
        }
      }
  ?>


<main>  <!-- DEBUT MAIN -->

  <?php if(isset($_POST['produit_recherche'])){ 
    include('produit_recherche.php');
  }
  ?>

  <section class="tous_produits">

    <h2>TOUS LES PRODUITS</h2>

    <?php 
    $id_produit_recherche = array_search($produit_recherche, $combinaison);
      for ($i=0; $i < count($all_produits) ; $i++) { 
        $id_produit_injecter = array_search($all_produits[$i], $combinaison);
        if ($id_produit_injecter != $id_produit_recherche) {
          $bdd_produit_injecter = $bdd->prepare('SELECT * FROM produit WHERE id = ?');
          $bdd_produit_injecter->execute(array($id_produit_injecter));
          $info_produit = $bdd_produit_injecter->fetch();

     ?>

    <div class="produit">
      <div class="produit_left_side">
        <div class="presentation">
          <h3><?php echo $info_produit["nom"];?></h3>
          <img src="produitsImg/pizza poulet.png" width="300px">
        </div>

        <table>
            <tr>
              <th align="right">Nom :</th>
              <td><?php echo $info_produit["nom"]; ?></td>
            </tr>
            <tr>
              <th align="right">Score :</th>
              <td><?php echo $info_produit["score"]; ?>/100</td>
            </tr>
            <tr>
              <th align="right">ID produit :</th>
              <td><?php echo $info_produit["id"]; ?></td>
            </tr>
        </table>
        <table>
            <tr>
              <th>Ingrédient 1 :</th>
              <td><?php echo $info_produit["ing1"]; ?></td>
            </tr>
            <tr>
              <th>Ingrédient 2 :</th>
              <td><?php echo $info_produit["ing2"]; ?></td>
            </tr>
            <tr>
              <th>Ingrédient 3 :</th>
              <td><?php echo $info_produit["ing3"]; ?></td>
            </tr>
            <tr>
              <th>Ingrédient 4 :</th>
              <td><?php echo $info_produit["ing4"]; ?></td>
            </tr>
        </table>
      </div>

      <div class="produit_chat">
        

      </div>
    </div>
    <?php } }  $bdd_produit_injecter->closeCursor() ?>

  </section>

</main>   <!-- FIN MAIN -->



