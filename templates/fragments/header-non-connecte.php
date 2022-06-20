<?php

/* 
 * template de fragment : mise en forme du header
 * 
 */
?>
<header class="flex justify-between">
    <form method="POST" action="affiche-annonce-recherchees.php">
        <input type="search" name="recherche" placeholder="Rechercher annonces"/>
        <input class="btn" type="submit" value="Rechercher"/>
    </form>
    <nav>
        <ul class="flex">
            <li><a href="index.php"><?php include "img/home.svg"; ?></a></li>
            <li><a href="affiche-form-creation-compte.php">Créer un compte</a></li>
            <li><a href="affiche-form-connexion.php">Se connecter</a></li>
        </ul>
    </nav>
</header>