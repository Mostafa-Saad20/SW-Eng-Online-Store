<html>
  <head>
    <title>Electronics Shop</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
  
  </head>
 
  <body>
    <div id="container">
      
      <center>
        <h1 style="font-size: 51px; color: aliceblue;">Electronics Shop.com</h1>
        <br><br>

        <div id="form">
          <table>
            <form name="login_frm" action="" method="POST">
        
              <tr>
                <td><input type="email" name="login_email" placeholder="E-mail" class="form_element" required></td>
              </tr>

              <tr>
                <td><input type="password" name="login_pass" placeholder="Password" maxlength="15" class="form_element" id="pass" required></td>
              </tr>
              
              <tr>
                <td> <p id="err_msg"> </p> </td>
              </tr>

            </table>
            
            <input type="submit" name="Login" value="Login" id="login"> <br>
            
          </form>
        </div>
      </center>
    </div>




    

  </body>
</html>


<?php
    
    
  if(isset($_POST['Login']))
  {
    
    // get Posted data from the login Form ..
    $login_email = $_POST['login_email'];
    $login_pass  = $_POST['login_pass'];
    
    session_start();
    $_SESSION['login_email'] = $login_email;
      


    // connect to DB to get `User Name` by login_email ..
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "Electronic Shop";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
  
    // search for First Name and Last Name WHERE Email = login_email in DB .. 
    $sql = "SELECT `First Name`, `Last Name` FROM `User_Data` WHERE `E-Mail` = '$login_email' AND `Pass` = '$login_pass' ";
    $result = $conn->query($sql);

    // if it exists ?..
    if($result->num_rows > 0)
    {
        // loop in each row to get data ..
        while($row = $result->fetch_assoc())
        {   
            // Data ..
            $FirstName = $row['First Name'];
            $LastName  = $row['Last Name'];
            $E_Mail    = $row['E-Mail'];
            $Pass      = $row['Pass'];
            $Phone     = $row['Phone'];
            $Address   = $row['Address'];

            header('Location:main.php');

        }

    }

    else{ 
        echo "<script> 
        document.getElementById('err_msg').innerHTML = 'Error Email or Password!'; </script>";
    }

    mysqli_close($conn);
      
      
  }

?>




