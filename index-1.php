<?php

    include "connection.php";
    include "index_navbar.php";
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLMS-MAIC Library System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="banner">
        <div class="banner-content">
            <div class="hero container">
              <div>
                <h1>Welcome to <span></span></h1>
                <h1>CLMS <span></span></h1>
                <h1>Mind and Integrity College, Inc. <span></span></h1>
                <a href="index_books.php" type="button" class="cta" style="color: white;">MAIC-Library System</a>
              </div>
            </div>
        </div>
    </div>


    <div class="footer">
        <div class="footer-row">
            <div class="footer-left">
                <h1>Opening Hours</h1>
                <p><i class="far fa-clock"></i>Monday to Friday - 7am to 5pm</p>  
            </div>
            </div>
            <div class="footer-left">
                <h1>Location</h1>
                <p>Selina-Liz Blgd. National Hi-Way, San Cristobal, Calamba City Laguna<i class="fas fa-map-marker-alt"></i></p>
                <p>mai.school@yahoo.com<i class="fas fa-paper-plane"></i></p>
                <p>+63931 879 5005<i class="fas fa-phone-alt"></i></p>
            </div>
        </div>
        <br>
        <center><h1><span style="color: #1F48AC;">C</span>omputerized <span style="color: #1F48AC;">L</span>ibrary  <span style="color: #1F48AC;">M</span>anagement <span style="color: #1F48AC;">S</span>ystem</h1></center>
        <div class="social-links">
            <a href="https://www.facebook.com/MAI.SCHOOL.COLLEGE"><i class="fab fa-facebook-f"></i></a>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram-square"></i>
            <p>&copy; 2023 Copyright by BGT</p>
        </div>
    </div>
    <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</body>
</html>