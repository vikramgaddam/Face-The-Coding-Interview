<?php
session_start();
unset($_SESSION['uname']);
unset($_SESSION['cienciaid']);
unset($_SESSION['valid']);
header('Refresh: 2; URL = index.php');
echo "you have logged  out successfully";

?>