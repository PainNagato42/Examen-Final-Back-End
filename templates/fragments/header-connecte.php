<?php

/* 
 * template de fragment : mise en forme du header
 * 
 */
$utilisateurHeader = new utilisateur(monId());
?>
<header class="flex justify-between">
    <form method="POST" action="affiche-annonce-recherchees.php">
        <input type="search" name="recherche" placeholder="Rechercher annonces"/>
        <input class="btn" type="submit" value="Rechercher"/>
    </form>
    <nav>
        <ul class="flex">
            <li><a href="index.php"><?php include "img/home.svg"; ?></a></li>
            <li><a href="affiche-form-creation-annonce.php">Créer une annonce</a></li>
            <li><a href="affiche-annonce-en-cours.php">Annonce en cours</a></li>
            <li><a href="affiche-mes-offres.php">Mes offres</a></li>
            <li class="pseudo" onclick="menu();"><?= ucfirst($utilisateurHeader->html("pseudo")) ?><ul class="menu">
                            <li><a href="affiche-form-modif-mdp.php">Changer le mot de passe</a></li>
                            <li><a href="deconnecter.php">Déconnexion</a></li>
                            <li><a class="suppr" href="affiche-form-suppr-compte.php">Supprimer compte</a></li>                
                </ul></li>
            <li><a href="deconnecter.php"><?php include "img/sign-out.svg"; ?></a></li>
        </ul>
    </nav>
</header>