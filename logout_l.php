<?php
    include("session_l.php");
    session_destroy();
    header("location:index.php");
?>