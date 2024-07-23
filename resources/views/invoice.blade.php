<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: center;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(5) {
            border: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(5) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="5">
                    <table>
                        <tr>
                            <td class="title">
                                <img src='medist.jpg' style="width: 35%; max-width: 300px" />
                            </td>
                            <td>
                                Invoice #: {{ rand(1, 100) }}<br />
                                Created: {{ date('d l m Y') }} <br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="5">
                    <table>
                        <tr>
                            <td style="text-align: right;"> Address :
                                {{ $pharmacist->address->name }}<br />
                                {{ $pharmacist->address->city }}<br />
                                {{ $pharmacist->address->region }}<br />
                                {{ $pharmacist->address->street }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>



            <tr class="heading">
                <td>Medicine</td>
                <td>Dose</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>Overall Price</td>
            </tr>

            @foreach ($order->medicines as $medicine)
                <tr class="item">
                    <td>{{ $medicine->medicine->commercial_name }}</td>
                    <td>{{ $medicine->dose->dose }}</td>
                    <td>{{ $medicine->quantity }}</td>
                    <td>{{ $medicine->price }}</td>
                    <td>{{ $medicine->quantity * $medicine->price }}</td>
                </tr>
            @endforeach

            <br>
            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Total: {{ $order->bill }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
