<?php

ob_start();
session_start();
session_unset();
session_destroy();
header('location:index.php');
ob_end_flush();

?>


<!-- this is a logout function and this is a logout page and aftwer logout then user go to index page. -->
