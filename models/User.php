<?php

class User{
    static public function login($data){
        $username = $data["username"];
        try {
            $query = "SELECT * FROM users WHERE username = :username";            
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":username"=>$username));
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user;
        } catch (PDOException $ex) {
            echo "error : ".$ex.getMessage();
        }
    }

    static public function createUser($data){
        $stmt = DB::connect()->prepare('INSERT INTO users (fullname
        ,username,email,password) 
        VALUES (:fullname,:username,:email,:password)');
        $stmt->bindParam(':fullname',$data['fullname']);
        $stmt->bindParam(':username',$data['username']);
        $stmt->bindParam(':email',$data['email']);
        $stmt->bindParam(':password',$data['password']);
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        // $stmt->close();
        $stmt = null;
    }


   static function update($data){
        $stmt = DB::connect()->prepare('UPDATE users SET fullname = :fullname, username = :username, email = :email WHERE `user_id` = :user_id');
        $stmt->bindParam(':fullname',$data['fullname']);
        $stmt->bindParam(':username',$data['username']);
        $stmt->bindParam(':email',$data['email']);
        $stmt->bindParam(':user_id',$data['user_id']);
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        // $stmt->close();
        $stmt = null;
    }

       static public function getUserById($data)
       {
           $id = $data['id'];
           try {
               $stmt = DB::connect()->prepare('SELECT * FROM users WHERE user_id = :user_id');
                $stmt->execute(array(':user_id' => $id));
                $user = $stmt->fetch(PDO::FETCH_OBJ);
                return $user;
               $stmt = null;
           } catch (PDOException $ex) {
               echo "erreur " . $ex->getMessage();
           }
       }
   }
