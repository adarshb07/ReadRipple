<?php
    require_once '../config/session.php';
    require_once '../../config/connection.php';

    $sql = "SELECT * FROM user WHERE id = " . $_SESSION['user_id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/main.css">
    <link rel="stylesheet" href="../../assets/styles/dashboard-sidebar.css">
    <link rel="stylesheet" href="../../assets/styles/token.css">
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

    <title>User Dashboard - ReadRipple</title>
</head>
<body>
    <div class="wrapper">
        <!-- Header -->
        <?php
            include '../include/header.php';
        ?>
        <!-- Header End -->

        <!-- Main -->

        <div class="main-container">
            <div class="left">
                <div class="menu">
                    <ul>
                        <li><a href="../"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li><a href="../my-books/"><i class="fa fa-book"></i> My Books</a></li>
                        <li><a href="../add-book/"><i class="fa fa-plus-circle"></i> Add Book</a></li>
                        <li><a href="../book-request/"><i class="fa fa-exchange"></i> Book Request </a></li>
                        <li><a href="../token/" class="active"><i class="fa fa-money"></i> Tokens</a></li>
                        <li><a href="../edit-profile/"><i class="fa fa-pencil-square-o"></i> Edit Profile</a></li>
                    </ul>
                </div>
            </div>
            <div class="right"> 
                <h2>Tokens You Have</h2>
                <div class="token-box">
                    <i class="fa fa-money"></i>
                    <h4>You Have:</h4>
                    <p><span><?= $row['tokens']; ?></span>&nbsp;Tokens</p>
                </div>

            </div>
        </div>

        <!-- Main End -->

        <!-- Footer -->
        <footer>
            <div class="foot-top">
                <div class="logo-info">
                    <div class="logo-container">
                        <img src="../../assets/images/logo/logo.png" alt="">
                        <h2>ReadRipple</h2>
                    </div>
                    <p>ReadRipple is a global community of book lovers, where every book finds its reader, and every reader discovers a welcoming community. Join us in the delightful exchange of stories and ideas. Start exploring today.</p>
                </div>
                <div class="foot-nav">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms Of Use</a></li>
                    </ul>
                </div>
                <div class="foot-nav">
                    <h4>Get Help</h4>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Knowledge Base</a></li>
                        <li><a href="#">Community</a></li>
                    </ul>
                </div>
                <div class="foot-nav">
                    <h4>Follow Us</h4>
                    <div class="logo">
                        <a href="#"><i class="fa-brands fa-facebook icon"></i></a>
                        <a href="#"><i class="fa-brands fa-github icon"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram icon"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter icon"></i></a>
                    </div>
                </div>
            </div>
            <div class="foot">
                <p>&copy; 2023 All Right Received - ReadRipple</p>
            </div>
        </footer>
        <!-- Footer End -->
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <script src="https://kit.fontawesome.com/58a810656e.js" crossorigin="anonymous"></script>
    <script>
        $('.dropify').dropify();
    </script>
</body>
</html>