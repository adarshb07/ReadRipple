<?php
    require_once '../config/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/main.css">
    <link rel="stylesheet" href="../assets/styles/book-exchange.css">
    <title>ReadRipple - Book Exchange</title>
</head>
<body>
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
                        <li><a href="./">Book Exchange</a></li>
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

    <!-- Books Section -->
        <?php
            $searchKeyword = $_POST['search'];
        ?>
        <section class="books">
            <div class="title">
                <h2>Search For
                    <?php
                        if ($searchKeyword != '') {
                            echo ' - ' . $searchKeyword;
                        }
                    ?>
                </h2>
            </div>

            <div class="all-books">
                <?php
                    $limit = 6; // Number of books per page
                    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
                
                    $start = ($page - 1) * $limit;
                    $sql = "SELECT * FROM book WHERE lendType = 'exchange'AND bookTitle LIKE '%$searchKeyword%' LIMIT $start, $limit";
                    $result = mysqli_query($conn, $sql);
                
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="single-book">
                    <div class="book-image">
                        <img src="../assets/images/books/<?= $row['image'] ?>" alt="">
                    </div>
                    <div class="book-description">
                        <h3><?= $row['bookTitle'] ?></h3>
                        <!-- <h5>By James Clear</h5> -->
                        <p><?= $row['description']; ?></p>
                    </div>
                    <div class="exchange">
                        <button>Exchange Now</button>
                    </div>
                </div>
                <?php
                    }
                    if(mysqli_num_rows($result) == 0) {
                        echo '<div style="display:flex;flex-direction:column;">
                                <h2>No books found</h2>
                                <p>Try searching for something else</p>
                        </div>';
                    }
                ?>

            </div>

            <div class="pagination">
            <?php
    $sql = "SELECT COUNT(*) FROM book WHERE lendType = 'exchange'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);
    $total_books = $row[0];

    $total_pages = ceil($total_books / $limit);

    // Previous button
    if ($page > 1) {
        echo '<a href="?page=' . ($page - 1) . '"><button>< Previous</button></a>';
    } else {
        echo '<button disabled>< Previous</button>';
    }

    // Numbered pagination and "of" text
    echo '<div class="number">';
    echo '<span class="active-pagination">' . $page . '</span>';
    echo '<span>of ' . $total_pages . '</span>';
    echo '</div>';

    // Next button
    if ($page < $total_pages) {
        echo '<a href="?page=' . ($page + 1) . '"><button>Next ></button></a>';
    } else {
        echo '<button disabled>Next ></button>';
    }
?>

            </div>

        </section>
    <!-- Book Section End  -->

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
    <script src="https://kit.fontawesome.com/58a810656e.js" crossorigin="anonymous"></script>
</body>
</html>