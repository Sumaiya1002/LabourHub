<?php
    include("session_c.php");
    session_destroy();
    header("location:index.php");
?>