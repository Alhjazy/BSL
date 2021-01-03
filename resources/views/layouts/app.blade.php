<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{--<script src="{{ asset('/public/js/app.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- tailwindcss CSS -->
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">--}}
    <!-- Styles -->
    {{--<link href="{{ asset('/public/css/app.css') }}" rel="stylesheet">--}}
    <!-- BEGIN: CSS Assets-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/jquery-editable/css/jquery-editable.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/poshytip/1.2/tip-yellowsimple/tip-yellowsimple.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/themes/base/jquery.ui.datepicker.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="https://assets.codepen.io/344846/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/resources/dist/css/app.css" />
    <!-- END: CSS Assets-->
    <!-- BEGIN: JS Assets-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="/resources/dist/js/tabulator/tabulator.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <!-- END: JS Assets-->
    <style>

        .variants {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .variants > div {
            margin-right: 5px;
        }

        .variants > div:last-of-type {
            margin-right: 0;
        }

        .file {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 20px;
            height: 20px;
            /* padding: 16px; */
            margin-right: 43px;
            margin-left: 43px;
        }

        .file > input[type='file'] {
            display: none
        }

        .file > label {
            font-size: 1rem;
            font-weight: 300;
            cursor: pointer;
            outline: 0;
            user-select: none;
            border-color: rgb(216, 216, 216) rgb(209, 209, 209) rgb(186, 186, 186);
            border-style: solid;
            border-radius: 4px;
            border-width: 1px;
            background-color: hsl(0, 0%, 100%);
            color: hsl(0, 0%, 29%);
            padding: 6px;
            padding-top: 8px;
            padding-bottom: 8px;
            /*padding-left: 16px;*/
            /*padding-right: 16px;*/
            /*padding-top: 16px;*/
            /*padding-bottom: 16px;*/
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .file > label:hover {
            border-color: hsl(0, 0%, 21%);
        }

        .file > label:active {
            background-color: hsl(0, 0%, 96%);
        }

        .file > label > i {
            padding-right: 5px;
        }

        .file--upload > label {
            color: hsl(204, 86%, 53%);
            border-color: hsl(204, 86%, 53%);
        }

        .file--upload > label:hover {
            border-color: hsl(204, 86%, 53%);
            background-color: hsl(204, 86%, 96%);
        }

        .file--upload > label:active {
            background-color: hsl(204, 86%, 91%);
        }

        .file--uploading > label {
            color: hsl(48, 100%, 67%);
            border-color: hsl(48, 100%, 67%);
        }

        .file--uploading > label > i {
            animation: pulse 5s infinite;
        }

        .file--uploading > label:hover {
            border-color: hsl(48, 100%, 67%);
            background-color: hsl(48, 100%, 96%);
        }

        .file--uploading > label:active {
            background-color: hsl(48, 100%, 91%);
        }

        .file--success > label {
            color: hsl(141, 71%, 48%);
            border-color: hsl(141, 71%, 48%);
        }

        .file--success > label:hover {
            border-color: hsl(141, 71%, 48%);
            background-color: hsl(141, 71%, 96%);
        }

        .file--success > label:active {
            background-color: hsl(141, 71%, 91%);
        }

        .file--danger > label {
            color: hsl(348, 100%, 61%);
            border-color: hsl(348, 100%, 61%);
        }

        .file--danger > label:hover {
            border-color: hsl(348, 100%, 61%);
            background-color: hsl(348, 100%, 96%);
        }

        .file--danger > label:active {
            background-color: hsl(348, 100%, 91%);
        }

        .file--disabled {
            cursor: not-allowed;
        }

        .file--disabled > label {
            border-color: #e6e7ef;
            color: #e6e7ef;
            pointer-events: none;
        }

        @keyframes pulse {
            0% {
                color: hsl(48, 100%, 67%);
            }
            50% {
                color: hsl(48, 100%, 38%);
            }
            100% {
                color: hsl(48, 100%, 67%);
            }
        }

        .select2-container--default .select2-selection--single{
            height: 36px;
            border: 1px solid #e2e8f0;
        }
        .select2-container .select2-selection--single .select2-selection__rendered{
            padding-top: 3px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow{
            top: 5px;
            right: 10px;
        }
        .locker {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8); /*lets make it semi-transparent */
            z-index: 9999; /*because you could set some z-indexes in your code before, so lets make sure that this will be over every elements in html*/
        }
        .loading-block{
            /*position: absolute; !*Can also be `fixed`*!*/
            left: 0;
            right: 0;
            /*top: 0;*/
            /*bottom: 0;*/
            margin: 15% auto;
            /*overflow: auto;*/
            position: absolute;
            z-index: 99999;
        }
        .lock-background {
            /*margin-top: 12%;*/
            /*height: 100%;*/
            /*width: 100%;*/
            z-index: 9999;
            background: #eee;
            /*top: 0;*/
            /*left: 0;*/
            position: absolute;
            opacity: 50%;
        }
    </style>
</head>
<!-- END: Head -->
<body class="app">
<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="/resources/dist/images/logo.svg">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="index.html" class="menu menu--active">
                <div class="menu__icon"> <i data-feather="home"></i> </div>
                <div class="menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="box"></i> </div>
                <div class="menu__title"> Menu Layout <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="index.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Side Menu </div>
                    </a>
                </li>
                <li>
                    <a href="simple-menu-light-dashboard.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Simple Menu </div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-light-dashboard.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Top Menu </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="side-menu-light-inbox.html" class="menu">
                <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="menu__title"> Inbox </div>
            </a>
        </li>
        <li>
            <a href="side-menu-light-file-manager.html" class="menu">
                <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="menu__title"> File Manager </div>
            </a>
        </li>
        <li>
            <a href="side-menu-light-point-of-sale.html" class="menu">
                <div class="menu__icon"> <i data-feather="credit-card"></i> </div>
                <div class="menu__title"> Point of Sale </div>
            </a>
        </li>
        <li>
            <a href="side-menu-light-chat.html" class="menu">
                <div class="menu__icon"> <i data-feather="message-square"></i> </div>
                <div class="menu__title"> Chat </div>
            </a>
        </li>
        <li>
            <a href="side-menu-light-post.html" class="menu">
                <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="menu__title"> Post </div>
            </a>
        </li>
        <li class="menu__devider my-6"></li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="edit"></i> </div>
                <div class="menu__title"> Crud <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-light-crud-data-list.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Data List </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-crud-form.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Form </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="users"></i> </div>
                <div class="menu__title"> Users <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-light-users-layout-1.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Layout 1 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-users-layout-2.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Layout 2 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-users-layout-3.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Layout 3 </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="trello"></i> </div>
                <div class="menu__title"> Profile <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-light-profile-overview-1.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Overview 1 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-profile-overview-2.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Overview 2 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-profile-overview-3.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Overview 3 </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="layout"></i> </div>
                <div class="menu__title"> Pages <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Wizards <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-wizard-layout-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-wizard-layout-2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 2</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-wizard-layout-3.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 3</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Blog <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-blog-layout-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-blog-layout-2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 2</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-blog-layout-3.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 3</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Pricing <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-pricing-layout-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-pricing-layout-2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 2</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Invoice <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-invoice-layout-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-invoice-layout-2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 2</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> FAQ <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-faq-layout-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-faq-layout-2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 2</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-faq-layout-3.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 3</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="login-light-login.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Login </div>
                    </a>
                </li>
                <li>
                    <a href="login-light-register.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Register </div>
                    </a>
                </li>
                <li>
                    <a href="main-light-error-page.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Error Page </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-update-profile.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Update profile </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-change-password.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Change Password </div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu__devider my-6"></li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="menu__title"> Components <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Table <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-regular-table.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Regular Table</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-tabulator.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Tabulator</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="side-menu-light-accordion.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Accordion </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-button.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Button </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-modal.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Modal </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-alert.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Alert </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-progress-bar.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Progress Bar </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-tooltip.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Tooltip </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-dropdown.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Dropdown </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-toast.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Toast </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-typography.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Typography </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-icon.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Icon </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-loading-icon.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Loading Icon </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="sidebar"></i> </div>
                <div class="menu__title"> Forms <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-light-regular-form.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Regular Form </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-datepicker.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Datepicker </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-tail-select.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Tail Select </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-file-upload.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> File Upload </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-wysiwyg-editor.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Wysiwyg Editor </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-validation.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Validation </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="menu__title"> Widgets <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-light-chart.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Chart </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-slider.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Slider </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-image-zoom.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Image Zoom </div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- END: Mobile Menu -->
<!-- BEGIN: Top Bar -->
<div class="border-b border-theme-24 -mt-10 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 pt-3 md:pt-0 mb-10">
    <div class="top-bar-boxed flex items-center">
        <!-- BEGIN: Logo -->
        <a href="" class="-intro-x hidden md:flex">
            <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="/resources/dist/images/logo.svg">
            <span class="text-white text-lg ml-3"> Open<span class="font-medium">Roads</span> </span>
        </a>
        <!-- END: Logo -->
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb breadcrumb--light mr-auto"> <a href="" class="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Search -->
        <div class="intro-x relative mr-3 sm:mr-6">
            <div class="search hidden sm:block">
                <input type="text" class="search__input input dark:bg-dark-1 placeholder-theme-13" placeholder="Search...">
                <i data-feather="search" class="search__icon dark:text-gray-300"></i>
            </div>
            <a class="notification notification--light sm:hidden" href=""> <i data-feather="search" class="notification__icon dark:text-gray-300"></i> </a>
            <div class="search-result">
                <div class="search-result__content">
                    <div class="search-result__content__title">Pages</div>
                    <div class="mb-5">
                        <a href="" class="flex items-center">
                            <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="inbox"></i> </div>
                            <div class="ml-3">Mail Settings</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="users"></i> </div>
                            <div class="ml-3">Users & Permissions</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="credit-card"></i> </div>
                            <div class="ml-3">Transactions Report</div>
                        </a>
                    </div>
                    <div class="search-result__content__title">Users</div>
                    <div class="mb-5">
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/resources/dist/images/profile-10.jpg">
                            </div>
                            <div class="ml-3">Sylvester Stallone</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">sylvesterstallone@left4code.com</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/resources/dist/images/profile-9.jpg">
                            </div>
                            <div class="ml-3">Denzel Washington</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">denzelwashington@left4code.com</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/resources/dist/images/profile-11.jpg">
                            </div>
                            <div class="ml-3">Denzel Washington</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">denzelwashington@left4code.com</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/resources/dist/images/profile-5.jpg">
                            </div>
                            <div class="ml-3">Russell Crowe</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">russellcrowe@left4code.com</div>
                        </a>
                    </div>
                    <div class="search-result__content__title">Products</div>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/resources/dist/images/preview-10.jpg">
                        </div>
                        <div class="ml-3">Sony A7 III</div>
                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Photography</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/resources/dist/images/preview-5.jpg">
                        </div>
                        <div class="ml-3">Samsung Q90 QLED TV</div>
                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/resources/dist/images/preview-11.jpg">
                        </div>
                        <div class="ml-3">Samsung Galaxy S20 Ultra</div>
                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Smartphone &amp; Tablet</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/resources/dist/images/preview-4.jpg">
                        </div>
                        <div class="ml-3">Samsung Galaxy S20 Ultra</div>
                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Smartphone &amp; Tablet</div>
                    </a>
                </div>
            </div>
        </div>
        <!-- END: Search -->
        <!-- BEGIN: Notifications -->
        <div class="intro-x dropdown mr-4 sm:mr-6">
            <div class="dropdown-toggle notification notification--light notification--bullet cursor-pointer"> <i data-feather="bell" class="notification__icon dark:text-gray-300"></i> </div>
            <div class="notification-content pt-2 dropdown-box">
                <div class="notification-content__box dropdown-box__content box dark:bg-dark-6">
                    <div class="notification-content__title">Notifications</div>
                    <div class="cursor-pointer relative flex items-center ">
                        <div class="w-12 h-12 flex-none image-fit mr-1">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/resources/dist/images/profile-10.jpg">
                            <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                        </div>
                        <div class="ml-2 overflow-hidden">
                            <div class="flex items-center">
                                <a href="javascript:;" class="font-medium truncate mr-5">Sylvester Stallone</a>
                                <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">05:09 AM</div>
                            </div>
                            <div class="w-full truncate text-gray-600 mt-0.5">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                        </div>
                    </div>
                    <div class="cursor-pointer relative flex items-center mt-5">
                        <div class="w-12 h-12 flex-none image-fit mr-1">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/resources/dist/images/profile-9.jpg">
                            <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                        </div>
                        <div class="ml-2 overflow-hidden">
                            <div class="flex items-center">
                                <a href="javascript:;" class="font-medium truncate mr-5">Denzel Washington</a>
                                <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">05:09 AM</div>
                            </div>
                            <div class="w-full truncate text-gray-600 mt-0.5">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomi</div>
                        </div>
                    </div>
                    <div class="cursor-pointer relative flex items-center mt-5">
                        <div class="w-12 h-12 flex-none image-fit mr-1">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/resources/dist/images/profile-11.jpg">
                            <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                        </div>
                        <div class="ml-2 overflow-hidden">
                            <div class="flex items-center">
                                <a href="javascript:;" class="font-medium truncate mr-5">Denzel Washington</a>
                                <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">05:09 AM</div>
                            </div>
                            <div class="w-full truncate text-gray-600 mt-0.5">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                        </div>
                    </div>
                    <div class="cursor-pointer relative flex items-center mt-5">
                        <div class="w-12 h-12 flex-none image-fit mr-1">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/resources/dist/images/profile-5.jpg">
                            <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                        </div>
                        <div class="ml-2 overflow-hidden">
                            <div class="flex items-center">
                                <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a>
                                <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">05:09 AM</div>
                            </div>
                            <div class="w-full truncate text-gray-600 mt-0.5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                        </div>
                    </div>
                    <div class="cursor-pointer relative flex items-center mt-5">
                        <div class="w-12 h-12 flex-none image-fit mr-1">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/resources/dist/images/profile-2.jpg">
                            <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                        </div>
                        <div class="ml-2 overflow-hidden">
                            <div class="flex items-center">
                                <a href="javascript:;" class="font-medium truncate mr-5">Tom Cruise</a>
                                <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                            </div>
                            <div class="w-full truncate text-gray-600 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Notifications -->
        <!-- BEGIN: Account Menu -->
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110">
                <img alt="Midone Tailwind HTML Admin Template" src="/resources/dist/images/profile-3.jpg">
            </div>
            <div class="dropdown-box w-56">
                <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                    <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                        <div class="font-medium">Sylvester Stallone</div>
                        <div class="text-xs text-theme-41 mt-0.5 dark:text-gray-600">Backend Engineer</div>
                    </div>
                    <div class="p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                    </div>
                    <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>
</div>
<!-- END: Top Bar -->
<!-- BEGIN: Top Menu -->
<nav class="top-nav">
    <ul>
        <li>
            <a href="/" class="top-menu {{Request::segment(1) === 'home' ? 'top-menu--active' : ''}}">
                <div class="top-menu__icon"> <i data-feather="home"></i> </div>
                <div class="top-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="/purchase" class="top-menu {{Request::segment(1) === 'purchase' ? 'top-menu--active' : ''}} ">
                <div class="top-menu__icon"> <i data-feather="package"></i> </div>
                <div class="top-menu__title"> PURCHASE'S <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="/purchase" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="top-menu__title">PURCHASE SUMMARY</div>
                    </a>
                </li>
                <li>
                    <a href="/purchase/orders" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="top-menu__title">PURCHASE ORDERS</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/sales" class="top-menu {{Request::segment(1) === 'sales' ? 'top-menu--active' : ''}}">
                <div class="top-menu__icon"> <i data-feather="shopping-bag"></i> </div>
                <div class="top-menu__title"> SALES <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="/sales" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="top-menu__title"> Sales Summary </div>
                    </a>
                </li>
                <li>
                    <a href="/sales/orders" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="top-menu__title"> Sales Orders </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/accountant" class="top-menu {{Request::segment(1) === 'accountant' ? 'top-menu--active' : ''}}">
                <div class="top-menu__icon"> <i data-feather="dollar-sign"></i> </div>
                <div class="top-menu__title"> ACCOUNTANT <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="/hrms/employee" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="top-menu__title"> Employee's </div>
                    </a>
                </li>
                <li>
                    <a href="/hrms/employee/salaries" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Employee's Salaries </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/inventory" class="top-menu {{Request::segment(1) === 'inventory' ? 'top-menu--active' : ''}}">
                <div class="top-menu__icon"> <i data-feather="package"></i> </div>
                <div class="top-menu__title"> INVENTORY <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="/inventory/products" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="top-menu__title"> Products </div>
                    </a>
                </li>
                <li>
                    <a href="/hrms/employee/salaries" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Employee's Salaries </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/hrms" class="top-menu {{Request::segment(1) === 'hrms' ? 'top-menu--active' : ''}}">
                <div class="top-menu__icon"> <i data-feather="slack"></i> </div>
                <div class="top-menu__title"> HRMS <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="/hrms/employee" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="top-menu__title"> Employee's </div>
                    </a>
                </li>
                <li>
                    <a href="/hrms/employee/salaries" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Employee's Salaries </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/reports" class="top-menu {{Request::segment(1) === 'reports' ? 'top-menu--active' : ''}}">
                <div class="top-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="top-menu__title"> REPORT'S <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="/hrms/employee" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="top-menu__title"> Employee's </div>
                    </a>
                </li>
                <li>
                    <a href="/hrms/employee/salaries" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Employee's Salaries </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/apps" class="top-menu {{Request::segment(1) === 'apps' ? 'top-menu--active' : ''}}">
                <div class="top-menu__icon"> <i data-feather="database"></i> </div>
                <div class="top-menu__title"> Apps <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="javascript:;" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Users <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="top-menu-light-users-layout-1.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="top-menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="top-menu-light-users-layout-2.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="top-menu__title">Layout 2</div>
                            </a>
                        </li>
                        <li>
                            <a href="top-menu-light-users-layout-3.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="top-menu__title">Layout 3</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Profile <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="top-menu-light-profile-overview-1.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="top-menu__title">Overview 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="top-menu-light-profile-overview-2.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="top-menu__title">Overview 2</div>
                            </a>
                        </li>
                        <li>
                            <a href="top-menu-light-profile-overview-3.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="top-menu__title">Overview 3</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="top-menu-light-inbox.html" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Inbox </div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-light-file-manager.html" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> File Manager </div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-light-point-of-sale.html" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Point of Sale </div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-light-chat.html" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Chat </div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-light-post.html" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Post </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Crud <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-crud-data-list.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="top-menu__title">Data List</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-crud-form.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="top-menu__title">Form</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="/settings" class="top-menu {{Request::segment(1) === 'settings' ? 'top-menu--active' : ''}}">
                <div class="top-menu__icon"> <i data-feather="cpu"></i> </div>
                <div class="top-menu__title"> SETTINGS <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="/settings/companyinfo" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Company Information </div>
                    </a>
                </li>
                <li>
                    <a href="/settings/departments" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Departments Information</div>
                    </a>
                </li>
                <li>
                    <a href="/settings/branchs" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Branch's Information</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Profile <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="top-menu-light-profile-overview-1.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="top-menu__title">Overview 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="top-menu-light-profile-overview-2.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="top-menu__title">Overview 2</div>
                            </a>
                        </li>
                        <li>
                            <a href="top-menu-light-profile-overview-3.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="top-menu__title">Overview 3</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="top-menu-light-inbox.html" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Inbox </div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-light-file-manager.html" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> File Manager </div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-light-point-of-sale.html" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Point of Sale </div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-light-chat.html" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Chat </div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-light-post.html" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Post </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="top-menu">
                        <div class="top-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="top-menu__title"> Crud <i data-feather="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-crud-data-list.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="top-menu__title">Data List</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-crud-form.html" class="top-menu">
                                <div class="top-menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="top-menu__title">Form</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- END: Top Menu -->
<!-- BEGIN: Content -->
<div class="content">
    @yield('content')
</div>
<!-- END: Content -->
<!-- BEGIN: Dark Mode Switcher-->
{{--<div data-url="top-menu-dark-dashboard.html" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">--}}
    {{--<div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>--}}
    {{--<div class="dark-mode-switcher__toggle border"></div>--}}
{{--</div>--}}
<!-- END: Dark Mode Switcher-->
<!-- BEGIN: JS Assets-->
<script src="/resources/core_data/app/core.js"></script>
<script src="/resources/dist/js/app.js"></script>
<!-- END: JS Assets-->
</body>
</html>
