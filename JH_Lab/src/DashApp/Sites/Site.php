<?php

/**
 * Main Site (Super)class - dashboard to feature all our sites
 */

namespace DashApp\Sites;
use DashApp\Core\CustomException;



abstract class Site implements \DashApp\Core\FlySite{

    use \DashApp\Core\CustomTrait1, \DashApp\Core\CustomTrait2{
        \DashApp\Core\CustomTrait1::getTraitType insteadof \DashApp\Core\CustomTrait2;
        \DashApp\Core\CustomTrait2::setTraitTest as protected;
    }

    public const EXCEPTION_FLAG_STANDARD = 'error-flag-standard';
    public const EXCEPTION_FLAG_CUSTOM = 'error-flag-custom';
    public const TABLE = 'sites';
    protected $id;
    protected $name;
    protected $flyIndex = 0;
    protected $notes;
    
    // magic function 
    public function __construct( $id = 1 ){
        $this->traitType = $this->getTraitType();
        if( $id === 1 ){
            $this->id = $id;
            // DB lookup resulting in...
            $this->name = "Some site name";
            $this->flyIndex = 85;
            $this->notes = "Some recent notes about the site";
        }elseif( $id == self::EXCEPTION_FLAG_CUSTOM ){
            throw new CustomException( "Custom Error Flag passed to object constructor" );
        }elseif( $id == self::EXCEPTION_FLAG_STANDARD ){
            throw new \Exception( "Standard Error Flag passed to object constructor" );
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

    /**
     * __invoke to allow the class to be called as a function
     */
    public function __invoke( $param = "" ){
        //return "Your param was: " . $param ?? "not submitted";
        return "INVOKE... Your param was: " . ( $param ? '<pre>' . print_r( $param, true ) . '</pre>' : "not requested" );
    }


    /**
     * getSiteServices get the set of services site is currently enroled for
     */
    public abstract function getSiteServices();

    /**
     * getFlyIndex required as this is a flySite implementation
     */
    function getFlyIndex(){
        return 85;
    }
    
    /**
     * getFlyIndex required as this is a flySite implementation
     */    
    public function getPlugins(){
        return array(
            "p1",
            "p2",
            "p3",
            "p4",
        );
    }

}
