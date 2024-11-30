<?php
    session_start();
    session_destroy();
    header("location:/projects/ntasProjekt/index.php");
    exit();
?>