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
	public function __destruct()
	{
		error_log(__METHOD__);
	}
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
	public function __invoke()
	{
		return get_object_vars($this);
	}
	public function __toString()
	{
		return var_export($this->__invoke(), TRUE);
	}
}
$test = new User();
$test->setFirst('Fred');
$test->setLast('Flintstone');
echo $test->getFirst() . ' ' . $test->getLast();
$test->setWhatever('Whatever');
var_dump($test());
echo $test;
$str = serialize($test);
echo "\n";
echo $str;
