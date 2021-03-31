<?php


// Shut down all the sessions by destroying them when the user wants to logout

session_start();
session_unset();
session_destroy();


// Directing the user to the home page

header("location: ../../index.php");
exit();

?>