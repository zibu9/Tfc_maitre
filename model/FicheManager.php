<?php

    class FicheManager extends Connexion
    {

        public function getFiche(Malade $malade)
        {
            $req = $this->bdd->prepare('SELECT * FROM fiches WHERE ((id = ?) AND (id_malade=?) )');
            $req->execute(array( $malade->num_fiche(), $malade->id));

            return $req;
        }

        public function add(Fiche $fiche)
        {
            $req = $this->bdd->prepare('INSERT INTO fiches SET id_malade = :id_malade, num_fiche = :num_fiche, observation = :observation, symptomes =:symptomes, medecin =:medecin');
            $req->bindValue(':id_malade', $fiche->id_malade());
            $req->bindValue(':num_fiche', $fiche->  num_fiche());
            $req->bindValue(':observation', $fiche->observation());
            $req->bindValue(':symptomes', $fiche->symptomes());
            $req->bindValue(':medecin', $fiche->medecin());         
            $req->execute();
        }

        public function count()
        {
            return $bdd->query('SELECT COUNT(*) FROM fiches')->fetchColumn();
        }

        public function delete($id)
        {
            $this->bdd->exec('DELETE FROM fiches WHERE id = '.$id);
        }

        public function maxidfiche()
        {
            return $this->bdd->query("SELECT MAX(id)AS maxid FROM fiches")->fetchColumn();
        }

        public function getfich($num_fiche)
        {
            return $this->bdd->query('SELECT id FROM fiches WHERE num_fiche = "'.$num_fiche.'"')->fetchColumn();
        }

        public function update(Fiche $fiche)
        {
            $req = $this->bdd->prepare('UPDATE fiches SET id_malade = :id_malade,  num_fiche = :num_fiche, observation = :observation, symptomes =:symptomes, medecin =:medecin, grade =:grade  WHERE id = :id');
            $req->bindValue(':id_malade', $fiche->id_malade());
            $req->bindValue(':num_fiche', $fiche->  num_fiche());
            $req->bindValue(':observation', $fiche->observation());
            $req->bindValue(':symptomes', $fiche->symptomes());
            $req->bindValue(':medecin', $fiche->medecin());         
            $req->bindValue(':id', $fiche->id());
            $req->execute();
        }

        public function existe($info)
        {

            return (bool) $this->bdd->query('SELECT COUNT(*) FROM fiches WHERE num_fiche = "'.$info.'"')->fetchColumn();
        }


    }
