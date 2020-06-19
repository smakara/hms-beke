
<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.10
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
    <head>
        <base href="./">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
        <meta name="author" content="Łukasz Holeczek">
        <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
        <title>Patient  Management System</title>
        <!-- Icons-->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="{{asset('template/vendors/@coreui/icons/css/coreui-icons.min.css')}}" rel="stylesheet">
        <link href="{{asset('template/vendors/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">
        <link href="{{asset('template/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('template/vendors/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
        <!-- Main styles for this application-->
        <link href="{{asset('template/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('template/vendors/pace-progress/css/pace.min.css')}}" rel="stylesheet">
        <!-- Global site tag (gtag.js) - Google Analytics-->
        <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></scri            pt>
            <script>
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                        dataLayer.push(arguments);
        }
                
        
                gtag('js', new Date());
        // Shared ID
                gtag('config', 'UA-118965717-3');
        // Bootstrap ID
                gtag('config', 'UA-118965717-5');
                </script>
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <h4>P.I.M.S</h4>
  <!--        <img class="navbar-brand-full" src="img/brand/logo.svg" width="89" height="25" alt="CoreUI Logo">
          <img class="navbar-brand-minimized" src="img/brand/sygnet.svg" width="30" height="30" alt="CoreUI Logo">-->
        </a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none pull-left" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>

    </header>