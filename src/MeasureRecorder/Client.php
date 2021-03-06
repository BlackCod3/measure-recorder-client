<?php

namespace MeasureRecorder;

use MeasureRecorder\Config\Config;
use MeasureRecorder\Config\ConfigDev;
use MeasureRecorder\Config\ConfigProd;
use MeasureRecorder\Model\Measure;

class Client
{
    /**
     * @var Config $config
     */
    protected $config;

    public function __construct($env){

        # + test, preprod if needed
        if(strtolower($env) == "prod"){
            $this->config = new ConfigProd();
        }
        else{
            $this->config = new ConfigDev();
        }
    }

    public function saveMeasure(Measure $measure){
        try{
            $db = $this->config->getMongoDB();
            $bulk = new \MongoDB\Driver\BulkWrite;
            $bulk->insert($measure->toArray());
            $db->executeBulkWrite($this->config->getMongoNamespace(), $bulk);
        }catch(\Exception $e){
            throwException($e);
        }

        return $measure;
    }

    public function getMeasure($filter){

        $db = $this->config->getMongoDB();

        $query = new \MongoDB\Driver\Query($filter);
        $cursor = $db->executeQuery($this->config->getMongoNamespace(), $query);

        return $cursor->toArray();
    }
}