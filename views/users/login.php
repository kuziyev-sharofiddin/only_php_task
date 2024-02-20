<!DOCTYPE html>

<html lang="en">

<head>
    <base href="" />
    <title>Login</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="/assets/media/logos/favicon.ico" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="/image/favicon.svg" />
</head>

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="app-container container-lg  pt-10">
        <div class="content-header row mb-6">
            <div class="content-header-left col-6 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-4">Login</h2>
                        <div class="breadcrumb-wrapper d-flex align-items-center  justify-content-between">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-flush p-10">
            <form id="kt_docs_formvalidation_text" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="/Controller/User.php" method="POST">
                <div class="fv-row mb-10 row fv-plugins-icon-container">
                    <div class="col-3 d-flex align-items-center justify-content-end">
                        <label class="required fw-semibold fs-4 mb-2">Username</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="username" value="" class="form-control form-control-solid mb-3 mb-lg-0">
                        <div class="fv-plugins-message-container invalid-feedback">
                        </div></div>
                </div>
                <div class="fv-row mb-10 row fv-plugins-icon-container">
                    <div class="col-3 d-flex align-items-center justify-content-end">
                        <label class="required fw-semibold fs-4 mb-2">Password</label>
                    </div>
                    <div class="col-7">
                        <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0">
                        <div class="fv-plugins-message-container invalid-feedback">
                        </div></div>
                </div>
                <div class="row">
                    <div class="offset-3 col-7">
                        <button id="kt_docs_formvalidation_text_submit" name="submit" type="submit" class="btn btn-primary btn-sm">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php 
require_once(__DIR__) . '/../includes/footer.php';
?> 