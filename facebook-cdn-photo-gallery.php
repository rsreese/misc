<?php

/**
 * @copyright Copyright (c) 2011, Stephen Reese 
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License (GPL)
 * @policy See facebooks policy to ensure you abide by their TOS https://developers.facebook.com/policy/
 */


require 'facebook.php';

/** 
 * Create an application instance on Facebook developers.
 * Replace with your own values.
 */
$facebook = new Facebook(array(
  'appId'  => '1234567890',
  'secret' => '1234567890',
  'cookie' => true,
));

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Photos</title>
    <style>
      body {
        font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
      }
      h1 a {
        text-decoration: none;
        color: #3b5998;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>

<?php 

// Replace these with you values.
$page_id = '1234567890';
$album_id = '1234567890';

$albums = $facebook->api('/'.$page_id.'/albums?access_token='.$session['access_token']);
$photos = $facebook->api('/'.$album_id.'/photos?access_token='.$session['access_token']);

echo "<h3>{$albums['data'][0]['name']}</h3>";
echo "<h3>{$albums['data'][0]['count']} Photos</h3>";

foreach ($photos['data'] as $fbdata) {
        echo "<img src=\"{$fbdata['images'][1][source]}\"></a>\n";
        echo '<br><br>';
        }

foreach ($photos['data'] as $fbdata) {
        echo "<img src=\"{$fbdata['source']}\"></a>\n";
        echo '<br>';
        echo "{$fbdata['name']}";
        echo '<br><br>';
        }
?>

<!-- Album information -->
<pre><?php print_r($albums); ?></pre>

<!-- Photo information -->
<pre><?php print_r($photos); ?></pre>

  </body>
</html>
