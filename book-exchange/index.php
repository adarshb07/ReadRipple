<?php
    session_start();
    require_once '../config/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/main.css">
    <link rel="stylesheet" href="../assets/styles/book-exchange.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>ReadRipple - Book Exchange</title>
</head>
<body>
    <?php
        if (isset($_SESSION['success'])) {
            echo "<script>Swal.fire({icon: 'success', title: 'Success', text: '" . $_SESSION['success'] . "'})</script>";
            unset($_SESSION['success']);
        }
        if (isset($_SESSION['error'])) {
            echo "<script>Swal.fire({icon: 'error', title: 'Error', text: '" . $_SESSION['error'] . "'})</script>";
            unset($_SESSION['error']);
        }
    ?>

    <!-- Navbar -->
        <?php
            include '../include/header.php';
        ?>
    <!-- Navbar End -->

    <!-- Header Section -->

        <section class="header-section">
            <div class="right-section">
                <h2>Book Exchange</h2>
                <h3>Share, Swap, and Discover</h3>
                <p>Join our community of book lovers and unlock the world of literary adventures. Share your favorite reads, borrow captivating stories, and connect with fellow readers in the ultimate book exchange experience.</p>
                
                <form action="../search/exchange.php" method="POST">
                <div class="search-group">
                        <input type="text" name="search" placeholder="Search Books Here" required>
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
            <div class="left-section">
                <img src="../assets/images/bookexchange/book.jpg" alt="">
            </div>
        </section>

    <!-- Header Section Ends -->

    <!-- Books Section -->
        <section class="books">
            <div class="title">
                <h2>Available Books</h2>
            </div>

            <div class="all-books">
                <?php
                    $limit = 6; // Number of books per page
                    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
                
                    $start = ($page - 1) * $limit;
                    $sql = "SELECT * FROM book WHERE lendType = 'exchange' LIMIT $start, $limit";
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
                        <a href="../exchange-now/index.php?id=<?= $row['id']; ?>">
                            <button>Exchange Now</button>
                        </a>
                    </div>
                </div>
                <?php
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
    <?php
        include '../include/footer.php';
    ?>
    <!-- Footers End -->
    <script src="https://kit.fontawesome.com/58a810656e.js" crossorigin="anonymous"></script>
</body>
</html>