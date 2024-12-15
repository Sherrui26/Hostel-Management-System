<?php
function check_login() {
    if (!isset($_POST['username']) && isset($_POST['password'])) {
        $host = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = "index.php";        
        header("Location: http://$host$uri/$extra");
        exit();
    }
}
?>
