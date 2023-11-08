<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Swiper Import -->
    <link rel="stylesheet" href="./assets/plugins/swiper/swiper-bundle.min.css">
     <!-- Main Css -->
    <link rel="stylesheet" href="./assets/styles/main.css">
    <link rel="stylesheet" href="./assets/styles/home.css">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="./assets/images/favicon_io/site.webmanifest">

    <title>ReadRipple - Homepage</title>
</head>
<body>
    <div class="wrapper">
        <!-- Navbar -->
            <nav>
                <div class="logo-container" onclick="window.location.href='./'">
                    <img src="./assets/images/logo/logo.png" alt="web-log" class="logo">
                    <h1>ReadRipple</h1>
                </div>
                <div class="header-menu">
                    <div class="menu">
                        <ul>
                            <!-- <li><a href="#">Home</a></li> -->
                            <li><a href="./book-exchange/">Book Exchange</a></li>
                            <li><a href="./sell/">Sell For Token</a></li>
                            <li><a href="./contact-us">Contact Us</a></li>
                        </ul>
                    </div>
                    
                    <?php
                        if(isset($_SESSION['user_id'])) {
                            echo '<div class="btn-group">
                                    <a href="./user/" class="btn">DashBoard <i class="fa fa-arrow-right"></i> </a>
                                </div>';
                        } else {
                            echo '<div class="btn-group">
                                    <a href="./login/" class="link">Login</a>
                                    <a href="./sign-up/" class="btn">Sign Up <i class="fa fa-arrow-right"></i> </a>
                                </div>';
                        }
                    ?>


                </div>


            </nav>
        <!-- Navbar End -->
        
        <!-- Header Section -->
            <header>
                <div class="right-side">
                    <h2>Discover a <span>World</span> of <span>Books</span>  <span>Waiting</span> to be Shared</h2>
                    <p>Welcome to ReadRipple, where the love of books meets the joy of sharing. Dive into our community of book enthusiasts, where every page holds a new adventure and every book finds its reader. Join us in the delightful exchange of stories and ideas. Start exploring today</p>
                    <p>"Become a part of our book-loving family, discover hidden gems, and connect with fellow readers who share your passion. It's time to unlock the magic of reading together."</p>
                    <div class="button-header-group">
                        <button onclick="window.location.href='./sign-up'">
                            Get Started 
                        </button>
                        <a href="#">Learn More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="left-side">
                    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
                    <dotlottie-player src="https://lottie.host/95b6afec-b62f-4ff4-8a81-38b5a55dac5e/McRFfUUZjS.lottie" background="transparent" speed="1" style="width: 90%" loop autoplay></dotlottie-player>
                </div>
            </header>
        <!-- Header Section End -->

        <!-- About Section -->
            <section class="about">
                <h2>Behind the Bookshelves:<br>Our Journey to Sharing Stories</h2>
                <div class="about-section">
                    <div class="right-about-section">
                        <iframe width="550" height="350" src="https://www.youtube.com/embed/1Xc1r23jorQ?si=Z2Df39ue1UNPHjSj" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    <div class="left-about-section">
                        <h3>Our Mission</h3>
                        <p>At ReadRipple, our mission is both simple and profound: we aspire to create a world where every book finds its reader, and every reader discovers a welcoming community. We are passionately committed to making books more accessible, contributing to the reduction of waste in the world, and, above all else, we celebrate the intrinsic beauty of sharing stories. Our platform serves as the conduit through which these ideals come to life. By joining us on this transformative journey, you become a part of something greater—a global community of passionate readers, united by their love for literature and their desire to connect through the written word. Together, we build bridges with books and share stories that transcend boundaries, enriching the lives of readers everywhere.</p>
                    </div>
                </div>
            </section>
        <!-- About Section End -->

        <!-- Vision Section -->
            <section class="vision">
                <h2>Shaping the Future of Literature</h2>
                <div class="vision-container">
                    <div class="vision-left">
                        <h3>Our Vision</h3>
                        <p>At ReadRipple, we envision a world where every book becomes a bridge, connecting people, and enriching lives. Our vision is simple yet powerful: we aim to create universal access to knowledge, foster vibrant reading communities, promote sustainability in the book industry, empower readers, and celebrate the art of storytelling. Join us in shaping a future where books are cherished, shared, and celebrated, and where reading remains a timeless source of joy, learning, and connection for generations to come. Together, we're reimagining the world of literature—one book at a time.</p>
                    </div>
                    <div class="vision-right">
                        <img src="./assets/images/homepage/book1.webp" alt="">
                        <img src="./assets/images/homepage/book2.webp" alt="">
                        <img src="./assets/images/homepage/book3.webp" alt="">
                    </div>
                </div>
            </section>
        <!-- Vision Section End -->
        
        <!-- Feature Book -->

            <section class="feature-book">
                <h2>Discover Our Featured Books</h2>
                <div class="all-books">
                    <div class="book">
                        <img src="./assets/images/books/atomic-habits.webp" alt="">
                        <h3>Atomic Habits</h3>
                        <p>"Atomic Habits" is a bestselling book by James Clear that reveals how tiny changes can lead to remarkable results. It's a practical guide to building better habits, breaking bad ones....</p>
                        <button>View Details</button>
                    </div>
                    <div class="book">
                        <img src="./assets/images/books/atomic-habits.webp" alt="">
                        <h3>Atomic Habits</h3>
                        <p>"Atomic Habits" is a bestselling book by James Clear that reveals how tiny changes can lead to remarkable results. It's a practical guide to building better habits, breaking bad ones....</p>
                        <button>View Details</button>
                    </div>
                    <div class="book">
                        <img src="./assets/images/books/atomic-habits.webp" alt="">
                        <h3>Atomic Habits</h3>
                        <p>"Atomic Habits" is a bestselling book by James Clear that reveals how tiny changes can lead to remarkable results. It's a practical guide to building better habits, breaking bad ones....</p>
                        <button>View Details</button>
                    </div>
                </div>
                
            </section>

        <!-- Feature Books End Here -->

        <!-- Testimonial -->
            <div id="page" class="site ">
                <div class="container">
                    <div class="testi">
                        <div class="head">
                            <h3>Voices of our Book-Loving Community</h3>
                        </div>
                        <div class="body swiper">
                            <ul class="swiper-wrapper">
                                <li class="swiper-slide">
                                    <div class="testimonial-wrapper">
                                        <div class="thumbnail">
                                            <img src="./assets/images/testmonial/user-img1.webp" alt="">
                                        </div>
                                        <div class="aside">
                                            <p> 
                                                I'm absolutely thrilled with ReadRipple! This platform has transformed my reading experience. It's like a treasure chest of books waiting to be discovered. The book exchange process is seamless, and I've found some incredible gems that I wouldn't have come across otherwise. Plus, it feels great to be part of a community that shares the same love for reading. I can't recommend ReadRipple enough
                                            </p>
                                            <div class="name">
                                                <h4>Jane Smith</h4>
                                                <p>London, United Kingdom</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="swiper-slide">
                                    <div class="testimonial-wrapper">
                                        <div class="thumbnail">
                                            <img src="./assets/images/testmonial/user-img2.webp" alt="">
                                        </div>
                                        <div class="aside">
                                            <p> 
                                                I've been an avid reader for years, but ReadRipple has taken my reading experience to a whole new level. It's incredibly user-friendly, and I've found it so easy to connect with fellow book enthusiasts. The ability to borrow books has expanded my reading horizons, and I love that this platform promotes sustainability by encouraging book sharing. It's a win-win for readers and the environment!
                                            </p>
                                            <div class="name">
                                                <h4>Emily Parker</h4>
                                                <p> Seattle, Washington</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="swiper-slide">
                                    <div class="testimonial-wrapper">
                                        <div class="thumbnail">
                                            <img src="./assets/images/testmonial/user-img3.webp" alt="">
                                        </div>
                                        <div class="aside">
                                            <p> 
                                                I stumbled upon [Your Platform Name] a few months ago, and it has become an essential part of my reading routine. The platform's search and recommendation features make it a breeze to find books that match my interests. I've not only discovered fantastic reads but also made friends with fellow book lovers in my area. It's like having an extensive library and a book club rolled into one. Kudos to the team behind this wonderful platform!
                                            </p>
                                            <div class="name">
                                                <h4>John Doe</h4>
                                                <p>San Francisco, California</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="swiper-slide">
                                    <div class="testimonial-wrapper">
                                        <div class="thumbnail">
                                            <img src="./assets/images/testmonial/user-img5.webp" alt="">
                                        </div>
                                        <div class="aside">
                                            <p> 
                                                I've always believed in the magic of books, and [Your Platform Name] amplifies that magic tenfold. The community here is incredible, and the sense of sharing and camaraderie among readers is heartwarming. I've received book recommendations I would have never stumbled upon otherwise, and the book exchange system is a game-changer. Thanks to this platform, I've not only expanded my personal library but also my circle of book-loving friends.
                                            </p>
                                            <div class="name">
                                                <h4>Alex Turner</h4>
                                                <p>Toronto, Canada</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Testimonial Ends Here -->

        <!-- Footers -->
            <footer>
                <div class="foot-top">
                    <div class="logo-info">
                        <div class="logo-container">
                            <img src="./assets/images/logo/logo.png" alt="">
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
    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script> -->
    <script src="./assets/plugins/swiper/swiper-bundle.min.js"></script>
    <script src="./assets/js/swiper.js"></script>   
</body>
</html>