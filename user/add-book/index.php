<?php
    require_once '../config/session.php';
    require_once '../../config/connection.php';
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/main.css">
    <link rel="stylesheet" href="../../assets/styles/dashboard-sidebar.css">
    <link rel="stylesheet" href="../../assets/styles/add-book.css">
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
            });
            console.log('It Workd');</script>";
            unset($_SESSION['success']);
        }

        if(isset($_SESSION['error'])){
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '".$_SESSION['error']."',
            })</script>";
            // unset($_SESSION['error']);
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
                        <li><a href="../add-book/" class="active"><i class="fa fa-plus-circle"></i> Add Book</a></li>
                        <li><a href="../book-request/"><i class="fa fa-exchange"></i> Book Request </a></li>
                        <li><a href="../token/"><i class="fa fa-money"></i> Tokens</a></li>
                        <li><a href="../edit-profile/"><i class="fa fa-pencil-square-o"></i> Edit Profile</a></li>
                    </ul>
                </div>
            </div>
            <div class="right"> 
                <h2>Add New Book</h2>
                    <div class="book-form">
                        <form action="./new-book.php" enctype="multipart/form-data" method="POST">
                            <div class="top-field">
                                <div class="left-field">
                                    <div class="form-field">
                                        <label for="title">Book Title:</label>
                                        <input type="text" id="title" name="bookName" required>
                                    </div>
                                    <div class="form-field">
                                        <label for="description">Description:</label>
                                        <textarea name="description" id="description" cols="30" rows="10" required></textarea>
                                    </div>
                                </div>
                                <div class="right-field">
                                    <label for="image">Book Cover Image</label>
                                    <input type="file" name="image" class="dropify" data-height="245" accept="image/*" required>
                                </div>
                            </div>
                            <div class="dropdown-field">
                                <div class="form-field">
                                    <label for="genres">Book Category</label>
                                    <select name="genres" id="genres" required>
                                        <option label="Select Book Category"></option>
                                        <?php
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<option value='".$row['id']."'>".$row['name']."</option>";
                                            }
                                        ?>
                                        <option value="-1">Other</option>
                                    </select>
                                </div>
                                <div class="form-field">
                                    <label for="lendType">Lend Type</label>
                                    <select name="lendType" id="lendType" required>
                                        <option label="Select Lend Type"></option>
                                        <option value="sell">Sell For Token</option>
                                        <option value="exchange">Exchange</option>
                                    </select>
                                </div>
                            </div>

                            <button class="submit" type="submit">Upload</button>
                        </form>
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

    <!-- <script>
        $(document).ready(function(){
            $('#new-book-form').submit(function(e){
                e.preventDefault();
                var bookName = $('#title').val();
                var description = $('#description').val();
                var genres = $('#genres').val();
                var lendType = $('#lendType').val();
                var image = $('#image').val();

                if(bookName == "" || description == "" || genres == "" || lendType == "" || image == ""){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please fill all fields!',
                    })
                }
                else{
                    $.ajax
                }
            })
        });
    </script> -->

</body>
</html>