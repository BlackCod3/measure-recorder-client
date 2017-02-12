<?php

namespace MeasureRecorder\Config;



class Config
{
    /** MONGO CONFIGURATION */
    public $mongo_url;
    public $mongo_db;
    public $mongo_collection;
    public $mongo_options = array();

     public function getMongoDB() {
        return new \MongoDB\Driver\Manager($this->mongo_url, $this->mongo_options);
    }

    public function getMongoNamespace() {
        return $this->mongo_db.".".$this->mongo_collection;
    }
}