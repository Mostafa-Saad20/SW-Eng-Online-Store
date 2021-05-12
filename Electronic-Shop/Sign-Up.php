<html>
  <head>
    <title>Electronics Shop</title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="SignUP_styles.css">
      
    <script src="SignUP_scripts.js"></script>
  </head>
  
  <body>


    
    <div id="container">
      <center>
        
        <h1 style="font-size: 51px; color: aliceblue;">Electronics Shop.com</h1>
        <br><br>
        
        <div id="form">
          
          <h1 id="welcome">Welcome</h1>
          
          <table>
            <form id="sign_up_frm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
              
              
              <tr>
                <td><input type="text" name="FName" placeholder="First Name" class="form_element" required></td>
                <td><input type="text" name="LName" placeholder="Last Name" class="form_element" required></td>
              </tr>
              
              <tr>
                <td><input type="email" name="sign_mail" placeholder="E-mail" class="form_element" required></td>
                <td><input type="password" name="sign_pass" placeholder="Password" maxlength="15" class="form_element <?php $pass_err; ?>" id="pass" required></td>
              </tr>
              
              <tr>
                <td><input type="text" name="phone" placeholder="Phone Number" maxlength="11" class="form_element" required></td>
                <td><input type="text" name="address" placeholder="Home Address .." id="address" required><br></td>
              </tr>
              
              <tr>
                <td><input type="number" max="200" min="5" name="age" placeholder="Age" id="age" class="form_element" required><br></td>  
                <td><label class="gender">
                  <input type="radio" name="gender" vlaue="male">Male
                  <input type="radio" name="gender" value="female">FeMale
                </label></td> 
              </tr>


            </table>
            <input type="submit" name="sign_up" value="Sign Up" id="signup"> <br>
            
          </form>
        </div>
      </center>
    </div>
    

    
   
  </body>
</html>



<!--- PHP Code, Storing User Data into Database ---->
<?php



  $firstName  = $_POST["FName"];
  $lastName   = $_POST['LName'];
  $signEmail  = $_POST['sign_mail'];
  $phone      = $_POST['phone'];
  $signPass   = $_POST['sign_pass'];
  $conf_pass  = $_POST['conf_pass'];
  $address    = $_POST['address'];
    
    
    
  if(isset($_POST['sign_up']))
  {
    
    // << DB connection >>..
    $servername  = "localhost";
    $username    = "root";
    $password    = "";
    $db_name     = "Electronic Shop";
    
    // PDO connection ..
    try 
    {
      $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password); 
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    } 
    catch(PDOException $e) 
    {
      echo "Connection failed: " . $e->getMessage();
    }
    
    // << insert Data >>..
    $sql = "INSERT INTO `User_Data`(`First Name`, `E-Mail`, `Pass`, `Address`, `Phone`, `Last Name`) VALUES ('$firstName', '$signEmail', '$signPass', '$address', '$phone', '$lastName')";
    
    try{
      $conn->exec($sql);
      header('Location:Login.php');
      
      
    }catch(PDOException $e){
      echo"Error Inserting Data $sql <br>". $e->getMessage();
    }  
    
    
      
    
  }
      
      
      
      
?>