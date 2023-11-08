<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ICSOC 2022 Registration Order</title>

    <link rel="stylesheet" type="text/css" href="/icsoc2022/assets/css/styles_feeling_responsive.css">

  

	<script src="/icsoc2022/assets/js/modernizr.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				families: [ 'Lato:400,700,400italic:latin', 'Volkhov::latin' ]
			}
		});
	</script>

	<noscript>
		<link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic%7CVolkhov' rel='stylesheet' type='text/css'>
	</noscript>


	<link rel="icon" sizes="32x32" href="/icsoc2022/assets/img/favicon-32x32.png">


	<meta name="msapplication-TileColor" content="#fabb00">


	

</head>
<body id="top-of-page" class="post">
	

<div id="masthead" style="background-image: url('/icsoc2022/check/images/pe4.jpg'); background-repeat: no-repeat; background-size: cover;">
	<div class="large-12 columns" style="display:flex; justify-content: center">
			<a id="logo" href="./" title="ICSOC 2022 – 20th International Conference on Service-Oriented Computing
            November 29th" >
				<img src="/icsoc2022/check/images/cl.png" alt="ICSOC 2022 – 20th International Conference on Service-Oriented Computing">
			</a>
	</div>
</div>

	<div class="row t20">
	<div class="medium-8 columns medium-offset-2 end">
		<article itemscope itemtype="http://schema.org/Article">
			<header>
				<div itemprop="name">
					<h1>Order details</h1>
					<hr>
				</div>
			</header>


			

			<div itemprop="articleSection">
			<link rel="stylesheet" href="/icsoc2022/assets/css/style.css" />


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

    <div> <strong>20th International Conference on Service Oriented Computing (ICSOC 2022)</strong> </div>

    <div> <strong>Event Dates: </strong>Tuesday, 29/11/22 - Friday, 02/12/22 </div>
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
    <img src="/icsoc2022/assets/img/visa-and-mastercard.png" width="150" height="50" /><br /><br/></p>


    <p><em style="color: red">IMPORTANT</em>: In order to register the transaction in our DB, please be sure to press "CONTINUE" button, in the last step of the process:
    <img style="align:center" src="/icsoc2022/assets/img/SC-Important.png" width="600" /><br /></p>


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


    <footer id="footer-content" class="bg-grau">
        <div id="up-to-top" class="row">
        <div class="small-12 columns" style="text-align: right;">
            <a class="iconfont" href="#top-of-page">&#xf108;</a>
        </div><!-- /.small-12.columns -->
        </div><!-- /.row -->


        <div id="subfooter">   
            <nav class="row">
            <section class="small-12 medium-6 columns">
                    <a href="https://icsoc2022.spilab.es/contact/" target="_blank">CONTACT <i class="icon-mail"></i> </a> <br>
                    <a href="https://icsoc2022.spilab.es/legal/" target="_blank">Legal warning </a>
                <section id="subfooter-left" class="credits">
                <p> Theme based on <a href="http://phlow.github.io/feeling-responsive/">Feeling Responsive</a>.</p>    
                </section>
            </section>

            <section id="subfooter-right" class="small-12 medium-6 columns">
                <ul class="inline-list social-icons">
                
                <li><a href="http://twitter.com/icsoc2022" target="_blank" class="icon-twitter" title="Follow the latest news on our Twitter"></a></li>
                            
                </ul>
            </section>
            
                
            </nav>
        </div><!-- /#subfooter -->
    </footer>

<script src="./assets/js/javascript.min.js"></script>

</body>
</html>

