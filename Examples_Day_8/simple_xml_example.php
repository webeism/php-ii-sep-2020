<?php
// A simpleXML load file example
$xml = simplexml_load_file( 'produce.xml' );
 
// Get the vegies
$vegies = $xml->vegetables;
 
// Get the first vegie using array notation
$vegie = $vegies->vegetable[0]->name;
 
// Output item data
foreach ( $vegies as $node ) {
    echo "Content: " . $node->vegetable->name . "\n" ;
}
 
// Output XML from the SimpleXMLElement object
echo $xml->asXML();
 
// Output to an xml file
$xml->asXML( 'newproduce.xml' );

var_dump($xml);
