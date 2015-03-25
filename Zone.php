<?php

namespace Reporo;
include_once("AbstractPublisher.php");
include_once("StatisticsInterface.php");

/**
 * This class represents Statistics of a Zone of a Publisher
 */
class Zone extends AbstractPublisher implements StatisticsInterface
{
	/**
     * gets the address of the Zone
	 *
	 * @param string $id id of API call address
     * 
     * @return string new address
     */
    public function getAddress($id)
    {
		//Set this publisher's ID
		$this->setID($id);
		if (empty($id))
			throw new \InvalidArgumentException("$id is not a valid id number for zones");
        return "http://api.reporo.com/analytics/data-api.php?action=statistics/publisher/zone/" . $id;
    }
	
	/**
     * gets the name of type Zone
	 *
     * @return string name, "zone"
     */
	public function getName()
	{
		return "zone";
	}
}