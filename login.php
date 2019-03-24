<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $user_name = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      
  
	  $salt = "SELECT salt FROM users WHERE username = '$user_name'";

	  $hashPassword = sha1($password.$salt);

      $sql = "SELECT id FROM users WHERE username = '$user_name' and password = '$hashPassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $user_name and $password, table row must be 1 row
		
      if($count == 1) {
         session_register("user_name");
         $_SESSION['login_user'] = $user_name;
         
         header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
   </head>
   
   <body>

         <div>
            
            <b>Login</b>
				
            <div>
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div>
                    <?php echo $error; ?>
               </div>
					
            </div>
				
         </div>
			
   </body>
</html>