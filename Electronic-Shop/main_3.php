<?php 
    //require 'Login.php';
    session_start();

    // user email ..
    $email = $_SESSION['login_email'];


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
    $sql = "SELECT `First Name`, `Last Name` FROM `User_Data` WHERE `E-Mail` = '$email' ";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc())
        {   
            // Data ..
            $FirstName = $row['First Name'];
            $LastName  = $row['Last Name'];
            $E_Mail    = $row['E-Mail'];
            $Pass      = $row['Pass'];
            $Phone     = $row['Phone'];
            $Address   = $row['Address'];

        }
    }
    


?>



<!-----------HTML + PHP Code------------>
<html>
    <head>
        <title>Electronic Shop</title>
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
        
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="HandheldFriendly" content="true">
        
    </head>
    <body>
    
        

        <div id="top_panel">
            
            <div id="logo">Electronics Shop</div>
            
            <div id='top_links'>
                <a href='#' id='home'>HOME</a>
                <a href='#' id='about'>About</a>
                <a href='#' id='contact'>Contact</a>
                <a href='#' id='cart'>Cart</a>
            </div>
            
            <div id="search">
                <form action='search.php' method='GET'>
                    <input type='text' name='search_data' id='srch' placeholder="Search here ..">
                    <input type='submit' name='search_btn' value='🔎'>
                </form>
            </div>
            
            

        </div>

        <div id="page_content">

            <div id="left_panel">

                <div id="user">

                    <?php 

                        echo "<i class='fas fa-user' id='img'></i> <a href='profile.php' target='_blank'>" .
                        $FirstName . " " . $LastName."</a>";
                        
                    ?>

                </div>

                <br>

                <div id='left_links'>
                    <a href='cart.php' target='_blank' id='cart'>My Cart</a>
                    <br>
                    <a href='favorites.php' target='_blank' id='fav'>My favorites</a>
                </div>
                
            </div>    


            <table id='products'>
                <tr>
                    <td>
                        <div class="prod_data">
                            <img class='prod_img' src='Photos/makwa2.jpg' width='300' height='250'>
                            <span class="prod_name">Caustic soldering</span>
                            <button class='addtofav'>❤️</button>
                            <button class='addtocart'>Add to 🛒 </button>
                            <span class="price">$15</span>
                        </div>                    
                    </td>
                    <td>
                        <div class="prod_data">
                            <img class='prod_img' src='Photos/makwa.jpg' width='300' height='250'>
                            <span class="prod_name">Caustic soldering</span>
                            <button class='addtofav'>❤️</button>
                            <button class='addtocart'>Add to 🛒 </button>
                            <span class="price">$15</span>
                        </div>
                    </td>
                    <td>
                        <div class="prod_data">
                            <img class='prod_img' src='Photos/Resistors.jpg' width='300' height='250'>
                            <span class="prod_name">Resistors</span>
                            <button class='addtofav'>❤️</button>
                            <button class='addtocart'>Add to 🛒 </button>
                            <span class="price">$15</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="prod_data">
                            <img class='prod_img' src='Photos/ATMega328P_3af5c880-80bd-4cd3-ade6-34329d34a50f_1024x1024.jpg' width='300' height='250'>
                            <span class="prod_name">ATMega</span>
                            <button class='addtofav'>❤️</button>
                            <button class='addtocart'>Add to 🛒 </button>
                            <span class="price">$15</span>
                        </div>
                    </td>
                    <td>
                        <div class="prod_data">
                            <img class='prod_img' src='Photos/leds.jpg' width='300' height='250'>
                            <span class="prod_name">LEDs</span>
                            <button class='addtofav'>❤️</button>
                            <button class='addtocart'>Add to 🛒 </button>
                            <span class="price">$15</span>
                        </div>
                    </td>
                    <td>
                        
                        <img class='prod_img' src='Photos/microcontroller.jpg' width='300' height='250'>
                        <span class="prod_name">MicroController</span>
                        <button class='addtofav'>❤️</button>
                        <button class='addtocart'>Add to 🛒 </button>
                        <span class="price">$15</span>
                    
                    </td>
                </tr>
            
            </table>

            <div id='numbers'>
            <script>
                document.write("<a href='main_2.php'><button> back </button></a>");
                
            </script>

        </div>
        

        <div id="footer">
            
        </div>

        
    </body>
</html>

<?php
    


















?>