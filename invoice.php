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
        <table class="tab">
            <tbody class="tab">
                <tr class="tab">
                    <td class="tab">STNT NO:S113071-7</td>

                    <td class="tab">Salman</td>
                </tr>
                <tr class="tab">
                    <td colspan="2" class="tab"> <b>Address: </b> AUTOBHAN ROAD,
                        HYDERABAD</td>

                    <td class="tab"></td>
                </tr>
                <tr class="tab">
                    <td colspan="2" class="tab"> <b> Tarrif Heading: </b> 9801.2000</td>
            </h6>

                    <td class="tab"><b>COPY</b></td>
                </tr>
                <tr class="tab">
                    <td colspan="2" class="tab"><b>KOT NO:</b>

                    <td class="tab"><b>INV No: </b><span id="transactionid">00000</span></td>
                </tr>

                <tr class="tab">
                    <td colspan="2" class="tab"><b>Table No: </b>RT-Fatima Hall 1.</h6></td>

                    <td class="tab"><b>Persons: </b><span id="PERSONS">5</span></td>
                </tr>

                <tr class="tab">
                    <td colspan="2" class="tab"><b>Order Type: </b> <span id="ORDERTYPE">Dine In</span></td>

                    <td class="tab"><b>Date: </b><span id="STARTDATE">04/01/2023</span></td>
                </tr>
            </tbody>
        </table>

        <table>
            <thead>
                <th>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>

                </th>
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
                    <td colspan="4" style="text-align: center;">Change Back</td>
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