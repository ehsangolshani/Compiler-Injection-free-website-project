<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<?php

function analyze_attack($data)
{
    $attack1 = "";
    if (preg_match("/(<script>)|(HTML)|(BODY)|(DIV)|(<h.>)|(onclick)
    |(onchange)|(ondblclick)|(onmouse)|(onselect)|(onsubmit)|(onload)|(alert)|(style)/i", $data)) {
        $attack1 = "xss attack (reflected)";
    }
    return $attack1;

}

?>


<div class="container-fluid">
    <div class="row">

        <div
            class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1
            col-sm-offset-1 col-md-offset-1 col-lg-offset-1 thumbnail"
            style="text-align: center;margin-top: 15px;">
            <?php

            $searched = "";
            $attack = "";

            if (isset($_REQUEST['search'])) {

                $searched = $_GET['search'];
                //echo $searched;
                if (($attack = analyze_attack($searched)) == "") {
                    echo "you searched : <br>";
                    echo "<h3>" . $_GET['search'] . "</h3>";
                } else {
                    echo "yess we catch a $attack attack ! <br>";
                    echo "we handled the attack <br>";
                    echo "the attacker's description is : <br>";
                    echo $_SERVER['REMOTE_ADDR'];
                }
            }

            ?>

        </div>
    </div>
</div>

</body>
</html>





