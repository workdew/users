<?php require 'connection.php'; ?>

<?php
    //start PHP session
    session_start();
 
    //check if login form is submitted
    if(isset($_POST['login'])){
        //assign variables to post values
        $email = $_POST['email'];
        $password = $_POST['password'];
 
        //include our database connection
        
 
        //get the user with email
        $stmt = $conn->prepare('SELECT * FROM user WHERE email =:email');
 
        try{
            $stmt->execute(['email' => $email]);
 
            //check if email exist
            if($stmt->rowCount() > 0){
                //get the row
                $result = $stmt->fetch();
                echo "asdf";
 
                //validate inputted password with $user password
                if(password_verify($password, $result['password'])){
                    //action after a successful login
                    //for now just message a successful login
                    $_SESSION['success'] = 'User verification successful';
                    redirect('index.php');
                    
                }
                else{
                    //return the values to the user
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
 
                    $_SESSION['error'] = 'Incorrect password';
                }
 
            }
            else{
                //return the values to the user
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
 
                $_SESSION['error'] = 'No account associated with the email';
            }
 
        }
        catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();
        }
 
    }
    else{
        $_SESSION['error'] = 'Fill up login form first';
    }
 
    header('location: login.php');
?>