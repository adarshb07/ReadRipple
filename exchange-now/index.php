<?php
    // session_start();
    include '../config/session.php';
    include '../config/connection.php';
    $bookid = $_GET['id'];
    $sql = "SELECT * FROM book WHERE id = '$bookid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/main.css">
    <link rel="stylesheet" href="../assets/styles/selectExchange.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    

    <title>ReadRipple - Exchange Book</title>
</head>
<body>
    <div class="wrapper">
        
        <!-- Navbar -->
            <nav>
                <div class="logo-container" onclick="window.location.href='../'">
                    <img src="../assets/images/logo/logo.png" alt="web-log" class="logo">
                    <h1>ReadRipple</h1>
                </div>
                <div class="header-menu">
                    <div class="menu">
                        <ul>
                            <!-- <li><a href="#">Home</a></li> -->
                            <li><a href="../book-exchange/">Book Exchange</a></li>
                            <li class="dropdown-container">
                                <div class="dropdown">
                                    <a href="#">Other Options <i class='fas fa-angle-down'></i></a>
                                </div>
                                <div class="dropdown-items">
                                    <div class="dropdown-links"><a href="#">Giveaway Book <i class="fa fa-arrow-right"></i></a></div>
                                    <div class="dropdown-links"><a href="#">Take Book <i class="fa fa-arrow-right"></i></a></div>
                                    <div class="dropdown-links"><a href="#">Borrow Book <i class="fa fa-arrow-right"></i></a></div>
                                </div>
                            </li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    
                    <div class="btn-group">
                        <a href="../login/" class="link">Login</a>
                        <a href="../sign-up/" class="btn">Sign Up <i class="fa fa-arrow-right"></i> </a>
                    </div>

                </div>


            </nav>
        <!-- Navbar End -->


        <!-- Main Section -->
            <div class="main">
                <div class="main-book">
                    <div class="image">
                        <img src="../assets/images/books/<?= $row['image']?>" alt="">
                    </div>
                    <div class="content">
                        <h2><?= $row['bookTitle']?></h2>
                        <?php
                            $userID = $row['userId'];
                            $userSql = "SELECT * FROM user WHERE id = '$userID'";
                            $userResult = mysqli_query($conn, $userSql);
                            $userRow = mysqli_fetch_assoc($userResult);
                        ?>
                        <h3>Posted By: <span><?= $userRow['firstName']." ".$userRow['lastName'] ?></span></h3>
                        <br>
                        <div class="Form">
                            <form action="./update.php" method="POST">
                                <input type="hidden" name="bookId" value="<?= $bookid ?>">
                                <label for="Book">Select Book To Exchange</label>
                                <select name="exchangeBook" id="" required>
                                    <option label="Select Book Exchange"></option>
                                    <?php
                                        $bookSql = "SELECT * FROM book WHERE userId = '$userID'";
                                        $bookResult = mysqli_query($conn, $bookSql);
                                        while($bookRow = mysqli_fetch_assoc($bookResult)){
                                    ?>
                                    <option value="<?= $bookRow['id']?>"><?= $bookRow['bookTitle']?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <button>Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Main Section End -->

        <!-- Footers -->
        <footer>
            <div class="foot-top">
                <div class="logo-info">
                    <div class="logo-container">
                        <img src="../assets/images/logo/logo.png" alt="">
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
        <!-- Footers End -->
    </div>

    <script src="https://kit.fontawesome.com/58a810656e.js" crossorigin="anonymous"></script>
    



</body>
</html>