<?php

/**
 * Serviced site sub class - we need enhanced monitoring for these sites
 */

namespace DashApp\Sites;

class ServicedSite extends Site{

    public $intPlugins = 0;
    public $servicePlan = "";

    // magic function 
    public function __construct( $id = 1 ){
        if( $id === 1 ){
            parent::__construct(1);
        }
        $this->intPlugins = 5;
        $this->servicePlan = "entry";
    }

    public function getSiteServices(){
        return array(
            "GTMetrix",
            "Builtwith",
            "Sucuri"
        );
    }

}
