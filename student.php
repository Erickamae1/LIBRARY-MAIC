<?php
require "connection.php";
include "student_navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLMS-MAIC Library System</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>

    <div class="banner">
        <div class="form">
            <div class="form-container">
                <div class="form-btn">
                    <span onclick="login()">Login</span>
                    <span onclick="reg()">Register</span>
                    <hr id="indicator">
                </div>

                <form action="" id="loginform" method="post">
                    <input type="text" placeholder="Lat Name" name="student_username" required>
                    <input type="email" placeholder="Email" name="Email" required>
                    <input type="password" placeholder="Password" name="Password" id="Pass" required>
                    <span class='show-hide'><i class="fas fa-eye" id="eye"></i></span>
                    <button type="submit" class="btn" name="login" style="margin-top:-10px;">Login</button>
                    <a href="student_forgot_password.php">Forgot Password?</a>
                    <div class="signup">
                        <p>New to this website?</p><span onclick="reg()">SignUp</span>
                    </div>
                </form>
                <form action="" id="regform" method="post" enctype="multipart/form-data"
                    style="height: 100%; overflow-y: scroll;">
                    <input type="text" placeholder="Student ID" name="ID" required>
                    <input type="text" placeholder="Last Name" name="student_username" required>
                    <input type="text" placeholder="First Name" name="FullName" required>
                    <input type="text" placeholder="Middle Initial" name="Middle" required>
                    <input type="number" placeholder="Semester" name="Sem" required>
                    <input type="number" placeholder="Academic Year" name="Acad" required>
                    <input type="email" placeholder="Email" name="Email" required>
                    <input type="password" placeholder="Password" name="Password" id="Pass-reg"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least UPPERCASE, lowercase letter, number,  and at least 8 or More Characters"
                        style="margin-bottom: 0;" required>



                    <div id="message">
                        <h3>Password must contain the following:</h3>
                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                        <p id="number" class="invalid">A <b>number</b></p>
                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                    </div>

                    <div class="label">
                        <label for="pic">Upload Picture :</label>
                    </div>
                    <input type="file" name="file" class="file" value="">

                    <button type="submit" class="btn" name="register">Register</button>




                </form>
            </div>
        </div>
    </div>

    <?php
if (isset($_POST['login'])) {
    $query = "SELECT * FROM `student` WHERE student_username='$_POST[student_username]' AND Email='$_POST[Email]' AND password='$_POST[Password]'";
    $res = mysqli_query($db, $query);
    $count = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);
    if ($count == 0) {
        ?>
    <script type="text/javascript">
    alert("The username or password doesn't match.");
    </script>
    <?php
}if ($row['status'] == 'Approved') {
        $query_status = "SELECT * FROM `student` WHERE student_username='$_POST[student_username]' AND Email='$_POST[Email]' AND password='$_POST[Password]' AND status='approved'";
        $_SESSION['login_student_username'] = $_POST['student_username'];
        $_SESSION['studentid'] = $row['studentid'];
        $_SESSION['pic'] = $row['studentpic'];
        header("Location: student_dashboard.php");
    } else {
        ?>
    <script type="text/javascript">
    alert("Your account has not been approved yet. Please contact the administrator.");
    </script>
    <?php
}
} 

?>
    <?php

if (isset($_POST['register']) && !empty($_FILES["file"]["name"])) {

    $count = 0;
    $sql = "SELECT * from student";
    $res = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_assoc($res)) {
        if ($row['student_username'] == $_POST['student_username']) {
            $count = $count + 1;
        }
    }
    if ($count == 0) {
        move_uploaded_file($_FILES['file']['tmp_name'], "images/" . $_FILES['file']['name']);
        $pic = $_FILES['file']['name'];
        mysqli_query($db, "INSERT INTO `STUDENT` VALUES('','$_POST[ID]','$_POST[student_username]','$_POST[FullName]','$_POST[Middle]','$_POST[Sem]','$_POST[Acad]','$_POST[Email]','$_POST[Password]','$pic');");

        ?>
    <script type="text/javascript">
    alert("Registration successful ");
    </script>
    <?php
} else {
        ?>
    <script type="text/javascript">
    alert("This username is already registered.");
    </script>
    <?php
}
} else if (isset($_POST['register'])) {

    $count = 0;
    $sql = "SELECT * from student";
    $res = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_assoc($res)) {
        if ($row['student_username'] == $_POST['student_username']) {
            $count = $count + 1;
        }
    }
    if ($count == 0) {
        mysqli_query($db, "INSERT INTO `STUDENT` VALUES('','$_POST[ID]','$_POST[student_username]','$_POST[FullName]','$_POST[Middle]','$_POST[Sem]','$_POST[Acad]','$_POST[Email]','$_POST[Password]','user2.png','$_POST[status]');");

        ?>
    <script type="text/javascript">
    alert("Registration successful ");
    </script>
    <?php
} else {
        ?>
    <script type="text/javascript">
    alert("This username is already registered.");
    </script>
    <?php
}
}
?>

    <script>
    var myInput = document.getElementById("Password");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if (myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if (myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
    </script>

    <script>
    var LoginForm = document.getElementById("loginform");
    var regform = document.getElementById("regform");
    var indicator = document.getElementById("indicator");

    function reg() {
        regform.style.transform = "translateX(-365px)";
        LoginForm.style.transform = "translateX(-400px)";
        indicator.style.transform = "translateX(150px)";
    }

    function login() {
        regform.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        indicator.style.transform = "translateX(0px)";
    }
    </script>
    <script>
    var pass = document.getElementById("Pass");
    var showbtn = document.getElementById("eye");
    showbtn.addEventListener("click", function() {
        if (pass.type === "password") {
            pass.type = "text";
            showbtn.classList.add("hide");
        } else {
            pass.type = "password";
            showbtn.classList.remove("hide");
        }
    });
    </script>
    <script>
    var pass2 = document.getElementById("Pass-reg");
    var showbtn2 = document.getElementById("eye-reg");
    showbtn2.addEventListener("click", function() {
        if (pass2.type === "password") {
            pass2.type = "text";
            showbtn2.classList.add("hide");
        } else {
            pass2.type = "password";
            showbtn2.classList.remove("hide");
        }
    });
    </script>
</body>

</html>