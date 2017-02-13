<?php

namespace MeasureRecorder\Config;



class ConfigProd extends Config
{
    /** MONGO Prod CONFIGURATIONS */
    public $mongo_url = "mongodb://localhost:27017";
    public $mongo_db = "analysis";
    public $mongo_collection = "measure";
    public $mongo_options = array();
}