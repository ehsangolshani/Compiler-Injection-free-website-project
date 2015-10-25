<?php

require 'includes/logout_func.php';

$http_ref = $_SERVER['HTTP_REFERER'];

if ($http_ref == "") {

    echo "<script>alert('this request is from another website , it can be a CSRF attack !')</script>";

} else {
    if (strpos($http_ref, "compiler%20security%20site%20project")) {

        logout();
        header('Location: index.php');
    } else {
        echo "<script>alert('this request is from another website , it can be a CSRF attack !')</script>";
    }
}


//header('Location: index.php');
//header('Location :index.php');

?>


