<?php

namespace Reporo;
//connection related includes
include_once("Connection.php");
include_once("Parameters.php");
include_once("AbstractConfig.php");
include_once("ArrayConfig.php");

include_once("FactoryMethod.php");
include_once("Publisher.php");
include_once("Website.php");
include_once("Zone.php");

/**
 * StatisticsFactory is a statistics factory to create stats for different bodies
 */
class StatisticsFactory extends FactoryMethod
{
	/**
     * @var key Auth parameter for this particular statistics API call
     */
	const KEY = "xxxx";
	
	/**
     * @var shared secret Auth parameter for this particular statistics API call
     */
	const SHARED_SECRET = "xxxx";
    
	/**
     * {@inheritdoc}
     */
    protected function createStatistics($type, $dateFrom, $dateTo = null, $id)
    {	
		if (empty($dateFrom)) 
			throw new \InvalidArgumentException("$dateFrom is invalid, a valid dateFrom must be passed");
		//Check type, create objects accordingly	
        switch ($type) {
            case parent::PUBLISHER:
                $obj = new Publisher();
                break;
            case parent::WEBSITE:
				$obj = new Website();
                break;
			case parent::ZONE:
				$obj = new Zone();
				break;
            default:
                throw new \InvalidArgumentException("$type is not a valid statistics set");
        }
		
		$host = $obj->getAddress($id) . "&from=" . $dateFrom;
		if (!empty($dateTo)) 
			$host = $host . "&to=" . $dateTo;
		
		//connect to the API service
		$connection = new Connection(new ArrayConfig(array("host"=>$host, "key"=>self::KEY, "sharedSecret"=>self::SHARED_SECRET)));
		
		//get the response from API connection
		$arr = $connection->getResponse();
		//API returns everything under one element, load it
		$arr = $arr[0];
		
		//set stats from result
		$obj->setImpressions($arr["impressions"]);
		$obj->setClicks($arr["clicks"]);
		$obj->setRevenues($arr["revenue"]);
		return $obj;
    }
}
