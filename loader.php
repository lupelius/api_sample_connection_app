<?php
/**
 *	loader.php is our helper script that loads new data into representation layer via client side callbacks
 */
 
namespace Reporo;

//Factory related includes
include_once("StatisticsFactory.php");

/**could sanitize $_GET vars if we were to pass it into db, ie with mysqli_real-escape-string
 * or with htmlspecialchars to escape special characters, if we were to embed this string within html markup
 * or escapeshellarg for embedding string into external commands, also could have checked for origin to avoid xss attackes
 * but will ignore security for now
 */
$id = $_GET["id"];
$type = $_GET["type"];

$statsFactory = new StatisticsFactory();
$publisher = $statsFactory->create($type, "2015-1-1", null, $id);

echo "['" . ucfirst($publisher->getName()) . " $id stats',  {v: " . $publisher->getImpressions() . "}, {v: " . $publisher->getClicks() . "}, {v: " . $publisher->getRevenues() . ", f: '£" . $publisher->getRevenues() . "'}]";