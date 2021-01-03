
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt example</title>
    <style>
        @page {
            header: page-header;
            footer: page-footer;
        }

        * {
            font-size: 49px;
            font-family: 'Times New Roman';
            text-align: center;
        }
        body {
            width: 100%;
            font-size: 30px;
            margin: 0;
            left: 0;
            padding: 0;
            font-family:  "DejaVu Sans";
        }
        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
            width: 100%;
        }
        .page-break {
            page-break-after: always;
        }
        td.description,
        th.description {
            width: 75px;
            max-width: 75px;
        }

        td.quantity,
        th.quantity {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {

            width: 100%;
            /*width: 58mm;*/
            /*max-width: 58mm;*/
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @media print {
            /*.hidden-print,*/
            /*!*.hidden-print * {*!*/
                /*!*display: none !important;*!*/
            /*!*}*!*/
            body{
                margin: 0;
            }
        }
    </style>
</head>
<body>
{{--<img src="https://parzibyte.github.io/print-receipt-thermal-printer/logo.png" alt="Logo">--}}
<htmlpageheader name="page-header" style="align-content: center;">
    NOVA PASTRY
    <br>YANBU, AL-Surif Distract
    <br>Omer Bin Abdulaziz Street
    <br>Phone:0597527275
    <br>TaxID:0597527275
    <br>Invoice: {{$order['reference']}}
    <br>DATE: {{$order['created_at']}}
</htmlpageheader>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table class="centered" style="align-content:center; width:43%; ">
    <thead>
    <tr>
        <th class="quantity">Q.</th>
        <th class="description">Description</th>
        <th class="description"></th>
        <th class="price">Price</th>
    </tr>
    </thead>
    <tbody>
    @if($order['items']) @foreach($order['items'] as $value)
        <tr >
            <td class="quantity">x {{$value['qty']}}</td>
            <td class="description">{{$value['product']['name']}}</td>
            <td class="description">{{$value['product']['ar_name']}}</td>
            <td class="price">{{$value['subtotal']}} SAR</td>
        </tr>
    @endforeach @endif
    </tbody>
</table>
<htmlpagefooter name="page-footer" style="align-content: center;">
    <p>--------------------------------------------------</p>
    <p>Subtotal: {{$order['subtotal']}}SAR:الاجمالي الجزئي</p>
    <p>--------------------------------------------------</p>
    <p>Total Discount:{{$order['total_discount_amount']}}SAR:اجمالي الخصم</p>
    <p>--------------------------------------------------</p>
    <p>Total Tax:{{$order['total_tax_amount']}}SAR:15% قيمة الضريبة </p>
    <p>--------------------------------------------------</p>
    <p>Total: {{$order['total_amount']}}SAR:الاجمالي</p>
    <p>--------------------------------------------------</p>
    <p>Total DUE: {{$order['total_due']}}SAR:الاجمالي المدفوع</p>
    <p>--------------------------------------------------</p>
    <p>Total DUE: {{$order['outstanding_balance']}}SAR:الاجمالي المتبقي</p>
    <p>--------------------------------------------------</p>
    Thanks for your purchase...
    <br>
    شكرا لشرائكم....
    <br>
    <br>
</htmlpagefooter>

</body>
</html>