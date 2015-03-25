<?php

namespace Reporo;
include_once("AbstractPublisher.php");
include_once("StatisticsInterface.php");

/**
 * This class represents Statistics of a Website of a Publisher
 */
class Website extends AbstractPublisher implements StatisticsInterface
{	
	/**
     * gets the address of the Website
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
			throw new \InvalidArgumentException("$id is not a valid id number for websites");
        return "http://api.reporo.com/analytics/data-api.php?action=statistics/publisher/website/" . $id;
    }
	/**
     * gets the name of type Website
	 *
     * @return string name, "website"
     */
	public function getName()
	{
		return "website";
	}
}
