@extends('layouts.app')

@section('content')
    <div class="flex-grow flex overflow-x-hidden">
        <div class="flex-grow bg-white dark:bg-gray-900 overflow-y-auto">
            <div class="sm:px-7 sm:pt-7 px-4 pt-4 flex flex-col w-full border-b border-gray-200 bg-white dark:bg-gray-900 dark:text-white dark:border-gray-800 sticky top-0">
                <div class="flex w-full items-center">
                    <div class="flex items-center text-3xl text-gray-900 dark:text-white">
                        <i class="dark:bg-gray-700 dark:text-white rounded-md fas fa-sliders-h fa-lg"></i> &nbsp;
                        Settings
                    </div>
                    <div class="ml-auto sm:flex hidden items-center justify-end">
                        <div class="text-right">
                            <div class="text-xs text-gray-400 dark:text-gray-400">Account balance:</div>
                            <div class="text-gray-900 text-lg dark:text-white">$2,794.00</div>
                        </div>
                        <button class="w-8 h-8 ml-4 text-gray-400 shadow dark:text-gray-400 rounded-full flex items-center justify-center border border-gray-200 dark:border-gray-700">
                            <svg viewBox="0 0 24 24" class="w-4" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="1"></circle>
                                <circle cx="19" cy="12" r="1"></circle>
                                <circle cx="5" cy="12" r="1"></circle>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="flex items-center space-x-3 sm:mt-7 mt-4">
                    <a href="#" class="px-3 border-b-2 border-blue-500 text-blue-500 dark:text-white dark:border-white pb-1.5">Company Information</a>
                    <a href="/settings/departments" class="px-3 border-b-2 border-transparent text-gray-600 dark:text-gray-400 pb-1.5">Departments</a>
                    <a href="/settings/branchs" class="px-3 border-b-2 border-transparent text-gray-600 dark:text-gray-400 pb-1.5 sm:block hidden">Branch's</a>
                    <a href="#" class="px-3 border-b-2 border-transparent text-gray-600 dark:text-gray-400 pb-1.5 sm:block hidden">Notifications</a>
                    <a href="#" class="px-3 border-b-2 border-transparent text-gray-600 dark:text-gray-400 pb-1.5 sm:block hidden">Cards</a>
                </div>
            </div>
            <div class="sm:p-7 p-4">
                <div class="flex w-full items-center mb-7">
                    <div class="ml-auto text-gray-500 text-md  items-center">
                        <button id="enable" class="inline-flex items-center  justify-center text-gray-400 rounded-md shadow border border-gray-400 dark:border-gray-800 leading-none py-0">
                            Enable / Disable
                        </button>
                    </div>
                </div>
                <!-- component -->
                <table id="company" class="min-w-full bg-white dark:bg-gray-900 dark:text-white">
                    <tbody>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="bg-white dark:bg-gray-900 dark:text-white text-sm leading-5 text-blue-900">Company Name : </div>
                            </td>
                            <td id="name" data-type="text" data-pk="1" data-title="Enter company name" class="editable editable-click bg-white dark:bg-gray-900 dark:text-white px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$info ? $info[0]['name'] : ''}}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="bg-white dark:bg-gray-900 dark:text-white text-sm leading-5 text-blue-900">Company Arabic Name : </div>
                            </td>
                            <td id="ar_name" data-type="text" data-pk="1" data-title="Enter company arabic name" class="editable editable-click bg-white dark:bg-gray-900 dark:text-white px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$info ? $info[0]['ar_name'] : ''}}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="bg-white dark:bg-gray-900 dark:text-white text-sm leading-5 text-blue-900">Company C.R. Number : </div>
                            </td>
                            <td id="cr_number" data-type="text" data-pk="1" data-title="Enter company C.R. number" class="editable editable-click bg-white dark:bg-gray-900 dark:text-white px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$info ? $info[0]['cr_number'] : ''}}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="bg-white dark:bg-gray-900 dark:text-white text-sm leading-5 text-blue-900">Company Tax Number : </div>
                            </td>
                            <td id="tax_number" data-type="text" data-pk="1" data-title="Enter company tax number" class="editable editable-click bg-white dark:bg-gray-900 dark:text-white px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$info ? $info[0]['tax_number'] : ''}}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="bg-white dark:bg-gray-900 dark:text-white text-sm leading-5 text-blue-900">Company Address : </div>
                            </td>
                            <td><a href="#" id="address" data-type="address" data-pk="1"  data-title="Please, fill address" class="editable editable-click bg-white dark:bg-gray-900 dark:text-white px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$info ? $info[0]['address'] : ''}}</a></td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/poshytip/1.2/jquery.poshytip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/jquery-editable/js/jquery-editable-poshytip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/jquery.ui.datepicker.min.js"></script>
        <script src="https://vitalets.github.io/x-editable/assets/x-editable/inputs-ext/address/address.js"></script>
        <script>
            //x-editable
            $(function(){

                //defaults
                $.fn.editable.defaults.url = '/settings/companyinfo/edit';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //enable / disable
                $('#enable').click(function() {
                    $('#company .editable').editable('toggleDisabled');
                });

                //editables
                $('#name').editable({
                    validate: function(value) {
                        if($.trim(value) == '') return 'This field is required';
                    },
                    url: '/settings/companyinfo/edit',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'text',
                    name: 'name',
                    title: 'Enter Company Name.'
                });
                $('#ar_name').editable({
                    validate: function(value) {
                        if($.trim(value) == '') return 'This field is required';
                    },
                    url: '/settings/companyinfo/edit',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'text',
                    name: 'ar_name',
                    title: 'Enter Company Arabic Name.'
                });
                $('#cr_number').editable({
                    validate: function(value) {
                        if($.trim(value) == '') return 'This field is required';
                    },
                    url: '/settings/companyinfo/edit',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'text',
                    name: 'cr_number',
                    title: 'Enter Company C.R. Number.'
                });
                $('#tax_number').editable({
                    validate: function(value) {
                        if($.trim(value) == '') return 'This field is required';
                    },
                    url: '/settings/companyinfo/edit',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'text',
                    name: 'tax_number',
                    title: 'Enter Company Tax Number.'
                });


                $('#status').editable();

                $('#address').editable({
                    url: '/settings/companyinfo/edit',
                    name:'address',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    validate: function(value) {
                        if(value.city == '') return 'city is required!';
                    },
                    display: function(value) {
                        if(!value) {
                            $(this).empty();
                            return;
                        }
                        var html = '<b>' + $('<div>').text(value.city).html() + '</b>, ' + $('<div>').text(value.street).html() + ' st., bld. ' + $('<div>').text(value.building).html();
                        $(this).html(html);
                    }
                });

                $('#company .editable').on('hidden', function(e, reason){
                    if(reason === 'save' || reason === 'nochange') {
                        var $next = $(this).closest('tr').next().find('.editable');
                        if($('#autoopen').is(':checked')) {
                            setTimeout(function() {
                                $next.editable('show');
                            }, 300);
                        } else {
                            $next.focus();
                        }
                    }
                });

            });
        </script>
@endsection
