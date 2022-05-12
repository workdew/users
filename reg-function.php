<?php require 'connection.php';  ?>
<?php
//start PHP session
    session_start();
 
    //check if register form is submitted
    if(isset($_POST['register'])){
        //assign variables to post values
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm_password'];
 
        //check if password matches confirm password
        if($password != $confirm){
            //return the values to the user
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['confirm_password'] = $confirm;
 
            //display error
            $_SESSION['error'] = 'Passwords did not match';
        }
        else{
            //include our database connection
            

 
            //check if the email is already taken
            $stmt = $conn->prepare('SELECT * FROM user WHERE email =:email');
            $stmt->execute(['email' => $email]);
 
            if($stmt->rowCount() > 0){
                //return the values to the user
                
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['confirm_password'] = $confirm;
 
                //display error
                $_SESSION['error'] = 'Email already taken';
            }
            else{
                //encrypt password using password_hash()
                $password = password_hash($password, PASSWORD_DEFAULT);
 
                //insert new user to our database
                $stmt = $conn->prepare('INSERT INTO user ( name, email, password) VALUES (:name, :email, :password)');
 
                try{
                    $stmt->execute(['name' => $name, 'email' => $email, 'password' => $password]);
 
                    $_SESSION['success'] = 'User verified. You can login now';
                    redirect('login.php');
                }
                 catch(PDOException $e){
                   $_SESSION['error'] = $e->getMessage();
                 }
 
            }
 
        }
 
    }
    else{
        $_SESSION['error'] = 'Fill up registration form first';
    }
 
    header('location: register.php');
?>

