<?php
/**
 * Application Entry
 */

//error_reporting(E_ALL);

// global BASE location
define('BASE', realpath(__DIR__ . '/../'));

/**
 * Session 2 | Lab 1
 * Lab: Create a Class
 * Complete the following:
 * 1. Create a class definition that represents or models something. Give it a constant, some properties, and a few methods. Set appropriate visibilities for each.
 * 2. Instantiate a couple of objects, and execute the methods created producing some output.
 * 3. Create something which is realistic and appropriate to a current or future application for your domain.
 * Lab complete.
 */

/**
 * Session 2 | Lab 2
 * Lab: Create an Extensible Super Class
 * Complete the following:
 * 1. Using the code created in the previous exercise, create an extensible superclass definition. Set the properties and methods that subclasses will need.
 * 2. Create one or more subclasses that extend the superclass with constants, properties and methods specific to the subclass.
 * 3. Instantiate a couple of objects from the subclasses and execute the methods producing some output.
 * Lab complete.
 */

/**
 * Session 2 | Lab 3
 * Lab: Magic Methods
 * Complete the following:
 * 1. Using the code from the previous exercises, add four magic methods, one of which is the magic constructor.
 * 2. The magic constructor should accepts parameters and set those parameters into the object on instantiation.
 * 3. Create an index.php file.
 * 4. Load, or autoload, the created classes.
 * 5. Instantiate object instances, and exercise the magic methods implemented.
 * Lab complete.
 */

/**
 * Autoload starting point
 */

spl_autoload_register(
  function ($class) {
    $file = BASE . '/src/' . str_replace('\\', '/', $class) . '.php';
    if( file_exists( $file ) ){
    	require $file;	
    }
  }
);

// "use" the Site classes
use DashApp\Sites\Site;
use DashApp\Sites\ServicedSite;

// instantiate
$site = new ServicedSite();
$serviced_site = new ServicedSite(1);

// call a method
$site->setName("Some Site Name");

// call a method
echo "<h3>Session 2: Site Name (from \$site->getName): </h3>";
echo $site->getName();

echo "<h3>Session 2: Site Name (from \$serviced_site->getName): </h3>";
echo $serviced_site->getName();

// string output magic method
echo "<h3>Session 2: Object as a string (from echo \$site): </h3>";
echo $site;

// string output magic method
echo "<h3>Session 2: Object as a string (from echo \$serviced_site): </h3>";
echo $serviced_site;

// call object like a function magic method
echo "<h3>Session 2: Object as a function (from echo \$site(x) ): </h3>";
echo $site("x");

/**
 * Session 3 | Lab 1
 * Lab: Abstract Classes
 * Complete the following:
 * 1. Turn a superclass into an abstract class.
 * 2. In the abstract superclass, define an inheritable abstract method declaration that will instantiate an object of another class, and returns it.
 * 3. Extend the abstract superclass with a concrete subclass implementing the inherited abstract method.
 * 4. Instantiate a subclass instance.
 * 5. Call the method and retrieve the object it builds.
 * Lab is complete.
 */

echo "<h3>Session 3: Concrete subclass of abstract superclass (use DashApp\Core\flySite)</h3>";


$site = new ServicedSite();
echo $site;

echo "<h3>Session 3: abstract method call on subclass result:</h3>";
echo '<pre>' . print_r( $site->getSiteServices(), true ) . '</pre>';


/**
 * Session 3 | Lab 2
 * Lab: Interfaces
 * Complete the following:
 * 1. Create an object interface with two methods.
 * 2. Implement the interface in your superclass.
 * 3. Add some code to the index.php file that calls one of the superclass methods implemented.
 * Lab is completed.
 */

echo "<h3>Session 3: SuperClass (Site) as a flySite implementation</h3>";
$site = new ServicedSite();
echo '<pre>' . print_r( $site, true ) . '</pre>';

echo "<h3>Session 3: SuperClass (Site) with required method call (getFlyIndex)</h3>";
echo $site->getFlyIndex();

echo "<h3>Session 3: SuperClass (Site) with required method call (getPlugins)</h3>";
echo '<pre>' . print_r( $site->getPlugins(), true ) . '</pre>';



/**
 * Session 3 | Lab 3
 * 
 * Lab: Type Hinting
 * Complete the following:
 * 1. Create a new class with some properties and methods.
 * 2. Add a constructor.
 * 3. Type hint in the constructor for the interface created in the last exercise.
 * 4. Instantiate an object from one of your previous subclasses.
 * 5. Add it as a dependent object to the new object created in step one, and store it.
 * Lab is complete.
 */

$site = new ServicedSite();
//echo $site;

use DashApp\Core\Analysis;
$analysis = new Analysis( $site );

echo "<h3>Session 3: New class Analysis, constructor type hinted with interface</h3>";
echo '<pre>' . print_r( $analysis, true ) . '</pre>';


/**
 * Session 4 | Lab 1
 * Lab: Build Custom Exception Class
 * Complete the following:
 * 1. Create a file and build a custom exception class with a constructor that accepts parameters.
 * 2. Call the parent Exception constructor.
 * 3. Add some new functionality in the custom exception constructor.
 * 4. Add a try/catch/catch/finally block set.
 * 5. In the try portion, throw an instance of the Exceptions object, and an instance of the custom exception class.
 * 6. Handle both by logging in the associated catch blocks.
 * 7. Echo something in the finally block
 */

echo "<h3>Session 4: Custom exception class:</h3>";

foreach( [ServicedSite::EXCEPTION_FLAG_STANDARD, ServicedSite::EXCEPTION_FLAG_CUSTOM] as $str ){
	try {
		// force an exception
		$site = new ServicedSite( $str );
	} catch ( DashApp\Core\CustomException $e ) {
		echo 'CustomException caught:<br /><br />';
		error_log( "TEST Custom Exception: " . $e->getMessage() );
		var_dump( $e );

	} catch ( Exception $e ) {
		error_log( "TEST Standard Exception: " . $e->getMessage() );
		var_dump( $e );

	} finally {
		echo 'Finally block output...<br /><br />';
	}
}


/**
 * Session 4 | Lab 2
 * Lab: Traits
 * Complete the following:
 * 1. In separate files, create two traits, each with two methods, one of the methods named the same in both traits.
 * 2. In another file, create a class that uses the two traits.
 * 3. Resolve the naming collision, and change the method visibilities.
 * 4. Instantiate an instance of the class and execute the trait methods.
 * This lab is complete.
 */

echo "<h3>Session 4: Traits:</h3>";
$site = new ServicedSite();

echo '<pre>' . print_r( $site, true ) . '</pre>';
echo 'getTraitType: ' . $site->getTraitType();


/**
 * Session 6 | Lab 1
 * Lab: Prepared Statements
 * 1. Create a prepared statement script.
 * 2. Add a try/catch construct.
 * 3. Add a new customer record binding the customer parameters.
 */ 

echo "<h3>Session 6 | Lab 1 | Prepared Statements:</h3>";
echo "<h4>Adding to customers via prepared statement</h4>";


try {
	// Get the connection instance
	$pdo = new PDO('mysql:host=localhost;dbname=phpcourse','vagrant','vagrant');
	
	// Set error mode attribute
	$pdo->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// Setup a one-off SQL statement and get a statement object
	$stmt = $pdo->prepare( 'INSERT INTO customers (firstname,lastname)
	VALUES (?,?)' );
	
	// Hard coded input parameters
	$fname = 'Ken';
	$lname = 'Barlow_' . time();
	
	// Parameter bindings
	// The second parameter is referenced so must be an identifier
	$stmt->bindParam(1, $fname);
	$stmt->bindParam(2, $lname);
	
	// Execute the SQL statement
	$stmt->execute();

	// Select all
	$stmt = $pdo->query( 'SELECT * FROM customers');
	$stmt->setFetchMode(PDO::FETCH_ASSOC);

	//var_dump($stmt);
	foreach( $stmt as $item ){
		echo '<pre>' . print_r( $item, true) . '</pre>';
	
	}
	echo 'Deleting id > 5 ...';

	$stmt = $pdo->prepare( 'DELETE FROM customers WHERE id > 5');
	$stmt->execute();

} catch (PDOException $e){

	//Handle error
	echo 'ERR: ' . $e;

} catch (Throwable $e){
	
	//Handle error
	echo 'ERR: ' . $e;
}

/**
 * Session 6 | Lab 2
 * Lab: Stored Procedure
 * 1. Create a stored procedure script.
 * 2. Add the SQL to the database.
 * 3. Call the stored procedure with parameters.
 */ 

echo "<h3>Session 6 | Lab 2 | Stored Procedure</h3>";
echo "<h4>Stored procedure newCustomer</h4>";

$str = 'DROP PROCEDURE IF EXISTS phpcourse.newCustomer; ';
//$str .= 'DELIMITER $ ';
$str .=  'CREATE PROCEDURE phpcourse.newCustomer(';
$str .=  'p_firstname varchar(50),';
$str .=  'p_lastname varchar(50)) ';
$str .=  'BEGIN ';
$str .=  'insert into customers (firstname, lastname) values (p_firstname,p_lastname); ';
//$str .=  '-- other statements ...';
$str .=  'END; ';
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
	$stmt = $pdo->prepare($str);
		echo '<pre>' . print_r( $stmt, true) . '</pre>';

    $stmt->execute();

	
	echo 'Stored Procedure should now be added<br />';
	$stmt = $pdo->prepare("SHOW PROCEDURE STATUS LIKE '%customer%';");
echo '<pre>' . print_r( $stmt, true) . '</pre>';
$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
		while ($item = $stmt->fetch()) var_dump($item);	
	
	// Call the stored procedure
	$stmt = $pdo->prepare('CALL newCustomer(:first,:last)');
	$stmt->execute(['first' => 'Kenneth', 'last' => 'Barlow_' . time()]);

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


/**
 * Session 6 | Lab 3
 * Lab: Transaction
 * 1. Create a transaction script.
 * 2. Execute two SQL statements.
 * 3. Handle any exceptions.
 */ 

echo "<h3>Session 6: Transaction</h3>";

try {
	// Get the connection instance
	$pdo = new PDO('mysql:host=localhost;dbname=phpcourse','vagrant','vagrant');
	
	// Set error mode attribute
	$pdo->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// Begin the transaction
	$pdo->beginTransaction();

	// Series of SQL statements, all of which have to succeed
	// Call the stored procedure
	$stmt = $pdo->prepare('CALL newCustomer(:first,:last)');
	$stmt->execute(['first' => 'Jesus', 'last' => 'Christ_' . time()]);

	$stmt = $pdo->prepare('CALL newCustomer(:first,:last)');
	$stmt->execute(['first' => 'J', 'last' => 'H_' . time()]);

	// Commit success
	$pdo->commit();

} catch (PDOException $e){

	//Handle error
	echo 'ERR: ' . $e;
	$pdo->rollBack(); // Rollback in case of failure


} catch (Throwable $e){
	
	//Handle error
	echo 'ERR: ' . $e;
} finally{
	// Show Customers again
	
	echo 'Finally...';
	
	$stmt = $pdo->query('SELECT * FROM customers');
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
		while ($item = $stmt->fetch()) var_dump($item);	
}
	
