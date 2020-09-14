# PHP II -- Class Notes -- Sep 2020

## Homework
* For Weds 16 Sep 2020
  * Lab: Namespace
## TODO
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

## OOP

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
