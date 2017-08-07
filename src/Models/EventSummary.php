<?php
/*
 * MarvelComicsLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace MarvelComicsLib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class EventSummary implements JsonSerializable
{
    /**
     * The path to the individual event resource.
     * @required
     * @var object $resourceURI public property
     */
    public $resourceURI;

    /**
     * The name of the event.
     * @required
     * @var object $name public property
     */
    public $name;

    /**
     * Constructor to set initial or default values of member properties
     * @param object $resourceURI Initialization value for $this->resourceURI
     * @param object $name        Initialization value for $this->name
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
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
