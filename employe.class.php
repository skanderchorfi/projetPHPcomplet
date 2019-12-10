<?php

    require 'dbconnect.class.php';

    class employer
    {
        private $cnx;

        public function __construct()
        {
            $db = new BasesDonnees;
            $this->cnx = $db->connectDB();
        }

        public function readAllemployer()
        {
            try {
                $req = 'SELECT * FROM employe';
                $result = $this->cnx->prepare($req);
                $result->execute();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function updateEmployer($id, $name, $tel, $email, $mdp)
        {
            try {
                $sql = 'UPDATE employe
                        SET name = :ename,
                            mdp = :emdp,
                            email = :email,
                            phone = :etel
                        WHERE eid = :id';
            $res = $this->cnx->prepare($sql);

            $res->bindParam(':ename', $name);
            $res->bindParam(':etel', $tel);
            $res->bindParam(':email', $email);
            $res->bindParam(':emdp', $mdp);
            $res->bindParam(':id', $id);
            $res->execute();
            return $res;
            
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function showOneemployer($id)
        {
            try {
                $req = 'SELECT * FROM employe WHERE eid = :emp_id';
                $result = $this->cnx->prepare($req);
                $result->bindParam(':emp_id', $id);
                $result->execute();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function addNewEmployer($name, $phone, $email, $mdp)
        {
            try {
                $sql = "INSERT INTO employe(name, phone, email,mdp) VALUES (:emp_name,:emp_phone,:emp_adresse,:emp_mdp)";
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":emp_name", $name);
            $result->bindparam(":emp_phone", $phone);
            $result->bindparam(":emp_adresse", $email);
            $result->bindparam(":emp_mdp", $mdp);
            $result->execute();
            return $result;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function deleteEmployer($id)
        {
            try {
                $sql = 'DELETE FROM employe WHERE eid = :id';
                $result = $this->cnx->prepare($sql);
                $result->bindparam(":id", $id);
                $result->execute();
                return $result;
            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }   
        }
        public function login($email,$hash)
        {
            try {
                $sql = "SELECT * FROM employe WHERE email = :email";
                $query = $this->cnx->prepare($sql);
                $query->bindparam(":email", $email);
                $query->execute();
                $employe = $query->fetch();
                if (password_verify($employe['mdp'], $hash)) {
                    return $employe;
                } else {
                    return false;
                }
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
    }