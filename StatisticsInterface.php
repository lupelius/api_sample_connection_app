<?php

namespace Reporo;

/**
 * VehicleInterface is a contract for a vehicle
 */
interface StatisticsInterface
{
    /**
     * sets the impressions of the Publisher
     *
     * @param string $number
     */
    public function setImpressions($number);
	
	/**
     * sets the clicks of the Publisher
     *
     * @param string $number
     */
    public function setClicks($number);
	
	/**
     * sets the revenues of the Publisher
     *
     * @param string $number
     */
    public function setRevenues($number);
	
	/**
     * gets the impressions of the Publisher
     */
    public function getImpressions();
	
	/**
     * gets the clicks of the Publisher
     */
    public function getClicks();
	
	/**
     * sets the revenues of the Publisher
     */
    public function getRevenues();
}
