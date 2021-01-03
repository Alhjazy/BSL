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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <!-- Styles -->
    {{--<link href="{{ asset('/public/css/app.css') }}" rel="stylesheet">--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/jquery-editable/css/jquery-editable.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/poshytip/1.2/tip-yellowsimple/tip-yellowsimple.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/themes/base/jquery.ui.datepicker.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="https://assets.codepen.io/344846/style.css" rel="stylesheet">
    <style>
        .group:focus .group-focus\:flex {
            display: flex;
        }
        .rotate-45 {
            --transform-rotate: 45deg;
            transform: rotate(45deg);
        }
        div.sidebaricons a{
            font-size: 25px;
        }
    </style>

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

</head>
<body>
<div class="flex w-screen h-screen text-gray-700">
    <!-- Component Start -->
    <div id="sidebar" class="sidebaricons flex flex-col items-center w-16 pb-4 overflow-auto border-r border-gray-300 bg-gray-200">
        <a class="flex items-center justify-center flex-shrink-0 w-full h-16 bg-gray-300 mb-4" href="#">
            <svg class="w-8 h-8"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
        </a>
        <a class="w-10 h-10  pl-2  rounded-lg bg-blue-500 text-white hover:bg-blue-600" data-section="dashboard" data-title="Dashboard" href="/home"><i class="fab fa-chromecast "></i></a>
        <a style="padding-left: 0.29em;" class="w-10 h-10 mt-4  rounded-lg bg-blue-500 text-white hover:bg-blue-600" data-section="hrms" href="/hrms"><i class="fas fa-id-card-alt "></i></a>
        <a class="relative w-10 h-10 rounded-lg bg-gray-400 mt-4 hover:bg-gray-500" href="#">
        <a class="w-10 h-10 rounded-lg bg-gray-400 mt-4 shadow-outline border-4 border-gray-300 " href="#"></a>
        <a class="relative w-10 h-10 rounded-lg bg-gray-400 mt-4 hover:bg-gray-500" href="#">
            <span class="absolute w-3 h-3 rounded-full bg-blue-400 top-0 right-0 -mt-1 -mr-1"></span>
        </a>
        <a class="w-10 h-10 rounded-lg bg-gray-400 mt-4 shadow-outline border-4 border-gray-300 " href="#"></a>
        <a class="w-10 h-10 rounded-lg bg-gray-400 mt-4 hover:bg-gray-500" href="#"></a>
        <a class="flex items-center justify-center w-10 h-10 rounded-lg bg-transparent mt-4 hover:bg-gray-400" href="#">
            <svg class="w-6 h-6 fill-current" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
        </a>
        <a class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-auto rounded hover:bg-gray-300 " href="#">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </a>
        </a>
    </div>

    <div id="sidebarMenuDashboard"  style="display: none;" class="sidebarMenu flex flex-col w-56 border-r border-gray-300">
        <select class="ItemsMenuSections w-full h-16 px-4 flex items-center justify-between text-left  border-b border-gray-300 hover:bg-gray-300 hover:bg-gray-300">
            <option value="dashboard" class="font-medium">Dashboard</option>
            <option value="employee" class="font-medium">Employee's</option>
            <option value="#">Employee's Salaries</option>
        </select>
        <div data-section="dashboard" class="flex flex-col flex-grow p-4 overflow-auto">
            <a class="itemsLink flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300" href="/hrms">
                <span class="leading-none">Home</span>
            </a>
            <a class="itemsLink flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300" href="/hrms/employee/register">
                <span class="leading-none">Items</span>
            </a>
        </div>
        <div data-section="employee" style="display: none;" class="flex flex-col flex-grow p-4 overflow-auto">
            <a class="itemsLink flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300" href="/hrms">
                <span class="leading-none">Employee's</span>
            </a>
            <a class="itemsLink flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300" href="/hrms/employee/register">
                <span class="leading-none">Register Employee</span>
            </a>
        </div>
    </div>

    <div id="sidebarMenuHrms" style="display: none;"  class="sidebarMenu flex flex-col w-56 border-r border-gray-300">
        <div class="relative text-sm focus:outline-none group">
            <select class="ItemsMenuSections w-full h-16 px-4 flex items-center justify-between text-left  border-b border-gray-300 hover:bg-gray-300 hover:bg-gray-300">
                <option value="/hrms" class="font-medium">HRMS</option>
                <option value="/menu/items/employee" class="font-medium">Employee's</option>
                <option value="#">Employee's Salaries</option>
            </select>
        </div>
        <div id="sidebarItemsMenu" class="flex flex-col flex-grow p-4 overflow-auto">

        </div>
    </div>

    <div id="content-view" class="flex flex-col flex-grow">
        <div class="flex items-center flex-shrink-0 h-16 px-8 border-b border-gray-300">
            <h1 class="text-lg font-medium">Page Title</h1>
            <button class="flex items-center justify-center h-10 px-4 ml-auto text-sm font-medium rounded hover:bg-gray-300">
                Action 1
            </button>
            <button class="flex items-center justify-center h-10 px-4 ml-2 text-sm font-medium bg-gray-200 rounded hover:bg-gray-300">
                Action 2
            </button>
            <button class="relative ml-2 text-sm focus:outline-none group">
                <div class="flex items-center justify-between w-10 h-10 rounded hover:bg-gray-300">
                    <svg class="w-5 h-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </div>
                <div class="absolute right-0 flex-col items-start hidden w-40 pb-1 bg-white border border-gray-300 shadow-lg group-focus:flex">
                    <a class="w-full px-4 py-2 text-left hover:bg-gray-300" href="#">Menu Item 1</a>
                    <a class="w-full px-4 py-2 text-left hover:bg-gray-300" href="#">Menu Item 1</a>
                    <a class="w-full px-4 py-2 text-left hover:bg-gray-300" href="#">Menu Item 1</a>
                </div>
            </button>
        </div>
        @yield('content')
    </div>
    <!-- Component End  -->
</div>

<script>
    $('#sidebar a').click(function (e) {
        e.preventDefault();
       var section = $(this).data('section');
        $('.sidebarMenu').hide();
        switch (section) {
            case 'dashboard':
                $('#sidebarMenuDashboard').toggle();
                break;
            case 'hrms':
                $('#sidebarMenuHrms').toggle();
                break;
        }
    });
    $('.ItemsMenuSections').change(function () {
        var section = $(this).val();
        $(this).parent().find('div').hide();
        $(this).parent().find("div[data-section='" + section + "']").show();
    });
</script>
</body>
</html>
