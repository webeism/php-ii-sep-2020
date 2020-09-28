<?php
echo "<h3>Session 6 | Lab 2 | Stored Procedure</h3>";
echo "<h4>Stored procedure newCustomer</h4>";

$str = <<<EOT
DELIMTER $
DROP PROCEDURE IF EXISTS phpcourse.newCustomer;
CREATE PROCEDURE phpcourse.newCustomer(
	p_firstname varchar(50),
	p_lastname varchar(50))
BEGIN
    insert into customers (firstname, lastname) values (p_firstname,p_lastname);
END
$
DELIMITER \;
EOT;

//$str .=  '$ ';
//$str .=  'DELIMITER ;';

try {
	// Get the connection instance
	$pdo = new PDO('mysql:host=localhost;dbname=phpcourse','vagrant','vagrant');
	
	// Set error mode attribute
	$pdo->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	echo 'About to add stored procedure:<br />';
	echo '<pre>' . print_r( explode(';', $str ), true) . '</pre>';

	// Add the stored procedure
	$rowCount = $pdo->exec($str);
	echo ($rowCount) ? 'Success' : 'Fail';
	echo "\n";
	
	echo 'Stored Procedure should now be added<br />';
	$stmt = $pdo->query("SHOW PROCEDURE STATUS LIKE '%customer%';");
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	while ($item = $stmt->fetch()) var_dump($item);	
	
	// Call the stored procedure
	$stmt = $pdo->prepare('CALL newCustomer(:first,:last)');
	$stmt->execute(['first' => 'Kenneth', 'last' => 'Barlow_' . time()]);
	echo ($stmt->rowcount()) ? 'Success' : 'Failed';
	echo "\n";
	
	// Show Customers again
	$stmt = $pdo->query('SELECT * FROM customers');
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	while ($item = $stmt->fetch()) var_dump($item);	

} catch (PDOException $e){

	//Handle error
	echo 'ERR: ' . $e;

} catch (Throwable $e){
	
	//Handle error
	echo 'ERR: ' . $e;
}
