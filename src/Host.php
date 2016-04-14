<?php

namespace Tylercd100\ServerStatus;

use JJG\Ping;
use GuzzleHttp\Client;

class Host 
{
    protected $host;
    protected $pinger;
    protected $ping;
    protected $statusCode;

    public function __construct($host)
    {
        $this->host = $host;
        $this->pinger = new Ping($host);
    }

    /**
     * Checks the ping of the host
     * @return [type] [description]
     */
    public function ping(){
        $this->ping = $this->pinger->ping();
        return $this->getPing();
    }

    /**
     * Checks the status of the host
     * @return [type] [description]
     */
    public function status(){
        $client = new Client();
        $res = $client->request('GET', $this->host);
        $this->statusCode = $res->getStatusCode();
        return $this->getStatusCode();
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
     * Sets the value of host.
     *
     * @param mixed $host the host
     *
     * @return self
     */
    protected function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Gets the value of pinger.
     *
     * @return mixed
     */
    public function getPinger()
    {
        return $this->pinger;
    }

    /**
     * Sets the value of pinger.
     *
     * @param mixed $pinger the pinger
     *
     * @return self
     */
    protected function setPinger(Ping $pinger)
    {
        $this->pinger = $pinger;

        return $this;
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