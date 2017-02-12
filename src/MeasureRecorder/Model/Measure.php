<?php


namespace MeasureRecorder\Model;


class Measure
{
    /**
     * @var string
     */
    protected $creationDate;

    /**
     * @var array
     */
    protected $meta;

    public function __construct(array $meta = array()) {

        $this->creationDate = new \MongoDB\BSON\UTCDateTime(strtotime(date('c'))*1000); //MongoDate
        $this->meta = $meta;
    }

    public function getCreationDate($mongoFormat = false){
        return $mongoFormat ? $this->creationDate : $this->creationDate->toDateTime();
    }

    public function hasMeta($key){
        return array_key_exists($key, $this->meta);
    }

    public function getMeta($key, $default = null){
        return $this->hasMeta($key) ? $this->meta[$key] : $default;
    }

    public function getMetas(){
        return $this->meta;
    }

    public function toArray() {
        return array(
            "creationDate" => $this->creationDate,
            "meta" => $this->meta
        );
    }

}