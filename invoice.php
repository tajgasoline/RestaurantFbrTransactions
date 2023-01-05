<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="assets/printer/printer.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

    <title>Receipt example</title>
</head>

<body style="padding: 0px 10px !important;">
    <div class="ticket">
        
        <center><img src="assets/images/hoteltaj.png" alt="Logo" style="width: 45%; height: 45%;"></center>
        <table class="tab" style="width: 100%;">
            <tbody class="tab">
                <tr class="tab">
                    <td class="tab" style="width: 30%;"><p class="margin-padding-0">STNT NO:</p></td>
                    <td class="tab"  style="width: 30%;"><p class="margin-padding-0 bold">S113071-7</p></td>
                    <td class="tab"  style="width: 20%;"><p class="margin-padding-0 tab-float-right">User:</p></td>
                    <td class="tab"  style="width: 20%;"><p class="margin-padding-0 tab-float-right bold">Salman</p></td>
                </tr>
                <tr class="tab">
                    <td  class="tab" style="width: 30%;"><p class="margin-padding-0">Address:</p></td>
                    <td class="tab" colspan="3"><p class="margin-padding-0 bold">AUTOBHAN ROAD,HYD</p></td>

                </tr>
                <tr class="tab">
                    <td class="tab" style="width: 30%;" colspan="3"><p class="margin-padding-0">Tarrif Heading:</p></td>
                    <td class="tab"  style="width: 30%;" colspan="1"><p class="margin-padding-0 bold">9801.2000</p></td>

                </tr>
                <tr class="tab">
                    <td class="tab" style="width: 30%;"><p class="margin-padding-0">KOT NO:</p></td>
                    <td class="tab"  style="width: 20%;"><p class="margin-padding-0 bold">0000</p></td>
                    <td class="tab"  style="width: 40%;"><p class="margin-padding-0 tab-float-right">INV No:</p></td>
                    <td class="tab"  style="width: 20%;"><p class="margin-padding-0 tab-float-right bold">00000</p></td>
                </tr>

                <tr class="tab">
                    <td class="tab" style="width: 30%;" ><p class="margin-padding-0">Table No:</p></td>
                    <td class="tab"  style="width: 30%;" colspan="2"><p class="margin-padding-0 bold">RT-Fatima Hall 1.</p></td>
                    <td class="tab"  style="width: 20%;"><p class="margin-padding-0 tab-float-right">Persons:</p></td>
                    <td class="tab"  style="width: 20%;"><p class="margin-padding-0 tab-float-right bold">5</p></td>
                </tr>
                <tr class="tab">
                    <td class="tab" style="width: 40%;"><p class="margin-padding-0">Order Type:</p></td>
                    <td class="tab"  style="width: 30%;"><p class="margin-padding-0 bold">Dine In</p></td>
                    <td class="tab"  style="width: 20%;"><p class="margin-padding-0 tab-float-right">Date:</p></td>
                    <td class="tab"  style="width: 20%;"><p class="margin-padding-0 tab-float-right bold">04/01/2023</p></td>
                </tr>
                <tr class="tab">
                    <td class="tab" style="width: 20%; text-align: center;" colspan="4"><p class="margin-padding-0 bold">COPY</p></td>
                </tr>
            </tbody>
        </table>

        <table>
            <thead>
                
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>

                
            </thead>
            <tbody id="tbody">
                <tr>
                    <th>Family Festival-3 01</th>
                    <td>1</td>
                    <td>2,090.00</td>
                    <td>2,090.00</td>

                </tr>
                <tr>
                    <th>Subtotal</th>
                    <td></td>
                    <td></td>
                    <td>1430</td>

                </tr>
                <tr>
                    <th>SST13%</th>
                    <td></td>
                    <td></td>
                    <td>19661</td>
                </tr>
                <tr>
                    <th>Total Discount</th>
                    <td></td>
                    <td></td>
                    <td>0.00</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td></td>
                    <td></td>
                    <td>170906</td>
                </tr>
                <tr>
                    <th>CASH</th>
                    <td></td>
                    <td></td>
                    <td>171,000</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center;"><p class="bold">Change Back</p></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
                <tr>
                    <th>CASH</th>
                    <td></td>
                    <td></td>
                    <td>93.00</td>

                </tr>
                <tr>
                    <th></th>
                    <td></td>
                    <td></td>
                    <td>0.00</td>
                </tr>

                </tr>
            </tbody>

        </table>



        </table>
        <p class="centered">Thank You For Coming
            <br>See You Again
        </p>
    </div>
    <button id="btnPrint" class="hidden-print">Print</button>
    <script src="printer.js"></script>



    <script src="assets/printer/printer.js"></script>
    <script src="functions/Invoice.js"></script>
</body>

</html>