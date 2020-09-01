<?php 
    include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>index</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

    <header>        <!-- DEBUT header -->
        <h1><a href="">Mon site</a></h1>            

        <nav>
            <ul>
                <li><a href="index.php" class="actif">Recherche</a></li>
                <li><a href="listeproduit.php">Produits</a></li>
                <li><a href="connexion.php">Se connecter</a></li>
                <li><a href="inscription.php">S'inscrire</a></li>           
            </ul>
        </nav>
    </header>       <!-- FIN header -->



    <main>
        <section>

            <form method="post" action="produit.php">
                <input type="text" name="produit_recherche">
                <input type="submit">
            </form>

        </section>

        <section class="produit">
            <a href="produit.php?id=1">Produit.php</a>
        </section>
    </main>



</body>
</html>