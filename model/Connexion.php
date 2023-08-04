<?php

class Connexion
{
	protected $bdd;
	    public function __construct()
        {
            $this->bdd = new PDO('mysql:host=localhost;dbname=tfc_maitre;charset=utf8', 'root', '');
    		$this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);;
        }
}