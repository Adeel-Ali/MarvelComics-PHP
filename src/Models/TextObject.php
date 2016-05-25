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
class TextObject implements JsonSerializable {
    /**
     * The canonical type of the text object (e.g. solicit text, preview text, etc.).
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * The IETF language tag denoting the language the text object is written in.
     * @required
     * @var string $language public property
     */
    public $language;

    /**
     * The text.
     * @required
     * @var string $text public property
     */
    public $text;

    /**
     * Constructor to set initial or default values of member properties
	 * @param   string            $type       Initialization value for the property $this->type    
	 * @param   string            $language   Initialization value for the property $this->language
	 * @param   string            $text       Initialization value for the property $this->text    
     */
    public function __construct()
    {
        if(3 == func_num_args())
        {
            $this->type     = func_get_arg(0);
            $this->language = func_get_arg(1);
            $this->text     = func_get_arg(2);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['type']     = $this->type;
        $json['language'] = $this->language;
        $json['text']     = $this->text;

        return $json;
    }
}