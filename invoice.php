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
        <center><img   alt="Logo" style="width: 45%; height: 45%;" id="hotellogo"></center>
        <table class="tab" style="width: 100%;">
            <tbody class="tab">
                <tr class="tab">
                    <td class="tab" style="width: 30%;"><p class="margin-padding-0">SNTN NO:</p></td>
                    <td class="tab"  style="width: 30%;"><p class="margin-padding-0 bold"><span id="srb_sntn">-</span></p></td>
                    <td class="tab"  style="width: 20%;"><p class="margin-padding-0 tab-float-right">User:</p></td>
                    <td class="tab"  style="width: 20%;"><p class="margin-padding-0 tab-float-right bold"><span id="srb_user">-</span></p></td>
                </tr>
                <tr class="tab">
                    <td  class="tab" style="width: 30%;"><p class="margin-padding-0">Address:</p></td>
                    <td class="tab" colspan="3"><p class="margin-padding-0 bold"><span id="srb_add">-</span></p></td>
                </tr>
                <tr class="tab">
                    <td class="tab" style="width: 30%;" colspan="3"><p class="margin-padding-0">Tarrif Heading:</p></td>
                    <td class="tab"  style="width: 30%;" colspan="1"><p class="margin-padding-0 tab-float-right bold"><span id="srb_tarrif">-</span></p></td>
                    
                </tr>
                <tr class="tab">
                     <td class="tab" style="width: 40%;" colspan="3"><p class="margin-padding-0">Order Type:</p></td>
                    <td class="tab"  style="width: 30%;" colspan="1"><p class="margin-padding-0 tab-float-right bold"><span id="srb_ordertype">-</span></p></td>
                </tr>
                <tr class="tab">
                    <td class="tab"  style="width: 30%;" colspan="1"><p class="margin-padding-0 ">INV No:</p></td>
                    <td class="tab"  style="width: 20%;" colspan="3"><p class="margin-padding-0 tab-float-right  bold"><span id="srb_invno">-</span></p></td>
                </tr>
            <!--     <tr class="tab">
                    <td class="tab" style="width: 30%;" ><p class="margin-padding-0">Table No:</p></td>
                    <td class="tab"  style="width: 30%;" colspan="2"><p class="margin-padding-0 bold">RT-Fatima Hall 1.</p></td>
                    <td class="tab"  style="width: 20%;"><p class="margin-padding-0 tab-float-right">Persons:</p></td>
                    <td class="tab"  style="width: 20%;"><p class="margin-padding-0 tab-float-right bold">5</p></td>
                </tr> -->
                <tr class="tab">
                   
                    <td class="tab"  style="width: 20%;" colspan="1"><p class="margin-padding-0 ">Date:</p></td>
                    <td class="tab"  style="width: 20%;" colspan="3"><p class="margin-padding-0 tab-float-right  bold"><span id="srb_odate">-</span></p></td>
                </tr>
           <!--      <tr class="tab">
                    <td class="tab" style="width: 20%; text-align: center;" colspan="4"><p class="margin-padding-0 bold">COPY</p></td>
                </tr> -->
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
            </tbody>
        </table>
        <table style="width:100%">
            <tbody>
           
            </tbody>
        </table>
        
        <table style="border-top: 0px solid black !important; width: 100% !important;">
            <tr class="tab">
                <td class="tab">
                    <center><p class="margin-padding-0">SRB Inv ID :<span id="srb_inv_id">-</span> </p></center>
                </td>
            </tr>
            <tr class="tab">
                <td class="tab">
                    <center><p class="margin-padding-0">SRB POS ID :<span id="srb_pos_id">-</span> </p></center>
                </td>
            </tr>
            <tr class="tab">
                <td class="tab">
                   <center> <img style="width: 7rem;" id="qrcode"> </center>
                </td>
            </tr>
        </table>
        <!-- </table> -->
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