<?php
/*
 * template page : Mise en forme du formulaire de création de l'annonce
 * parametres : néant
 * 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire de création de l'utilisateur</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include "templates/fragments/header-connecte.php"; ?>
        <main onclick="retireMenu()">
            <h2>Formulaire de création de l'annonce</h2>
            <div class="container-form">
                <form method="post" action="creer-annonce.php" enctype="multipart/form-data">
                    <label>Titre</label><br>
                    <input class="large-100" type="text" name="titre" required=""/><br>
                    <label>Description</label><br>
                    <textarea class="large-100" name="description" maxlength="450"></textarea><br>
                    <label>Ajouter une photo<input type="hidden" name="MAX_FILE_SIZE" value="3000000" /><br>
                        <input type="file" name="photo" accept="image/*" required=""/></label><br>
                    <label class="margin-top-20">Prix minimal</label><br>
                    <input class="large-100" type="number" step="0.01" min="0" name="prix" required=""/><br>
                    <input class="btn large-100" type="submit" value="Valider l'annonce"/>
                </form>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
    </body>
</html>