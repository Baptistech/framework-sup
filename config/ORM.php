<?php
/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 08/02/2016
 * Time: 16:28
 */

namespace Config;

use ORM\connection;
use Symfony\Component\Yaml\Yaml;

class ORM
{
    public $connection;
    public $EM;

    public function __construct(){
        $data = Yaml::parse(file_get_contents("config/database.yml"));
        $this->connection = new \ORM\Connection($data["host"], $data["database"], $data["username"], $data["password"]);
        var_dump($data);
        $this->EM = new \ORM\Entity\Manager();
    }

}