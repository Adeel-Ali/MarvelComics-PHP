<?php 
/*
 * MarvelComicsLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ) on 05/25/2016
 */

namespace MarvelComicsLib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class ComicSummary implements JsonSerializable {
    /**
     * The path to the individual comic resource.
     * @required
     * @var string $resourceURI public property
     */
    public $resourceURI;

    /**
     * The canonical name of the comic.
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * Constructor to set initial or default values of member properties
	 * @param   string            $resourceURI   Initialization value for the property $this->resourceURI
	 * @param   string            $name          Initialization value for the property $this->name       
     */
    public function __construct()
    {
        if(2 == func_num_args())
        {
            $this->resourceURI = func_get_arg(0);
            $this->name        = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['resourceURI'] = $this->resourceURI;
        $json['name']        = $this->name;

        return $json;
    }
}