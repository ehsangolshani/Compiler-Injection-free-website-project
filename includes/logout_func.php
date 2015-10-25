<?php

function logout()
{
    setcookie("username", "", time() - 1800, "/");
    setcookie("password", "", time() - 1800, "/");
    setcookie("email", "", time() - 1800, "/");
    setcookie("first-name", "", time() - 1800, "/");
    setcookie("family-name", "", time() - 1800, "/");

}

?>