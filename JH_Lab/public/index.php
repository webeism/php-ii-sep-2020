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
    $file = str_replace('\\', '/', $class) . '.php';
    require BASE . '/src/' . $file;
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
