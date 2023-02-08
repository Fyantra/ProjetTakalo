<?php
    if(!defined('BASEPATH')) 
        exit('NO direct script allowed');

        class Fonction_model extends CI_Model
        {
            public function login($mail,$password)
            {
                $data=$this->fonction_model->getUser($mail,$password);                
                if(count($data)!=0)
                {
                    $id=$data[0]['id'];
                    return $id;
                }
                return 0;
            }

            public function getUser($mail,$password)
            {
                $requete="select * from utilisateur where mail like '%s%s%s' and mdp like '%s%s%s'";
                $requete=sprintf($requete,"%",$mail,"%","%",$password,"%");
                $query=$this->db->query($requete);

                $data=array();

                foreach($query->result_array() as $row)
                {
                    $data[]=$row;
                }

                return $data;
            }

            public function inscription($name,$mail,$password)
            {
                $requete="insert into utilisateur(nom,mail,mdp) values('%s','%s','%s')";
                $requete=sprintf($requete,$name,$mail,$password);
                $this->db->query($requete);
            }

            public function addCategorie($name)
            {
                $requete="insert into categorie(nom) values('%s')";
                $requete=sprintf($requete,$name);
                $this->db->query($requete);
            }

            public function modifyCategorie($name)
            {
                $requete="update categorie set nom='%s'";
                $requete=sprintf($requete,$name);
                $this->db->query($requete);
            }

            public function addObjet($idCategorie,$idUtilisateur,$nom,$description,$prix)
            {
                $requete="insert into objet(idCategorie,idUtilisateur,nom,description,prix) values(%d,%d,'%s','%s',%f)";
                $requete=sprintf($requete,$idCategorie,$idUtilisateur,$nom,$description,$prix);
                $this->db->query($requete);
            }

            public function getYourObjects($idUser)
            {
                $requete="select o.*,c.nom as nomCategorie from objet as o join categorie as c on o.idCategorie=c.id where idUtilisateur=%d";
                $requete=sprintf($requete,$idUser);
                $query=$this->db->query($requete);

                $data=array();

                foreach($query->result_array() as $row)
                {
                    $data[]=$row;
                }

                return $data;
            }

            public function getOtherObjects($idUser)
            {
                $requete="select o.*,c.nom as nomCategorie from objet as o join categorie as c on o.idCategorie=c.id where idUtilisateur!=%d";
                $requete=sprintf($requete,$idUser);
                $query=$this->db->query($requete);

                $data=array();

                foreach($query->result_array() as $row)
                {
                    $data[]=$row;
                }

                return $data;
            }

            public function refuser($id)
            {
                $requete="update proposition set etat=2";
                $this->db->query($requete);
            }

            public function updateutilisateur($idutilisateur,$idobjet){
                $sql="UPDATE objet SET idutilisateur=%d WHERE id=%d";
                $sql=sprintf($sql,$idutilisateur,$idobjet);
                $this->db->query($sql);
            }
        
            public function echange($idproposition,$idutilisateur1,$idutilisateur2,$idobjet1,$idobjet2){
                $sql="UPDATE proposition SET etat=0 WHERE idProposition=%d";
                $sql=sprintf($sql,$idproposition);
                $this->db->query($sql);

                $sql="UPDATE proposition SET etat=2 WHERE idObjet2=%d and etat=1";
                $sql=sprintf($sql,$idobjet2);
                $this->db->query($sql);

                $this->fonction_model->updateutilisateur($idutilisateur1,$idobjet2);
                $this->fonction_model->updateutilisateur($idutilisateur2,$idobjet1);
            }
        
            public function modifierobjet($id,$idcategorie,$nom,$description,$prix){
                $sql="UPDATE objet SET idcategorie=%d,nom='%s',description='%s',prix=%f WHERE id=%d";
                $sql=sprintf($sql,$idcategorie,$nom,$description,$prix,$id);
                $this->db->query($sql);
            }
        
            public function propositionechange($idobjet1,$idobjet2){
                $sql="INSERT INTO proposition(idobjet1,idobjet2,date,etat) VALUES (%d,%d,now(),%d)";
                $sql=sprintf($sql,$idobjet1,$idobjet2,1);
                $this->db->query($sql);
            }

            public function addPhoto($file_name,$idObject)
            {
                $sql="INSERT INTO photo(idobjet,photo) VALUES ('%s','%s')";
                $sql=sprintf($sql,$file_name,$idObject);
                $this->db->query($sql,$file_name,$idObject);
            }

            public function totalUser()
            {
                $requete="SELECT count(id)-1 AS totalUser FROM utilisateur";
                $query=$this->db->query($requete);

                $data=$query->row_array();

                return $data;
            }

            public function totalEchange()
            {
                $requete="SELECT COUNT(id) AS totalEchange FROM proposition WHERE etat=0";
                $query=$this->db->query($requete);

                $data=$query->row_array();

                return $data;
            }

            public function rechercheObjet($idcategorie,$motCle)
            {
                $sql="select o.*,c.nom as nomCategorie from objet as o join categorie as c on o.idCategorie=c.id where (o.idCategorie=%d) and (o.nom like '%s%s%s' or o.description like '%s%s%s')";
                $sql=sprintf($sql,$idcategorie,"%",$motCle,"%","%",$motCle,"%");
                $query=$this->db->query($sql);

                $data=array();

                foreach($query->result_array() as $row)
                {
                    $data[]=$row;
                }

                return $data;
            }

            public function rechercheObjet2($idcategorie,$motCle)
            {
                $sql="select o.*,c.nom as nomCategorie from objet as o join categorie as c on o.idCategorie=c.id where (o.idCategorie=%d) and (o.nom like '%s%s%s' or o.description like '%s%s%s')";
                $sql=sprintf($sql,$idcategorie,"%",$motCle,"%","%",$motCle,"%");
            
                return $sql;
            }

            public function echangeInformation()
            {
                $requete="SELECT p.date,u1.nom as nom1,u2.nom as nom2,o1.nom as nomobjet1,o2.nom as nomobjet2 FROM proposition as p 
                JOIN objet as o1 ON p.idobjet1=o1.id 
                JOIN objet as o2 ON p.idobjet2=o2.id
                JOIN utilisateur as u1 ON o1.idutilisateur=u1.id
                JOIN utilisateur as u2 ON o2.idutilisateur=u2.id
                WHERE etat=0";
                $query=$this->db->query($requete);
                
                $data=array();
                foreach($query->result_array() as $row){
                    $data[]=$row;
                }
                return $data;
            }

            public function getotherproposition($idutilisateur){
                $sql='SELECT p.*,o1.id as id1,o1.nom as nom1,o1.description as d1,o1.prix as prix1,o1.idcategorie as c1,o1.idutilisateur as u1,o2.id as id2,o2.nom as nom2,o2.description as d2,o2.prix as prix2,o2.idcategorie as c2,o2.idutilisateur as u2 
                FROM proposition as p
                JOIN objet as o1 ON p.idobjet1=o1.id
                JOIN objet as o2 ON p.idobjet2=o2.id
                WHERE o2.idutilisateur=%d
                ';
                $sql=sprintf($sql,$idutilisateur);
                $query=$this->db->query($sql);
                $data=array();
                foreach($query->result_array() as $row){
                    $data[]=$row;
                }
                return $data;
            }
        
            public function getmyproposition($idutilisateur){
                $sql='SELECT * FROM proposition
                JOIN objet ON proposition.idobjet1=objet.id
                WHERE objet.idutilisateur=%d
                ';
                $sql=sprintf($sql,$idutilisateur);
                $query=$this->db->query($sql);
                $data=array();
                foreach($query->result_array() as $row){
                    $data[]=$row;
                }
                return $data;
            }

            public function getallcategorie(){
                $sql="SELECT * FROM categorie";
                $query=$this->db->query($sql);
                $data=array();
                foreach($query->result_array() as $row){
                    $data[]=$row;
                }
                return $data;
            }

            public function getCategorie($id){
                $sql="SELECT * FROM categorie where id=%d";
                $sql=sprintf($sql,$id);
                $query=$this->db->query($sql);
                $data=$query->row_array();
                
                return $data;
            }

            public function updateCategorie($id,$nom)
            {
                $requete="update categorie set nom='%s' where id=%d";
                $requete=sprintf($requete,$nom,$id);
                $this->db->query($requete);
            }

            public function deleteCategorie($idcategorie){
                $sql="DELETE FROM categorie WHERE id=%d";
                $sql=sprintf($sql,$idcategorie);
                $this->db->query($sql);
            }

            public function getAllUser()
            {
                $requete="select * from utilisateur where id!=1";
                $query=$this->db->query($requete);

                $data=array();

                foreach($query->result_array() as $row)
                {
                    $data[]=$row;
                }

                return $data;
            }



            public function getObjects($idobjet)
                {
                    $requete="select * from objet where id=%d";
                    $requete=sprintf($requete,$idobjet);
                    $query=$this->db->query($requete);

                    $data=$query->row_array();

                    return $data;
                }
                

                public function deleteobjet($idobjet){
                    $sql="DELETE FROM objet WHERE id=%d";
                    $sql=sprintf($sql,$idobjet);
                    $this->db->query($sql);
                }
        }

?>