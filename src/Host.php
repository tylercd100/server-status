<?php

namespace Tylercd100\ServerStatus;

use JJG\Ping;
use GuzzleHttp\Client;

class Host 
{
    /**
     * @var string
     */
    protected $host;

    /**
     * @var Ping
     */    
    protected $pinger;

    /**
     * @var double
     */    
    protected $ping = 0.0;

    /**
     * @var integer
     */    
    protected $statusCode = 0;

    /**
     * @param string $host The host URL or IP to check
     */
    public function __construct($host)
    {
        $this->host      = $host;
        $this->pinger    = new Ping($host);
        $this->requester = new Client();
    }

    /**
     * Checks the ping of the host
     * 
     * @return double|false
     */
    public function ping(){
        $this->ping = $this->pinger->ping();
        return $this->getPing();
    }

    /**
     * Checks the status of the host
     * 
     * @return integer
     */
    public function status(){
        $response = $this->requester->request('GET', $this->host);
        $this->statusCode = $response->getStatusCode();
        return $this->getStatusCode();
    }

    /**
     * Sets the value of pinger.
     *
     * @return void
     */
    public function setPinger(Ping $pinger)
    {
        $this->pinger = $pinger;
    }

    /**
     * Sets the value of requester.
     *
     * @return void
     */
    public function setRequester(Client $requester)
    {
        $this->requester = $requester;
    }

    /**
     * Gets the value of host.
     *
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Gets the value of ping.
     *
     * @return mixed
     */
    public function getPing()
    {
        return $this->ping;
    }

    /**
     * Gets the value of statusCode.
     *
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
}