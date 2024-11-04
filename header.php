<?php
session_start();
$is_logged_in = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emcakes bakery</title>
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2px 6px;
            background-color: deeppink;
            color: #333;
        }

        .logo {
            width: 100px;
            height: 100px;
            overflow: hidden;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .logout {
            font-size: 14px;
        }

        nav {
            background-color: pink;
        }

        .nav-links {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            text-align: center;
        }

        .nav-links li {
            display: inline;
        }

        .nav-links li a {
            display: inline-block;
            color: #333;
            text-decoration: none;
            padding: 10px 15px;
        }

        .nav-links li a:hover {
            background-color: hotpink;
        }

      /*  .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 10px;
        }*/

      /*  .hamburger div {
            width: 14px;
            height: 3px;
            background-color: #fff;
            margin: 5px;
            transition: 0.4s;
        }*/

        @media screen and (max-width: 600px) {
            .header {
                padding: 10px;
            }

            .logo {
                width: 100px;
                height: 100px;
            }

            .logout {
                display: inline-flex;        
                font-size: 12px;
            }

           /* .nav-links {
                display: none;
                flex-direction: column;
                width: 100%;
                text-align: center;
                background-color: #333;
                position: absolute;
                top: 60px;
                left: 0;
                right: 0;
                z-index: 1;
            }

            .nav-links.active {
                display: block;
            }

            .nav-links li {
                display: block;
                margin-bottom: 10px;
            }
*/
            /*.hamburger {
                display: flex;
            }*/
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="img/kk.png" alt="Emcakes Logo">
        </div>
        <h1 style="font-size: 14px; color:#333;">Emcakes Bakery<br>Call:0768466612</h1>
        <div class="logout">
            <ul class="nav-links">
                <?php if ($is_logged_in): ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Log In</a></li><br>
                    <li><a href="signup.php">Sign Up</a></li><br>
                <?php endif; ?>
                 <li><a href="adminlogin.php">Admin</a></li>
            </ul>
        </div>
        <!-- <div class="hamburger" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div> -->
    </header>
    <nav>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="foodlist.php">Cakes</a></li>
          
            <li><a href="services.php">Services</a></li>
            <!-- <li><a href="eventlist.php">Events</a></li> -->
            <li><a href="gallary.php">Gallery</a></li>
            <!-- <li><a href="#about">About</a></li> -->
        </ul>
    </nav>
    <script>
        function toggleMenu() {
            var navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('active');
        }
    </script>
</body>
</html>
