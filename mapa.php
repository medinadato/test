<!-- 88 Rae Street, Fitzroy North VIC 3068, Australia -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Google Maps API v3: Busca de endereço e Autocomplete - Demo</title>

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:600" type="text/css" rel="stylesheet" />
        <link href="estilo.css" type="text/css" rel="stylesheet" />

        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAzRRNhTTxPz9Fs_P7dEzBWUZL8ZSQShnM&sensor=false"></script>
        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="mapa.js"></script>
        <script type="text/javascript" src="jquery-ui.custom.min.js"></script>

	<script type="text/javascript">//<![CDATA[
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount','UA-4361956-23']);
	_gaq.push(['_trackPageview']);
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	//]]></script>

    </head>
    <body>

        <div id="apresentacao">

            <h1>Google Maps API v3: Busca de endereço e Autocomplete - Demo</h1>
    
            <form method="get" action="index.html">    
                <fieldset>

                    <legend>Google Maps API v3: Busca de endereço e Autocomplete - Demo</legend>    
            
                    <div class="campos">
                        <label for="txtEndereco">Endereço:</label>
                        <input type="text" id="txtEndereco" name="txtEndereco" />
                        <input type="button" id="btnEndereco" name="btnEndereco" value="Mostrar no mapa" />
                    </div>

                    <div id="mapa"></div>
                    
                	<input type="submit" value="Enviar" name="btnEnviar" />
                    
                    <input type="hidden" id="txtLatitude" name="txtLatitude" />
                    <input type="hidden" id="txtLongitude" name="txtLongitude" />

                </fieldset>
            </form>
        </div>
    
    </body>
</html>
