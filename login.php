<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
   
</head>
<body>

    <h1>Login</h1>
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
          <form method="POST" action="login-function.php">
               	<label for="email" >Email</label>
                <input  type="email" id="email" name="email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : ''; unset($_SESSION['email']) ?>"  required>
                          
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="<?php echo (isset($_SESSION['password'])) ? $_SESSION['password'] : ''; unset($_SESSION['password']) ?>"  required>
                          
            <button type="submit" name="login">Login</button>
            <a href="reg.php">Register a new account</a>
          </form>
</body>
</html>