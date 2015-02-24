<?php

namespace App\Models\Concrete\Doctrine;

use \Doctrine\ORM\Tools\Console\ConsoleRunner;
use \Doctrine\ORM\Tools\Setup;
use \Doctrine\ORM\EntityManager;

class DocDbContext
{
    
    private $paths;
    private $isDevMode;
    private $dbParams;
    private $config;
    private $entityManager;
    
    public function __Construct()
    {        
        $this->paths = array( app_path()."/Models/Objects/DTO" );
        $this->isDevMode = false;

        // the connection configuration
        $this->dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'dbname'   => env('DB_DATABASE', 'forge'),
        );
        
        $this->config = Setup::createAnnotationMetadataConfiguration($this->paths, $this->isDevMode);
        $this->entityManager = EntityManager::create( $this->dbParams, $this->config );
    }
    
    public function GetEntityManager()
    {
        return ConsoleRunner::createHelperSet( $this->entityManager );
    }
}