<?php

/*
 * model offre de la table offre
 */

class offre extends _model {
    // Attribut
    protected $table = "offre";
    protected $attributs = ["envoyeur" => "LINK", "receveur" => "LINK", "annonce" => "LINK", "interet" => "TEXT", "prix" => "NUM", "accepter" => "NUM", "refuser" => "NUM"];
    protected $target = ["envoyeur" => "utilisateur", "receveur" => "utilisateur", "annonce" => "annonce"];
    
    function listeOffre() {
        // Rôle : recuperer les objets ayant accpeter et refuser à 0
        // Retour : tableau simple
        // Parametres : néant
        
        // construre la requete
        $sql = "SELECT * FROM `$this->table` WHERE `receveur` = :moi AND `accepter` = :accepter AND `refuser` = :refuser ORDER BY `prix` DESC";
        $param = [":moi" => monId(),":accepter" => 0, ":refuser" => 0];
        
        // Tranforrmer le résultat de la reqûete en un tableau d'objets
        return $this->sqlToTabObj($sql, $param);
    }
    
    function mesOffre($accepter, $refuser) {
        // Rôle : recuperer les objets de l'utilisateur connecté ayant accpeter et refuser donné
        // Retour : tableau simple
        // Parametres : $accepter : 0 ou 1
        //              $refuser : 0 ou 1
        
        // construre la requete
        $sql = "SELECT * FROM `$this->table` WHERE `envoyeur` = :moi AND `accepter` = :accepter AND `refuser` = :refuser ORDER BY `id` DESC";
        $param = [":moi" => monId(),":accepter" => $accepter, ":refuser" => $refuser];
        
        // Tranforrmer le résultat de la reqûete en un tableau d'objets
        return $this->sqlToTabObj($sql, $param);
    }
    
    function offreEmail() {
        // Rôle : préparer et envoyer un mail disant que l'offre à été accepté par le receveur (le vendeur)
        // Retour : néant
        // Paramètres : néant
        
        // Envoyer un email
        
        $to = '"' . $this->getTarget("envoyeur")->get("pseudo") . '" <apicq@mywebecom.ovh>';         // Pour les tests
        $sujet = "Examen 2022 : Offre acceptée";
        $message = '<html><head><meta http-equiv="Content-Type" content="text/html;charset=utf8"></head><body>';
        $message .= "<h1>Bonjour {$this->getTarget("envoyeur")->get("pseudo")}</h1>";
        $message .= "<p>Votre offre pour l'annonce {$this->getTarget("annonce")->get("titre")} a été acceptée par le vendeur.</p>";
        $message .= "<p>L'email du vendeur est {$this->getTarget("receveur")->get("email")} pour le contacter.</p>";
        $message .= "</body></html>";
        
        $headers = "MIME-Version: 1.0\n";
        $headers .= "Content-Type: text/html;charset=utf8\n";
        $headers .= 'From: "Examen 2022" <mywebecom@mywebecom.ovh>' . "\n";
        
        mail($to, $sujet, $message, $headers);
  
        
    }
}
