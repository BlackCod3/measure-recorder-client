<?php


namespace MeasureRecorder;

use MeasureRecorder\Config\ConfigDev;
use MeasureRecorder\Model\Measure;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /**
     * @var Client
     */
    protected $client;

    public function setUp() {
        $this->client = new Client(new ConfigDev());
    }

    public function testMeta(){

        $id = time();
        $meta = array(
            'v'     => 1,
            't'     => 'event',
            'dl'    => 'some location',
            'wui'   => 'foo-bar',
            'wuui'  => $id
        );

        $event = new Measure($meta);

        $this->assertNotNull($event->getCreationDate());
        $this->assertNotNull($event->getMetas());
        $this->assertEquals($event->getMetas(), $meta);
        $this->assertTrue($event->hasMeta('wui'));
        $this->assertEquals($event->getMeta('t'), $meta['t']);
        $this->assertEquals($event->toArray()['meta'], $meta);
    }

    /*
    public function testSaveMeasure(){
    }
    public function testGetMeasure(){
    }
    */
}