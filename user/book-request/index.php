<?php
    require_once '../config/session.php';
    require_once '../../config/connection.php';
    $userId = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/main.css">
    <link rel="stylesheet" href="../../assets/styles/dashboard-sidebar.css">
    <link rel="stylesheet" href="../../assets/styles/book-request.css">
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>User Dashboard - ReadRipple</title>
</head>
<body>

    <?php
        if(isset($_SESSION['success'])){
            echo "<script>Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '".$_SESSION['success']."',
            });</script>";
            unset($_SESSION['success']);
        }

        if(isset($_SESSION['reject'])){
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Rejected',
                text: '".$_SESSION['reject']."',
            });</script>";
            unset($_SESSION['reject']);
        }
    ?>

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
                        <li><a href="../book-request/" class="active"><i class="fa fa-exchange"></i> Book Request </a></li>
                        <li><a href="../token/"><i class="fa fa-money"></i> Tokens</a></li>
                        <li><a href="../edit-profile/"><i class="fa fa-pencil-square-o"></i> Edit Profile</a></li>
                    </ul>
                </div>
            </div>
            <div class="right"> 
                <h2>Book Request Received</h2>
                <div class="all-books">
                <?php
                    $sql = "SELECT * FROM `book-request` Where RequestStatus = 0";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $bookId = $row['bookId'];
                        $bookRequestSql = "SELECT * FROM book WHERE id = '$bookId'";
                        $bookRequestResult = mysqli_query($conn, $bookRequestSql);
                        $bookRequestRow = mysqli_fetch_assoc($bookRequestResult); 

                        if($userId == $bookRequestRow['userId']){

                            $requestUserID = $bookRequestRow['userId'];
                            $requestUserSql = "SELECT * FROM user WHERE id = '$requestUserID'";
                            $requestUserResult = mysqli_query($conn,$requestUserSql);
                            $requestUserRow = mysqli_fetch_assoc($requestUserResult);

                            if($row['exchangeFor'] != 0){
                                $exhangeID = $row['exchangeFor'];
                                $exhangeSql = "SELECT * FROM book WHERE id = '$exhangeID'";
                                $exhangeResult = mysqli_query($conn,$exhangeSql);
                                $exhangeRow = mysqli_fetch_assoc($exhangeResult);
                            }

                ?>
                    <div class="book">
                        <div class="img">
                            <img src="../../assets/images/books/<?=$bookRequestRow['image']; ?>" alt="">
                        </div>
                        <div class="content">
                            <div class="user-info">
                                <img src="../../assets/images/users/default.png" alt="">
                                <h3><?= $requestUserRow['firstName']." ".$requestUserRow['lastName']; ?></h3>
                            </div>

                            <?php 
                                if($row['exchangeFor'] != 0){
                            ?>
                            <h4>Want To Exchange <span><a href="#"><?= $bookRequestRow['bookTitle'] ?></a></span> for <span><a href="#"><?= $exhangeRow['bookTitle'] ?></a></span>?</h4>

                            <?php
                                } else {
                            ?>
                            <h4>Want To Buy  <span><a href="#"><?= $bookRequestRow['bookTitle'] ?></a></span> for Token?</h4>
                            <?php
                                }
                            ?>

                            <div class="button">
                                <?php
                                    if($row['exchangeFor'] != 0){
                                ?>
                                <button class="info">View Detail</button>
                                <?php
                                    }
                                ?>
                                <div class="controllers">
                                    <a href="./accept.php?id=<?=$row['id'];?>">
                                        <button class="btn-control Approved">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </a>    
                                    <a href="./reject.php?id=<?= $row['id']; ?>">
                                        <button class="btn-control reject">
                                            <i class="fa fa-xmark"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>   
                <?php
                    }
                }
                ?>  
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