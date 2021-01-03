@extends('layouts.app')
{{--@section('sidebarMenuSections')--}}
    {{--<button class="relative text-sm focus:outline-none group">--}}
    {{--<div id="sidebarItemsParentMenuSections" class="flex items-center justify-between w-full h-16 px-4 border-b border-gray-300 hover:bg-gray-300">--}}
    {{--<span  class="font-medium">--}}
    {{--HRMS--}}
    {{--</span>--}}
    {{--<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">--}}
    {{--<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />--}}
    {{--</svg>--}}
    {{--</div>--}}
    {{--<div class="absolute z-10 flex-col items-start hidden w-full pb-1 bg-white shadow-lg group-focus:flex">--}}
    {{--<a class="ItemsMenuSections w-full px-4 py-2 text-left hover:bg-gray-300" href="/menu/items/employee">Employee's</a>--}}
    {{--</div>--}}
    {{--</button>--}}

    {{--<!-- This is an example component -->--}}
    {{--<div class="relative text-sm focus:outline-none group">--}}
        {{--<select class="ItemsMenuSections w-full h-16 px-4 flex items-center justify-between text-left  border-b border-gray-300 hover:bg-gray-300 hover:bg-gray-300">--}}
            {{--<option class="font-medium">Choose a color</option>--}}
            {{--<option value="/menu/items/employee" class="font-medium">Employee's</option>--}}
            {{--<option value="#">Employee's Salaries</option>--}}
        {{--</select>--}}
    {{--</div>--}}
    {{--<div id="sidebarItemsMenu" class="flex flex-col flex-grow p-4 overflow-auto">--}}

    {{--</div>--}}
    {{--<script>--}}
        {{--$('.ItemsMenuSections').change(function (e) {--}}

            {{--$("#sidebarItemsMenu").load($(this).val(), function(responseTxt, statusTxt, xhr){--}}
                {{--console.log(statusTxt);--}}
                {{--if(statusTxt === 'success')--}}
                    {{--$("#sidebarItemsMenu").html(responseTxt);--}}
                {{--if(statusTxt === 'error'){--}}
                    {{--$("#sidebarItemsMenu").html(' ');--}}
                    {{--alert("Error: " + xhr.status + ": " + xhr.statusText);--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
{{--@endsection--}}
@section('content')
    <div class="flex-grow flex overflow-x-hidden">
        <div class="xl:w-72 w-48 flex-shrink-0 border-r border-gray-200 dark:border-gray-800 h-full overflow-y-auto lg:block hidden p-5">
            <button onclick="return load('/hrms/employee/register');" class="float-right bg-white p-2 w-25 mb-3 rounded-md dark:bg-white text-blue-500 shadow" ><i class="fas fa-user-plus fa-lg"></i></button>
            <div class="text-lg mb-3 mt-2 text-gray-400 tracking-wider">Employee's </div>
            <div class="relative mt-2">
                <input type="text" class="pl-8 h-9 bg-transparent border border-gray-300 dark:border-gray-700 dark:text-white w-full rounded-md text-sm" placeholder="Search" />
                <svg viewBox="0 0 24 24" class="w-4 absolute text-gray-400 top-1/2 transform translate-x-0.5 -translate-y-1/2 left-2" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
            <div class="space-y-4 mt-3">
                @if($employees) @foreach($employees as $k => $v)
                    <button  data-url="/hrms/employee/{{$v->id}}/profile" data-id="{{$v->id}}" class="target bg-white p-3 w-full flex flex-col rounded-md dark:bg-gray-800 shadow">
                        <div class="flex xl:flex-row flex-col items-center font-medium text-gray-900 dark:text-white pb-2 mb-2 xl:border-b border-gray-200 border-opacity-75 dark:border-gray-700 w-full">
                            <img src="/resources/employees/profiles/{{$v->username}}/{{$v->profile_image}}" class="w-7 h-7 mr-2 rounded-full" alt="profile" />
                           {{$v->name}}
                        </div>
                        <div class="flex items-center w-full">
                            <div class="text-xs py-1 px-2 leading-none dark:bg-gray-900 bg-blue-100 text-blue-500 rounded-md">{{!empty($v->department) ? $v->department->name : 'New Join'}}</div>
                            <div class="ml-auto text-xs py-1 px-2 leading-none dark:bg-gray-900 bg-blue-100 text-red-500 rounded-md">{{!empty($v->role) ? $v->role->title : 'New Join'}}</div>
                            <div class="ml-auto text-xs text-gray-500">$1,902.00</div>
                        </div>
                    </button>
               @endforeach @endif
            </div>
        </div>
        <div id="AjaxShowContent" class="flex-grow bg-white dark:bg-gray-900 overflow-y-auto"></div>
    </div>
    <script>
        $('button.target').click(function () {
            if ($('button.target').hasClass('relative ring-2 ring-blue-500 focus:outline-none')){
                $('button.target').removeClass('relative ring-2 ring-blue-500 focus:outline-none');
            }
            $(this).addClass('relative ring-2 ring-blue-500 focus:outline-none');
            return load($(this).attr('data-url'));
        });
        function load(url) {
            $('#AjaxShowContent').load(url, function(responseTxt, statusTxt, xhr){
                if(statusTxt == "success")

                if(statusTxt == "error")
                    alert("Error: " + xhr.status + ": " + xhr.statusText);
            });
        }
    </script>
@endsection
