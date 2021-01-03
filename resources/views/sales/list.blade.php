@extends('layouts.app')

@section('content')

    <h2 class="intro-y text-lg font-medium mt-10">
        Sales Orders
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="/sales/orders/create" class="button text-white bg-theme-1 shadow-md mr-2">New Orders</a>
            <div class="dropdown">
                <button class="dropdown-toggle button px-2 box text-gray-700 dark:text-gray-300">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="more-horizontal"></i> </span>
                </button>
                <div class="dropdown-box w-40">
                    <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>
        </div>

        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">ORDER NO#</th>
                    <th class="whitespace-nowrap">BRANCH NAME</th>
                    <th class="whitespace-nowrap">CUSTOMER NAME</th>
                    <th class="text-center whitespace-nowrap">ORDER TYPE</th>
                    <th class="text-center whitespace-nowrap">QTY</th>
                    <th class="text-center whitespace-nowrap">SUB TOTAL</th>
                    <th class="text-center whitespace-nowrap">DISCOUNT</th>
                    <th class="text-center whitespace-nowrap">TAX VALUE</th>
                    <th class="text-center whitespace-nowrap">TOTAL</th>
                    <th class="text-center whitespace-nowrap">DATE</th>
                    <th class="text-center whitespace-nowrap">STATUS</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                @if($orders) @foreach($orders as $key => $value)
                    <tr class="intro-x">
                        <td class="text-center">{{$key+1}}</td>
                        <td class="text-center"><a href="/sales/orders/{{$value->id}}/show" class="font-medium whitespace-nowrap">{{$value->reference}}</a></td>
                        <td>
                            <a href="javascript:;" class="font-medium whitespace-nowrap">{{$value->branch->name}}</a>
                            <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{$value->branch->type}}</div>
                        </td>
                        <td>
                            <a href="/sales/orders/{{$value->id}}/show" class="font-medium whitespace-nowrap">{{$value->customer->name}}</a>
                            <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{$value->customer->phone_number}}</div>
                        </td>
                        <td class="text-center">{{$value->invoice_type === 'cash_invoice' ? 'CASH INVOICE' : 'FORWARD BILL'}}</td>
                        <td class="text-center">{{$value->total_qty}}</td>
                        <td class="text-center">{{$value->subtotal}} SAR</td>
                        <td class="text-center">{{$value->total_discount_amount}} SAR</td>
                        <td class="text-center">{{$value->total_tax_amount}} SAR</td>
                        <td class="text-center">{{$value->total_balance}} SAR</td>
                        <td class="text-center">{{$value->issued_date}}</td>
                        <td class="w-40">
                            <div class="flex items-center justify-center {{$value->status === 'COMPLETE' ? 'text-theme-9' : 'text-theme-12'}}">  {{$value->status}} </div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="/inventory/products/{{$value->id}}/edit"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                            </div>
                        </td>
                    </tr>
                @endforeach @endif
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <ul class="pagination">
                <li>
                    <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
                </li>
                <li>
                    <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
                </li>
                <li> <a class="pagination__link" href="">...</a> </li>
                <li> <a class="pagination__link" href="">1</a> </li>
                <li> <a class="pagination__link pagination__link--active" href="">2</a> </li>
                <li> <a class="pagination__link" href="">3</a> </li>
                <li> <a class="pagination__link" href="">...</a> </li>
                <li>
                    <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
                </li>
                <li>
                    <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
                </li>
            </ul>
            <select class="w-20 input box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div>
        <!-- END: Pagination -->
    </div>

    <!-- BEGIN: Delete Confirmation Modal -->
    <div class="modal" id="success-modal-preview">
        <div class="modal__content">
            <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                <div class="text-3xl mt-5">Success!</div>
                <div class="text-gray-600 mt-2" id="content-message"></div>
            </div>
            <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->

    <!-- BEGIN: Delete Confirmation Modal -->
    <div class="modal" id="delete-confirmation-modal">
        <div class="modal__content">
            <div class="p-5 text-center">
                <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                <div class="text-3xl mt-5">Are you sure?</div>
                <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
            </div>
            <div class="px-5 pb-8 text-center">
                <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                <button type="button" class="button w-24 bg-theme-6 text-white">Delete</button>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
    <script>
        $('#registerCategory').submit(function (e) {
            e.preventDefault();
            var data = $(this).serializeArray();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax(
                {
                    url: "/inventory/products/categories/register",
                    type: 'post', // replaced from put
                    dataType: "JSON",
                    data:data,
                    success: function (response)
                    {
                        console.log(response);
                        $('#content-message').html(response.message);
                        cash('#regiser-category-modal-form').modal('hide');
                        cash('#success-modal-preview').modal('show');
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText); // this line will save you tons of hours while debugging
                        // do something here because of error
                    }
                });
        });
    </script>
@endsection