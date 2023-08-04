<?php

    class Fiche
    {
        protected $Id;
        protected $Id_malade;
        protected $Num_fiche;
        protected $Observation;
        protected $Symptomes;
        protected $Medecin;

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
        public function num_fiche()
        {
            return $this->Num_fiche;
        }

        public function id_malade()
        {
            return $this->Id_malade;
        }

        public function observation()
        {
            return $this->Observation;
        }

        public function symptomes()
        {
            return $this->Symptomes;
        }

        public function medecin()
        {
            return $this->Medecin;
        }

        public function setId($id)
        {
            $id = (int) $id;
            if ($id > 0)
            {
                $this->Id = $id;
            }
        }
        public function setNum_fiche($Num_fiche)
        {
            if (is_string($Num_fiche))
            {
                $this->Num_fiche = $Num_fiche;
            }
        }        

        public function setId_malade($Id_malade)
        {
            if (is_string($Id_malade))
            {
                $this->Id_malade = $Id_malade;
            }
        }

        public function setObservation($Observation)
        {
            if (is_string($Observation))
            {
                $this->Observation = $Observation;
            }
        }

        public function setSymptomes($Symptomes)
        {
            if (is_string($Symptomes))
            {
                $this->Symptomes = $Symptomes;
            }
        }
        
        public function setMedecin($Medecin)
        {
            if (is_string($Medecin))
            {
                $this->Medecin = $Medecin;
            }
        }


    }
