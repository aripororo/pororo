<?php
session_start();
session_unset();
session_destroy();
header("Location: /pwpb/Menu-Makan/login.php");
exit();