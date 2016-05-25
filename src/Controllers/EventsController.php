<?php
/*
 * MarvelComicsLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ) on 05/25/2016
 */

namespace MarvelComicsLib\Controllers;

use MarvelComicsLib\APIException;
use MarvelComicsLib\APIHelper;
use MarvelComicsLib\Configuration;
use MarvelComicsLib\Models;
use Unirest\Request;
use \apimatic\jsonmapper\JsonMapper;

/**
 * @todo Add a general description for this controller.
 */
class EventsController {

    /**
     * @var EventsController The reference to *Singleton* instance of this class
     */
    private static $instance;
    
    /**
     * Returns the *Singleton* instance of this class.
     * @return EventsController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Fetches a single event by id.
     * @param  string     $eventId     Required parameter: A single event.
     * @return mixed response from the API call*/
    public function getEventIndividual (
                $eventId) 
    {
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/events/{eventId}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'eventId' => $eventId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'apikey' => Configuration::$apikey,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'referer' => Configuration::$referer
        );

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        //Error handling using HTTP status codes
        if ($response->code == 404) {
            throw new APIException('Event not found.', 404, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\Event());
    }
        
    /**
     * Fetches lists of characters filtered by an event id.
     * @param  string          $eventId            Required parameter: A single event.
     * @param  string|null     $comics             Optional parameter: Return only characters which appear in the specified comics (accepts a comma-separated list of ids).
     * @param  string|null     $limit              Optional parameter: Limit the result set to the specified number of resources.
     * @param  string|null     $modifiedSince      Optional parameter: Return only characters which have been modified since the specified date.
     * @param  string|null     $name               Optional parameter: Return only characters matching the specified full character name (e.g. Spider-Man).
     * @param  string|null     $nameStartsWith     Optional parameter: Return characters with names that begin with the specified string (e.g. Sp).
     * @param  string|null     $offset             Optional parameter: Skip the specified number of resources in the result set.
     * @param  string|null     $orderBy            Optional parameter: Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "name", "modified", "-name", "-modified")
     * @param  string|null     $series             Optional parameter: Return only characters which appear the specified series (accepts a comma-separated list of ids).
     * @param  string|null     $stories            Optional parameter: Return only characters which appear the specified stories (accepts a comma-separated list of ids).
     * @return mixed response from the API call*/
    public function getEventCharacterCollection (
                $eventId,
                $comics = NULL,
                $limit = NULL,
                $modifiedSince = NULL,
                $name = NULL,
                $nameStartsWith = NULL,
                $offset = NULL,
                $orderBy = NULL,
                $series = NULL,
                $stories = NULL) 
    {
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/events/{eventId}/characters';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'eventId'        => $eventId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'comics'         => $comics,
            'limit'          => $limit,
            'modifiedSince'  => $modifiedSince,
            'name'           => $name,
            'nameStartsWith' => $nameStartsWith,
            'offset'         => $offset,
            'orderBy'        => $orderBy,
            'series'         => $series,
            'stories'        => $stories,
            'apikey' => Configuration::$apikey,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'referer' => Configuration::$referer
        );

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        //Error handling using HTTP status codes
        if ($response->code == 409) {
            throw new APIException('Limit greater than 100.', 409, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\CharacterDataWrapper());
    }
        
    /**
     * Fetches lists of comics filtered by an event id.
     * @param  string          $eventId               Required parameter: A single event.
     * @param  string|null     $characters            Optional parameter: Return only comics which feature the specified characters (accepts a comma-separated list of ids).
     * @param  string|null     $collaborators         Optional parameter: Return only comics in which the specified creators worked together (for example in which BOTH Stan Lee and Jack Kirby did work).
     * @param  string|null     $creators              Optional parameter: Return only comics which feature work by the specified creators (accepts a comma-separated list of ids).
     * @param  string|null     $dateDescriptor        Optional parameter: Return comics within a predefined date range.
     * @param  string|null     $dateRange             Optional parameter: Return comics within a predefined date range.  Dates must be specified as date1,date2 (e.g. 2013-01-01,2013-01-02).  Dates are preferably formatted as YYYY-MM-DD but may be sent as any common date format.
     * @param  string|null     $diamondCode           Optional parameter: Filter by diamond code.
     * @param  string|null     $digitalId             Optional parameter: Filter by digital comic id.
     * @param  string|null     $ean                   Optional parameter: Filter by EAN.
     * @param  string|null     $events                Optional parameter: Return only comics which take place in the specified events (accepts a comma-separated list of ids).
     * @param  string|null     $format                Optional parameter: Filter by the issue format (e.g. comic, digital comic, hardcover). (Acceptable values are: "comic", "magazine", "trade paperback", "hardcover", "digest", "graphic novel", "digital comic", "infinite comic")
     * @param  string|null     $formatType            Optional parameter: Filter by the issue format type (comic or collection).
     * @param  string|null     $hasDigitalIssue       Optional parameter: Include only results which are available digitally. (Acceptable values are: "true")
     * @param  string|null     $isbn                  Optional parameter: Filter by ISBN.
     * @param  string|null     $issn                  Optional parameter: Filter by ISSN.
     * @param  string|null     $issueNumber           Optional parameter: Return only issues in series whose issue number matches the input.
     * @param  string|null     $limit                 Optional parameter: Limit the result set to the specified number of resources.
     * @param  string|null     $modifiedSince         Optional parameter: Return only comics which have been modified since the specified date.
     * @param  string|null     $noVariants            Optional parameter: Exclude variant comics from the result set. (Acceptable values are: "true")
     * @param  string|null     $offset                Optional parameter: Skip the specified number of resources in the result set.
     * @param  string|null     $orderBy               Optional parameter: Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "focDate", "onsaleDate", "title", "issueNumber", "modified", "-focDate", "-onsaleDate", "-title", "-issueNumber", "-modified")
     * @param  string|null     $series                Optional parameter: Return only comics which are part of the specified series (accepts a comma-separated list of ids).
     * @param  string|null     $sharedAppearances     Optional parameter: Return only comics in which the specified characters appear together (for example in which BOTH Spider-Man and Wolverine appear).
     * @param  string|null     $startYear             Optional parameter: Return only issues in series whose start year matches the input.
     * @param  string|null     $stories               Optional parameter: Return only comics which contain the specified stories (accepts a comma-separated list of ids).
     * @param  string|null     $title                 Optional parameter: Return only issues in series whose title matches the input.
     * @param  string|null     $titleStartsWith       Optional parameter: Return only issues in series whose title starts with the input.
     * @param  string|null     $upc                   Optional parameter: Filter by UPC.
     * @return mixed response from the API call*/
    public function getComicsCollectionByEventId (
                $eventId,
                $characters = NULL,
                $collaborators = NULL,
                $creators = NULL,
                $dateDescriptor = NULL,
                $dateRange = NULL,
                $diamondCode = NULL,
                $digitalId = NULL,
                $ean = NULL,
                $events = NULL,
                $format = NULL,
                $formatType = NULL,
                $hasDigitalIssue = NULL,
                $isbn = NULL,
                $issn = NULL,
                $issueNumber = NULL,
                $limit = NULL,
                $modifiedSince = NULL,
                $noVariants = NULL,
                $offset = NULL,
                $orderBy = NULL,
                $series = NULL,
                $sharedAppearances = NULL,
                $startYear = NULL,
                $stories = NULL,
                $title = NULL,
                $titleStartsWith = NULL,
                $upc = NULL) 
    {
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/events/{eventId}/comics';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'eventId'           => $eventId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'characters'        => $characters,
            'collaborators'     => $collaborators,
            'creators'          => $creators,
            'dateDescriptor'    => $dateDescriptor,
            'dateRange'         => $dateRange,
            'diamondCode'       => $diamondCode,
            'digitalId'         => $digitalId,
            'ean'               => $ean,
            'events'            => $events,
            'format'            => $format,
            'formatType'        => $formatType,
            'hasDigitalIssue'   => $hasDigitalIssue,
            'isbn'              => $isbn,
            'issn'              => $issn,
            'issueNumber'       => $issueNumber,
            'limit'             => $limit,
            'modifiedSince'     => $modifiedSince,
            'noVariants'        => $noVariants,
            'offset'            => $offset,
            'orderBy'           => $orderBy,
            'series'            => $series,
            'sharedAppearances' => $sharedAppearances,
            'startYear'         => $startYear,
            'stories'           => $stories,
            'title'             => $title,
            'titleStartsWith'   => $titleStartsWith,
            'upc'               => $upc,
            'apikey' => Configuration::$apikey,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'      => 'APIMATIC 2.0',
            'Accept'          => 'application/json',
            'referer' => Configuration::$referer
        );

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        //Error handling using HTTP status codes
        if ($response->code == 409) {
            throw new APIException('Limit greater than 100.', 409, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\ComicDataWrapper());
    }
        
    /**
     * Fetches lists of creators filtered by an event id.
     * @param  string          $eventId                  Required parameter: A single event.
     * @param  string|null     $comics                   Optional parameter: Return only creators who worked on in the specified comics (accepts a comma-separated list of ids).
     * @param  string|null     $firstName                Optional parameter: Filter by creator first name (e.g. brian).
     * @param  string|null     $firstNameStartsWith      Optional parameter: Filter by creator first names that match critera (e.g. B, St L).
     * @param  string|null     $lastName                 Optional parameter: Filter by creator last name (e.g. Bendis).
     * @param  string|null     $lastNameStartsWith       Optional parameter: Filter by creator last names that match critera (e.g. Ben).
     * @param  string|null     $limit                    Optional parameter: Limit the result set to the specified number of resources.
     * @param  string|null     $middleName               Optional parameter: Filter by creator middle name (e.g. Michael).
     * @param  string|null     $middleNameStartsWith     Optional parameter: Filter by creator middle names that match critera (e.g. Mi).
     * @param  string|null     $modifiedSince            Optional parameter: Return only creators which have been modified since the specified date.
     * @param  string|null     $nameStartsWith           Optional parameter: Filter by creator names that match critera (e.g. B, St L).
     * @param  string|null     $offset                   Optional parameter: Skip the specified number of resources in the result set.
     * @param  string|null     $orderBy                  Optional parameter: Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "lastName", "firstName", "middleName", "suffix", "modified", "-lastName", "-firstName", "-middleName", "-suffix", "-modified")
     * @param  string|null     $series                   Optional parameter: Return only creators who worked on the specified series (accepts a comma-separated list of ids).
     * @param  string|null     $stories                  Optional parameter: Return only creators who worked on the specified stories (accepts a comma-separated list of ids).
     * @param  string|null     $suffix                   Optional parameter: Filter by suffix or honorific (e.g. Jr., Sr.).
     * @return mixed response from the API call*/
    public function getCreatorCollectionByEventId (
                $eventId,
                $comics = NULL,
                $firstName = NULL,
                $firstNameStartsWith = NULL,
                $lastName = NULL,
                $lastNameStartsWith = NULL,
                $limit = NULL,
                $middleName = NULL,
                $middleNameStartsWith = NULL,
                $modifiedSince = NULL,
                $nameStartsWith = NULL,
                $offset = NULL,
                $orderBy = NULL,
                $series = NULL,
                $stories = NULL,
                $suffix = NULL) 
    {
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/events/{eventId}/creators';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'eventId'              => $eventId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'comics'               => $comics,
            'firstName'            => $firstName,
            'firstNameStartsWith'  => $firstNameStartsWith,
            'lastName'             => $lastName,
            'lastNameStartsWith'   => $lastNameStartsWith,
            'limit'                => $limit,
            'middleName'           => $middleName,
            'middleNameStartsWith' => $middleNameStartsWith,
            'modifiedSince'        => $modifiedSince,
            'nameStartsWith'       => $nameStartsWith,
            'offset'               => $offset,
            'orderBy'              => $orderBy,
            'series'               => $series,
            'stories'              => $stories,
            'suffix'               => $suffix,
            'apikey' => Configuration::$apikey,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'         => 'APIMATIC 2.0',
            'Accept'             => 'application/json',
            'referer' => Configuration::$referer
        );

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        //Error handling using HTTP status codes
        if ($response->code == 409) {
            throw new APIException('Limit greater than 100.', 409, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\CreatorDataWrapper());
    }
        
    /**
     * Fetches lists of series filtered by an event id.
     * @param  string          $eventId             Required parameter: A single event.
     * @param  string|null     $characters          Optional parameter: Return only series which feature the specified characters (accepts a comma-separated list of ids).
     * @param  string|null     $comics              Optional parameter: Return only series which contain the specified comics (accepts a comma-separated list of ids).
     * @param  string|null     $contains            Optional parameter: Return only series containing one or more comics with the specified format. (Acceptable values are: "comic", "magazine", "trade paperback", "hardcover", "digest", "graphic novel", "digital comic", "infinite comic")
     * @param  string|null     $creators            Optional parameter: Return only series which feature work by the specified creators (accepts a comma-separated list of ids).
     * @param  string|null     $limit               Optional parameter: Limit the result set to the specified number of resources.
     * @param  string|null     $modifiedSince       Optional parameter: Return only series which have been modified since the specified date.
     * @param  string|null     $offset              Optional parameter: Skip the specified number of resources in the result set.
     * @param  string|null     $orderBy             Optional parameter: Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "title", "modified", "startYear", "-title", "-modified", "-startYear")
     * @param  string|null     $seriesType          Optional parameter: Filter the series by publication frequency type. (Acceptable values are: "collection", "one shot", "limited", "ongoing")
     * @param  string|null     $startYear           Optional parameter: Return only series matching the specified start year.
     * @param  string|null     $stories             Optional parameter: Return only series which contain the specified stories (accepts a comma-separated list of ids).
     * @param  string|null     $title               Optional parameter: Filter by series title.
     * @param  string|null     $titleStartsWith     Optional parameter: Return series with titles that begin with the specified string (e.g. Sp).
     * @return mixed response from the API call*/
    public function getEventSeriesCollection (
                $eventId,
                $characters = NULL,
                $comics = NULL,
                $contains = NULL,
                $creators = NULL,
                $limit = NULL,
                $modifiedSince = NULL,
                $offset = NULL,
                $orderBy = NULL,
                $seriesType = NULL,
                $startYear = NULL,
                $stories = NULL,
                $title = NULL,
                $titleStartsWith = NULL) 
    {
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/events/{eventId}/series';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'eventId'         => $eventId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'characters'      => $characters,
            'comics'          => $comics,
            'contains'        => $contains,
            'creators'        => $creators,
            'limit'           => $limit,
            'modifiedSince'   => $modifiedSince,
            'offset'          => $offset,
            'orderBy'         => $orderBy,
            'seriesType'      => $seriesType,
            'startYear'       => $startYear,
            'stories'         => $stories,
            'title'           => $title,
            'titleStartsWith' => $titleStartsWith,
            'apikey' => Configuration::$apikey,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'referer' => Configuration::$referer
        );

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        //Error handling using HTTP status codes
        if ($response->code == 409) {
            throw new APIException('Limit greater than 100.', 409, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\SeriesDataWrapper());
    }
        
    /**
     * Fetches lists of stories filtered by an event id.
     * @param  string          $eventId           Required parameter: A single event.
     * @param  string|null     $characters        Optional parameter: Return only stories which feature the specified characters (accepts a comma-separated list of ids).
     * @param  string|null     $comics            Optional parameter: Return only stories contained in the specified (accepts a comma-separated list of ids).
     * @param  string|null     $creators          Optional parameter: Return only stories which feature work by the specified creators (accepts a comma-separated list of ids).
     * @param  string|null     $limit             Optional parameter: Limit the result set to the specified number of resources.
     * @param  string|null     $modifiedSince     Optional parameter: Return only stories which have been modified since the specified date.
     * @param  string|null     $offset            Optional parameter: Skip the specified number of resources in the result set.
     * @param  string|null     $orderBy           Optional parameter: Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "id", "modified", "-id", "-modified")
     * @param  string|null     $series            Optional parameter: Return only stories contained the specified series (accepts a comma-separated list of ids).
     * @return mixed response from the API call*/
    public function getEventStoryCollection (
                $eventId,
                $characters = NULL,
                $comics = NULL,
                $creators = NULL,
                $limit = NULL,
                $modifiedSince = NULL,
                $offset = NULL,
                $orderBy = NULL,
                $series = NULL) 
    {
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/events/{eventId}/stories';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'eventId'       => $eventId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'characters'    => $characters,
            'comics'        => $comics,
            'creators'      => $creators,
            'limit'         => $limit,
            'modifiedSince' => $modifiedSince,
            'offset'        => $offset,
            'orderBy'       => $orderBy,
            'series'        => $series,
            'apikey' => Configuration::$apikey,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'referer' => Configuration::$referer
        );

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        //Error handling using HTTP status codes
        if ($response->code == 409) {
            throw new APIException('Limit greater than 100.', 409, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\StoryDataWrapper());
    }
        
    /**
     * Fetches lists of events.
     * @param  string|null     $characters         Optional parameter: Return only events which feature the specified characters (accepts a comma-separated list of ids).
     * @param  string|null     $comics             Optional parameter: Return only events which take place in the specified comics (accepts a comma-separated list of ids).
     * @param  string|null     $creators           Optional parameter: Return only events which feature work by the specified creators (accepts a comma-separated list of ids).
     * @param  string|null     $limit              Optional parameter: Limit the result set to the specified number of resources.
     * @param  string|null     $modifiedSince      Optional parameter: Return only events which have been modified since the specified date.
     * @param  string|null     $name               Optional parameter: Return only events which match the specified name.
     * @param  string|null     $nameStartsWith     Optional parameter: Return events with names that begin with the specified string (e.g. Sp).
     * @param  string|null     $offset             Optional parameter: Skip the specified number of resources in the result set.
     * @param  string|null     $orderBy            Optional parameter: Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "name", "startDate", "modified", "-name", "-startDate", "-modified")
     * @param  string|null     $series             Optional parameter: Return only events which are part of the specified series (accepts a comma-separated list of ids).
     * @param  string|null     $stories            Optional parameter: Return only events which take place in the specified stories (accepts a comma-separated list of ids).
     * @return mixed response from the API call*/
    public function getEventsCollection (
                $characters = NULL,
                $comics = NULL,
                $creators = NULL,
                $limit = NULL,
                $modifiedSince = NULL,
                $name = NULL,
                $nameStartsWith = NULL,
                $offset = NULL,
                $orderBy = NULL,
                $series = NULL,
                $stories = NULL) 
    {
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/events';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'characters'     => $characters,
            'comics'         => $comics,
            'creators'       => $creators,
            'limit'          => $limit,
            'modifiedSince'  => $modifiedSince,
            'name'           => $name,
            'nameStartsWith' => $nameStartsWith,
            'offset'         => $offset,
            'orderBy'        => $orderBy,
            'series'         => $series,
            'stories'        => $stories,
            'apikey' => Configuration::$apikey,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'referer' => Configuration::$referer
        );

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        //Error handling using HTTP status codes
        if ($response->code == 409) {
            throw new APIException('Limit greater than 100.', 409, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\EventDataWrapper());
    }
        

    /**
     * Get a new JsonMapper instance for mapping objects
     * @return \apimatic\jsonmapper\JsonMapper JsonMapper instance
     */
    protected function getJsonMapper()
    {
        $mapper = new JsonMapper();
        return $mapper;
    }
}