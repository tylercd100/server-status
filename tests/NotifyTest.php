<?php

namespace Tylercd100\ServerStatus\Tests;

use Tylercd100\ServerStatus\Host;

class HostTest extends TestCase
{
    public function testItCreatesInstanceSuccessfully(){
        $obj = new Host("127.0.0.1");
        $this->assertInstanceOf(Host::class,$obj);
    }
}