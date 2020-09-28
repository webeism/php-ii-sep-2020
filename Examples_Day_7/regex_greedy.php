<?php

echo "Greedy\n";
$test = '<p>Paragraph 1</p><p>Paragraph 2</p><p>Paragraph 3</p>';
$pattern = '/<p>.*<\/p>/';
preg_match($pattern, $test, $matches);
echo $matches[0];
// output: "<p>Paragraph 1</p><p>Paragraph 2</p><p>Paragraph 3</p>"

echo "Non Greedy\n";
$pattern = '/<p>.*?<\/p>/';
preg_match($pattern, $test, $matches);
echo $matches[0];
// output: "<p>Paragraph 1</p>"

