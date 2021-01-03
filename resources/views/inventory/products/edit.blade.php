@extends('layouts.app')
@section('content')
    @if($product)
        <form method="post" action="/inventory/products/{{$product->id}}/edit" enctype="multipart/form-data">
         {{ method_field('PUT') }}
        @csrf
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
           Update Product ({{$product->name}}) SKU: {{$product->sku}}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button type="reset" class="button box text-gray-700 dark:text-gray-300 mr-2 flex items-center ml-auto sm:ml-0"> <i class="w-4 h-4 mr-2" data-feather="rotate-cw"></i> Reset </button>
            <button type="submit" class="button box text-white bg-theme-1 dark:text-gray-300 mr-2 flex items-center ml-auto sm:ml-0"> <i class="w-4 h-4 mr-2" data-feather="save"></i> Submit </button>
        </div>
        </div>
        <div class="pos intro-y grid grid-cols-12 gap-6 mt-5">
            <!-- BEGIN: Post Info -->
            <div class="col-span-12 lg:col-span-12">
                <div class="post intro-y overflow-hidden box mt-5">
                    <div class="post__tabs nav-tabs flex flex-col sm:flex-row bg-gray-300 dark:bg-dark-2 text-gray-600">
                        <a title="General Information" data-toggle="tab" data-target="#general" href="javascript:;" class="tooltip w-full sm:w-40 py-4  text-center flex justify-center items-center active"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> General Information </a>
                    </div>
                    <div class="post__content tab-content">
                        <div class="tab-content__pane p-5 active" id="general">
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> Product Information </div>
                                <div class="mt-3">
                                    <div class="sm:grid grid-cols-2 gap-2">
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Product Name (English)</div>
                                            <div class="pl-20">
                                                <input type="text" name="name" value="{{$product->name}}" style="padding-left: 7rem;" class="input  w-full border col-span-8" placeholder="Product Name (English)">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Product Name (Arabic)</div>
                                            <div class="pl-8">
                                                <input type="text" name="ar_name" value="{{$product->ar_name}}" style="padding-left: 9.4rem;" class="input  w-full border col-span-4" placeholder="Product Name (Arabic)">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Product Barcode</div>
                                            <div class="pl-8">
                                                <input type="text" name="barcode" value="{{$product->barcode}}" style="padding-left: 7rem;" class="input  w-full border col-span-4" placeholder="Product Barcode">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Product Type</div>
                                            <div style="padding-left: 6.6rem;">
                                                <select  name="type" class="tail-select w-full">
                                                    <option value="{{$product->type}}" selected >{{$product->type}}</option>
                                                    <option value="PRODUCT" title="PRODUCT">PRODUCT</option>
                                                    <option value="RECIPE" title="RECIPE">RECIPE</option>
                                                    <option value="RAW_MATERIALS" title="RAW MATERIALS">RAW MATERIALS</option>
                                                    <option value="SERVICE" title="SERVICE">SERVICE</option>
                                                    <option value="EXPENSE" title="EXPENSE">EXPENSE</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Product Unit Type</div>
                                            <div style="padding-left: 8.6rem;">
                                                <select  name="unit_type" class="tail-select w-full">
                                                    <option value="{{$product->unit_type}}" selected >{{$product->unit_type}}</option>
                                                    <option value="PIECE" title="PIECE">PIECE</option>
                                                    <option value="UNIT" title="UNIT">UNIT</option>
                                                    <option value="GRAMS" title="GRAMS">GRAMS</option>
                                                    <option value="KG" title="KG">KG</option>
                                                    <option value="LITER" title="LITER">LITER</option>
                                                    <option value="M2" title="M2">M2</option>
                                                    <option value="M3" title="M3">M3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Product Category</div>
                                            <div style="padding-left: 8.6rem;">
                                                <select data-search="true"  name="category_id" class="tail-select w-full">
                                                    @if($categories) @foreach($categories as $k => $v)
                                                                   @if($product->category_id === $v->id )
                                                                        <option value="{{$v->id}}" selected title="{{$v->name}}">{{$v->name}}</option>
                                                                   @endif
                                                        <option value="{{$v->id}}" title="{{$v->name}}">{{$v->name}}</option>
                                                    @endforeach @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Product Status</div>
                                            <div style="padding-left: 7rem;">
                                                <select  name="status" class="tail-select w-full">
                                                    <option value="{{$product->status}}" selected >{{$product->status}}</option>
                                                    <option value="Active" title="ACTIVE">ACTIVE</option>
                                                    <option value="Un-Active" title="Un-Active">Un-Active</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> Product Price & Tax </div>
                                <div class="mt-3">
                                    <div class="sm:grid grid-cols-2 gap-2">
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Product Tax Type</div>
                                            <div style="padding-left: 8rem;">
                                                <select  name="tax_type" class="tail-select w-full">
                                                    <option value="{{$product->tax_type}}" selected >{{$product->tax_type}}</option>
                                                    <option value="VAT_15" selected title="VAT 15%">VAT 15%</option>
                                                    <option value="VAT_0" title="VAT 0%">VAT 0%</option>
                                                    <option value="VAT_5" title="VAT 5%">VAT 5%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Product Tax Percentage</div>
                                            <div style="padding-left: 11rem;">
                                                <select  name="tax_percentage" class="tail-select w-full">
                                                    <option value="{{$product->tax_percentage}}" selected >{{$product->tax_percentage}}</option>
                                                    <option value="15" selected title="15%">VAT 15%</option>
                                                    <option value="5" title="5%">5%</option>
                                                    <option value="0" title="0%">0%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Product Price</div>
                                            <div class="pl-8">
                                                <input type="text" name="price" value="{{$product->price}}" style="padding-left: 6rem;" class="input  w-full border col-span-4" placeholder="Product Price">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>Product Images </div>
                                <div class="mt-3">
                                    <div class="border-2 border-dashed dark:border-dark-5 rounded-md mt-3 pt-4">
                                        <div class="flex flex-wrap px-4" id="imagePreview">
                                            @if($product->product_images) @foreach($product->product_images as $key => $file)
                                                <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                    <img class="rounded-md" alt="{{$file->name}}" src="/{{$file->image}}">
                                                    <div onclick="removeImage(this);" data-id="{{$file->id}}" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> </div>
                                                </div>
                                            @endforeach @endif
                                        </div>
                                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image w-4 h-4 mr-2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg> <span class="text-theme-1 dark:text-theme-10 mr-1">Upload a file</span>
                                            <input type="file" accept="image/*" onchange="readURL(this);" id="imgInp" name="product_images[]" multiple class="w-full h-full top-0 left-0 absolute opacity-0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Post Info -->
        </div>
    </form>
        <script>
            function removeImage(el) {
               var id = $(el).data('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax(
                    {
                        url: "/inventory/products/"+id+"/images/delete",
                        type: 'delete', // replaced from put
                        dataType: "JSON",
                        data: {
                            "id": id // method and token not needed in data
                        },
                        success: function (response)
                        {
                            $(el).parent().remove();
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText); // this line will save you tons of hours while debugging
                            // do something here because of error
                        }
                    });
            }
            function readURL(input) {
                if (input.files) {
                    $.each(input.files,function (k,v) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#imagePreview').prepend('' +
                                '<div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">' +
                                '<img class="rounded-md" alt="" src="'+e.target.result+'">' +
                                '</div>' +
                                '');
//                            $('#blah').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(input.files[k]); // convert to base64 string
                    });
                }
            }
        </script>
    @endif
@endsection