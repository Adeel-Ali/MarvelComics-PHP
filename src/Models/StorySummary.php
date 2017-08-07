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
class StorySummary implements JsonSerializable
{
    /**
     * The path to the individual story resource.
     * @required
     * @var object $resourceURI public property
     */
    public $resourceURI;

    /**
     * The canonical name of the story.
     * @required
     * @var object $name public property
     */
    public $name;

    /**
     * The type of the story (interior or cover).
     * @required
     * @var object $type public property
     */
    public $type;

    /**
     * Constructor to set initial or default values of member properties
     * @param object $resourceURI Initialization value for $this->resourceURI
     * @param object $name        Initialization value for $this->name
     * @param object $type        Initialization value for $this->type
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->resourceURI = func_get_arg(0);
            $this->name        = func_get_arg(1);
            $this->type        = func_get_arg(2);
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
        $json['type']        = $this->type;

        return $json;
    }
}
