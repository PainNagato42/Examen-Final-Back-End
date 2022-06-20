function menu() {
    // Rôle : affiche et retire le menu de l'utilisateur
    // parametre : neant
    
    $(".menu").toggle("block");
}

function retireMenu() {
    // Rôle : retire le menu de l'utilisateur
    // parametre : neant
    $(".menu").css("display", "none");
}

function afficheAlertSuppr() {
    // Rôle : afficher la popup d'alert de supression du compte
    // parametre : néant
   event.preventDefault();
    
    $(".suppr-compte").css("display", "block");
}

function retireAlertSuppr() {
    // Rôle : retire la popup d'alert de supression du compte
    // parametre : néant
   event.preventDefault();
    
    $(".suppr-compte").css("display", "none");
}

