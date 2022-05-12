<?php require 'connection.php'; ?>

<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

    <h1> Register </h1>
  
    
            <?php
                if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
 
                    //unset error
                    unset($_SESSION['error']);
                }
 
                if(isset($_SESSION['success'])){
                    echo $_SESSION['success'];
 
                    //unset success
                    unset($_SESSION['success']);    
                }
            ?>


<form action="reg-function.php" method="POST">
          <label for="name">
              Name <input type="text" name="name" id="name">
          </label>
          <label for="email">
              email <input type="email" name="email" id="email"  value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : ''; unset($_SESSION['email']) ?>" required>
          </label>
          <label for="password">
              password <input type="password" name="password" id="password" value="<?php echo (isset($_SESSION['password'])) ? $_SESSION['password'] : ''; unset($_SESSION['password']) ?>">
          </label>
          <label for="confirm_password">
              Confirm Password <input type="password" name="confirm_password" id="confirm_password" value="<?php echo (isset($_SESSION['confirm'])) ? $_SESSION['confirm'] : ''; unset($_SESSION['confirm']) ?>">
          </label>
          <input type="submit" name="register" value="Register">
      </form>

</body>
</html>            