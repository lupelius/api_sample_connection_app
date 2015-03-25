<?php

namespace Reporo;

/**
 * class FactoryMethod
 */
abstract class FactoryMethod
{

    const PUBLISHER = 1;
    const WEBSITE = 2;
    const ZONE = 3;

    /**
     * The children of the class must implement this method
     * 
     * @param string $type a generic type
     * @param string $dateFrom date stats taken from in Y-m-d format
     * @param string $dateTo date stats taken to in Y-m-d format
	 * @param int id of statistic element in question
     * 
     * @return StatisticsInterface a new Statistics obj
     */
    abstract protected function createStatistics($type, $dateFrom, $dateTo, $id);

    /**
     * Creates a new set of Statistics
     * 
     * @param int $type a generic type
     * @param string $dateFrom date stats taken from
     * @param string $dateTo date stats taken to
     * @param int id of statistic element in question
     * 
     * @return StatisticsInterface a new Statistics obj
     */
    public function create($type, $dateFrom, $dateTo, $id)
    {
        $obj = $this->createStatistics($type, $dateFrom, $dateTo, $id);
        return $obj;
    }
}
