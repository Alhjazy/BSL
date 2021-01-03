@extends('layouts.app')
@section('content')
    <form method="post" action="/inventory/products/register" enctype="multipart/form-data">
        @csrf
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
           Register Product
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
                                                <input type="text" name="name" style="padding-left: 7rem;" class="input  w-full border col-span-8" placeholder="Product Name (English)">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Product Name (Arabic)</div>
                                            <div class="pl-8">
                                                <input type="text" name="ar_name" style="padding-left: 9.4rem;" class="input  w-full border col-span-4" placeholder="Product Name (Arabic)">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Product Barcode</div>
                                            <div class="pl-8">
                                                <input type="text" name="barcode" style="padding-left: 7rem;" class="input  w-full border col-span-4" placeholder="Product Barcode">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Product SKU</div>
                                            <div class="pl-8">
                                                <input type="text" name="sku" style="padding-left: 6rem;" class="input  w-full border col-span-4" placeholder="Product SKU">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Product Type</div>
                                            <div style="padding-left: 6.6rem;">
                                                <select  name="type" class="tail-select w-full">
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
                                                        <option value="{{$v->id}}" title="{{$v->name}}">{{$v->name}}</option>
                                                    @endforeach @endif
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
                                                    <option value="15" selected title="15%">VAT 15%</option>
                                                    <option value="5" title="5%">5%</option>
                                                    <option value="0" title="0%">0%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Product Price</div>
                                            <div class="pl-8">
                                                <input type="text" name="price" style="padding-left: 6rem;" class="input  w-full border col-span-4" placeholder="Product Price">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>Product Images </div>
                                <div class="mt-5">
                                    <div>
                                        <label>Upload Product Images </label>
                                        <input type="file" name="product_images[]" multiple class="input w-full border mt-2">
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
@endsection