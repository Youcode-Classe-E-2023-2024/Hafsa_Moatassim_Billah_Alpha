<?php



if(isset($_POST['username']) && isset($_POST['email']) && isset ($_POST['password']) && isset($_POST['file'])){
   
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
    $username = test_input($_POST['username']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $file = test_input($_POST['file']);

    // dd($username);

    if(empty($username)){
        header("location:index.php?error=User Name Is Required");
    }else if(empty($email)){  
        header("location:index.php?error=Email Name Is Required");
    }else{
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $user = new User($db);
        $result = $user->newUser($username, $email, $password, $file);    
        if($result){
            // echo "success";
        }else{
            echo "failed";
        }
    }
// else{
//     header ('location: index.php?page=users');}
}

?> 
