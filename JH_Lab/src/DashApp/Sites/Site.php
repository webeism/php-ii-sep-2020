<?php

/**
 * Main Site (Super)class - dashboard to feature all our sites
 */

namespace DashApp\Sites;

abstract class Site implements \DashApp\Core\FlySite{

    public const TABLE = 'sites';
    protected $id;
    protected $name;
    protected $flyIndex = 0;
    protected $notes;
    
    // magic function 
    public function __construct( $id = 1 ){
        if( $id === 1 ){
            $this->id = $id;
            // DB lookup resulting in...
            $this->name = "Some site name";
            $this->flyIndex = 85;
            $this->notes = "Some recent notes about the site";
        }
    }

    // magic function 
    public function __toString(){
        return '<pre>' . print_r( $this, true ) . '</pre>';
    }

    // magic function for getters / setters
    public function __call( $method, $params = [] ){

        // this assumes the get methods all map to defined props
        switch( true ){
            case ( substr($method,0,3) == "get" );
                $prop = substr($method,3);
                $prop[0] = strtolower($prop[0]);
                return $this->$prop ?? NULL;
            break;

            case ( substr($method,0,3) == "set" );
                $prop = substr($method, 3);
                $prop[0] = strtolower($prop[0]);
                $this->$prop = $params[0];
            break;

            default;
                return NULL;

        }
    }

    public function __invoke( $param = "" ){
        //return "Your param was: " . $param ?? "not submitted";
        return "INVOKE... Your param was: " . ( $param ? '<pre>' . print_r( $param, true ) . '</pre>' : "not requested" );
    }


    /**
     * getSiteServices get the set of services site is currently enroled for
     */
    public abstract function getSiteServices();


    function getFlyIndex(){
        return 85;
    }
    
    public function getPlugins(){
        return array(
            "p1",
            "p2",
            "p3",
            "p4",
        );
    }

}

//$blah = new Site(1);
//var_dump($blah);