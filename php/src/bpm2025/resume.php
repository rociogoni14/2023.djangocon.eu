---
description: Order details about registration to BPM2025
heading: Order details
layout: default
permalink: /resume.php/
published: true
title: BPM2025 Registration 
---

	<div class="row t20">
	<div class="medium-8 columns medium-offset-2 end">
		<article itemscope itemtype="http://schema.org/Article">
			<header>
				<div itemprop="name">
					<h1 style="text-align:center;">Order details</h1>
					<hr>
				</div>
			</header>


			

			<div itemprop="articleSection">

    <script> 

    var mapPro = <?php echo json_encode($_POST); ?>;

    </script>

    <?php

    $firstname = !empty($_REQUEST['name']) ? $_REQUEST['name'] : '';
    $lastname = !empty($_REQUEST['lastName']) ? $_REQUEST['lastName'] : '';
    $email = !empty($_REQUEST['email']) ? $_REQUEST['email'] : '';
    $gender = !empty($_REQUEST['gender']) ? $_REQUEST['gender'] : '';
    $organization = !empty($_REQUEST['organization']) ? $_REQUEST['organization'] : '';

    $address1 = !empty($_REQUEST['address1']) ? $_REQUEST['address1'] : '';
    $address2 = !empty($_REQUEST['address2']) ? $_REQUEST['address2'] : '';
    $city = !empty($_REQUEST['city']) ? $_REQUEST['city'] : '';
    $postal = !empty($_REQUEST['postal']) ? $_REQUEST['postal'] : '';
    $country = !empty($_REQUEST['country']) ? $_REQUEST['country'] : '';
    $paper = !empty($_REQUEST['paper']) ? $_REQUEST['paper'] : '';
    $fa = !empty($_REQUEST['fa']) ? $_REQUEST['fa'] : '';
    $package = !empty($_REQUEST['package']) ? $_REQUEST['package'] : "";

    include_once "data.php";

    ?>

    <div> <strong>23rd International Conference on Business and Process Management (BPM2025)</strong> </div>

    <div> <strong>Event Dates: </strong>Sunday, 31/08/25 - Friday, 5/09/25 </div>
    <p><br /></p>
    <div class="orangeBar">Summary</div>
    <p><br /></p>
    
    <?php
        if($paper != ''){
            echo "<div>Paper ID: <strong>".$paper."</strong></div>";    
        }
    ?>

    <table class="table">
        <thead>
            <tr>
                <th style="text-align: left;">Item</th>
                <th>Quantity</th>
                <th>Unit price</th>
                <th>Total</th>
            </tr>
        </thead>
        
        <tr id="column1">
            <td id="left">
                <div id="quantity_title">
                    <strong><?php echo $packages_title[$package] ?></strong>
                </div>
            </td>
            <td style="text-align: center;">
                <div id="quantity">1</div>
            </td>
            <td style="text-align: right;">
            <?php echo $packages_price[$package]?>€
            </td>
            <td style="text-align: right;">
                <div id="money2"><?php echo $packages_price[$package]?>€</div>
            </td>
        </tr>
        
    </table>

    <table style="width:100%">
        <tr>
            <td style="text-align: right;">
                <div id="totalIzq">Total charge:  </div><div id="total"><?php echo $packages_price[$package]?>€</div>
            </td>
        </tr>
        <tr>
            <td style="text-align: right;">
                <div id="totalIzq">Amount due:  </div><div id="total1"><?php echo $packages_price[$package]?>€</div>
            </td>
        </tr>
    </table>

    <div class="orangeBar">Payment Information</div>
    <p><br /></p>

    <p>When you click <em>CONFIRM ORDER</em> you will be redirected to the payment gateway (SSL secured by Redsys by Santander Bank) to enter the credit card information for the payment.
    <img src="assets/img/visa-and-mastercard.png" width="150" height="50" /><br /><br/></p>


    <p><em style="color: red">IMPORTANT</em>: In order to register the transaction in our DB, please be sure to press "CONTINUE" button, in the last step of the process:
    <img style="align:center" src="assets/img/SC-Important.png" width="600" /><br /></p>


    <form action="check/check.php" accept-charset="UTF-8" enctype="multipart/form-data" method="POST">
    <?php
    echo "<input type='hidden' name='email' value='$email'>";
    echo "<input type='hidden' name='name' value='$firstname'>";
    echo "<input type='hidden' name='lastName' value='$lastname'>";
    echo "<input type='hidden' name='gender' value='$gender'>";
    echo "<input type='hidden' name='organization' value='$organization'>";
    echo "<input type='hidden' name='address1' value='$address1'>";
    echo "<input type='hidden' name='address2' value='$address2'>";
    echo "<input type='hidden' name='city' value='$city'>";
    echo "<input type='hidden' name='postal' value='$postal'>";
    echo "<input type='hidden' name='country' value='$country'>";
    echo "<input type='hidden' name='fa' value='$fa'>";
    echo "<input type='hidden' name='paper' value='$paper'>";   
    echo "<input type='hidden' name='package' value='$package'>";
    ?>



        <div id="total">
            <input class="button" id="confirm" type="submit" onclick="javascript: sessionStorage.clear();" value="CONFIRM ORDER" /> 
        </div>
        <div id="total1">
            <input type="button" class="button" onclick="document.location.href='./index.html'" value="Go back" />
        </div>
    </form>

                </div>			
            </article>
        </div><!-- /.medium-8.columns -->

    </div><!-- /.row -->
    


