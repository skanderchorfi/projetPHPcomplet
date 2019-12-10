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

        public function readAllClients()
        {
            try {
                $req = 'SELECT * FROM client';
                $result = $this->cnx->prepare($req);
                $result->execute();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
     
        public function addNewClient($nom, $email, $pwd, $phone, $adresse)
        {
            try {
                $sql = 'INSERT INTO client(name,email,pwd,phone,adresse) VALUES (:clt_nom,:clt_email,:clt_pwd,:clt_phone,:clt_adresse)';
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":clt_nom", $nom);
            $result->bindparam(":clt_email", $email);
            $result->bindparam(":clt_pwd", $pwd);
            $result->bindparam(":clt_phone", $phone);
            $result->bindparam(":clt_adresse", $adresse);
            $result->execute();
            return $result;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
     
        public function login($email,$hash)
        {
            try {
                $sql = "SELECT * FROM client WHERE email = :email";
                $query = $this->cnx->prepare($sql);
                $query->bindparam(":email", $email);
                $query->execute();
                $client = $query->fetch();
                if (password_verify($client['pwd'], $hash)) {
                    return $client;
                } else {
                    return false;
                }
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
}