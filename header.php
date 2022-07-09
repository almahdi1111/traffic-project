<?php
require_once("db_connection.php");
require("DatabaseOpreation.php");
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>traffic project</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body onload="paging(
    <?php

    if(isset($_GET['pagenumber']))

    echo $_GET['pagenumber'];

    else echo "0";
     echo ",'";

    echo substr($_SERVER['SCRIPT_NAME'],9)."'";
     ?>
     )"
     >


    <nav class="navbar navbar-light navbar-expand-lg navigation-clean">
        <div class="container"><a class="navbar-brand" href="#">نظام رصد المخالفات</a><button data-bs-toggle="collapse"
                class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">الرصد</a></li>
                    <li class="nav-item"><a class="nav-link" href="Detials.php">المخالفات</a></li>
                </ul>
            </div>
        </div>
        
    </nav>

