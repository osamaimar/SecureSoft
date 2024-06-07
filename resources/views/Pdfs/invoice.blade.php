<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Example</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            color: #6c757d;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* Set the minimum height of the body to 100% of the viewport height */
        }

        .header {
            text-align: center;
            margin-top: 20px;
            padding: 20px 20px;
            margin-left: 25px;
            margin-right: 25px;

        }

        .content {
            flex-grow: 1;
            /* Expand to fill remaining space */
            text-align: left;
            padding: 0 20px;
            margin-left: 25px;
            margin-right: 25px;
        }

        .footer {
            text-align: center;
            margin-top: auto;
            /* Push the footer to the bottom of the page */
            background-color: #f8f9fa;
            /* Example background color for the footer */
            padding: 20px 0;
            width: 100%;
        }

        .invoice {
            margin-left: 70px;
        }

        .invoice h6 {
            margin-left: 10px;
        }

        .hr {
            margin-bottom: 1rem;
            height: 1px;
            background-color: gray;
            border: 0;
            opacity: 0.25;
            margin-left: 45px;
            margin-right: 45px;
        }

        th,
        td {
            padding-left: 5px;
            font-weight: bold;
        }

        td {
            background-color: rgb(247, 248, 250);
        }

        .summary {
            width: 100%;
            background-color: rgb(247, 248, 250);
            margin-top: 10px;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            

        }
        .summary .unit{
            display: flex;
            justify-content: space-between;
            margin-right: 90px;
        }
    </style>
</head>

<body>
    <div class="header d-flex">
        <div class="text-left">
            <img src="{{asset(\App\Models\Settings::first()->dark_logo)}}" alt="logo" class="desktop-logo">
            <h5 class="mt-2"><strong>{{\App\Models\Settings::first()->name}}</strong></h5>
            <h6>{{\App\Models\Contact::first()->address}}</h6>
            <h6>{{\App\Models\Contact::first()->phone}}</h6>
        </div>
        <div class="text-left invoice">
            <h5 class="mt-2"><strong>INVOICE</strong></h5>
            <h6 class="mt-4">INVOICE TO.</h6>
            <h6 class="mt-3"><strong>{{$invoice->order->merchant->company_name}}</strong></h6>
            <h6 class="">{{$invoice->order->merchant->address}}</h6>
            <h6 class="">{{$invoice->order->merchant->first_phone_number}}</h6>
            <h6 class="">{{$invoice->order->merchant->second_phone_number}}</h6>
        </div>
    </div>
    <div class="hr"></div>
    <div class="content">
        <div class="d-flex mb-3">
            <h6 class="text-left" style="width: 50%;"><strong>DATE:</strong> {{ \Carbon\Carbon::parse($invoice->created_at)->format('F j, Y') }}</h6>
            <h6 class="text-left" style="width: 50%;"><strong>INVOICE NUMBER:</strong> {{$invoice->invoice_number}}</h6>
        </div>
        <table class="table-bordered" style="width: 100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>PRODUCTS</th>
                    <th>QTY</th>
                    <th>UNIT PRICE</th>
                    <th>TOTAL PRICE</th>
                    <th>NOTES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice->order->products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->pivot->quantity}}</td>
                    <td>$ {{$product->min_partner_price}}</td>
                    <td class="text-danger">$ {{$product->min_partner_price}}</td>
                    <td></td>
                    <!-- Add more columns as needed -->
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="summary">
            <div></div>
            <div style="width: 40%">
                <div class="unit">
                    <p><strong>TOTAL AMOUNT:</strong></p>
                    <p><strong class="text-danger">$ {{$invoice->order->total_amount}}</strong></p>
                </div>
                <div class="unit">
                    <p><strong>Payable:</strong></p>
                    <p><strong class="text-danger">$ {{$invoice->order->total_amount}}</strong></p>
                </div>
            </div>

        </div>
    </div>
    <div class="footer">
        <p>PDF Example Footer</p>
    </div>
</body>

</html>