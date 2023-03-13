<!DOCTYPE html>
<html lang="en">

<?php

use api\Api;

require_once("api/api.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="RTCShop เว็บไซต์ขายของสหกร" />
    <meta name="title" content="RTCShop เว็บไซต์ขายของสหกร" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="RTCShop เว็บไซต์ขายของสหกร" />
    <meta property="og:description" content="RTCShop เว็บไซต์ขายของสหกร" />
    <title>RTCShop เว็บไซต์ขายของสหกร</title>
    <link rel="icon" type="image/x-icon" href="<?php Api::base_url('assets/img/logo.png') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?php Api::base_url('/assets/css/adminlte.min.css?v=' . rand(1, 9999999999) . '') ?>">
    <link rel="stylesheet" href="<?php Api::base_url('/assets/css/bootstrap-steps.css?v=' . rand(1, 9999999999) . '') ?>">
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/178efd6c64.js" crossorigin="anonymous"></script>
    <!-- REQUIRED SCRIPTS -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?php Api::base_url('plugin/bs-stepper/css/bs-stepper.min.css?v=' . rand(1, 9999999999) . '') ?>">
    <!-- jQuery -->
    <script src="<?php Api::base_url('plugin/jquery/jquery.min.js?v=' . rand(1, 9999999999) . '') ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php Api::base_url('plugin/bootstrap/js/bootstrap.bundle.min.js?v=' . rand(1, 9999999999) . '') ?>"></script>
    <!-- AdminLTE -->
    <script src="<?php Api::base_url('assets/js/adminlte.js?v=' . rand(1, 9999999999) . '') ?>"></script>
    <!-- BS-Stepper -->
    <script src="<?php Api::base_url('plugin/simple-datatables/simple-datatables.js?v=' . rand(1, 9999999999) . '') ?>"></script>
    <link rel="stylesheet" href="<?php Api::base_url('plugin/simple-datatables/style.css?v=' . rand(1, 9999999999) . '') ?>">
    <!-- Simple-datatables -->
    <script src="<?php Api::base_url('plugin/bs-stepper/js/bs-stepper.min.js?v=' . rand(1, 9999999999) . '') ?>"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="<?php Api::base_url('plugin/chart.js/Chart.min.js?v=' . rand(1, 9999999999) . '') ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php Api::base_url('assets/js/demo.js?v=' . rand(1, 9999999999) . '') ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php Api::base_url('assets/js/pages/dashboard3.js?v=' . rand(1, 9999999999) . '') ?>"></script>
    <!-- bs-custom-file-input -->
    <script src="<?php Api::base_url('plugin/bs-custom-file-input/bs-custom-file-input.min.js?v=' . rand(1, 9999999999) . '') ?>"></script>