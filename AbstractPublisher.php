<?php

namespace Reporo;

/**
 * class AbstractConfig
 */
abstract class AbstractPublisher
{
    /**
     * @var id of publisher
     */
    protected $id;
	
	/**
     * @var impressions of ads
     */
    protected $impressions;
	
	/**
     * @var clicks of ads
     */
    protected $clicks;
	
	/**
     * @var revenue of ads
     */
    protected $revenue;
	
    public function __construct()
    {
    }
	
	/**
     * sets the impressions of the Publisher
     *
     * @param string $number
     */
    public function setImpressions($number)
    {
        $this->impressions = $number;
    }
	
	/**
     * sets the clicks of the Publisher
     *
     * @param string $number
     */
    public function setClicks($number)
    {
        $this->clicks = $number;
    }
	
	/**
     * sets the revenues of the Publisher
     *
     * @param string $number
     */
    public function setRevenues($number)
    {
        $this->revenues = $number;
    }
	
	/**
     * sets the ID of the Publisher
     * @param int $id
     */
    public function setID($id)
    {
        $this->id = $id;
    }
	
	/**
     * gets the ID of the Publisher
     */
    public function getID()
    {
        return $this->id;
    }
	
	/**
     * gets the impressions of the Publisher
     */
    public function getImpressions()
    {
        return $this->impressions;
    }
	
	/**
     * gets the clicks of the Publisher
     */
    public function getClicks()
    {
        return $this->clicks;
    }
	
	/**
     * sets the revenues of the Publisher
     */
    public function getRevenues()
    {
        return $this->revenues;
    }
}