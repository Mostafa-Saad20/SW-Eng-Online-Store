<?php 
    
    

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


    // search for First Name and Last Name WHERE Email = $_SESSION['email'] in DB .. 
    $sql = "SELECT `Prod_Name`, `Prod_Img`, `Price` FROM `Products` ";

    $result = $conn->query($sql);

    if($result->num_rows > 0){

        header("Content-type: image/gif");
        while($row = $result->fetch_array())
        {   
            // Data ..
            $prodName = $row['Prod_Name'];
            
            $price = $row['Price'];
            
            echo $row['Prod_Img'];


        


        }

    }
    else{
        echo"Can't Find Data!";
    }
?>