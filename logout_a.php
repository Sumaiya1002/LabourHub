<?php
    include("session_a.php");
    session_destroy();
    header("location:index.php");
?>