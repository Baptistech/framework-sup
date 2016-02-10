<?php
/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 09/02/2016
 * Time: 22:51
 */

$className = $argv[1];
$code = "<?php\n\nnamespace App\\Controller;\n\n";
$code .=  "class $className \n{\n}";

function creation($className, $code) {
    if (!file_exists($className.".php")){
        file_put_contents("../src/Controller/".$className.".php", $code);
    }
    else {
        var_dump("can't create your file");
    }
}

creation($className, $code);