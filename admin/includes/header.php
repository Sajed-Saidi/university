<?php
require_once("../classes/Settings.class.php");
$Settings = new Settings();
$allSettings = $Settings->getAllSettings();
$allSettings = $allSettings[0];
// var_dump($allSettings);
// exit;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $allSettings['meta_description'] ?>">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="<?php echo $allSettings['meta_keywords'] ?>">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />
    <link rel="canonical" href="https://demo-basic.adminkit.io/" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> -->

    <title><?php echo $allSettings['meta_title'] ?></title>

    <link href="../assets/css/all.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/datatables/style.min.css" rel="stylesheet" />
    <link href="../assets/css/admin.css" rel="stylesheet">
    <link href="./stylebuttons.css" rel="stylesheet" />

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet"> -->

    <style>
        .edit i,
        .delete i {
            font-size: 26px !important;
        }

        .text-ellipsis {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
    ?>
    <div class="wrapper">
        <?php include("includes/sidebar.php"); ?>

        <div class="main">
            <?php include("includes/navbar.php"); ?>