<html>
<head>
    <meta charset="UTF-8">
    <title>login page</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>

<?php

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    //$data = htmlspecialchars($data);
    return $data;
}

$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "compiler_security_website_db";


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //echo "Connected successfully";

    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }


    /*
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

*/

    if ($_POST["login"]) {

        $emailLogin = $passLogin = "";
        $emailLoginErr = $passLoginErr = "";

        if (empty($_POST["login_email"])) {
            $emailLoginErr = "email is required";
        } else {
            $emailLogin = test_input($_POST["login_email"]);


        }

        if (empty($_POST["login_pass"])) {
            $passLoginErr = "password is required";
        } else {
            $passLogin = test_input($_POST["login_pass"]);
        }

        if (!(empty($emailLogin) || empty($passLogin))) {


            try {

                $sql = $conn->prepare("SELECT * FROM users WHERE email=? AND password=?");

                $sql->bindParam(1, $emailLogin, PDO::PARAM_STR);
                $sql->bindParam(2, $passLogin, PDO::PARAM_STR);
                $sql->execute();
                //why it does not work?
                //$conn->exec($sql);

                $results = $sql->fetch(PDO::FETCH_ASSOC);

                if ($sql->rowCount() > 0) {
                    echo "آفرین شما عضو هستید!";
                } else {
                    echo "شما عضو این سایت نیستید . لطفا ثبت نام کنید!";
                }

                $conn = null;

            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }


        } else {
            echo "فیلدهای لازم پر شوند.";
        }

    } elseif ($_POST["signup"]) {
        $emailSignup = $passSignup = $nameSignup = $fnameSignup = $usernameSignup = "";
        $passSignupErr = $passSignupErr = $nameSignupErr = $fnameSignupErr = $usernameSignupErr = "";

        if (empty($_POST["name"])) {
            $nameSignupErr = "";
        } else {
            $nameSignup = test_input($_POST["name"]);


        }

        if (empty($_POST["family-name"])) {
            $fnameSignupErr = "";
        } else {
            $fnameSignup = test_input($_POST["family-name"]);


        }

        if (empty($_POST["email"])) {
            $emailSignupErr = "email is required";
        } else {
            $emailSignup = test_input($_POST["email"]);


        }

        if (empty($_POST["password"])) {
            $passSignupErr = "password is required";
        } else {
            $passSignup = test_input($_POST["password"]);


        }

        if (empty($_POST["username"])) {
            $usernameSignupErr = "username is required";
        } else {
            $usernameSignup = test_input($_POST["username"]);


        }

        if (!(empty($emailSignup) || empty($passSignup) || empty($usernameSignup))) {

            /*
                        $sql = "INSERT INTO users (name, family,username,password, email)
                    VALUES ('$fnameSignup', '$lnameSignup', '$usernameSignup' ,'$passSignup', '$emailSignup')";
                        echo $sql;

                        if ($conn->query($sql) === TRUE) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        $conn->close();
            */

            try {

                $sql = $conn->prepare("INSERT INTO users (name, family,username,password, email)
        VALUES (:name,:family,:username,:password,:email)");


                $sql->bindParam(':name', $nameSignup, PDO::PARAM_STR);
                $sql->bindParam(':family', $fnameSignup, PDO::PARAM_STR);
                $sql->bindParam(':username', $usernameSignup, PDO::PARAM_STR);
                $sql->bindParam(':password', $passSignup, PDO::PARAM_STR);
                $sql->bindParam(':email', $emailSignup, PDO::PARAM_STR);


                $sql->execute();

                echo "ثبت نام با موفقیت به اتمام رسید!";
                //why it does not work?
                //$conn->exec($sql);
                $conn = null;

            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        } else echo "فیلدهای لازم پر شوند.";
    }
}


?>


<div class="form-wrap">
    <div class="tabs">
        <h3 class="signup-tab"><a class="active" href="#signup-tab-content">ثبت نام</a></h3>

        <h3 class="login-tab"><a href="#login-tab-content">ورود</a></h3>
    </div>

    <div class="tabs-content">
        <div id="signup-tab-content" class="active">
            <form class="signup-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" class="input" name="name" id="name" autocomplete="on" placeholder="نام">
                <input type="text" class="input" name="family-name" id="family-name" autocomplete="on"
                       placeholder="نام خانوادگی">
                <input type="email" class="input" name="email" id="email" autocomplete="on" placeholder="ایمیل">
                <input type="text" class="input" name="username" id="username" autocomplete="on"
                       placeholder="نام کاربری">
                <input type="password" class="input" name="password" id="password" autocomplete="off"
                       placeholder="رمز ورود">
                <input type="submit" class="button" name="signup" value="ثبت نام">
            </form>

        </div>

        <div id="login-tab-content">
            <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" class="input" name="login_email" id="login_email" autocomplete="off"
                       placeholder="ایمیل">
                <input type="password" class="input" name="login_pass" id="login_pass" autocomplete="off"
                       placeholder="رمز عبور">

                <input type="submit" name="login" class="button" value="ورود">
            </form>

        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function ($) {
        tab = $('.tabs h3 a');

        tab.on('click', function (event) {
            event.preventDefault();
            tab.removeClass('active');
            $(this).addClass('active');

            tab_content = $(this).attr('href');
            $('div[id$="tab-content"]').removeClass('active');
            $(tab_content).addClass('active');
        });
    });
</script>

</body>
</html>