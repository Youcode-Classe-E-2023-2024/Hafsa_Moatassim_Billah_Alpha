<?php

class User
{
    public $id;
    public $username;
    public $email;
    private $password;

    public function __construct($id){
        global $db;

        $result = $db->query("SELECT * FROM users WHERE users_id = '$id'");
        $user = $result->fetch_assoc();

        $this->id = $user['users_id'];
       
        $this->username = $user['username']; 
        $this->email = $user['email'];
        $this->password = $user['password'];
    }

    static function getAll()
    {
        global $db;
        $result = $db->query("SELECT * FROM users");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function setPassword($pwd)
    {
        $this->password = password_hash($pwd, PASSWORD_DEFAULT);
    }


    static function NewUser($username, $email, $password, $file){
        global  $db;

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = ("INSERT INTO users (username, email, password, file) VALUES ('$username', '$email', '$hashedPassword','$file')");

        return $db->query($query);
    }

    static public function login($email, $password){
        global $db;

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $db->prepare($sql);

        if (!$stmt) {
            return "Error preparing statement: " . $db->error;
        }

        $stmt->bind_param('s', $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            return "Error getting result set: " . $stmt->error;
        }

        $user = $result->fetch_assoc();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user['users_id'];
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

  
}