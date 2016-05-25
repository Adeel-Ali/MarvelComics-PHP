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
class CharacterDataContainer implements JsonSerializable {
    /**
     * The requested offset (number of skipped results) of the call.
     * @required
     * @var int $offset public property
     */
    public $offset;

    /**
     * The requested result limit.
     * @required
     * @var int $limit public property
     */
    public $limit;

    /**
     * The total number of resources available given the current filter set.
     * @required
     * @var int $total public property
     */
    public $total;

    /**
     * The total number of results returned by this call.
     * @required
     * @var int $count public property
     */
    public $count;

    /**
     * The list of characters returned by the call.
     * @required
     * @var array $results public property
     */
    public $results;

    /**
     * Constructor to set initial or default values of member properties
	 * @param   int               $offset    Initialization value for the property $this->offset 
	 * @param   int               $limit     Initialization value for the property $this->limit  
	 * @param   int               $total     Initialization value for the property $this->total  
	 * @param   int               $count     Initialization value for the property $this->count  
	 * @param   array             $results   Initialization value for the property $this->results
     */
    public function __construct()
    {
        if(5 == func_num_args())
        {
            $this->offset  = func_get_arg(0);
            $this->limit   = func_get_arg(1);
            $this->total   = func_get_arg(2);
            $this->count   = func_get_arg(3);
            $this->results = func_get_arg(4);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['offset']  = $this->offset;
        $json['limit']   = $this->limit;
        $json['total']   = $this->total;
        $json['count']   = $this->count;
        $json['results'] = $this->results;

        return $json;
    }
}