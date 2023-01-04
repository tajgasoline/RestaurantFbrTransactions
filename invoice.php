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
 
        <h6 class="cust-cla" style="text-align: center;" >STNT NO:S113071-7
        <h6 class="cust-cla" style="text-align: center;"><b><span id="staffusername">Salman</span></h6>
        <div class="">
            <h6 class="cust-cla" style="text-align: center; width: 100%; height: 10%;"><b>Address: </b> AUTOBHAN ROAD,
                HYDERABAD
                <b>BILL</b>
            </h6>
            <h6 class="cust-cla" style="text-align: center;"><b> Tarrif Heading: </b> 9801.2000
                <b>COPY</b>
            </h6>
            <div style="clear: both">
                <h6 style="text-align: center;" class="cust-cla"><b>KOT NO:</b></h6>
                <h6 style="text-align: center;" class="cust-cla"><b>INV No: </b><span id="transactionid">00000</span></h6>

            </div>
            <div style="clear: both">
                <h6 style="text-align: center;" class="cust-cla"><b>Table No: </b>RT-Fatima Hall 1.</h6>
                <h6 style="text-align: center;" class="cust-cla"><b>Persons: </b><span id="PERSONS">5</span></h6>

                <h6 style="text-align: center;" class="cust-cla"><b>Order Type: </b> <span id="ORDERTYPE">Dine In</span></h6>
                <h6 style="text-align: center;" class="cust-cla"><b>Date: </b><span id="STARTDATE">04/01/2023</span></h6>
            </div>
        </div>
        </p>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>

                </tr>
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