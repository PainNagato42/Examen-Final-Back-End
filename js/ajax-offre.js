/* 
 * fonction Ajax pour les offres
 */

function afficheOffres() {
    // Rôle : afficher les offres en attente
    // Retour : néant
    // Parametres : néant
    
    $.ajax("offre-attente-ajax.php", {
        success: retourOffre
    });
}

function offreAcceptees() {
    // Rôle : afficher les offres accpetées
    // Retour : néant
    // Parametres : néant
    
    $.ajax("offre-acceptees-ajax.php", {
        success: retourOffre
    });
}

function offreRefusees() {
    // Rôle : afficher les offres refusées
    // Retour : néant
    // Parametres : néant
    
    $.ajax("offre-refusees-ajax.php", {
        success: retourOffre
    });
}

function retourOffre(data) {
    // Rôle : mettre à jour le DOM à partir de ce qui est envoyé par le serveur
    // Retour : néant
    // Paramètres :  data : donnée envoyer par php
    
    $("#offre").html(data);
}
