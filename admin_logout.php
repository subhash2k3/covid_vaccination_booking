<?php
// Destroy session and redirect to login page
session_start();
session_destroy();
header("Location: admin-login.html");
exit;
?>
