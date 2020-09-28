<?php
try {
    // Get the connection instance
    $pdo = new PDO('mysql:host=localhost;dbname=phpcourse','vagrant','vagrant');
    // Set error mode attribute
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Begin the transaction
    $pdo->beginTransaction();
    // Series of SQL statements, all of which have to succeed
    $stmt = $pdo->prepare( 'INSERT INTO customers (firstname,lastname)
    VALUES (:firstname, :lastname )' );
    // Hard coded input parameters
    $data = [
		['firstname' => 'Noone', 'lastname' => 'Pihl-Hansen'],
		['firstname' => 'vip',   'lastname' => 'Pihl-Hansen'],
	];
	foreach ($data as $row) {
		$stmt->execute($row);
	}
    // Commit success
    $pdo->commit();
    echo "It worked.";
} catch (PDOException $e ){
    $pdo->rollBack(); // Rollback in case of failure
    echo "It did not work! " . $e;
    
}
