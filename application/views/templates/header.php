<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        /* for sm */

        .custom-switch.custom-switch-sm .custom-control-label {
            padding-left: 1rem;
            padding-bottom: 1rem;
        }

        .custom-switch.custom-switch-sm .custom-control-label::before {
            height: 1rem;
            width: calc(1rem + 0.75rem);
            border-radius: 2rem;
        }

        .custom-switch.custom-switch-sm .custom-control-label::after {
            width: calc(1rem - 4px);
            height: calc(1rem - 4px);
            border-radius: calc(1rem - (1rem / 2));
        }

        .custom-switch.custom-switch-sm .custom-control-input:checked ~ .custom-control-label::after {
            transform: translateX(calc(1rem - 0.25rem));
        }

        /* for md */

        .custom-switch.custom-switch-md .custom-control-label {
            padding-left: 2rem;
            padding-bottom: 1.5rem;
        }

        .custom-switch.custom-switch-md .custom-control-label::before {
            height: 1.5rem;
            width: calc(2rem + 0.75rem);
            border-radius: 3rem;
        }

        .custom-switch.custom-switch-md .custom-control-label::after {
            width: calc(1.5rem - 4px);
            height: calc(1.5rem - 4px);
            border-radius: calc(2rem - (1.5rem / 2));
        }

        .custom-switch.custom-switch-md .custom-control-input:checked ~ .custom-control-label::after {
            transform: translateX(calc(1.5rem - 0.25rem));
        }

        /* for lg */

        .custom-switch.custom-switch-lg .custom-control-label {
            padding-left: 3rem;
            padding-bottom: 2rem;
        }

        .custom-switch.custom-switch-lg .custom-control-label::before {
            height: 2rem;
            width: calc(3rem + 0.75rem);
            border-radius: 4rem;
        }

        .custom-switch.custom-switch-lg .custom-control-label::after {
            width: calc(2rem - 4px);
            height: calc(2rem - 4px);
            border-radius: calc(3rem - (2rem / 2));
        }

        .custom-switch.custom-switch-lg .custom-control-input:checked ~ .custom-control-label::after {
            transform: translateX(calc(2rem - 0.25rem));
        }

        /* for xl */

        .custom-switch.custom-switch-xl .custom-control-label {
            padding-left: 4rem;
            padding-bottom: 2.5rem;
        }

        .custom-switch.custom-switch-xl .custom-control-label::before {
            height: 2.5rem;
            width: calc(4rem + 0.75rem);
            border-radius: 5rem;
        }

        .custom-switch.custom-switch-xl .custom-control-label::after {
            width: calc(2.5rem - 4px);
            height: calc(2.5rem - 4px);
            border-radius: calc(4rem - (2.5rem / 2));
        }

        .custom-switch.custom-switch-xl .custom-control-input:checked ~ .custom-control-label::after {
            transform: translateX(calc(2.5rem - 0.25rem));
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
