<html>
<head>
    <meta charset="UTF-8">
    <title>login page</title>
    <link rel="stylesheet" href="css/login.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>

<?php


function analyze_attack($data)
{
    $attack1 = "";
    //  (script)|(&lt;)|(&gt;)|(%3c)|(%3e)|(SELECT) |(UPDATE)|(INSERT) |(DELETE)|(GRANT) |(REVOKE)|(UNION)|(&amp;lt;)|(&amp;gt;)
    if (preg_match("/(<)|(>)|(SELECT)|(UPDATE)|(INSERT)|(DELETE)|(GRANT)
    |(REVOKE)|(UNION)|(&&)|(&>)|(&<)|(DROP)|(ALTER)|(=)|(==)/i", $data)) {
        $attack1 = "sql injection";
    } elseif (preg_match("/(<script>)|(HTML)|(BODY)|(DIV)|(<h.>)|(onclick)
|(onchange)|(ondblclick)|(onmouse)|(onselect)|(onsubmit)|(onload)|(alert)|(style)/i", $data)) {
        $attack1 = "xss attack (stored)";
    }
    return $attack1;

}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
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
        echo "<br>" . $e->getMessage();
    }


    if ($_POST["login"]) {

        $loginAttack = "";
        $emailLoginPost = $passLoginPost = "";
        $emailLogin = $passLogin = "";
        $emailLoginErr = $passLoginErr = "";

        if (empty($emailLoginPost = $_POST["login_email"])) {
            $emailLoginErr = "email is required";
            echo $emailLoginErr;
        } elseif (($attack = analyze_attack($emailLoginPost)) != "") {
            $emailLoginErr = "we have $attack attack in email field !<br>";
            echo "<br>" . $emailLoginErr;
        } else {
            $emailLogin = test_input($_POST["login_email"]);
        }

        if (empty($passLoginPost = $_POST["login_pass"])) {
            $passLoginErr = "password is required";
        } elseif (($attack = analyze_attack($passLoginPost)) != "") {
            $passLoginErr = "we have $attack attack in password field !<br>";
            echo "\n" . $passLoginErr;
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

                    //echo $results['username'];

                    setcookie("username", $results['username'], time() + 1800, "/");
                    setcookie("password", $results['password'], time() + 1800, "/");
                    setcookie("email", $results['email'], time() + 1800, "/");
                    setcookie("first-name", $results['name'], time() + 1800, "/");
                    setcookie("family-name", $results['family'], time() + 1800, "/");


                } else {
                    echo "شما عضو این سایت نیستید . لطفا ثبت نام کنید!";
                }

                $conn = null;

            } catch (PDOException $e) {
                echo "<br>" . $e->getMessage();
            }


        } else {
            if ($loginAttack == "") echo "فیلدهای لازم پر شوند.";
            else {
                echo "we handled the attack <br>";;
                echo "the attacker's description is : <br>";
                echo $_SERVER['REMOTE_ADDR'];

            }
        }

    } elseif ($_POST["signup"]) {

        $signupAttack = "";
        $emailSignupPost = $passSignupPost = $nameSignupPost = $fnameSignupPost = $usernameSignupPost = "";
        $emailSignup = $passSignup = $nameSignup = $fnameSignup = $usernameSignup = "";
        $passSignupErr = $passSignupErr = $nameSignupErr = $fnameSignupErr = $usernameSignupErr = "";

        if (empty($nameSignupPost = $_POST["name"])) {
            $nameSignupErr = "";
        } elseif (($attack = analyze_attack($nameSignupPost)) != "") {
            $nameSignupErr = "we have $attack attack in name field !<br>";
            $signupAttack = $attack;
            echo "\n" . $nameSignupErr;
        } else {
            $nameSignup = test_input($_POST["name"]);


        }

        if (empty($fnameSignupPost = $_POST["family-name"])) {
            $fnameSignupErr = "";
        } elseif (($attack = analyze_attack($fnameSignupPost)) != "") {
            $fnameSignupErr = "we have $attack attack in familyname field !<br>";
            $signupAttack = $attack;
            echo "\n" . $fnameSignupErr;
        } else {
            $fnameSignup = test_input($_POST["family-name"]);

        }

        if (empty($emailSignupPost = $_POST["email"])) {
            $emailSignupErErr = "email is required";
        } elseif (($attack = analyze_attack($emailSignupPost)) != "") {
            $emailSignupEr = "we have $attack attack in email field !<br>";
            $signupAttack = $attack;
            echo "\n" . $emailSignupErErr;
        } else {
            $emailSignup = test_input($_POST["email"]);
        }

        if (empty($passSignupPost = $_POST["password"])) {
            $passSignupErr = "password is required";
        } elseif (($attack = analyze_attack($passSignupPost)) != "") {
            $passSignupErr = "we have $attack attack in password field !<br>";
            $signupAttack = $attack;
            echo "\n" . $passSignupErr;
        } else {
            $passSignup = test_input($_POST["password"]);
        }

        if (empty($usernameSignupPost = $_POST["username"])) {
            $usernameSignupErr = "username is required";
        } elseif (($attack = analyze_attack($usernameSignupPost)) != "") {
            $usernameSignupErr = "we have $attack attack in username field !<br>";
            $signupAttack = $attack;
            echo "\n" . $usernameSignupErr;
        } else {
            $usernameSignup = test_input($_POST["username"]);


        }
        if (!(empty($emailSignup) || empty($passSignup) || empty($usernameSignup))
            && empty($nameSignupErr) && empty($fnameSignupErr)
        ) {


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
                echo "<br>" . $e->getMessage();
            }


        } else {
            if ($signupAttack == "") echo "فیلدهای لازم پر شوند.";
            else {
                echo "we handled the attack <br>";
                echo "the attacker's description is : <br>";
                echo $_SERVER['REMOTE_ADDR'];

            }
        }
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
            <br>
            <a href="index.php">بازگشت به صفحه اصلی</a>
            <br>
            <a href="logout.php">خروج</a>

        </div>

        <div id="login-tab-content">
            <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" class="input" name="login_email" id="login_email" autocomplete="on"
                       placeholder="ایمیل">
                <input type="password" class="input" name="login_pass" id="login_pass" autocomplete="off"
                       placeholder="رمز عبور">

                <input type="submit" name="login" class="button" value="ورود">
            </form>
            <br>
            <a href="index.php">بازگشت به صفحه اصلی</a>
            <br>
            <a href="logout.php">خروج</a>
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