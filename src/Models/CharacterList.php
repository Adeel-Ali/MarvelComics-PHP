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
class CharacterList implements JsonSerializable {
    /**
     * The number of total available characters in this list. Will always be greater than or equal to the "returned" value.
     * @required
     * @var int $available public property
     */
    public $available;

    /**
     * The number of characters returned in this collection (up to 20).
     * @required
     * @var int $returned public property
     */
    public $returned;

    /**
     * The path to the full list of characters in this collection.
     * @required
     * @var string $collectionURI public property
     */
    public $collectionURI;

    /**
     * The list of returned characters in this collection.
     * @required
     * @var array $items public property
     */
    public $items;

    /**
     * Constructor to set initial or default values of member properties
	 * @param   int               $available       Initialization value for the property $this->available    
	 * @param   int               $returned        Initialization value for the property $this->returned     
	 * @param   string            $collectionURI   Initialization value for the property $this->collectionURI
	 * @param   array             $items           Initialization value for the property $this->items        
     */
    public function __construct()
    {
        if(4 == func_num_args())
        {
            $this->available     = func_get_arg(0);
            $this->returned      = func_get_arg(1);
            $this->collectionURI = func_get_arg(2);
            $this->items         = func_get_arg(3);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['available']     = $this->available;
        $json['returned']      = $this->returned;
        $json['collectionURI'] = $this->collectionURI;
        $json['items']         = $this->items;

        return $json;
    }
}