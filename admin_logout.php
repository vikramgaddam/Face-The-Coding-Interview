<?php
session_start();
unset($_SESSION['admin_valid']);
session_destroy();
?>