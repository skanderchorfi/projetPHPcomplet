<?php

    require 'dbconnect.class.php';

    class Panier
    {
        private $cnx;
        public function __construct()
        {
            $db = new BasesDonnees;
            $this->cnx = $db->connectDB();
        }

        public function readAll()
        {
            try {
                $req = 'SELECT * FROM panier';
                $result = $this->cnx->prepare($req);
                $result->execute();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
       
        public function addNewCarte($id,$cid,$pid, $quantite, $status)
        {
            try {
                $sql = "INSERT INTO panier(id,cid,pid,email,quantite,status) VALUES (:clt_id,:clt_cid,:clt_pid,:clt_quantite,:clt_status)
                where cid = :clt_cid and pid = :clt_pid";
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":clt_id", $id);
            $result->bindparam(":clt_cid", $cid);
            $result->bindparam(":clt_pid", $pid);
            $result->bindparam(":clt_quantite", $quantite);
            $result->bindparam(":clt_status", $status);
            $result->execute();
            return $result;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
    }