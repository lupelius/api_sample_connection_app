<?php

namespace Reporo;

/**
 * Class Connection
 */
class Connection
{
    /**
     * @var Configuration
     */
    protected $configuration;

    /**
     * @var Currently connected host
     */
    protected $host;
	
	/**
     * @var Currently used key
     */
    protected $key;
	
	/**
     * @var Currently used shared secret
     */
    protected $sharedSecret;
	
	/**
     * @var Current connection time, we could log this too
     */
    protected $epoch;

    /**
     * @param Parameters $config
     */
    public function __construct(Parameters $config)
    {
        $this->configuration = $config;
    }

    /**
     * connection using the injected config
	 * 
	 * @return curl handle
     */
    public function connect()
    {
        $host = $this->configuration->get('host');
        $key = $this->configuration->get('key');
        $sharedSecret = $this->configuration->get('sharedSecret');
		$epoch = time();
        // connection to host, authentication etc...

        //if connected
        $this->host = $host;
        $this->key = $key;
        $this->sharedSecret = $sharedSecret;
        $this->epoch = $epoch;
		
		//Connect to API using curl
		$curl = curl_init($host);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		//Pass in authentication parameters
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		'x-reporo-key: ' . $key,
		'x-reporo-mash: ' . hash('sha256', $epoch . $sharedSecret),
		'x-reporo-epoch: ' . $epoch
		));
		
		//return Curl object
		return $curl;
    }
	
	/**
     * returns response from API connection
	 * 
	 * @return JSON response
     */
	 public function getResponse()
	 {
		//load curl handle from connect function
		$curl = $this->connect();
		//execute curl handle to have the response
		$curl_response = curl_exec($curl);
		//if curl_exec failed, die with curl info
		if ($curl_response === false) {
			$info = curl_getinfo($curl);
			curl_close($curl);
			die('error occured during curl exec. Additional info: ' . var_export($info));
		}
		//close curl session
		curl_close($curl);
		//decode the response
		$decoded1 = json_decode($curl_response,true);
		if (isset($decoded1->response->status) && $decoded1->response->status == 'ERROR') {
			die('error occured: ' . $decoded1->response->errormessage);
		}
		//Execute the curl connection, return JSON response
		return $decoded1;
	 }

    /*
     * Get currently connected host
     *
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }
}
