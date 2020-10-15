<?php

session_start();

// Should create variable $choice, $throw and $outcome
if (isset($_SESSION['results'])) {
    extract($_SESSION['results']);
    $have_results = true;
} else {
    $have_results = false;
}

$_SESSION['results'] = null;

require 'index-view.php';