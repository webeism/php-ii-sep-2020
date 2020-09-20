<?php

namespace DashApp\Core;

class Analysis{

	private $site;
	private $snapshot;


	public function __construct( FlySite $site ){
		$this->site = $site;
	}

	public function getLatestSnapshot(){
		$this->site->getSiteServices();
		$this->snapshot = $this->site;

	}

}
