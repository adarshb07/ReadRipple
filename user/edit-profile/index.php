<?php
    require_once '../config/session.php';
    require_once '../../config/connection.php';
    
    $userId = $_SESSION['user_id'];

    $sql = "SELECT * FROM user WHERE id='$userId'";
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
    <link rel="stylesheet" href="../../assets/styles/edit-profile.css">
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
                        <li><a href="../token/"><i class="fa fa-money"></i> Tokens</a></li>
                        <li><a href="../edit-profile/" class="active"><i class="fa fa-pencil-square-o"></i> Edit Profile</a></li>
                    </ul>
                </div>
            </div>
            <div class="right"> 
                <h2>Edit Profile</h2>
                <form action="./update-profile.php" method="POST">
                    <div class="field">
                        <div class="form-field">
                            <label for="first-name">First Name</label>
                            <input type="text" name="firstName" id="first-name" placeholder="First Name" value="<?= $row['firstName']; ?>">
                        </div>
                        <div class="form-field">
                            <label for="lastName">Last Name</label>
                            <input type="text" name="lastName" id="lastName" placeholder="Last Name" value="<?= $row['lastName']; ?>">
                        </div>
                    </div>
                    <div class="field">
                        <div class="form-field">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" placeholder="Email Address" value="<?= $row['email'];?>">
                        </div>
                        <div class="form-field">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="number" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" value="<?=$row['phoneNumber'];?>">
                        </div>
                    </div>
                    <div class="field">
                        <div class="form-field">
                            <label for="state">State</label>
                            <select name="state" id="state">
                                <option label="Select Your state"></option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label for="district">District</label>
                            <select name="district" id="district">
                                <option label="Select Your district"></option>
                            </select>
                        </div>
                    </div>

                    <div class="submit-button">
                        <button type="submit">Save Changes</button>
                    </div>
                </form>
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

        
        fetch('../config/places.json')
            .then(response => response.json())
            .then(data => {
                // Your data is now in the 'data' variable
                console.log(data);
                window.onload = function () {
            var stateSelect = document.getElementById("state");
            var districtSelect = document.getElementById("district");

            // Populate state select options
            for (var i = 0; i < data.length; i++) {
                var opt = document.createElement('option');
                opt.value = data[i].state;
                opt.selected = data[i].state === "<?= $row['state']; ?>";
                opt.innerHTML = data[i].state;
                stateSelect.appendChild(opt);
            }

            // Add event listener for state select change
            stateSelect.addEventListener('change', function () {
                // Clear district select options
                districtSelect.innerHTML = "";
                districtSelect.innerHTML = "<option label='Select Your district'></option>";
                // Find selected state in data
                for (var i = 0; i < data.length; i++) {
                    if (data[i].state === this.value) {
                        var districts = data[i].districts;

                        // Populate district select options
                        for (var j = 0; j < districts.length; j++) {
                            var opt = document.createElement('option');
                            opt.value = districts[j];
                            opt.selected = districts[j] === "<?= $row['district']; ?>";
                            opt.innerHTML = districts[j];
                            districtSelect.appendChild(opt);
                        }
                        break;
                    }
                }
            });
        };
        })
        .catch(error => console.error('Error:', error));



    </script>
</body>
</html>