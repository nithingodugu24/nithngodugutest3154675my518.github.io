<?php

if(!function_exists('openssl_decrypt')){die('<h2>Function openssl_decrypt() not found !</h2>');}

if(!defined('_FILE_')){define("_FILE_",getcwd().DIRECTORY_SEPARATOR.basename($_SERVER['PHP_SELF']),false);}

if(!defined('_DIR_')){define("_DIR_",getcwd(),false);}

if(file_exists('key.inc.php')){include_once('key.inc.php');}else{die('<h2>File key.inc.php not found !</h2>');}

$e7091="Ui92TWxaakNaLzl0OWIwT01YNzArVDFWV1E3b0pWVlZaYUZka1FwdnU1ZnhkenB6Z3VhcnRjNnZVVGkxRVNCQQ==";eval(e7061($e7091));

?>

