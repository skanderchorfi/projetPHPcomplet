<?php

    require 'dbconnect.class.php';
    Class commande {
        
        private $cnx;
        public function __construct()
        {
            $db = new BasesDonnees;
            $this->cnx = $db->connectDB();
        }

        public function readAllCommandes() {
            try {
                $req = 'SELECT * FROM commandes';
                $res = $this->cnx->prepare($req);
                $res->execute();
                return $res;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function addNewCommande($oid,$pid, $cid, $qpid, $qcid, $odate, $addresse, $vehicule) {
            try {
                $status = "en attente";
                $req = 'INSERT INTO commandes(oid,pid,cid,quatite_produit,odate,quantite_client, statut, vehicule) VALUES(:pid, :cid, :qpid, :qcid, :odate, :addresse, :status, :vehicule)';
                $res = $this->cnx->prepare($req);
                $res->bindparam(":pid", $oid);
                $res->bindparam(":cid", $pid);
                $res->bindparam(":qpid", $cid);
                $res->bindparam(":qcid", $quatite_produit);
                $res->bindparam(":odate", $odate);
                $res->bindparam(":addresse", $quatite_client);
                $res->bindparam(":status", $statut);
                $res->bindparam(":vehicule", $vehicule);
                $res->execute();
                return $res;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function removeCommand($id) {

        }

        public function readAllProducts () {
            try {    
                $req = 'SELECT * FROM produit';
                $result = $this->cnx->prepare($req) ;
                $result->execute() ;
                return $result;
            } catch (PDOException $e){
                echo $e->getMessage() ;
            }
        }

    public function orderItems($pid) {
        try {
            $req ='SELECT * FROM produit WHERE pid = :clt_pid' ;
            $result = $this->cnx->prepare ($req) ;
            $result-> execute() ;
            return $result ; 
        } catch (PDOException $e){
            echo $e->getMessage() ;

        }
    }
    public function readAllOrders()
    {
        try {
            $req = 'SELECT * FROM commande';
            $result = $this->cnx->prepare($req);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function addNewOrder($pid, $cid, $quantite_produit, $odate, $quantite_client,$statut,$vehicule)
    {
        try {
            $sql = 'INSERT INTO client(pid,cid,quantite_produit,odate,quantite_client,status,vehicule) VALUES (:clt_oid,:clt_pid:clt_cid,:clt_quantite_produit,:clt_odate,:clt_quantite_client,:clt_status,:clt_vehicule) where $pid = :clt_pid';
        $result = $this->cnx->prepare($sql);
        $result->bindparam(":clt_pid", $pid);
        $result->bindparam(":clt_cid", $cid);
        $result->bindparam(":clt_quantite_produit", $quantite_produit);
        $result->bindparam(":clt_odate", $odate);
        $result->bindparam(":clt_quantite_client", $quantite_client);
        $result->bindparam(":clt_status", $status);
        $result->bindparam(":clt_vehicule", $vehicule);
        $result->execute();
        return $result;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}