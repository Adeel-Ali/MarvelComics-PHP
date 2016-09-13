<?php 
/*
 * MarvelComicsLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ) on 09/13/2016
 */

namespace MarvelComicsLib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class SeriesDataWrapper implements JsonSerializable {
    /**
     * An HTML representation of the attribution notice for this result.  Please display either this notice or the contents of the attributionText field on all screens which contain data from the Marvel Comics API.
     * @required
     * @var string $attributionHTML public property
     */
    public $attributionHTML;

    /**
     * The attribution notice for this result.  Please display either this notice or the contents of the attributionHTML field on all screens which contain data from the Marvel Comics API.
     * @required
     * @var string $attributionText public property
     */
    public $attributionText;

    /**
     * The HTTP status code of the returned result.
     * @required
     * @var integer $code public property
     */
    public $code;

    /**
     * The copyright notice for the returned result.
     * @required
     * @var string $copyright public property
     */
    public $copyright;

    /**
     * The results returned by the call.
     * @required
     * @var SeriesDataContainer $data public property
     */
    public $data;

    /**
     * A digest value of the content returned by the call.
     * @required
     * @var string $etag public property
     */
    public $etag;

    /**
     * A string description of the call status.
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * Constructor to set initial or default values of member properties
     * @param   string            $attributionHTML   Initialization value for the property $this->attributionHTML
     * @param   string            $attributionText   Initialization value for the property $this->attributionText
     * @param   integer           $code              Initialization value for the property $this->code           
     * @param   string            $copyright         Initialization value for the property $this->copyright      
     * @param   SeriesDataContainer   $data              Initialization value for the property $this->data           
     * @param   string            $etag              Initialization value for the property $this->etag           
     * @param   string            $status            Initialization value for the property $this->status         
     */
    public function __construct()
    {
        if(7 == func_num_args())
        {
            $this->attributionHTML = func_get_arg(0);
            $this->attributionText = func_get_arg(1);
            $this->code            = func_get_arg(2);
            $this->copyright       = func_get_arg(3);
            $this->data            = func_get_arg(4);
            $this->etag            = func_get_arg(5);
            $this->status          = func_get_arg(6);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['attributionHTML'] = $this->attributionHTML;
        $json['attributionText'] = $this->attributionText;
        $json['code']            = $this->code;
        $json['copyright']       = $this->copyright;
        $json['data']            = $this->data;
        $json['etag']            = $this->etag;
        $json['status']          = $this->status;

        return $json;
    }
}