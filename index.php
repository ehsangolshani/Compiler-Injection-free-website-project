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
                <h1>Serene</h1>
            </div>
        </div>


        <div class="module content">
            <div class="row">
                <div class="centered col-md-11">

                    <div class="col-xs-12">
                        <h2>Lorem Ipsum Dolor</h2>

                        <form action="xss-test.php" method="GET">
                            search : <input type="text" name="search">
                            <input type="submit" value="submit">
                        </form>

                        <?php
                        if (count($_COOKIE) > 0) {
                            echo "<h3>you are logged in !</h3>";
                            print_r($_COOKIE);
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

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</p>
                    </div>


                </div>
            </div>
        </div>


        <div class="module parallax parallax-2">
            <div class="centered">
                <h1>Rise</h1>
            </div>
        </div>

        <div class="module content">
            <div class="row">
                <div class="centered col-md-11">
                    <div class="col-md-6 col-xs-12">
                        <div class="thumbnail">
                            <h2>Lorem Ipsum Dolor</h2>
                            <img src="img/b.jpg" alt="">

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="thumbnail">
                            <h2>Lorem Ipsum Dolor</h2>
                            <img src="img/a.jpg" alt="">

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="module parallax parallax-3">
            <div class="centered">
                <h1>Calm</h1>
            </div>
        </div>

        <div class="module content">
            <div class="row">
                <div class="centered col-md-11">
                    <div class="col-md-3 col-xs-6">
                        <div class="thumbnail">
                            <h2>Lorem Ipsum Dolor</h2>
                            <a href="login.php">click to login</a>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="thumbnail">
                            <h2>Lorem Ipsum Dolor</h2>
                            <a href="login.php">click to login</a>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="thumbnail">
                            <h2>Lorem Ipsum Dolor</h2>
                            <a href="login.php">click to login</a>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="thumbnail">
                            <h2>Lorem Ipsum Dolor</h2>
                            <a href="login.php">click to login</a>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="module parallax parallax-4">
            <div class="centered">
                <h1>Calm</h1>
            </div>
        </div>

        <div class="module content">
            <div class="row">
                <div class="centered col-md-11">

                    <div class="col-xs-12">

                        <h2>Lorem Ipsum Dolor</h2>


                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</p>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>