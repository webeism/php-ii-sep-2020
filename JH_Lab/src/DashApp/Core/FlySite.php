<?php

namespace DashApp\Core;


/**
 * Main FlySite interface - functions which must exist for any object 
 */

interface FlySite{

	public function getFlyIndex();
	public function getPlugins();

}
