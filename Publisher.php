<?php

namespace Reporo;
include_once("AbstractPublisher.php");
include_once("StatisticsInterface.php");

/**
 * This class represents Statistics of a Publisher, 
 * which is collection of zones' and websites' stats
 * hence complete stats for the publisher.
 */
class Publisher extends AbstractPublisher implements StatisticsInterface
{
	/**
     * @var publisher stats call constant
     */
    const ADDRESS = "http://api.reporo.com/analytics/data-api.php?action=statistics/publisher";
	
	/**
     * gets the address of the Publisher
	 *
	 * @param string id here for overriding purposes, not used
     * 
     * @return string address of Publisher's API call
     */
    public function getAddress($id = null)
    {
        return self::ADDRESS;
    }
	/**
     * gets the name of type Publisher
	 *
     * @return string name, "publisher"
     */
	public function getName()
	{
		return "publisher";
	}
}
