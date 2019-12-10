<?php

    require 'dbconnect.class.php';

    class Vehicule
    {
        private $cnx;
        public function __construct()
        {
            $db = new BasesDonnees;
            $this->cnx = $db->connectDB();
        }

        public function readAllVehicules()
        {
            try {
                $req = 'SELECT * FROM vehicule';
                $result = $this->cnx->prepare($req);
                $result->execute();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    
        public function addNewVehicule($vid, $status, $num_v)
        {
            try {0
                $sql = 'INSERT INTO vehicule(vid,status,num_v) VALUES (:clt_vid,:clt_status,:clt_num_v)';
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":clt_vid", $vid);
            $result->bindparam(":clt_status", $status);
            $result->bindparam(":clt_num_v", $num_v);
            $result->execute();
            return $result;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
     

}