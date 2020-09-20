<?php

/**
 * SiteService Class
 */

namespace DashApp\SiteServices;

class SiteService{

    public const TABLE = 'site_services';
    protected $id;
    protected $name;
    protected $notes;
    private $api_key;
    private $api_secret;
    public $status;

    
    // magic function 
    public function __construct(){
        $this->status = "initiated"
    }


}
