<?php
// To logout simply unset $_SESSION['user_id'] and redirect out of index.php
session_start();

if (isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);

}

header("Location: login.php");