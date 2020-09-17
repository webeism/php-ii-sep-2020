<?php

/**
 * Main Site (Super)class - dashboard to feature all our sites
 */

namespace DashApp;

class Site{

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
        $str = "func: " . __FUNCTION__ . "<br />";
        $str .= '<pre>' . print_r( $this, true) . '</pre>';
        return $str;
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
        return "INVOKE... Your param was: " . ( $param ? $param : "not requested" );

    }

}

//$blah = new Site(1);
//var_dump($blah);
