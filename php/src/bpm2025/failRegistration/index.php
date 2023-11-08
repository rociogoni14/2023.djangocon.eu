<?php


include_once '../utils/connDB.php';

$conn = getConnection();

$logfilename = "log.txt";

// For developlment environment, this vars are overrided  
//  with the values in docker-compose.yaml

if (array_key_exists('LOG_FILENAME', $_ENV)) {
	$logfilename = $_ENV["LOG_FILENAME"];   
}

$logfile = dirname(__FILE__)."/../".$logfilename;

$log  = "!!!!!!!!!!!!!! FAILED REGISTRATION !!!!!!!!!!!!!!".PHP_EOL.
        "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
        "Request: ".json_encode($_GET,JSON_PRETTY_PRINT).PHP_EOL.
        "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!".PHP_EOL;

//Save string to log, use FILE_APPEND to append.
file_put_contents($logfile, $log, FILE_APPEND);


mysqli_close($conn);

?><!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ICSOC 2022 Registration problem</title>

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

	<div class="row t30">
	<div class="medium-8 columns medium-offset-2 end">
		<article itemscope itemtype="http://schema.org/Article">
      <header>
        <div itemprop="name">
           <h1>Registration Problem</h1>
           <hr>
        </div>
     </header>


			

			<div itemprop="articleSection">
			<p>Something went wrong with the payment process, please <a href="/icsoc2022/">repeat it</a> and, in case the problem persists, please report the problem to <em>icsoc2022@us.es</em>.</p>
         <div id="code" style="color: gray; font-size: 0.7em;"></div>
			</div>

			

			
		</article>
	</div><!-- /.medium-8.columns -->


	


	
</div><!-- /.row -->



<div id="up-to-top" class="row">
  <div class="small-12 columns" style="text-align: right;">
  <a class="iconfont" href="#top-of-page">&#xf108;</a>
  </div><!-- /.small-12.columns -->
</div><!-- /.row -->

<footer id="footer-content" class="bg-grau">
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
<script>
   const params = new Proxy(new URLSearchParams(window.location.search), {
      get: (searchParams, prop) => searchParams.get(prop),
   });
   let code = params.code; // "some_value";
   if (code)
      document.getElementById("code").innerText = `(Code ${code})`;
</script>
</body>
</html>
