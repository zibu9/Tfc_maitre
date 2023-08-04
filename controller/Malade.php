<?php

    class Malade
    {
        protected $Id;
        protected $Nom;
        protected $Postnom;
        protected $Prenom;
        protected $Age;
        protected $Sexe;
        protected $Taille;
        protected $Poids;
        protected $Num_fiche;

        public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }

        public function hydrate(array $donnees)
        {
            foreach ($donnees as $key => $value)
            { 
                $method = 'set'.ucfirst($key);
                if (method_exists($this, $method))
                {
                    $this->$method($value);
                }
            }
        }

        public function id()
        {
            return $this->Id;
        }
        public function nom()
        {
            return $this->Nom;
        }

        public function postnom()
        {
            return $this->Postnom;
        }

        public function prenom()
        {
            return $this->Prenom;
        }

        public function age()
        {
            return $this->Age;
        }


        public function sexe()
        {
            return $this->Sexe;
        }

        public function poids()
        {
            return $this->Poids;
        }

        public function taille()
        {
            return $this->Taille;
        }

        public function num_fiche()
        {
            return $this->Num_fiche;
        }

        public function setId($id)
        {
            $id = (int) $id;
            if ($id > 0)
            {
                $this->Id = $id;
            }
        }
        public function setNom($nom)
        {
            if (is_string($nom))
            {
                $this->Nom = $nom;
            }
        }        

        public function setPostnom($Postnom)
        {
            if (is_string($Postnom))
            {
                $this->Postnom = $Postnom;
            }
        }

        public function setPrenom($Prenom)
        {
            if (is_string($Prenom))
            {
                $this->Prenom = $Prenom;
            }
        }
        public function setAge($Age)
        {
            if (is_string($Age))
            {
                $this->Age = $Age;
            }
        }

        public function setNum_fiche($Num_fiche)
        {
            if (is_string($Num_fiche))
            {
                $this->Num_fiche = $Num_fiche;
            }
        }
        
        public function setSexe($Sexe)
        {
            if (is_string($Sexe))
            {
                $this->Sexe = $Sexe;
            }
        }
        
        public function setPoids($Poids)
        {
            if (is_string($Poids))
            {
                $this->Poids = $Poids;
            }
        }
        
        public function setTaille($Taille)
        {
            if (is_string($Taille))
            {
                $this->Taille = $Taille;
            }
        }
    }
