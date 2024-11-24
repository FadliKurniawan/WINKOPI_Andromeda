<?php
session_start();
session_destroy(); // Menghapus semua session
header("Location: login_admin.php");
exit();
