<?php
/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 09/02/2016
 * Time: 20:00
 */

namespace Config;
use Exception;

class ErrorLog extends Exception
{
    public function errorLog($error) {
        var_dump('coucou');

        if (!file_exists("error.log")){
            file_put_contents("error.log", "");
        }
        file_put_contents("error.log",date("[j/m/y H:i:s]")." - ". $error . "\r\n".file_get_contents("error.log"));
    }

}