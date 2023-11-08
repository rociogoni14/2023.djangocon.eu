<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" >
<xsl:output method="html" encoding="utf-8" />
<xsl:template match="/rss">
	<xsl:text disable-output-escaping="yes">&lt;!DOCTYPE html &gt;</xsl:text>
	<html>
	<head>
		<xsl:text disable-output-escaping="yes"><![CDATA[
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RSS Feed (Styled)</title>

    <link rel="stylesheet" type="text/css" href="https://congreso.us.es/bpm2020/assets/css/styles_feeling_responsive.css">

  

	<script src="https://congreso.us.es/bpm2020/assets/js/modernizr.min.js"></script>

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


	<!-- Search Engine Optimization -->
	<meta name="description" content="18th Int. Conference on Business Process Management (BPM 2020)">
	<meta name="google-site-verification" content="Vk0IOJ2jwG_qEoG7fuEXYqv0m2rLa8P778Fi_GrsgEQ">
	<meta name="msvalidate.01" content="0FB4C028ABCF07C908C54386ABD2D97F" >
	
	<link rel="author" href="https://plus.google.com/u/0/118311555303973066167">
	
	
	<link rel="canonical" href="https://congreso.us.es/bpm2020/assets/xslt/rss.xslt">


	<!-- Facebook Open Graph -->
	<meta property="og:title" content="RSS Feed (Styled)">
	<meta property="og:description" content="18th Int. Conference on Business Process Management (BPM 2020)">
	<meta property="og:url" content="https://congreso.us.es/bpm2020/assets/xslt/rss.xslt">
	<meta property="og:locale" content="en_EN">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="BPM 2020">
	
	<meta property="article:author" content="https://www.facebook.com/phlow.media">


	
	<!-- Twitter -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="phlow">
	<meta name="twitter:creator" content="phlow">
	<meta name="twitter:title" content="RSS Feed (Styled)">
	<meta name="twitter:description" content="18th Int. Conference on Business Process Management (BPM 2020)">
	
	

	<link type="text/plain" rel="author" href="https://congreso.us.es/bpm2020/humans.txt">

	

	

	<link rel="icon" sizes="32x32" href="https://congreso.us.es/bpm2020/assets/img/favicon-32x32.png">

	<link rel="icon" sizes="192x192" href="https://congreso.us.es/bpm2020/assets/img/touch-icon-192x192.png">

	<link rel="apple-touch-icon-precomposed" sizes="180x180" href="https://congreso.us.es/bpm2020/assets/img/apple-touch-icon-180x180-precomposed.png">

	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="https://congreso.us.es/bpm2020/assets/img/apple-touch-icon-152x152-precomposed.png">

	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://congreso.us.es/bpm2020/assets/img/apple-touch-icon-144x144-precomposed.png">

	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="https://congreso.us.es/bpm2020/assets/img/apple-touch-icon-120x120-precomposed.png">

	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://congreso.us.es/bpm2020/assets/img/apple-touch-icon-114x114-precomposed.png">

	
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="https://congreso.us.es/bpm2020/assets/img/apple-touch-icon-76x76-precomposed.png">

	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://congreso.us.es/bpm2020/assets/img/apple-touch-icon-72x72-precomposed.png">

	<link rel="apple-touch-icon-precomposed" href="https://congreso.us.es/bpm2020/assets/img/apple-touch-icon-precomposed.png">	

	<meta name="msapplication-TileImage" content="https://congreso.us.es/bpm2020/assets/img/msapplication_tileimage.png">

	<meta name="msapplication-TileColor" content="#fabb00">


	

		]]></xsl:text>
	</head>
	<body id="top-of-page">
		<xsl:text disable-output-escaping="yes"><![CDATA[
		
<div id="navigation" class="sticky">
  <nav class="top-bar stacked-for-medium stacked-for-large" role="navigation" data-topbar>
    <ul class="title-area">
      <li class="name">
      <h1 class="show-for-small-only"><a href="https://congreso.us.es/bpm2020"><img src="https://congreso.us.es/bpm2020/assets/img/logo.png" height="45" width="45" alt="BPM 2020"> </a></h1>
    </li>
       <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>
    <section class="top-bar-section">

      <ul class="right">
        

              

          
          
        

              

          
          
        

              

          
          
        

              

          
          
        

              

          
          
        

              

          
          
        

              

          
          
        

              

          
          
        
        
      </ul>

      <ul class="left">
        

              

          
          

            
            
              <li><a  href="https://congreso.us.es/bpm2020/">Home</a></li>
              <li class="divider"></li>

            
            
          
        

              

          
          

            
            

              <li class="has-dropdown">
                <a  href="https://congreso.us.es/bpm2020/conference/track/">Conference</a>

                  <ul class="dropdown">
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/conference/track/">Track Structure</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/conference/steering/">BPM Steering Committee</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/conference/chairs/">Conference Chairs</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/conference/program/">Program Committee</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/conference/sponsors/">Sponsors and Partners</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/conference/awards/">Awards</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/conference/pictures/">Pictures</a></li>
                    
                  </ul>

              </li>
              <li class="divider"></li>
            
          
        

              

          
          

            
            

              <li class="has-dropdown">
                <a  href="https://congreso.us.es/bpm2020/calls/research/">Calls</a>

                  <ul class="dropdown">
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/calls/keydates/">Key Dates</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/calls/research/">Call for Research Papers</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/calls/industry/">Call for Industry Forum</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/calls/blockchain/">Call for Blockchain Forum</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/calls/rpa/">Call for RPA Forum</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/calls/workshop/">Call for Workshop Proposals</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/calls/tutorials/">Call for Tutorials</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/calls/demos/">Call for Demos &amp; Resources</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/calls/doctoral/">Call for Doctoral Consortium</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/calls/dissertation/">Call for Best BPM Dissertation Award</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/calls/socials/">Call for Virtual Socials and Mentoring sessions</a></li>
                    
                  </ul>

              </li>
              <li class="divider"></li>
            
          
        

              

          
          

            
            

              <li class="has-dropdown">
                <a  href="https://congreso.us.es/bpm2020/program/structure/">Program</a>

                  <ul class="dropdown">
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/program/structure/">Structure</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/program/keynotes/">Keynotes</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/program/tutorials/">Tutorials</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/program/panels/">Panels</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/program/accepted/">Accepted Papers</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/program/social/">Social Events</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/program/proceedings/">Proceedings</a></li>
                    
                  </ul>

              </li>
              <li class="divider"></li>
            
          
        

              

          
          

            
            
              <li><a  href="https://congreso.us.es/bpm2020/workshops/">Workshops</a></li>
              <li class="divider"></li>

            
            
          
        

              

          
          

            
            
              <li><a  href="https://congreso.us.es/bpm2020/registration/">Registration</a></li>
              <li class="divider"></li>

            
            
          
        

              

          
          

            
            

              <li class="has-dropdown">
                <a  href="https://congreso.us.es/bpm2020/venue/conference/">Former venue</a>

                  <ul class="dropdown">
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/venue/conference/">Conference Venue</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/venue/howto/">How to get there</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/venue/accommodation/">Where to stay</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/venue/visa/">Visa information</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/venue/sevilla/">Sevilla</a></li>
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/venue/getting/">Getting around</a></li>
                    
                  </ul>

              </li>
              <li class="divider"></li>
            
          
        

              

          
          

            
            

              <li class="has-dropdown">
                <a  href="https://congreso.us.es/bpm2020/other/">Co-Located Events</a>

                  <ul class="dropdown">
                    

                      

                      <li><a  href="https://congreso.us.es/bpm2020/other/bpm-it-management">BPM in IT management</a></li>
                    
                  </ul>

              </li>
              <li class="divider"></li>
            
          
        
        
      </ul>
    </section>
  </nav>
</div><!-- /#navigation -->

		

<div id="masthead-no-image-header">
	<div class="row">
			<a id="logo" href="https://congreso.us.es/bpm2020/" title="BPM 2020 – 18th Int. Conference on Business Process Management">
				<img src="https://congreso.us.es/bpm2020/assets/img/logo.png" alt="BPM 2020 – 18th Int. Conference on Business Process Management">
			</a>
	</div><!-- /.row -->
</div><!-- /#masthead -->








		


<div class="alert-box warning text-center"><p>This <a href="https://en.wikipedia.org/wiki/RSS" target="_blank">RSS feed</a> is meant to be used by <a href="https://en.wikipedia.org/wiki/Template:Aggregators" target="_blank">RSS reader applications and websites</a>.</p>
</div>



		]]></xsl:text>
		<header class="t30 row">
	<p class="subheadline"><xsl:value-of select="channel/description" disable-output-escaping="yes" /></p>
	<h1>
		<xsl:element name="a">
			<xsl:attribute name="href">
				<xsl:value-of select="channel/link" />
			</xsl:attribute>
			<xsl:value-of select="channel/title" disable-output-escaping="yes" />
		</xsl:element>
	</h1>
</header>
<ul class="accordion row" data-accordion="">
	<xsl:for-each select="channel/item">
		<li class="accordion-navigation">
			<xsl:variable name="slug-id">
				<xsl:call-template name="slugify">
					<xsl:with-param name="text" select="guid" />
				</xsl:call-template>
			</xsl:variable>
			<xsl:element name="a">
				<xsl:attribute name="href"><xsl:value-of select="concat('#', $slug-id)"/></xsl:attribute>
				<xsl:value-of select="title"/>
				<br/>
				<small><xsl:value-of select="pubDate"/></small>
			</xsl:element>
			<xsl:element name="div">
				<xsl:attribute name="id"><xsl:value-of select="$slug-id"/></xsl:attribute>
				<xsl:attribute name="class">content</xsl:attribute>
				<h1>
					<xsl:element name="a">
						<xsl:attribute name="href"><xsl:value-of select="link"/></xsl:attribute>
						<xsl:value-of select="title"/>
					</xsl:element>
				</h1>
				<xsl:value-of select="description" disable-output-escaping="yes" />
			</xsl:element>
		</li>
	</xsl:for-each>
</ul>

		<xsl:text disable-output-escaping="yes"><![CDATA[
		    <div id="up-to-top" class="row">
      <div class="small-12 columns" style="text-align: right;">
        <a class="iconfont" href="#top-of-page">&#xf108;</a>
      </div><!-- /.small-12.columns -->
    </div><!-- /.row -->


    <footer id="footer-content" class="bg-grau">
      <div id="footer">
        <div class="row">
            <ul class="inline-list sponsor-icons">
            
              <li><a href="https://www.signavio.com" title="" target="_blank"><img src='/bpm2020/images/signavio.png'/></a></li>
            
              <li><a href="https://www.celonis.com" title="" target="_blank"><img src='/bpm2020/images/celonis.png'/></a></li>
            
              <li><a href="https://dcrsolutions.net" title="" target="_blank"><img src='/bpm2020/images/dcr.png'/></a></li>
            
              <li><a href="https://www.auraportal.com/" title="" target="_blank"><img src='/bpm2020/images/auraportal.png'/></a></li>
            
              <li><a href="https://www.isis-papyrus.com/" title="" target="_blank"><img src='/bpm2020/images/papyrus.jpg'/></a></li>
            
              <li><a href="https://www.springer.com/" title="" target="_blank"><img src='/bpm2020/images/springer.png'/></a></li>
            
              <li><a href="https://www.us.es" title="" target="_blank"><img src='/bpm2020/images/us_t.png'/></a></li>
            
              <li><a href="" title="" target="_blank"><img src='/bpm2020/images/i3us.png'/></a></li>
            
              <li><a href="" title="" target="_blank"><img src='/bpm2020/images/score.png'/></a></li>
            
              <li><a href="https://www.sistedes.es/" title="" target="_blank"><img src='/bpm2020/images/sistedes.png'/></a></li>
            
            </ul>          
        </div>
      </div><!-- /#footer -->


      <div id="subfooter">   
        <nav class="row">
          <section class="small-12 medium-6 columns">
                <a href="https://congreso.us.es/bpm2020/contact/">CONTACT <i class="icon-mail"></i> </a> <br>
                <a href="https://congreso.us.es/bpm2020/legal/">Legal warning </a>
            <section id="subfooter-left" class="credits">
              <p> Theme based on <a href="http://phlow.github.io/feeling-responsive/">Feeling Responsive</a>.</p>    
            </section>
          </section>

          <section id="subfooter-right" class="small-12 medium-6 columns">
            <ul class="inline-list social-icons">
            
              <li><a href="http://twitter.com/BPMConf" target="_blank" class="icon-twitter" title="Follow the latest news on our Twitter"></a></li>
            
              <li><a href="https://www.facebook.com/bpm.conference/" target="_blank" class="icon-facebook" title="Check the latest news on our Faceboook page"></a></li>
            
              <li><a href="https://www.linkedin.com/groups/8690341/" target="_blank" class="icon-linkedin" title="Follow the information about the conference in LinkedIn"></a></li>
            
            </ul>
          </section>
          
            
        </nav>
      </div><!-- /#subfooter -->
    </footer>

		


<script src="https://congreso.us.es/bpm2020/assets/js/javascript.min.js"></script>







<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60112281-1', 'auto');
  ga('set', 'anonymizeIp', true);
  ga('send', 'pageview');

</script>








		]]></xsl:text>
	</body>
	</html>
</xsl:template>
<xsl:template name="slugify">
	<xsl:param name="text" select="''" />
	<xsl:variable name="dodgyChars" select="' ,.#_-!?*:;=+|&amp;/\\'" />
	<xsl:variable name="replacementChar" select="'-----------------'" />
	<xsl:variable name="lowercase" select="'abcdefghijklmnopqrstuvwxyz'" />
	<xsl:variable name="uppercase" select="'ABCDEFGHIJKLMNOPQRSTUVWXYZ'" />
	<xsl:variable name="lowercased"><xsl:value-of select="translate( $text, $uppercase, $lowercase )" /></xsl:variable>
	<xsl:variable name="escaped"><xsl:value-of select="translate( $lowercased, $dodgyChars, $replacementChar )" /></xsl:variable>
	<xsl:value-of select="$escaped" />
</xsl:template>
</xsl:stylesheet>
