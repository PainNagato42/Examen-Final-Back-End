/* 
 * fonction Ajax divers
 * 
 */

function afficheInterval() {
    // Rôle : affiche la liste des recherches ayant un interval de prix donné
    // Retour : neant
    // Parametre : neant

    let mini = $("#mini").val();
    let maxi = $("#max").val();
    let recherche = $("#text_recherche").val();

    if (mini <= maxi) {
        $.ajax("recherche-ajax.php", {
            method: "post",
            data: {
                prix_mini: mini,
                prix_maxi: maxi,
                recherche: recherche
            },
            success: retourRecherche
        });
        $("#echec").html("");
    } else {
        $("#echec").html("Le prix max saisi est inférieur aux prix mini");
    }

}

function retourRecherche(data) {
    // Rôle : mettre à jour le DOM à partir de ce qui est envoyé par le serveur
    // Retour : néant
    // Paramètres :  data : donnée envoyer par php

    $("#recherche").html(data);
}