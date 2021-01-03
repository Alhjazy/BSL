@extends('layouts.pos')
@section('content')
    <style>
        html,body{
            color: #333;
            overflow: hidden;
            width: 100vw;
            height: 100vh;
            background: #2980b9;
            font-family: "Roboto", sans-serif;
            padding: 0;!important;
        }

        .register {
            display: grid;
            grid-template-columns: 1fr 2fr;
            height: 100vh;
            width: 100%;
            font-family: "Roboto", sans-serif;
        }
        .register .left {
            border-radius: 5px 5px 2px #333;
            display: block;
            position: relative;
            z-index: 10;
        }
        .register .left .order-window {
            background: #2980b9;
            height: 35vh;
            overflow-y: scroll;
            border: 0;
            padding: 0;
            margin: 0;
        }
        .register .left .order-window table {
            width: 100%;
            border-collapse: collapse;
        }
        .register .left .order-window table tr {
            display: grid;
            width: 100%;
            grid-template-columns: 1fr 4fr 1fr 2fr;
            overflow-x: hidden;
        }
        .register .left .order-window table tr td {
            border: 0;
            padding: 10px;
        }
        .register .left .order-window table tr td:nth-child(3) {
            display: grid;
            justify-content: end;
        }
        .register .left .order-window table tr td:nth-child(4) {
            display: grid;
            justify-content: center;
        }
        .register .left .order-window table tr:nth-child(even) {
            background-color: white;
        }
        .register .left .order-window table tr:nth-child(odd) {
            background-color: #eeeeee;
        }
        .register .left .order-window table tr:first-child {
            font-weight: bold;
            background-color: #2980b9;
            color: white;
            position: -webkit-sticky;
            position: sticky;
            top: 0px;
        }
        .register .left .order-total {
            background: white;
            height: 10vh;
            font-size: 6vh;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 10px;
        }
        .register .left .buttons {
            display: grid;
            height: 55vh;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            grid-template-rows: 1fr 1fr 1fr 1fr;
            background: #d5d5d5;
        }
        .register .left .buttons button {
            background-color: #eeeeee;
            padding: 0;
            margin: 0.5px;
            border: 0;
            border-radius: 2px;
        }
        .register .left .buttons :hover {
            background-color: #d5d5d5;
        }
        .register .right {
            background-color: #2980b9;
            position: relative;
            z-index: 5;
        }
        .register .right .categories {
            display: flex;
        }
        .register .right .categories ul {
            flex: 1;
            display: flex;
            margin: 0;
            padding: 0;
            height: 10vh;
            list-style-type: none;
        }
        .register .right .categories ul li {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register .right .categories ul li a {
            background: #236c9c;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 10vh;
            color: white;
            text-decoration: none;
        }
        .register .right .categories ul li :hover {
            background: #2980b9;
        }
        .register .right .menu-items {
            height: 80vh;
        }
        .register .right .menu-items ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            height: 80vh;
            overflow-y: scroll;
        }
        .register .right .menu-items ul li {
            height: 20vh;
            background: #eeeeee;
            margin: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 2px;
        }
        .register .right .menu-items ul li i {
            background: #236c9c;
        }
        .register .right .menu-items ul li .item {
            font-weight: bold;
        }
        .register .right .menu-items ul li .category {
            font-style: oblique;
        }
        .register .right .menu-items ul :hover {
            background: #d5d5d5;
        }
        .register .right .payment-keys ul {
            display: flex;
            padding: 0;
            margin: 0;
            list-style-type: none;
            height: 10vh;
            background: #236c9c;
            color: white;
        }
        .register .right .payment-keys ul li {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .register .right .payment-keys ul :hover {
            background: #2980b9;
        }
    </style>
    <div class="register">
        <div class="left">
            <div class="order-window">
                <table>
                    <tbody>
                    <tr>
                        <td>#</td>
                        <td>Item</td>
                        <td>Price</td>
                        <td>GL</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Spaghetti</td>
                        <td>$9.50</td>
                        <td>EN</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Side Salad</td>
                        <td>$4.00</td>
                        <td>SS</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Hamburger</td>
                        <td>$7.00</td>
                        <td>EN</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Chicken Alfredo</td>
                        <td>$12.00</td>
                        <td>EN</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Soda</td>
                        <td>$2.00</td>
                        <td>BV</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Iced tea</td>
                        <td>$1.50</td>
                        <td>BV</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="order-total">
                <span>$38.00</span>
            </div>
            <div class="buttons">

                <button>
                    <i class="fas fa-print"></i>
                    Print
                </button>
                <button>1</button>
                <button>2</button>
                <button>3</button>
                <button>
                    <i class="fas fa-ban"></i>
                    Void
                </button>
                <button>4</button>
                <button>5</button>
                <button>6</button>
                <button><i class="fa fa-times"></i>
                    QTY
                </button>
                <button>7</button>
                <button>8</button>
                <button>9</button>
                <button>
                    <i class="fas fa-sign-out-alt"></i>
                    Exit
                </button>
                <div></div>
                <button>0</button>
                <button>.00</button>
            </div>
        </div>
        <div class="right">
            <div class="categories">
                <ul>
                    <li><a href="#">All Items</a></li>
                    <li><a href="#">Beverages</a></li>
                    <li><a href="#">Soup/Salad</a></li>
                    <li><a href="#">Appetizers</a></li>
                    <li><a href="#">Entrees</a></li>
                    <li><a href="#">Desserts</a></li>
                </ul>
            </div>
            <div class="menu-items">
                <ul>
                    <li>
                        <!--           <i class="fas fa-beer fa-2x  fa-fw" data-fa-transform="up-3"></i> -->
                        <span class="item">Water</span>
                        <span class="category">Beverages</span>
                    </li>
                    <li>
                        <!--           <i class="fas fa-beer fa-2x  fa-fw" data-fa-transform="up-3"></i> -->
                        <span class="item">Iced Tea</span>
                        <span class="category">Beverages</span>
                    </li>
                    <li>
                        <!--           <i class="fas fa-beer fa-2x  fa-fw" data-fa-transform="up-3"></i> -->
                        <span class="item">Soda</span>
                        <span class="category">Beverages</span>
                    </li>
                    <li>
                        <!--           <i class="fas fa-beer fa-2x fa-fw" data-fa-transform="up-3"></i> -->
                        <span class="item">Coffee</span>
                        <span class="category">Beverages</span>
                    </li>
                    <li>
                        <!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
                        <span class="item">House Salad</span>
                        <span class="category">Soup/Salad</span>
                    </li>
                    <li>
                        <!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
                        <span class="item">Side Salad</span>
                        <span class="category">Soup/Salad</span>
                    </li>
                    <li>
                        <!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
                        <span class="item">Spaghetti</span>
                        <span class="category">Entree</span>
                    </li>
                    <li>
                        <!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
                        <span class="item">Chicken Alfredo</span>
                        <span class="category">Entree</span>
                    </li>
                    <li>
                        <!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
                        <span class="item">Hamburger</span>
                        <span class="category">Entree</span>
                    </li>
                    <li>
                        <!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
                        <span class="item">Cheeseburger</span>
                        <span class="category">Entree</span>
                    </li>
                    <li>
                        <!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
                        <span class="item">Mozzarella Sticks</span>
                        <span class="category">Appetizers</span>
                    </li>
                    <li>
                        <!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
                        <span class="item">Nachos</span>
                        <span class="category">Appetizers</span>
                    </li>
                    <li>
                        <!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
                        <span class="item">Chocolate Cake</span>
                        <span class="category">Desserts</span>
                    </li>
                    <li>
                        <!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
                        <span class="item">Apple Pie</span>
                        <span class="category">Desserts</span>
                    </li>
                    <li>
                        <!--           <i class="fas fa-utensils fa-2x fa-fw" data-fa-transform="up-3"></i> -->
                        <span class="item">Blueberry Cobbler</span>
                        <span class="category">Entree</span>
                    </li>

                </ul>
            </div>
            <div class="payment-keys">
                <ul>
                    <li>
                        <i class="fas fa-money-bill-alt fa-2x fa-fw" data-fa-transform="up-2"></i> Cash
                    </li>
                    <li>
                        <i class="fas fa-check-square fa-2x fa-fw" data-fa-transform="up-2"></i> Check
                    </li>
                    <li>
                        <i class="fas fa-credit-card fa-2x fa-fw" data-fa-transform="up-2"></i> Credit / Debit
                    </li>
                    <li>
                        <i class="fas fa-gift fa-2x fa-fw" data-fa-transform="up-2"></i> Gift Card
                    </li>
                    <li>
                        <i class="fas fa-user fa-2x fa-fw" data-fa-transform="up-2"></i> Employee Charge
                    </li>
                </ul>
            </div>
        </div>
    </div>

<script>
    var items =[];
    var products =[];
    function showInvoice() {
        $('#product_page').hide();
        $('#invoice_page').show();
    }
    function showPay() {
        $('#product_page').hide();
        $('#pay_page').show();
    }
    function setItemsList() {
        if(products.length > 0){
            var subtotal = 0;
            var total_discount = 0;
            var total_tax = 0;
            var total = 0;
            $('#items_list').find('a.item').remove();
            $.each(products,function (k,v) {
                var item = '<a href="javascript:;" onclick="getItemInfo(this);" data-id="'+v.id+'" class="item flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-dark-3 hover:bg-gray-200 dark:hover:bg-dark-1">\n' +
                    '                    <div class="pos__ticket__item-name truncate mr-1">\n' +
                    '                       '+v.name+'' +
                    '                    </div>\n' +
                    '                    <div class="ml-auto font-medium">x '+v.qty+'</div>\n' +
                    '                    <div class="ml-auto font-medium">'+v.total.toFixed(1)+' SAR</div>\n' +
                    '                </a>';

                $('#items_list').append(item);
                subtotal += (v.price * v.qty);
                total_tax += v.tax;
                total += v.total;
            });
            $('#subtotal').html(subtotal > 0 ? subtotal.toFixed(1):0.00 + ' SAR');
            $('#total_discount').html(total_discount > 0 ? total_discount.toFixed(1):0.00 + ' SAR');
            $('#total_tax').html(total_tax > 0 ? total_tax.toFixed(1):0.00 + ' SAR');
            $('#total').html(total > 0 ? total.toFixed(1):0.00 + ' SAR');
            return false;
        }
        $('#subtotal').html(0.00 + ' SAR');
        $('#total_discount').html(0.00 + ' SAR');
        $('#total_tax').html(0.00 + ' SAR');
        $('#total').html(0.00 + ' SAR');
    }
    function plusItemInList(el) {
        if(products.length > 0){
            var id = $(el).parent().data('id');
            if(products.length > 0){
                $.each(products,function (k,v) {
                    if(id === v.id){
                        products[k].qty = products[k].qty+1;
                        products[k].tax = products[k].tax_percentage / 100 * (products[k].price *   products[k].qty);
                        products[k].total = (products[k].price *  products[k].qty + products[k].tax);
                        setItemsList();
                        return false;
                    }
                });
            }
        }
    }
    function minusItemInList(el) {
        if(products.length > 0){
            var id = $(el).parent().data('id');
            if(products.length > 0){
                $.each(products,function (k,v) {
                    if(id === v.id){
                        if(v.qty === 1){
                            products.splice(k,1);
                            $(el).parent().remove();
                            setItemsList();
                            return false;
                        }
                        products[k].qty = products[k].qty-1;
                        products[k].tax = products[k].tax_percentage / 100 * (products[k].price *   products[k].qty);
                        products[k].total = (products[k].price *  products[k].qty + products[k].tax);
//                        products.splice(k,1);
//                        products.push(item);
                        setItemsList();
                        return false;
                    }
                });
            }
        }
    }
    function deleteItemInList() {
        console.log(items);
        if(products.length > 0){
            if(products.length > 0){
                $.each(products,function (k,v) {
                    if(items.some(item => item.id === v.id)){
                        products.splice(k,1);
                        items = [];
                        $('#items_list').find('a[data-id="'+v.id+'"]').remove();
                        setItemsList();
                        return false;
                    }
                });
            }
        }
    }
    function clearItemsList() {
        console.log(items);
        if(products.length > 0){
             items = [];
             products = [];
            $('#items_list').find('a').remove();
            setItemsList();
            return true;
        }
    }
    function getItemInfo(el) {
        var id = $(el).data('id');
        if(items.length > 0){
            items = [];
            items.push({id:id});
            $('#delete_item').removeAttr('disabled');
        }
        items.push({id:id});
        $('#delete_item').removeAttr('disabled');
    }
    function addProductToList(id) {
        $.ajax({
            url:'/products/'+id+'/find',
            type:'get',
            dataType:'JSON',
            async:false,
            success:function (data) {
                var dublicated = false;
                var tax = (data.data.tax_percentage / 100 ) * data.data.price;
                var price = data.data.price;
                var total = data.data.price + tax ;
                var item = {id:data.data.id,sku:data.data.sku,name:data.data.name,ar_name:data.data.ar_name,
                    price:price,tax:tax,tax_percentage:data.data.tax_percentage,total:total,qty:1};
                if(products.length > 0){
                    $.each(products,function (k,v) {
                        if(data.data.id === v.id){
                            products[k].qty = products[k].qty+1;
                            products[k].tax = products[k].tax_percentage / 100 * (products[k].price *   products[k].qty);
                            products[k].total = (products[k].price *  products[k].qty + products[k].tax);
                            dublicated = true;
                            return false;
                        }
                    });
                }
               dublicated === false ?  products.push(item) : '';
            }
        });
        return setItemsList();
    }
    // Example Menu

    var menu = [
        {
            item: "Spaghetti",
            price: 9.50,
            tax: true,
            shortname: "Spag",
            category: "entree",
            glCode: "EN10",
        },
    ]
</script>
@endsection