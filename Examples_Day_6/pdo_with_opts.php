<?php
try {
    // Set error mode attribute
    $opts = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_CURSOR  => PDO::CURSOR_SCROLL,
	];
    // Get the connection instance
    $pdo = new PDO('mysql:host=localhost;dbname=phpcourse','vagrant','vagrant', $opts);
    $stmt = $pdo->query('SELECT * FROM customers ORDER BY id');
    // go forward
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		echo implode(':', $row) . "\n";
	}
    $stmt = $pdo->query('SELECT * FROM customers ORDER BY id');
    $row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_LAST);
    echo implode(':', $row) . "\n";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_PRIOR)) {
		echo implode(':', $row) . "\n";
	}
} catch (PDOException $e ){
    $pdo->rollBack(); // Rollback in case of failure
    echo "It did not work! " . $e;
    
}
