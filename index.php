<?php
include 'includes/logout_func.php';
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Security website</title>
    <link rel="stylesheet" href="css/main.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">

    <div class="row">

        <div class="module parallax parallax-1">
            <div class="centered">
                <h1>Xss attack</h1>
            </div>
        </div>


        <div class="module content">
            <div class="row">
                <div class="centered col-md-11">

                    <div class="col-xs-12">
                        <h2>reflected xss attack and directory traversal attack test</h2>

                        <form action="xss-test.php" method="GET">
                            reflected xss testing : <input type="text" name="search">
                            <input type="submit" value="submit your search">
                        </form>

                        <form action="directory-traversal.php" method="GET">
                            directory traversal testing : <input type="text" name="search">
                            <input type="submit" value="submit directory address">
                        </form>

                        <?php
                        if (count($_COOKIE) > 0) {
                            echo "<h3>you are logged in !</h3>";
                        } else {
                            echo "<h3>you are not logged in</h3>";
                        }
                        ?>
                        <br>
                        <a class="btn btn-info" role="button" href="login.php">click to login</a>
                        <br>
                        <br>
                        <a class="btn btn-warning" role="button" href="logout.php">click to logout</a>
                        <br>
                        <br>

                        <p>در این وبسایت سعی نمودیم انواع حملات امنیتی که ممکن است یک وبسایت را تحت تاثیر قرار دهند
                            بررسی و تست کنیم که بعضی از این حملات عبارت اند از </p>

                        <p>xss (reflected) attack </p>

                        <p>xss (stored) attack </p>

                        <p>sql injection attack </p>

                        <p>CSRF attack </p>

                        <p>directory traversal attack </p>

                    </div>


                </div>
            </div>
        </div>


        <div class="module parallax parallax-2">
            <div class="centered">
                <h1>sql injection</h1>
            </div>
        </div>

        <div class="module content">
            <div class="row">
                <div class="centered col-md-11">
                    <div class="col-md-6 col-xs-12">
                        <div class="thumbnail">
                            <h2>stored xss attack‬</h2>
                            <img src="img/b.jpg" alt="">

                            <p>A Stored Cross Site Scripting vulnerability occurs when the malicious user can store some
                                attack which will be called at a later time upon some other unknowing user. The attack
                                is actually stored in some method to be later executed.

                                The storage of a method could involve a database, or a wiki, or blog. Basically the
                                malicious user has stored some type of attack, that when an unknowing user will
                                encounter this, the attack will be executed. The stored method actually not only has the
                                problem of incorrect checking for input validation, but also for output validation. Even
                                if data has been sanitized upon input, it should also be checked for in the output
                                process. By checking and validated the output, you could also uncover unknown issues
                                during the input validation process. ‬</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="thumbnail">
                            <h2>reflected xss attack</h2>
                            <img src="img/a.jpg" alt="">

                            <p>Reflected attacks are those where the injected script is reflected off the web server,
                                such as in an error message, search result, or any other response that includes some or
                                all of the input sent to the server as part of the request. Reflected attacks are
                                delivered to victims via another route, such as in an e-mail message, or on some other
                                web site. When a user is tricked into clicking on a malicious link, submitting a
                                specially crafted form, or even just browsing to a malicious site, the injected code
                                travels to the vulnerable web site, which reflects the attack back to the user’s
                                browser. The browser then executes the code because it came from a "trusted" server‬</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="module parallax parallax-3">
            <div class="centered">
                <h1>CSRF attack</h1>
            </div>
        </div>

        <div class="module content">
            <div class="row">
                <div class="centered col-md-11">
                    <div class="col-md-4 col-xs-4">
                        <div class="thumbnail">
                            <h2>sql injection</h2>


                            <p>SQL injection is a code injection technique, used to attack data-driven applications, in
                                which malicious SQL statements are inserted into an entry field for execution (e.g. to
                                dump the database contents to the attacker).[1] SQL injection must exploit a security
                                vulnerability in an application's software, for example, when user input is either
                                incorrectly filtered for string literal escape characters embedded in SQL statements or
                                user input is not strongly typed and unexpectedly executed. SQL injection is mostly
                                known as an attack vector for websites but can be used to attack any type of SQL
                                database.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <div class="thumbnail">
                            <h2>CSRF attack</h2>


                            <p>Cross-Site Request Forgery (CSRF) is an attack that forces an end user to execute
                                unwanted actions on a web application in which they're currently authenticated. CSRF
                                attacks specifically target state-changing requests, not theft of data, since the
                                attacker has no way to see the response to the forged request. With a little help of
                                social engineering (such as sending a link via email or chat), an attacker may trick the
                                users of a web application into executing actions of the attacker's choosing. If the
                                victim is a normal user, a successful CSRF attack can force the user to perform state
                                changing requests like transferring funds, changing their email address, and so forth.
                                If the victim is an administrative account, CSRF can compromise the entire web
                                application. </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <div class="thumbnail">
                            <h2>directory traversal attack</h2>


                            <p>A path traversal attack (also known as directory traversal) aims to access files and
                                directories that are stored outside the web root folder. By manipulating variables that
                                reference files with “dot-dot-slash (../)” sequences and its variations or by using
                                absolute file paths, it may be possible to access arbitrary files and directories stored
                                on file system including application source code or configuration and critical system
                                files. It should be noted that access to files is limited by system operational access
                                control (such as in the case of locked or in-use files on the Microsoft Windows
                                operating system).

                                This attack is also known as “dot-dot-slash”, “directory traversal”, “directory
                                climbing” and “backtracking”. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="module parallax parallax-4">
            <div class="centered">
                <h1>traversal</h1>
            </div>
        </div>

    </div>
</div>
</body>
</html>