<?php
    require_once "../config/session.php";
    require_once "../config/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/main.css">
    <link rel="stylesheet" href="../assets/styles/sign-up.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>   
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>ReadRipple - Sign Up</title>
</head>
<body>
    <div class="wrapper">
        
        <?php
            if (isset($_SESSION['message'])) {
                echo "<script>swal('Success!', '".$_SESSION['message']."', 'success');</script>";
                unset($_SESSION['message']);
            }
        ?>

        <!-- Navbar -->
            <?php
                include '../include/header.php';
            ?>
        <!-- Navbar End -->


        <!-- Login Section -->

            <section class="login">
                <div class="right-section">
                    <img src="../assets/images/signup/book-img.jpg" alt="">
                </div>
                <div class="left-section">
                    <h2>Contact Us !</h2>
                    <!-- <p>Join the Reading Revolution: Sign Up Today!</p> -->

                    <form method="post" action="./connect.php">
                        <div class="name-flex">
                            <div class="field">
                                <label for="first-name">First Name</label>
                                <input type="text" name="fname" id="first-name" placeholder="" required>
                            </div>
                            <div class="field">
                                <label for="last-name">Last Name</label>
                                <input type="text" name="lname" id="last-name" placeholder="" required>
                            </div>

                        </div>
                        <div class="field">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" placeholder="" required>
                        </div>
                        <div class="field">
                            <label for="msg">Message</label>
                            <textarea name="msg" id="msg" cols="30" rows="10"></textarea>
                        </div>
                        
                        <div class="field-flex">
                            <div class="rember">
                                <input type="checkbox" id="rember-me" required>
                                <label for="rember-me">Agree with terms and policies?</label>
                            </div>
                        </div>
                        <div class="login-btn">
                            <button>Contact Us</button>
                        </div>
                    </form>
                </div>
            

            </section>


        <!-- Login Section End-->

        <!-- Footers -->
            <?php
                include '../include/footer.php';
            ?>
        <!-- Footers End -->
    </div>

    <script src="https://kit.fontawesome.com/58a810656e.js" crossorigin="anonymous"></script>
    


</body>
</html>