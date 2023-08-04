<?php
require('controller/Principal.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'ajouter') {
            ajouter();
        }
        elseif ($_GET['action'] == 'modifier') {
                    modifier();
        }
        elseif ($_GET['action'] == 'supprimer') {
                    supprimer();
        }

        elseif ($_GET['action'] == 'recherche') {
            index();
        }

        elseif ($_GET['action'] == 'post_add') {
            if ((isset($_POST))&&(!empty($_POST))) {
                $p = array('id' => null,
                'nom' => $_POST['nom'],
                'postnom' => $_POST['postnom'],
                'prenom' => $_POST['prenom'],
                'age' => $_POST['age']." ans",
                'sexe' => $_POST['sexe'],
                'poids' => $_POST['taille'], 
                'taille' => $_POST['poids']
            );
                post_add($p);
            }
            else {
                throw new Exception('assurez vous de remplir tout les champs');
            }
        }

        elseif ($_GET['action'] == 'rechercher') {
            if (!empty($_POST['num_fiche'])) {
                $p = $_POST['num_fiche'];
                rechercher($p);
            }
            else {
                throw new Exception('assurez vous de remplir tout les champs');
            }
        }

        elseif ($_GET['action'] == 'supp') {
            if (!empty($_POST['num_fiche'])) {
                $p = $_POST['num_fiche'];
                supp($p);
            }
            else {
                throw new Exception('assurez vous de remplir tout les champs');
            }
        }

        elseif ($_GET['action'] == 'supprime') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                    supprime($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        
        else {
            die('page non trouvée');
        }

    }
    else {
        index();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
