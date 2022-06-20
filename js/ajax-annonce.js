/* 
 * fonction Ajax pour les annonces
 * 
 */

window.setInterval(afficheOffre, 10000);

function afficheMesAnnonce() {
    // Rôle : afficher les annonces non terminées
    // Retour : néant
    // Parametres : néant
    
    $.ajax("annonce-ajax.php", {
        success: retourAnnonce
    });
}

function afficheOffre() {
    // Rôle : afficher les offres
    // Retour : néant
    // Parametres : néant
    
    $.ajax("offre-ajax.php", {
        success: retourAnnonce
    });
}

function afficheAnnonceTerminee() {
    // Rôle : afficher les annonces terminées
    // Retour : néant
    // Parametres : néant
    
    $.ajax("annonce-terminee-ajax.php", {
        success: retourAnnonce
    });
}

function refuserOffre(elt) {
    // Rôle : refuser une offre
    // Retour : néant
    // Parametres : elt : element lui-même
    
    let id_offre = $(elt).attr("data-id");
    
    $.ajax("refuser-offre-ajax.php", {
        method: "post",
        data: { id: id_offre},
        success: retourAnnonce
    });
}

function accepterOffre(elt) {
    // Rôle : accepter une offre
    // Retour : néant
    // Parametres : elt : element lui-même
    
    let id_offre = $(elt).attr("data-id");
    
    $.ajax("accepter-offre-ajax.php", {
        method: "post",
        data: { id: id_offre},
        success: retourAnnonce
    });
}

function retourAnnonce(data) {
    // Rôle : mettre à jour le DOM à partir de ce qui est envoyé par le serveur
    // Retour : néant
    // Paramètres :  data : donnée envoyer par php
    
    $("#annonce").html(data);
}