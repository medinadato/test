<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN"
    "http://www.w3.org/TR/REC-html40/strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>URL Decoder/Encoder</title>
        <style type="text/css">
            <!--
            body {background: white; color: black;}
            form {margin: 0;}
            h1 {font-family: Arial, sans-serif; line-height: 0.85em; border-bottom: 2px solid;
                margin-bottom: 0.33em; padding-bottom: 0;}

            textarea {background: #EEF;}

            #footer {border-top: 1px solid #000; color: #999; font: italic 75% sans-serif;}
            #footer p {margin: 0 0 1em 0;}
            #footer img {float: right; margin: 0 0 0.5em 2em;}
            -->
        </style>
        <script type="text/javascript">
            function encode() {
                var obj = document.getElementById('dencoder');
                var unencoded = obj.value;
                obj.value = encodeURIComponent(unencoded).replace(/'/g,"%27").replace(/"/g,"%22");	
            }
            function decode() {
                var obj = document.getElementById('dencoder');
                var encoded = obj.value;
                obj.value = decodeURIComponent(encoded.replace(/\+/g,  " "));
            }
        </script>
    </head>
    <body>


        <form onsubmit="return false;">
            <h1>URL Decoder/Encoder</h1>

            <textarea cols="100" rows="20" id="dencoder"></textarea>
            <div>
                <input type="button" onclick="decode()" value="Decode">
                <input type="button" onclick="encode()" value="Encode">
            </div>

            <ul>
                <li>Input a string of text and encode or decode it as you like.</li>
                <li>Handy for turning encoded JavaScript URLs from complete gibberish into readable gibberish.</li>
                <li>If you'd like to have the URL Decoder/Encoder for offline use, just view source and save to your hard drive.</li>
            </ul>

        </form>


        <div id="footer">
            <img alt="Creative Commons License" border="0" src="http://creativecommons.org/images/public/somerights.gif">
            <p>
                <br>
                The URL Decoder/Encoder is licensed under a Creative Commons <a href="http://creativecommons.org/licenses/by-sa/2.0/" rel="license">Attribution-ShareAlike 2.0</a> License.
            </p>
            <p>
                This tool is provided without warranty, guarantee, or much in the way of explanation.  Note that use of this tool may or may not crash your browser, lock up your machine, erase your hard drive, or e-mail those naughty pictures you hid in the Utilities folder to your mother.  Don't blame me if anything bad happens to you, because it's actually the aliens' fault.  The code expressed herein is solely that of the author, and he's none too swift with the JavaScript, if you know what we mean, so it's likely to cause giggle fits in anyone who knows what they're doing.  Not a flying toy.  Thank you for playing.  Insert coin to continue.
            </p>
        </div>

    </body>
</html>
