# PHP II -- Class Notes -- Sep 2020

## TODO
* Q: Is there a new way to re-use PDO database query iterations once exhausted? (PHP 7.4?)
* A: 
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

## Homework
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
