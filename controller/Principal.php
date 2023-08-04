<?php
    session_start();
    require_once 'load.php';

    function index(){
        require('view/frontend/index.php');
    }

    function ajouter()
    {
        require('view/frontend/ajouter.php');
    }

    function supp($p){
        $malade_man = new MaladeManager();
        $fiche_man = new FicheManager();
        $malade = $malade_man->getMaladebyfiche($p);
        while ($malad = $malade->fetch())
        {
            $_SESSION['malade']= $malad;
        }
        if (!empty($_SESSION['malade'])) {
            $_SESSION['status'] = "fiche trouver";
            $_SESSION['num_fiche'] = $_SESSION['malade']['num_fiche'];            
        }else{
            $_SESSION['status'] = "fiche trouver";
        }

            header('Location: index.php?action=supprimer');  
    }

    function supprime($id){
        $malade_man = new MaladeManager();
        $fiche_man = new FicheManager();
        $num_fiche =$malade_man->get_num_fiche($id);
        $id_fiche = $fiche_man->getfich($num_fiche);
        $malade_man->delete($id);
        $fiche_man->delete($id);
        $_SESSION['supp'] = "supprimer avec succes";
        header('Location: index.php?action=supprimer');    
    }

    function rechercher($p){
        $malade_man = new MaladeManager();
        $fiche_man = new FicheManager();
        $malade = $malade_man->getMaladebyfiche($p);
        while ($malad = $malade->fetch())
        {
            $_SESSION['malade']= $malad;
        }
        if (!empty($_SESSION['malade'])) {
            $_SESSION['status'] = "fiche trouver";
            $_SESSION['num_fiche'] = $_SESSION['malade']['num_fiche'];            
        }else{
            $_SESSION['status'] = "fiche trouver";
        }

            header('Location: index.php?action=recherche');    
    }

    function post_add($p)
    {
        $malade_man = new MaladeManager();
        $fiche_man = new FicheManager();
        $prefix = "FICHE-MAL";
        $maxid = $fiche_man->maxidfiche();
        if($maxid<10){$num_fiche = $prefix.".00".$maxid+1; }
        elseif($maxid<100){$num_fiche = $prefix.".0".$maxid+1; }
        elseif($maxid<=1000){$num_fiche = $prefix.".".$maxid+1; }
        $p['num_fiche'] = $num_fiche;
        $malade = new Malade($p);
        if ($malade_man->existe($malade->nom())) {
                echo"ce patient existe deja<br>";   
        }else{
            $result =$malade_man->add($malade); 
        }
        $id_malade = $malade_man->idm($num_fiche);        
        $fiche = new Fiche(array('id' => null, 'num_fiche' => $num_fiche, 'id_malade' => $id_malade, 'observation' => "", 'symptomes' => "", 'medecin' => "",));
        if ($fiche_man->existe($fiche->num_fiche())) {
                echo"cette existe deja<br>";   
        }else{
            $result2 = $fiche_man->add($fiche); 
        }
        if ($result === false && $result2 === false ) {
            throw new Exception('Impossible d\'ajouter cette fiche !');
        }
        else {
            $_SESSION['status'] = "ajouter avec succes";
            $_SESSION['num_fiche'] = $num_fiche;
            header('Location: index.php?action=ajouter');
        }

    }

    function modifier()
    {

        require('view/frontend/modifier.php');
    }

    function supprimer()
    {

        require('view/frontend/supprimer.php');
    }