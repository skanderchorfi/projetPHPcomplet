<?php

    require 'dbconnect.class.php';

    class Client
    {
        private $cnx;
        public function __construct()
        {
            $db = new BasesDonnees;
            $this->cnx = $db->connectDB();
        }

        public function readAllproduits()
        {
            try {
                $req = 'SELECT * FROM produit';
                $result = $this->cnx->prepare($req);
                $result->execute();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        public function register($pid,$desc,$prix)
        {
            try {
                $sql = "INSERT INTO client(cid,name,email,pwd,phone,adresse)
                        VALUES (:pid,:desc,:prix, NOW())";
                $query = $this->cnx->prepare($sql);
                $query->bindparam(":cid", $pid);
                $query->bindparam(":name", $desc);
                $query->bindparam(":email", $prix);
                $query->execute();
                return $query;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
        public function addNewClient($pid,$desc,$prix)
        {
            try {
                $sql = 'INSERT INTO client(name,email,pwd,phone,adresse) VALUES (:clt_nom,:clt_email,:clt_pwd,:clt_phone,:clt_adresse)';
            $result = $this->cnx->prepare($sql);
            $query->bindparam(":cid", $pid);
            $query->bindparam(":name", $desc);
            $query->bindparam(":email", $prix);
            $result->execute();
            return $result;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
     
}