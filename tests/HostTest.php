<?php

namespace Tylercd100\ServerStatus\Tests;

use GuzzleHttp\Client;
use JJG\Ping;
use Tylercd100\ServerStatus\Host;
use GuzzleHttp\Psr7\Response;

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

    public function testRequesterReturnsNumber(){
        $host = "127.0.0.1";
        $value = 200;
        $mock = $this->getMock(Client::class, ['request']);
        $responseMock = $this->getMock(Response::class, ['getStatusCode']);
        
        $mock->expects($this->once())
             ->method('request')
             ->willReturn($responseMock);

        $responseMock->expects($this->once())
             ->method('getStatusCode')
             ->willReturn($value);

        $obj = new Host($host);
        $obj->setRequester($mock);

        $code = $obj->status();
        
        $this->assertEquals($value,$code);
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