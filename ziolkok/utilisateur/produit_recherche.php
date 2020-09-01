<section class="produit_recherche">
  <h1>LE PRODUIT RECHERCHÉ</h1>
    <?php 

      if ($afficherProduit) {
        $bdd_produit_recherche_injecter = $bdd->prepare('SELECT * FROM produit WHERE id = ?');
        $bdd_produit_recherche_injecter->execute(array($id_produit_recherche));
        $info_produit_recherche = $bdd_produit_recherche_injecter->fetch();

    ?>
    <div class="produit">
      <div class="produit_left_side">
        <div class="presentation">
          <h3><?php echo $info_produit_recherche["nom"] ?></h3>
          <img src="produitsImg/pizza poulet.png" width="300px">
        </div>

        <table>
            <tr>
              <th align="right">Nom :</th>
              <td><?php echo $info_produit_recherche["nom"]; ?></td>
            </tr>
            <tr>
              <th align="right">Score :</th>
              <td><?php echo $info_produit_recherche["score"]; ?>/100</td>
            </tr>
            <tr>
              <th align="right">ID produit :</th>
              <td><?php echo $info_produit_recherche["id"]; ?></td>
            </tr>
        </table>
        <table>
            <tr>
              <th>Ingrédient 1 :</th>
              <td><?php echo $info_produit_recherche["ing1"]; ?></td>
            </tr>
            <tr>
              <th>Ingrédient 2 :</th>
              <td><?php echo $info_produit_recherche["ing2"]; ?></td>
            </tr>
            <tr>
              <th>Ingrédient 3 :</th>
              <td><?php echo $info_produit_recherche["ing3"]; ?></td>
            </tr>
            <tr>
              <th>Ingrédient 4 :</th>
              <td><?php echo $info_produit_recherche["ing4"]; ?></td>
            </tr>
        </table>
      </div>

      <div class="produit_chat">
        

      </div>
    </div>
    <?php
      } else {
        Echo 'Le produit ' . $produit_recherche . ' n\'existe pas ou n\'est pas enregistré sur ce site. </br>';
        Echo '<div>Ci-dessous se trouve l\'affche de l\'integralité des produits n\'hésitez pas à y jeter un oeil</div>';
      }

    ?>

</section>