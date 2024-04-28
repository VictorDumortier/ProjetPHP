<?php

$path_suffix = "../";
$path = $_SERVER['SCRIPT_FILENAME'];
if (stristr($path, 'index.php')){
    $path_suffix = "";
}

echo'
<a id="contactnous" href="'.$path_suffix.'php/page_contactez_nous.php">
  <img src="'.$path_suffix.'img/fonctionnel/chat.png" alt="LogoConv">
</a>';

