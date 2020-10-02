# PHP II -- Class Notes -- Sep 2020

## Homework
* For Fri 02 Oct 2020
  * Lab: Composer with OrderApp
  * Lab: REST
  * Lab: Custom Wrapper
* For Wed 30 Sep 2020
  * Lab: Validate an Email Address
* For Mon 28 Sep 2020
  * Lab: Prepared Statements
  * Lab: Stored Procedure
  * Lab: Transaction
* For Wed 23 Sep 2020
  * Lab: Build Custom Exception Class
  * Lab: Traits
  * Have a look through the OrderApp using chapter 3 as a guideline
* For Mon 21 Sep 2020
  * Lab: Abstract Classes
  * Lab: Interfaces
	* Examples from the Laminas framework: https://github.com/laminas/laminas-db/tree/master/src/Adapter
  * Lab: Type Hinting
* For Fri 18 Sep 2020
  * Lab: Create a Class
  * Lab: Create an Extensible Super Class
  * Lab: Magic Methods
* For Wed 16 Sep 2020
  * Lab: Namespace

## TODO
* Q: Solid statistics on REST vs. XML-based
* A: https://www.ateam-oracle.com/performance-study-rest-vs-soap-for-mobile-applications

* Q: Has xml "progressed" beyond version = "1.0" ? That's all I ever see (actually I think I've seen 1.1)
* A: 1.1 is the current version; 2.0 is in committee

* Q: Can you have multi-byte chars in an email address?
* A: Yes
  * See: [RFC 6532](https://tools.ietf.org/html/rfc6532)

* Q: With UTF-8 multi-byte strings, can you specify a range of multi-byte chars?
* A: Yes: see `Examples_Day_7/regex_utf_8_range.php`

* Q: Is there a new way to re-use PDO database query iterations once exhausted? (PHP 7.4?)
* A: You can create a connection using `PDO::CURSOR_SCROLL` that allows the iteration to go forward or reverse
	* Drags down performance
	* Default is `PDO::CURSOR_FWDONLY`
	* TODO: rework example in `Examples_Day_6/pdo_with_opts.php`

* Q: Can you send database meta commands via the PDO driver?  (e.g. 'help' or 'delimiter')
* A: Testing: `Examples_Day_6/pdo_send_meta_commands.php`

* Q: Can any character be used as a regex delimiter?
* A: Delimiter must not be alphanumeric or backslash, otherwise ...

* Does Laravel use Doctrine?
  * Not natively, but there's a bridge: https://packagist.org/packages/laravel-doctrine/orm
* Software Design Patterns
  * Original work from 1994: [Design Patterns: Elements of Reusable Object-Oriented Software](https://www.amazon.com/s?k=Design+Patterns%3A+Elements+of+Reusable+Object-Oriented+Software&ref=nb_sb_noss_2)
  * Martin Fowler (2002): [Patterns of Enterprise Application Architecture](https://martinfowler.com/books/eaa.html)
* Reference to the Domain Model
* What about if traits share property names?
  * I need to do a lot more work on this stuff!
  * But if you have 2 traits, each with properties of the same name, and a class uses both traits, I was getting conflict error messages

* Add notes on updating phpMyAdmin for PHP 7.4.8
  * Update list from `apt` sources:
```
sudo apt update
```
  * Take a snapshot of the VM (`Machine::Take Snapshot`)
  * Either wait for the `Software Updater` GUI to kick in, or
```
sudo apt upgrade -y
```
  * Upgrade from the command line (takes an hour or so)

## Misc
* https://packagist.org/
* To get PDO DSN syntax per driver: https://www.php.net/manual/en/pdo.drivers.php
## OOP
### Polymorphism / Variance, etc.
* https://wiki.php.net/rfc/covariant-returns-and-contravariant-parameters
### Magic Methods
* Infinite Getters and Setters
```
<?php
class User
{
	protected $first;
	protected $last;
	protected $address;
	protected $city;
	protected $province;
	protected $country;
	protected $postalCode;
	public function __call($method, $params = [])
	{
		// this assumes the get methods all map to defined props
		if (strpos($method, 'get') === 0) {
			$prop = substr($method, 3);
			$prop[0] = strtolower($prop[0]);
			return $this->$prop ?? NULL;
		} elseif (strpos($method, 'set') === 0) {
			$prop = substr($method, 3);
			$prop[0] = strtolower($prop[0]);
			$this->$prop = $params[0];
		} else {
			return NULL;
		}
	}
}
$test = new User();
$test->setFirst('Fred');
$test->setLast('Flintstone');
echo $test->getFirst() . ' ' . $test->getLast();
$test->setWhatever('Whatever');
```
* Infinite properties
```
<?php
class Test
{
	protected $vals = [];
	public function __set($key, $value)
	{
		error_log(__METHOD__);
		$this->vals[$key] = $value;
	}
	public function __get($key)
	{
		error_log(__METHOD__);
		return $this->vals[$key] ?? NULL;
	}
}
$test = new Test();
$test->first = 'Fred';
$test->last  = 'Flintstone';
echo $test->first . ' ' . $test->last;
```

### Namespaces
* Example of putting all in one file:
```
<?php
namespace Test\Model {
	use ArrayObject;
	class Test
	{
		public $id = 123;
		public $test = 'MODEL TEST';
		public function getObj()
		{
			return new ArrayObject(get_object_vars($this));
		}
	}
}

namespace Test\Services {
	class Test
	{
		public $test = 'SERVICE TEST';
	}
}

namespace {
	use Test\Model\Test as ModelTest;
	use Test\Services\Test as ServiceTest;
	$test = new ModelTest();
	echo $test->test;
	var_dump($test->getObj());
}
```
* Prepare/Execute Lab
```
$id = 5;
$stmt = $pdo->prepare( 'DELETE FROM customers WHERE id > ?');
$stmt->execute([$id]);
```
* Another example
```
// Call the stored procedure
$stmt = $pdo->prepare('CALL newCustomer(:first,:last)');
$stmt->execute(['first' => 'Jesus', 'last' => 'Christ_' . time()]);
$stmt->execute(['first' => 'J', 'last' => 'H_' . time()]);
```
## Streams
* Custom Wrapper
  * See: https://www.php.net/manual/en/class.streamwrapper.php

## ERRATA
* Regex:Metacharacters:Positioning
  * Absolute end s/be `\Z`
* file_get_contents() REST Request
```
<?php
// Make a request for JSON	
$url = 'https://api.unlikelysource.com/api?city=Rochester&country=US';
$response = file_get_contents($url);
var_dump(json_decode($response));
``` 
