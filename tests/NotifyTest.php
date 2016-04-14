<?php

namespace Tylercd100\ServerStatus\Tests;

use Tylercd100\ServerStatus\Host;

class HostTest extends TestCase
{
    public function testItCreatesInstanceSuccessfully(){
        $obj = new Host("127.0.0.1");
        $this->assertInstanceOf(Host::class,$obj);
    }

    public function testPingerReturnsNumber(){
        $obj = new Host("127.0.0.1");
        $ping = $obj->ping();
        $this->assertInternalType('double',$ping);
    }

    public function testGetHost(){
        $obj = new Host("127.0.0.1");
        $this->assertEquals($obj->getHost(),"127.0.0.1");
    }

    public function testGetPing(){
        $obj = new Host("127.0.0.1");
        $this->assertEquals($obj->getPing(),0);
    }

    public function testGetStatusCode(){
        $obj = new Host("127.0.0.1");
        $this->assertEquals($obj->getStatusCode(),0);
    }
}