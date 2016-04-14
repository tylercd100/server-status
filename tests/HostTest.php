<?php

namespace Tylercd100\ServerStatus\Tests;

use JJG\Ping;
use Tylercd100\ServerStatus\Host;

class HostTest extends TestCase
{
    public function testItCreatesInstanceSuccessfully(){
        $obj = new Host("127.0.0.1");
        $this->assertInstanceOf(Host::class,$obj);
    }

    public function testPingerReturnsNumber(){
        $host = "127.0.0.1";
        $value = 50;
        $mock = $this->getMock(Ping::class, ['ping'], [$host]);
        
        $mock->expects($this->once())
             ->method('ping')
             ->willReturn($value);

        $obj = new Host($host);
        $obj->setPinger($mock);

        $ping = $obj->ping();
        
        $this->assertEquals($value,$ping);
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