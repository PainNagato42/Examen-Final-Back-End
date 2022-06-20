<?php

/*
 * model annonce de la table annonce
 */

class annonce extends _model {
    // Attribut
    protected $table = "annonce";
    protected $attributs = ["utilisateur" => "LINK", "titre" => "VARCHAR", "description" => "TEXT", "photo" => "VARCHAR", "prix" => "NUM", "date" => "DATETIME", "fermeture" => "NUM"];
    protected $target = ["utilisateur" => "utilisateur"];
    
    function select($where, $paramName, $tri, $resultParam) {
        // Rôle :  recuperer les objet en tenant compte des critères de sélection indiqués, et du tri
        // Retour : tableau simple
        // Parametre : $where : condition de recherche (au format sql avec paramètre :xxx)
        //             $paramName : tableau de valorisation des paramètres :xxx
        //             $tri : critères de tri (au format sql)
        //             $resultParam : resultat du param
           
        // construire la requete
        $sql = "SELECT * FROM `$this->table` $where $paramName $tri";
        $param = [$paramName => $resultParam];

        // Tranforrmer le résultat de la reqûete en un tableau d'objets
        return $this->sqlToTabObj($sql, $param);
    }
    
    function rechercheAnnonce($recherche) {
        // Rôle : recuperer les objets ayant le text saisie pour le titre ou la description
        // Retour : tableau simple
        // Parametres : $recherche : text saisie
        
        // construre la requete
        $sql = "SELECT * FROM `$this->table` WHERE (`titre` LIKE :recherche OR `description` LIKE :recherche) AND `fermeture` = :fermeture ORDER BY `date` DESC";
        $param = [":recherche" => "%$recherche%", ":fermeture" => 0];
        
        // Tranforrmer le résultat de la reqûete en un tableau d'objets
        return $this->sqlToTabObj($sql, $param);
    }
    
    function rechercheAnnonceInterval($recherche, $mini, $maxi) {
        // Rôle : recuperer les objets ayant le text saisie pour le titre ou la description et non fermer et ayant un interval de prix donné
        // Retour : tableau simple
        // Parametres : $recherche : text saisie
        //              $mini : prix mini saisie
        //              $maxi : prix max saisie
        
        // construre la requete
        $sql = "SELECT * FROM `$this->table` WHERE ((`titre` LIKE :recherche OR `description` LIKE :recherche) AND `fermeture` = :fermeture) AND (`prix` BETWEEN :mini AND :maxi) ORDER BY `date` DESC";
        $param = [":recherche" => "%$recherche%", ":fermeture" => 0, ":mini" => $mini, ":maxi" => $maxi];
        
        // Tranforrmer le résultat de la reqûete en un tableau d'objets
        return $this->sqlToTabObj($sql, $param);
    }
    
    function mesAnnonces($fermeture) {
        // Rôle : recuperer les objets ayant l'utilisateur de l'id connecté et non fermer
        // Retour : tableau simple
        // Parametres : $fermeture : 0 ou 1
        
        // construre la requete
        $sql = "SELECT * FROM `$this->table` WHERE `utilisateur` = :utilisateur AND `fermeture` = :fermeture ORDER BY `date` DESC";
        $param = [":utilisateur" => monId(), ":fermeture" => $fermeture];
        
        // Tranforrmer le résultat de la reqûete en un tableau d'objets
        return $this->sqlToTabObj($sql, $param);
    }
}
