#!/usr/bin/php -q
<?php
define('URL_TIENDAS', 'http://cms-rewards.starbucks.mx/cms/xml/tiendas.xml');

require 'vendor/autoload.php';
use Camspiers\JsonPretty\JsonPretty;
use MarkWilson\XmlToJson\XmlToJsonConverter;

$tiendas = file_get_contents(URL_TIENDAS);

$xml = new SimpleXMLElement($tiendas);
$converter = new XmlToJsonConverter();
$jsonTiendas = $converter->convert($xml);

$jsonPretty = new JsonPretty();
file_put_contents('tiendas.json', $jsonPretty->prettify($jsonTiendas));

echo 'Listo, actualizado en "tiendas.json"' . PHP_EOL;
?>
