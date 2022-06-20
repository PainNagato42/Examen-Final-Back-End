<?php

/*
 * model utilisateur de la table utilisateur
 */

class utilisateur extends _model {
    // Attribut
    protected $table = "utilisateur";
    protected $attributs = ["pseudo" => "VARCHAR", "email" => "VARCHAR", "mdp" => "VARCHAR", "actif" => "NUM", "reinit" => "VARCHAR"];
    
    function activationCompte() {
        // Rôle : préparer et envoyer un lien pour activer le compte
        // Retour : néant
        // Paramètres : néant
        
        // Envoyer un email
        
        // $to = '"' . $this->get("nom") . '" <' . $this->get("email") . '>';         // Destinataire, sous la forme "Christophe Blanchot" <cblanchot@cbcd.fr>
        $to = '"' . $this->get("pseudo") . '" <apicq@mywebecom.ovh>';         // Pour les tests
        $sujet = "Examen 2022 : Activation de votre compte";
        $message = '<html><head><meta http-equiv="Content-Type" content="text/html;charset=utf8"></head><body>';
        $message .= "<h1>Bonjour {$this->get("pseudo")}</h1>";
        $message .= "<p>Pour activer votre compte, veuillez cliquer (ou recopier) le lien ci-dessous : <br>";
        $message .= "<a href='http://exam.apicq.mywebecom.ovh/activer-compte.php?id={$this->id()}'>Lien d'activation du compte</a>";
        $message .= "</p></body></html>";
        
        $headers = "MIME-Version: 1.0\n";
        $headers .= "Content-Type: text/html;charset=utf8\n";
        $headers .= 'From: "Examen 2022" <mywebecom@mywebecom.ovh>' . "\n";
        
        mail($to, $sujet, $message, $headers);   
    }
    
    function loadByIdentifiant($identifiant) {
        // Rôle : charge la ligne de la base de données ayant un pseudo ou email donné
        // retour : true si charger, sinon false
        // parametres : $identifiant : pseudo ou email de l'utilisateur à recuperer
        
        // construction de la requete
        $sql = "SELECT * FROM `$this->table` WHERE `pseudo` = :pseudo OR `email` = :email";
        $param = [":pseudo" => $identifiant, ":email" => $identifiant];

        $req = $this->requete($sql, $param);

        // Si on a un retour "false", on ne charge rien
        if ($req === false) {
            $this->values = [];
            return false;
        }

        // récupérer la première ligne
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        // Si on n'a pas de ligne, on ne charge rien
        if (empty($ligne)) {
            $this->values = [];
            return false;
        }

        // On a une ligne
        $this->values = $ligne;
        return true;
    }
    
    function loadByPseudo($pseudo) {
        // Rôle : charge la ligne de la base de données ayant un pseudo donné
        // retour : true si charger, sinon false
        // parametres : $pseudo : pseudo de l'utilisateur à recuperer
        // construction de la requete
        $sql = "SELECT * FROM `$this->table` WHERE `pseudo` = :pseudo";
        $param = [":pseudo" => $pseudo];

        $req = $this->requete($sql, $param);

        // Si on a un retour "false", on ne charge rien
        if ($req === false) {
            $this->values = [];
            return false;
        }

        // récupérer la première ligne
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        // Si on n'a pas de ligne, on ne charge rien
        if (empty($ligne)) {
            $this->values = [];
            return false;
        }

        // On a une ligne
        $this->values = $ligne;
        return true;
    }
    
    function loadByEmail($email) {
        // Rôle : charge la ligne de la base de données ayant un mail donné
        // retour : true si charger, sinon false
        // parametres : $email : email de l'utilisateur à recuperer
        // construction de la requete
        $sql = "SELECT * FROM `$this->table` WHERE `email` = :email";
        $param = [":email" => $email];

        $req = $this->requete($sql, $param);

        // Si on a un retour "false", on ne charge rien
        if ($req === false) {
            $this->values = [];
            return false;
        }

        // récupérer la première ligne
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        // Si on n'a pas de ligne, on ne charge rien
        if (empty($ligne)) {
            $this->values = [];
            return false;
        }

        // On a une ligne
        $this->values = $ligne;
        return true;
    }
    
    function reinitEmail() {
        // Rôle : préparer et envoyer un lien de réinitisalisation du mot de passe
        // Retour : néant
        // Paramètres : néant
        
        
        // fabriquer un "code" unique et le stocker
        $this->set("reinit", uniqid());
        $this->update();
        
        // Envoyer un email
        
        // $to = '"' . $this->get("pseudo") . '" <' . $this->get("email") . '>';
        $to = '"' . $this->get("pseudo") . '" <apicq@mywebecom.ovh>';         // Pour les tests
        $sujet = "Examen 2022 : vous avez perdu votre mot de passe";
        $message = '<html><head><meta http-equiv="Content-Type" content="text/html;charset=utf8"></head><body>';
        $message .= "<h1>Bonjour {$this->get("pseudo")}</h1>";
        $message .= "<p>Pour choisir un nouveau mot de passe, veuillez cliquer (ou recopier) le lien ci-dessous : <br>";
        $message .= "<a href='http://exam.apicq.mywebecom.ovh/reinit-mdp.php?id={$this->id()}&code={$this->get("reinit")}'>Lien de réinitialisation</a>";
        $message .= "</p></body></html>";
        
        $headers = "MIME-Version: 1.0\n";
        $headers .= "Content-Type: text/html;charset=utf8\n";
        $headers .= 'From: "Examen 2022" <mywebecom@mywebecom.ovh>' . "\n";
        
        mail($to, $sujet, $message, $headers);
  
        
    }
}
