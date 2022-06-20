<?php ?>

<div class="container-form">
    <form method="post" action="creer-offre.php">
        <label>Interêt</label><br>
        <textarea class="large-100" name="interet" maxlength="450"></textarea><br>
        <label class="margin-top-20">Prix</label><br>
        <input class="large-100" type="number" min="<?= $annonce->html("prix") ?>" step="0.01" name="prix" value="<?= $annonce->html("prix") ?>" required=""/><br>
        <input type="hidden" value="<?= $annonce->id() ?>" name="id_annonce"/>
        <input type="hidden" value="<?= $annonce->getTarget("utilisateur")->id() ?>" name="id_receveur"/>
        <input class="btn" type="submit" value="Valider l'offre"/>
    </form>
</div>
