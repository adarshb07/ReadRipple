<script>
    console.log("Hello World");
</script>
<nav>
    <div class="logo-container" onclick="window.location.href='../../'">
        <img src="../../assets/images/logo/logo.png" alt="web-log" class="logo">
        <h1>ReadRipple</h1>
    </div>
    <div class="header-menu">
        <div class="menu">
            <ul>
                <!-- <li><a href="#">Home</a></li> -->
                <li><a href="../../book-exchange/">Book Exchange</a></li>
                <li><a href="../../sell/">Sell For Token</a></li>
                <li><a href="../../contact-us/">Contact Us</a></li>
            </ul>
        </div>
        
        <?php
            if(isset($_SESSION['user_id'])) {
                echo '<div class="btn-group">
                        <a href="../" class="btn">DashBoard <i class="fa fa-arrow-right"></i> </a>
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