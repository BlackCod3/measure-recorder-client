<?php

namespace MeasureRecorder\Config;



class ConfigDev extends Config
{
    /** MONGO CONFIGURATION */
    public $mongo_url = "mongodb://localhost:27017";
    public $mongo_db = "analysis";
    public $mongo_collection = "measure";
    public $mongo_options = array();
}