<?php
   
    class MaladeManager extends Connexion
    {
        
        public function getMalade($id)
        {
            $req = $this->bdd->prepare('SELECT * FROM malades WHERE id = ?');
            $req->execute(array( $id));

            return $req;
        }


        public function getMaladebyfiche($fiche)
        {
            $req = $this->bdd->prepare('SELECT * FROM malades WHERE num_fiche = ?');
            $req->execute(array($fiche));
            return $req;
        }

        public function add(Malade $malade)
        {
            $req = $this->bdd->prepare('INSERT INTO malades SET nom = :nom, postnom = :postnom, prenom = :prenom, age =:age, num_fiche =:num_fiche, sexe =:sexe, poids =:poids, taille =:taille');
            $req->bindValue(':nom', $malade->nom());
            $req->bindValue(':postnom', $malade->postnom());
            $req->bindValue(':prenom', $malade->prenom());
            $req->bindValue(':age', $malade->age());
            $req->bindValue(':num_fiche', $malade->num_fiche());
            $req->bindValue(':sexe', $malade->sexe());           
            $req->bindValue(':poids', $malade->poids());
            $req->bindValue(':taille', $malade->taille());
            $req->execute();
        }

        public function count()
        {
            return $this->bdd->query('SELECT COUNT(*) FROM malades')->fetchColumn();
        }

        public function delete($id)
        {
            $this->bdd->exec('DELETE FROM malades WHERE id = '.$id);
        }

        public function idm($num_fiche)
        {
            return $this->bdd->query('SELECT id FROM malades WHERE num_fiche = "'.$num_fiche.'"')->fetchColumn();
        }

        public function get_num_fiche($id)
        {
            return $this->bdd->query('SELECT num_fiche FROM malades WHERE id = '.$id)->fetchColumn();
        }

        public function update(Malade $malade)
        {
            $req = $this->bdd->prepare('UPDATE malades SET nom = :nom, postnom = :postnom, prenom = :prenom, age =:age, num_fiche =:num_fiche, sexe =:sexe, poids =:poids, taille =:taille WHERE id = :id');
            $req->bindValue(':nom', $malade->nom());
            $req->bindValue(':postnom', $malade->postnom());
            $req->bindValue(':prenom', $malade->prenom());
            $req->bindValue(':age', $malade->age());
            $req->bindValue(':num_fiche', $malade->num_fiche());
            $req->bindValue(':sexe', $malade->sexe());           
            $req->bindValue(':poids', $malade->poids());
            $req->bindValue(':taille', $malade->taille());
            $req->execute();
        }

        public function existe($info)
        {
            if (is_int($info))
            {
                return (bool) $this->bdd->query('SELECT COUNT(*) FROM malades WHERE id = '.$info)->fetchColumn();
            }
            $q = $this->bdd->prepare('SELECT COUNT(*) FROM malades WHERE nom = :nom');
            $q->execute(array(':nom' => $info));
            return (bool) $q->fetchColumn();
        }

    }
