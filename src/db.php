<?php 

use Pixie\Connection;
use Pixie\QueryBuilder\QueryBuilderHandler;

namespace Api;

    include __DIR__ . "\..\\vendor\autoload.php";

    class Db
    {
        private $qb = '';

        public function __construct()
        {
            $connection = new \Pixie\Connection('sqlite', array(
                'driver' => 'sqlite',
                'database' => __DIR__ . "\..\database.sqlite"
            ));
            $this->qb = new \Pixie\QueryBuilder\QueryBuilderHandler($connection); 
            return $this->qb;
        }

        public function getQb()
        {
            return $this->qb;
        }
    }