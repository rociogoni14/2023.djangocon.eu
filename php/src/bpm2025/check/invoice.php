<?php


include_once '../utils/connDB.php';
$conn = getConnection();

mysqli_set_charset($conn, 'utf8');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$orderNumber = $_REQUEST['id'];

$query = "SELECT * FROM REGISTRYDATA WHERE ID = '".$orderNumber."'";

$result = $conn->query($query);

$registry = $result->fetch_assoc();

include_once "../data.php";

?>
<style>
    <?php include 'CSS/main.css'; ?>
</style>


<html>
    <head>
        <style>
            html, body {
                width: 75%;
                margin: auto;
                padding: 0;
            }
            </style>
    </head>
    <body>
        <br>
    <div class="orangeBar">
        Invoice and Payment Confirmation
    </div>


    Thank you for your registration. The following information has been received by our system. <br><br>

    <b style="font-size:20px">Event information</b>
    <table class="payment">
        <tr>
            <td>
                <div class='iner'> <b>Event:</b></div>
            </td>
            <td>
            20th International Conference on Service-Oriented Computing
            </td>
        </tr>

        <tr>
            <td>
                <div class='iner'> <b>Event Dates</b></div>
            </td>
            <td>
                <b>:</b> Tuesday, 29.11.22 08:00 - Friday, 02.12.22 18:00
            </td>
        </tr>
    </table>
    
    <hr>
    <b style="font-size:20px">Credit Card Payment Information</b>

        
    <table class="payment">
        <tr>
            <td>
                <div class='iner'> <b>Transaction ID:</b></div>
            </td>
            <td>
                <div><?php echo $registry['MERCODE'] ?><br/>Your credit card has been charged <?php echo $registry['AMOUNT'] ?> EUR.
            </td>
        </tr>

    </table>
    <hr>
    <b style="font-size:20px">Order information</b>

    <table class="payment">

    

        <tr >
            <td>
                <div class='iner'> <b>Date:</b></div>
            </td>
            <td>
                <?php echo $registry['TS'] ?> <br>
            </td>
        </tr>

        <tr >
            <td>
                <div class='iner'> <b>Order number:</b></div>
            </td>
            <td>
                <?php echo $orderNumber ?> <br>
            </td>
        </tr>

        <tr>
            <td>
                <div class='iner'> <b>Order Account:</b></div>
            </td>
            <td>   
                <?php echo "Name: ".$registry['FIRSTNAME'] . ' ' . $registry['LASTNAME'] ?>  <br>
                <?php echo "Organization: ".$registry['ORGANITATION'] ?> <br>
                <?php echo "Address: ".$registry['ADDRESS1'] ?> <br>
                <?php echo $registry['ADDRESS2'] ?> <br>
                <?php echo "City: ".$registry['CITY'] ?> <br>
                <?php echo "Postal Code: ".$registry['POSTALCODE'] ?> <br>
                <?php echo "Country: ".$registry['COUNTRY'] ?> <br>
            </td>
        </tr>

        <tr>
            <td>
                <div class='iner'> <b>Email:</b></div>
            </td>
            <td>
                <?php echo $registry['EMAIL'] ?> <br>
            </td>
        </tr>
    </table>
    <hr>
    <b style="font-size:20px">Order details</b> <br>
    <b>20th International Conference on Service-Oriented Computing (ICSOC 2022)</b> <br><br>
    <div class='orangeText'><b>Registration details</b></div>
    <br>

    <b><?php echo $registry['FIRSTNAME'] . ' ' . $registry['LASTNAME'] ?> </b> <br>


    <table class="paymentFu" style="width:100%">
        <tr>
            <td style="width:55%">
                <b>Item</b>
            </td>
            <td style="text-align: center;width:15%">
                <b>Quantity</b>
            </td>
            <td style="text-align: center;width:15%">
                <b>Unit price</b>
            </td>
            <td style="text-align: center;width:15%">
                <b>Total</b>
            </td>
        </tr>

        <tr>
            <td>
                <?php echo $packages_title[$registry['PACKAGE']]  ?>
            </td>
            <td style='text-align: center;vertical-align:middle'>
                1
            </td>
            <td style='text-align: center;vertical-align:middle'>
                € <?php echo $registry['AMOUNT']?>
                
            </td>
            <td style='text-align: center;vertical-align:middle'>
                € <?php echo $registry['AMOUNT']?>
            </td>
        </tr>
        
    </table> <br>

    <div class='orangeText'><b>Other information</b></div>

    <table style="width:100%">
        <tr>
            <td style='text-align: right;'>
                <div id='totalIzq'>Total charge:  </div>€<?php echo number_format($registry['AMOUNT'], 2)?>
            </td>
        </tr>
        <tr>
            <td style='text-align: right;'>
                <div id='totalIzq'>Amount Paid:  </div>€<?php echo number_format($registry['AMOUNT'], 2)?>
            </td>
        </tr>
        <tr>
            <td style='text-align: right;'>
                <div id='totalIzq'>Amount due:  </div>€0.00
            </td>
        </tr>
    </table>

</body>

</html>
<hr>                          

<b>According to VAT Law 37/1992 art.20.1.9, the registration fee does not contain VAT.</b><br>
<b>Fidetia | Edificio E.T.S. de Ingeniería Informática Avda. Reina Mercedes s/n |41012 Sevilla | Spain | VAT: ESG91045419</b>

<h4>Basic Information on Data Protection:</h4>
    <p><b>Person responsible for processing:</b> Foundation for Research and Development of Information Technologies in Andalusia (FIDETIA).</p>
    <p><b>Purpose of the treatment:</b> to carry out the economic, accounting and fiscal management of our clients and suppliers.</p>
    <p><b>Legitimacy of processing:</b> Contractual relationship.</p>
    <p><b>Addressees:</b> No data will be transferred to third parties except by legal provision.</p>
    <p>No international data transfers will be made.</p>
    <p><b>Rights:</b> You have the right to access, rectify and delete data, as well as other rights as explained in the additional information. Additional information: You can consult the additional and detailed information on Data Protection on the website: www.fidetia.es</p>

    <hr>

<div class="orangeBar"></div> <br>
