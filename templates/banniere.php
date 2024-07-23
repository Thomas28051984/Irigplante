
<header role="banner" class="wrapper">
    <div><img src="asset/images/logosite.jpg" alt="Logo de l'agence"></div>
    <div><nav role="navigation">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="?immo=ajouterBien">Ajouter un bien</a></li>
            <li><a href="?achat=recherche">Trouver un bien</a></li>
            <li><a href="?vente=venteBien">Vendre un bien</a></li>
            <?php if(empty($_SESSION['mail'])) {?>
            <li><a href="?security=inscription">Inscription</a></li>
            <li><a href="?security=connexion">Connexion</a></li>
            <?php  } else { ?>
            <li><a href="?security=deconnexion">Déconnexion</a></li>
            <?php } ?>
        </ul>
    </nav>
    </div>

</header>