@extends('layouts.app')
@section('content')
    <div class="top-content">
        <div class="float-left flex  sm:mt-0">
            <h2 id="title" class="intro-y text-lg font-medium mt-10">
               Purchase Order#{{$purchase['reference']}}
            </h2>
        </div>
        <div id="actions" class="float-right flex  sm:mt-0">
            <button onclick="printJS('main','html');" class="button mt-10 w-1/2 sm:w-auto flex items-center border bg-gray-200 text-gray-600 mr-2 dark:bg-dark-5 dark:text-gray-300"> <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </button>
        </div>
        <div style="clear: both;"></div>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div id="main" class="intro-y box p-5 mt-5">
        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
            <form class="xl:flex sm:mr-auto" id="order_info">
                <div class="sm:flex items-center sm:mr-4">
                    <div class="flex">
                        <div class="z-30 rounded-l w-40 flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4 -mr-1">Invoice No#</div>
                        <input type="text" name="invoice_no" class=" input w-full sm:w-40 xxl:w-full mt-2 sm:mt-0 border"  disabled value="{{$purchase['invoice_no']}}"  placeholder="Search...">
                    </div>
                </div>
                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <div class="flex">
                        <div class="z-30 rounded-l w-40 flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4 -mr-1">Order Type</div>
                        <input type="text" name="invoice_type" class=" input w-full sm:w-40 xxl:w-full mt-2 sm:mt-0 border"  disabled value="{{$purchase['invoice_type']}}"  placeholder="Search...">
                    </div>
                </div>
                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <div class="flex">
                        <div class="z-30 rounded-l w-40 flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4 -mr-1">Issued Date</div>
                        <input type="text" name="issued_date" disabled value="{{$purchase['issued_date']}}" class="datepicker input w-full sm:w-40 xxl:w-full mt-2 sm:mt-0 border" data-format="YYYY/MM/DD" data-single-mode="true"  placeholder="Search...">
                    </div>
                </div>
                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <div class="flex">
                        <div class="z-30 rounded-l w-40 flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4 -mr-1">Due Date</div>
                        <input type="text" name="due_date" disabled value="{{$purchase['due_date']}}" class="datepicker input w-full sm:w-40 xxl:w-full mt-2 sm:mt-0 border" data-format="YYYY/MM/DD" data-single-mode="true"  placeholder="Search...">
                    </div>
                </div>
                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <div class="flex">
                        <div class="z-30 rounded-l w-20  flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4 -mr-1">Supplier</div>
                        <input type="text" name="supplier_id" class=" input w-full sm:w-40 xxl:w-full mt-2 sm:mt-0 border"  disabled value="{{$purchase['supplier']['name']}}"  placeholder="Search...">
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <div class="flex">
                        <a href="javascript:;" data-toggle="modal" data-target="#documents-modal-preview" class="button w-1/2 sm:w-auto flex items-center border bg-gray-200 text-gray-600  mr-2 dark:bg-dark-5 dark:text-gray-300"> <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> Documents  </a>
                        <a href="javascript:;"  data-toggle="modal" data-target="#payment-modal-preview" class="button w-1/2 sm:w-auto flex items-center border bg-theme-9  text-white  mr-2 dark:bg-dark-5 dark:text-gray-300"> <i data-feather="dollar-sign" class="w-4 h-4 mr-2"></i> Payments  </a>
                    </div>
                </div>
            </form>
        </div>
        <br><hr>
        <br>
        <div class="overflow-x-auto scrollbar-hidden">
            <div class="mt-5 table-report table-report--tabulator" id="PurchaseOrdersItems"></div>
        </div>
        <br>
        <div class="overflow-x-auto">
            <table class="table" style="width: 34%;float: left;">
                <tbody>
                <tr>
                    <td class="border-b" align="right" id="payemnts_metods">
                        @foreach($purchase['payments'] as $key => $value)
                            {{$value['payment_method']}},
                        @endforeach
                    </td>
                    <td class="border-b" align="right" style="width: 40%;"> : PAYMENT METHOD  -  طريقة الدفع </td>
                </tr>
                <tr>
                    <td class="border-b" align="right" id="payemnts_references">
                        @foreach($purchase['payments'] as $key => $value)
                            {{$value['reference']}},
                        @endforeach
                    </td>
                    <td class="border-b" align="right" style="width: 70%;"> : PAYMENT REFERENCE  - المرجع </td>
                </tr>
                <tr>
                    <td class="border-b" align="right" id="outstanding_balance">
                        {{$purchase['outstanding_balance']}}
                    </td>
                    <td class="border-b" align="right" style="width: 70%;"> : OUTSTANDING BALANCE  -  الإجمالي المتبقي (الغير مدفوع)</td>
                </tr>
                <tr>
                    <td class="border-b" align="right" id="total_due_balance">
                        {{$purchase['total_due']}}
                    </td>
                    <td class="border-b" align="right" style="width: 40%;"> : TOTAL DUE BALANCE  -   الإجمالي المدفوع </td>
                </tr>
                </tbody>
            </table>
            <table class="table" style="width: 34%; float: right;">
                <tbody>
                <tr>
                    <td class="border-b" align="right" id="SUBTOTAL">  {{$purchase['subtotal']}} </td>
                    <td class="border-b" align="right" style="width: 40%;"> : SUBTOTAL  -  الإجمالي الجزئي</td>
                </tr>
                <tr>
                    <td class="border-b" align="right" id="DISCOUNT"> {{$purchase['total_discount_amount']}} </td>
                    <td class="border-b" align="right" style="width: 70%;"> : TOTAL DISCOUNT AMOUNT  - إجمالي قيمة الخصم </td>
                </tr>
                <tr>
                    <td class="border-b" align="right" id="TOTAL_TAX">{{$purchase['total_tax_amount']}} </td>
                    <td class="border-b" align="right" style="width: 70%;"> : TOTAL VAT TAX AMOUNT  -  إجمالي قيمة الضريبة المضافة</td>
                </tr>
                <tr>
                    <td class="border-b" align="right" id="TOTAL"> {{$purchase['total_amount']}} </td>
                    <td class="border-b" align="right" style="width: 40%;"> : GRAND TOTAL  -   الإجمالي </td>
                </tr>
                </tbody>
            </table>
            <div style="clear: both;"></div>
        </div>
    </div>
    <!-- END: HTML Table Data -->
    <div class="modal" id="documents-modal-preview">
        <div  class="modal__content modal__content--xl p-10">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">Purchase Documents</h2>
                <button class="button border items-center text-gray-700 dark:border-dark-5 dark:text-gray-300 hidden sm:flex"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs </button>
                <div class="dropdown sm:hidden"> <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-600"></i> </a>
                    <div class="dropdown-box w-40">
                        <div class="dropdown-box__content box dark:bg-dark-1 p-2"> <a href="javascript:;" class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs </a> </div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table" id="document_list">
                    <thead>
                    <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Document Type</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Document Name</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">File Upload</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Remarks</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($purchase['documents'] as $key => $value)
                        <tr>
                            <<td class="border whitespace-nowrap">{{$key}}</td>
                            <<td class="border whitespace-nowrap">{{$value['type']}}</td>
                            <<td class="border whitespace-nowrap">{{$value['name']}}</td>
                            <<td class="border whitespace-nowrap">{{$value['file']}}</td>
                            <<td class="border whitespace-nowrap">{{$value['remarks']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal" id="payment-modal-preview">
        <div  class="modal__content modal__content--xl p-10">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">Purchase Payments</h2>
                <button class="button border items-center text-gray-700 dark:border-dark-5 dark:text-gray-300 hidden sm:flex"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs </button>
                <div class="dropdown sm:hidden"> <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-600"></i> </a>
                    <div class="dropdown-box w-40">
                        <div class="dropdown-box__content box dark:bg-dark-1 p-2"> <a href="javascript:;" class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs </a> </div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table" id="payment_list">
                    <thead>
                    <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Reference #</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Payment Method</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">DUE Amount</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Payment Date</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">OUTSTANDING BALANCE</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($purchase['payments'] as $key => $value)
                        <tr>
                            <<td class="border whitespace-nowrap">{{$value['reference']}}</td>
                            <<td class="border whitespace-nowrap">{{$value['payment_method']}}</td>
                            <<td class="border whitespace-nowrap">{{$value['amount']}}</td>
                            <<td class="border whitespace-nowrap">{{$value['date']}}</td>
                            <<td class="border whitespace-nowrap">{{$value['outstanding_balance']}}</td>
                            <<td class="border whitespace-nowrap">{{$value['status']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function DescounteditCheck(cell){
            //cell - the cell component for the editable cell
//            //get row data
            var row = cell.getRow();
            var rowData = cell.getRow().getData();
            var subtotal = (rowData.price * rowData.qty) - cell.getValue();
            var total_tax_amount = (subtotal * 0.15);
            var total_amount =  (subtotal + total_tax_amount);
            row.update({subtotal:subtotal.toFixed(1),total_tax_amount:total_tax_amount.toFixed(1),total_amount:total_amount.toFixed(1)});
            summary();
            return false;
//
//            return data.age > 18; // only allow the name cell to be edited if the age is over 18
        };
        function QuantityeditCheck(cell){
            //cell - the cell component for the editable cell
//            //get row data
            var row = cell.getRow();
            var rowData = cell.getRow().getData();
            var subtotal = (rowData.price * cell.getValue()) - rowData.discount_value;
            var total_tax_amount = (subtotal * 0.15);
            var total_amount =  (subtotal + total_tax_amount);
            row.update({subtotal:subtotal.toFixed(1),total_tax_amount:total_tax_amount.toFixed(1),total_amount:total_amount.toFixed(1)});
            summary();
            return false;
//
//            return data.age > 18; // only allow the name cell to be edited if the age is over 18
        };
        var table = new Tabulator("#PurchaseOrdersItems", {
//            data:tabledata,           //load row data from array
            ajaxURL:"/purchase/orders/{{$purchase['id']}}/items",
//            ajaxProgressiveLoad:"scroll",
//            paginationSize:20,
//            placeholder:"No Data Set",
            dataChanged:function(data){
                //data - the updated table data
            },
            layout:"fitColumns",      //fit columns to width of table
//            responsiveLayout:"hide",  //hide columns that dont fit on the table
            tooltips:true,            //show tool tips on cells
            addRowPos:"top",          //when adding a new row, add it to the top of the table
//            history:true,             //allow undo and redo actions on the table
//            pagination:"local",       //paginate the data
//            paginationSize:10,         //allow 7 rows per page of data
//            movableColumns:true,      //allow column order to be changed
//            resizableRows:true,       //allow row order to be changed
//            initialSort:[             //set the initial sort order of the data
//                {column:"name", dir:"asc"},
//            ],
            columns:[                 //define the table columns
                {title:"SKU", field:"product.sku",hozAlign:'left',width:130,},
                {title:"Description", field:"product.name",hozAlign:'center', },
                {title:"Price", field:"price",hozAlign:'center',width:130, },
                {title:"QTY", field:"qty", hozAlign:'center', width:130,},
                {title:"Discounted Amount", field:"discount_value",width:200,hozAlign:'center',},
                {title:"Sub Total", field:"subtotal",hozAlign:'left',width:130,},
                {title:"Total TAX AMOUNT", field:"tax_value",hozAlign:'center', width:190,},
                {title:"Total Amount", field:"total", hozAlign:'center', width:160,},
            ],
//            columns:[                 //define the table columns
//                {title:"Order No#", field:"reference", editor:"input"},
//                {title:"Invoice No#", field:"invoice_no", editor:"input"},
//                {title:"Supplier", field:"supplier.name", editor:"input"},
//                {title:"Order Type", field:"type", editor:"select", editorParams:{values:["male", "female"]}},
//                {title:"Issued Date", field:"issued_date",  editor:"input"},
//                {title:"Total QTY", field:"total_qty",  editor:"input"},
//                {title:"Total ITEMS", field:"total_items",  editor:"input"},
//                {title:"Total TAX AMOUNT", field:"total_tax_amount", editor:"input"},
//                {title:"Total Discount AMOUNT", field:"total_discount_amount",editor:"input"},
//                {title:"Sub Total", field:"subtotal", editor:"input"},
//                {title:"Total Amount", field:"total_amount",  editor:"input"},
//                {title:"Total Balance AMOUNT", field:"total_balance",  editor:"input"},
//                {title:"Total DUE AMOUNT", field:"total_due",  editor:"input"},
//                {title:"Total Outstanding AMOUNT", field:"outstanding_balance",  editor:"input"},
//                {title:"Status", field:"status", width:130, sorter:"date", hozAlign:"center"},
//            ],
        });
        function addItem() {
            var ProductCode = $('#items').val();
            if(ProductCode === '') {
                alert('Please Add Items Sku Or Barcode !');
                return false;
            }
            jQuery.ajax('/inventory/products/'+ProductCode+'/find', {
                type: 'GET',
                dataType: 'json'
            }).done(function (response) {
                var res = response.data[0];
                if(response.data.length > 0){
                    var row = table.searchRows("sku", "=", res.sku);
                    if(row.length > 0){
                        var rowData = row[0].getData();
                        var qty = rowData.qty + 1;
                        var subtotal = (res.price * qty);
                        var total_tax_amount = ((res.price * 0.15) * qty);
                        var total_amount =  (subtotal + total_tax_amount);
                        row[0].update({sku:res.sku, name:res.name,price:res.price,qty:qty,discount_value:0,subtotal:subtotal.toFixed(1),total_tax_amount:total_tax_amount.toFixed(1),total_amount:total_amount.toFixed(1)});
                        summary();
                        return false;
                    }
                    var qty = 1;
                    var subtotal = (res.price * qty);
                    var total_tax_amount = ((res.price * 0.15) * qty);
                    var total_amount =  (subtotal + total_tax_amount);
                    table.addRow({sku:res.sku, name:res.name,price:res.price,qty:qty,discount_value:0,subtotal:subtotal.toFixed(1),total_tax_amount:total_tax_amount.toFixed(1),total_amount:total_amount.toFixed(1)});
                    summary();
                    return false;
                }
                alert('Please Add A Correct Sku Or Barcode to add the item !')
            });
            return false;
        }
        function summary() {
            var results = table.getCalcResults();
            $('#SUBTOTAL').html(results.bottom.subtotal);
            $('#DISCOUNT').html(results.bottom.discount_value);
            $('#TOTAL_TAX').html(results.bottom.total_tax_amount);
            $('#TOTAL').html(results.bottom.total_amount);
        }
        function print(id){
            console.log(id);
        }
        function removeItem() {
            var select = table.getSelectedRows();
            table.deleteRow(select);
            summary();
            return false;
        }
        function checkOutstandingBalance() {
            var results = table.getCalcResults();
            var total_amount = 0;
            var payment_outstanding_balance = $('#payment_outstanding_balance');
            var payment_amount = $('#payment_amount');
            if(payments.length > 0){
                $.each(payments,function (k,v) {
                    total_amount = parseFloat(total_amount) + parseFloat(v.amount);
                });
            }
            if(total_amount > 0){
                payment_outstanding_balance.val(parseFloat(results.bottom.total_amount - total_amount).toFixed(1));
            }else{
                payment_outstanding_balance.val(parseFloat(results.bottom.total_amount).toFixed(1));
            }
//            payment_amount.change(function () {
//                var value =  payment_outstanding_balance.val() - $(this).val() ;
//                payment_outstanding_balance.val(value);
//            });
        }
        function getFormData($form,isForm){
            var unindexed_array = isForm === true ? $form.serializeArray() : $form;
            var indexed_array = {};

            $.map(unindexed_array, function(n, i){
                indexed_array[n['name']] = n['value'];
            });

            return indexed_array;
        }
        function setDocuments() {
            if(documents.length > 0){
                $('table#document_list').find('tbody').html('');
                $.each(documents,function (key,value) {
                    $('table#document_list').find('tbody').append(
                        '<tr>\n' +
                        '   <td class="border whitespace-nowrap">DOC-'+(key+1)+'</td>\n' +
                        '   <td class="border whitespace-nowrap">'+value.document_type+'</td>\n' +
                        '   <td class="border whitespace-nowrap">'+value.document_name+'</td>\n' +
                        '   <td class="border whitespace-nowrap">'+value.document_file.name+'</td>\n' +
                        '   <td class="border whitespace-nowrap"><a href="javascript:;" onclick="removeDocument('+key+',$(this));">Delete</a></td>\n' +
                        '</tr>'
                    );
                });
            }
        }
        function removeDocument(key,el) {
            documents.splice(key,1);
            $(el).parents('tr').remove();
        }
        function addDocuments(el,e) {
            e.preventDefault();
            var form = $(el);
            var data = form.serializeArray();
            var file = form.find('input[name="document_file"]')[0].files;
            var checked = true;
            if(file.length > 0){
                $.each(form.find('input'),function (k,v) {
                    if($(v).val() === '' && $(v).attr('name') !== 'document_remarks' && $(v).attr('name') !== 'document_file')
                    {
                        var inputName = $(v).parent().find('label').html();
                        alert('Please fill Input '+inputName+' before Press Add!');
                        checked = false;
                        return false;
                    }
                });
                if(checked === true ){
                    data.push({name:'document_file',value:file[0]});
                    var inputs = getFormData(data,false);
                    documents.push(inputs);
                    el.reset();
                    setDocuments();
                }
            }else{
                alert('Please Select File before Press Add!');
            }
            return;
        }
        function setPayments() {
            if(payments.length > 0){
                var total_outstanding_balance = 0;
                var total_due_balance = 0;
                var all_payments = [];
                $('#payemnts_metods').html('');
                $('#payemnts_references').html('');
                $.each(payments,function (key,value) {
                    $('#payemnts_metods').append('<span>'+value.payment_method+',</span>');
                    $('#payemnts_references').append('<span>'+'PYT-'+key+',</span>');
                    total_due_balance = (parseFloat(total_due_balance) + parseFloat(value.amount));
                    total_outstanding_balance = (value.outstanding_balance);
                    $('#outstanding_balance').html('<span>'+total_outstanding_balance+'</span>');
                    $('#total_due_balance').html('<span>'+total_due_balance+'</span>');
                });
            }
        }
        function addPayments(el,e) {
            e.preventDefault();
            var form = $(el);
            var payment_amount = form.find('input#payment_amount').val();
            var payment_date = form.find('input#payment_date').val();
            var payment_outstanding_balance = form.find('input#payment_outstanding_balance').val();
            if(payment_amount === '' || payment_amount === 0 || payment_date === ''){
                alert('Please Enter the Amount Or date for amount to add payment !');
                return false;
            }
            if(payment_outstanding_balance   === '' || payment_outstanding_balance - payment_amount < 0){
                alert('This Order has a full Payment , Please Check the outstanding Balance !');
                return false;
            }
            var inputs = getFormData(form,true);
            inputs.outstanding_balance = inputs.outstanding_balance - inputs.amount;
            payments.push(inputs);
            form[0].reset();
            var date = "{{date('Y/m/d')}}";
            form.find('input[name="date"]').val(date);
            if(payments.length > 0){
                $('table#payment_list').find('tbody').html('');
                $.each(payments,function (key,value) {
                    $('table#payment_list').find('tbody').append(
                        '<tr>\n' +
                        '   <td class="border whitespace-nowrap">PYT-'+key+'</td>\n' +
                        '   <td class="border whitespace-nowrap">'+value.payment_method+'</td>\n' +
                        '   <td class="border whitespace-nowrap">'+value.amount+'</td>\n' +
                        '   <td class="border whitespace-nowrap">'+value.date+'</td>\n' +
                        '   <td class="border whitespace-nowrap">'+(value.outstanding_balance)+'</td>\n' +
                        '   <td class="border whitespace-nowrap">'+value.status+'</td>\n' +
                        '</tr>'
                    );
                });
            }
            checkOutstandingBalance();
            setPayments();
        }
        function addSupplier(el,e) {
            e.preventDefault();
            var form = $(el);
            var data = form.serializeArray();
            var supplier_id = '';
            var supplier_name ='';
            $.ajax({
                url:'/suppliers/register',
                type: 'POST',
                data:data,
                async:false,
                dataType: 'json',
                success:function (data) {
                    supplier_id = data.data.id;
                    supplier_name = data.data.name;
                    form[0].reset();
                    cash('#supplier-modal-preview').modal('hide');
                }
            });
            var newOption = new Option(supplier_name, supplier_id, true, true);
            $('select.supplier_id').append(newOption).trigger('change');
//                $('select.supplier_id').val(supplier_id).trigger('change');
        }
        function save() {
            loadingContentAjaxBlock();
            var form_data = new FormData($('form#order_info')[0]);
            var info = getFormData($('form#order_info'),true);
            var items = table.getData();
            if(documents.length === 0){
                alert('Please add Document invoice for this order!');
                return false;
            }
            if(info.invoice_type === 'cash_invoice' && payments.length === 0){
                alert('Please add A full Payments (Cash Invoice) invoice details for this order!');
                return false;
            }
            if(info.invoice_no === ''){
                alert('Please type A Invoice No/Number for this order!');
                return false;
            }
            var total_due = 0;
            $.each(payments,function (k,v) {
                total_due += parseFloat(v.amount);
                form_data.append('payments['+k+'][payment_method]',v.payment_method);
                form_data.append('payments['+k+'][amount]',v.amount);
                form_data.append('payments['+k+'][date]',v.date);
                form_data.append('payments['+k+'][outstanding_balance]',v.outstanding_balance);
                form_data.append('payments['+k+'][status]',v.status);
//                data.payments.push([{name:'payment_method',value:},{name:'amount',value:v.amount},{name:'date',value:v.date},
//                    {name:'outstanding_balance',value:v.outstanding_balance},{name:'status',value:v.status}
//                ]);
            });
            $.each(documents,function (k,v) {
                form_data.append('documents['+k+'][name]',v.document_name);
                form_data.append('documents['+k+'][type]',v.document_type);
                form_data.append('documents['+k+'][file]',v.document_file);
                form_data.append('documents['+k+'][remarks]',v.document_remarks);
//                data.documents.push([{name:'name',value:v.document_name},{name:'type',value:v.document_type},{name:'file',value:v.document_file},{name:'remarks',value:v.document_remarks}]);
            });
            var total_qty = 0;
            $.each(items,function (k,v) {
                total_qty += parseFloat(v.qty);
                form_data.append('items['+k+'][name]',v.name);
                form_data.append('items['+k+'][sku]',v.sku);
                form_data.append('items['+k+'][price]',v.price);
                form_data.append('items['+k+'][discount_value]',v.discount_value);
                form_data.append('items['+k+'][qty]',v.qty);
                form_data.append('items['+k+'][subtotal]',v.subtotal);
                form_data.append('items['+k+'][total_amount]',v.total_amount);
                form_data.append('items['+k+'][total_tax_amount]',v.total_tax_amount);
//                data.documents.push([{name:'name',value:v.document_name},{name:'type',value:v.document_type},{name:'file',value:v.document_file},{name:'remarks',value:v.document_remarks}]);
            });
            var results = table.getCalcResults();
            form_data.append('total_items',items.length);
            form_data.append('total_qty',total_qty);
            form_data.append('subtotal',results.bottom.subtotal);
            form_data.append('discount_value',results.bottom.discount_value);
            form_data.append('total_tax_amount',results.bottom.total_tax_amount);
            form_data.append('total_amount',results.bottom.total_amount);
            form_data.append('total_due',total_due);

            $.ajax({
                url:'/purchase/orders/create',
                type:'POST',
                dataType:'json',
                data:form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                   if(data.status === 'success'){
                       $('#title').html('Order#'+data.data.reference);
                       $('#actions').prepend('<button onclick="print(data.data.id);" class="button mt-10 w-1/2 sm:w-auto flex items-center border bg-theme-3  text-white mr-2 dark:bg-dark-5 dark:text-gray-300"> <i data-feather="print" class="w-4 h-4 mr-2"></i> Print </button>');
                       unLoadingContentAjaxBlock();
//                       window.location.
                   }
                },
            });
        }
    </script>
@endsection