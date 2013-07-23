<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
//
//echo exec("pwd") , '<br />';
//echo '<br />', exec("whoami"), '<br />';
//echo exec("mysql -uroot -p08800 -e 'CREATE SCHEMA blah' ", $a, $b);
////echo exec("mysqldump -uroot -p08800 mycell_000000 | mysql -uroot -p08800 mycell_000001", $messages, $b);
//var_export($a);
//var_export($b);
 
//$link = mysql_connect('127.0.0.1', 'root', '08800');
//
////retrieve existing r_id
//$sql_res = "SELECT res_id FROM test.result ORDER BY res_id DESC LIMIT 1";
//$query_res = mysql_query($sql_res) or die("MySQL Error: " . mysql_error());
//$data_res = mysql_fetch_assoc($query_res);
//$resid_count = $data_res['res_id']+1;
//echo "<br>Result: " . $resid_count;
//
//// insert result to table
//$sql_result = "INSERT INTO result (res_id, r_score, s_id, i_id) VALUES (null, '" . $correct . "',  '" . $id . "',  '" . $ins_id . "')";
//
//// insert result to table
//$sql_result = "INSERT INTO test.result (res_id, r_score, s_id, i_id) VALUES (null, '1',  '1',  '1')";
//mysql_query($sql_result) or die ("Error: " . mysql_error());

$html = '<p>Aiaiai tracks headphone is an award winning set of over-ear headphones for anyone who has to move around a lot, loves to carry their music with them and appreciates audiophile quality sound.</p> <p>A subtle design that focuses on simple lines and a classic shape, the Tracks has a flexible, lightweight stainless steel headband for a comfy fit. The set gets its name from the detachable earcups that slide into position along the tracks of the stainless steel headband. Detaching the earcups is super easy and ensures safe transport of the most important part of your headphones.</p> <p>You get 3 interchangeable coloured sliders and a carry pouch. The 2mm cables attach to a standard 3.5mm stereo plug. There is a mic with button to control music and volume as well as to operate iPod, iPhone &amp; iPad functionality.</p> <p>The audio is seriously good. The handy, portable and clever design makes it easy and accessible for a mobile lifestyle. All up, the tracks lead their category for sound quality and design and will leave you extremely impressed, happy and entertained.</p> <h3>Watch It:&nbsp;</h3> <iframe width="450" height="254" src="http://www.youtube.com/embed/8W5nOuzrvWg?feature=player_embedded" frameborder="0" allowfullscreen=""></iframe> <h3>Specifications:</h3> <ul> <li>STYLE: Over-Ear Headphones</li> <li>MATERIALS: Stainless Steel Headband</li> <li>SPECS: Driver size 40mm / Plug 3.5mm / Speaker Impedence 32 Ohm / Speaker Sensitivty 112 +- 3dB / Max Power Input 40mW / Frequency Response 20-20KHz / Mic Sensitivity -42 +- 3dB&nbsp;</li> <li>FEATURES: Mic to suit and operate iPhone, iPod, iPad</li> <li>CABLE: 2mm</li> <li>EXTRAS: Carry Pouch / Detachable Earcups / 3-Colours of Sliders</li> </ul> <h3>Further Reading:</h3> <ul> <li>Check out more <a href="/collections/aiaiai">Aiaiai</a> headphones</li> <li>See some other great travel <a href="/collections/travel-headphones">headphones</a></li> <li>Mobile? Check out our <a href="/collections/backpacks">backpacks</a>, <a href="/collections/satchels">satchels</a> and <a href="/collections/laptop-bags">laptop bags</a>!</li> <li>Love this Colour? <a href="/pages/notemakers-shop-by-colour">Shop by Colour</a>!</li> </ul>';

                // checks for the term Specification
                $specsContent = substr($html, stripos($html, '<h3>Specification'));

                if(!empty($specsContent)) {

                    $initialSpecsPos = $initialH3Pos = stripos($specsContent, '<h3>');
                    $finalH3Pos = stripos($specsContent, '</h3>')+5;
                    $specTitle = substr($specsContent, $initialH3Pos, $finalH3Pos);

                    $finalSpecsPos = (stripos($specsContent, '</ul>')+5);
                    $data['dspecs'] = substr($specsContent, $initialSpecsPos, $finalSpecsPos);

                    // remove the specs title from the specs content
                    $dspecs = str_replace($specTitle, '', $data['dspecs']);

                    $product->setData('dspecs', $dspecs);
                }

                // remove the specifications from description
                $newDesc = str_replace($data['dspecs'], '', $html);
                $product->setDescription($newDesc);


