<?php
/*
 * MarvelComicsLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace MarvelComicsLib\Controllers;

use MarvelComicsLib\APIException;
use MarvelComicsLib\APIHelper;
use MarvelComicsLib\Configuration;
use MarvelComicsLib\Models;
use MarvelComicsLib\Exceptions;
use MarvelComicsLib\Http\HttpRequest;
use MarvelComicsLib\Http\HttpResponse;
use MarvelComicsLib\Http\HttpMethod;
use MarvelComicsLib\Http\HttpContext;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class CreatorsController extends BaseController
{
    /**
     * @var CreatorsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return CreatorsController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Fetches a single creator by id.
     *
     * @param object $creatorId A single creator id.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCreatorIndividual(
        $creatorId
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/creators/{creatorId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'creatorId' => $creatorId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'referer' => Configuration::$referer
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 404) {
            throw new APIException('Creator not found.', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'MarvelComicsLib\\Models\\Creator');
    }

    /**
     * Fetches lists of comics filtered by a creator id.
     *
     * @param object $creatorId         A single creator id.
     * @param object $format            (optional) Filter by the issue format (e.g. comic, digital comic, hardcover).
     *                                  (Acceptable values are: "comic", "magazine", "trade paperback", "hardcover",
     *                                  "digest", "graphic novel", "digital comic", "infinite comic")
     * @param string $formatType        (optional) Filter by the issue format type (comic or collection).
     * @param object $noVariants        (optional) Exclude variant comics from the result set. (Acceptable values are:
     *                                  "true")
     * @param string $dateDescriptor    (optional) Return comics within a predefined date range.
     * @param object $dateRange         (optional) Return comics within a predefined date range.  Dates must be
     *                                  specified as date1,date2 (e.g. 2013-01-01,2013-01-02).  Dates are preferably
     *                                  formatted as YYYY-MM-DD but may be sent as any common date format.
     * @param object $title             (optional) Return only issues in series whose title matches the input.
     * @param object $titleStartsWith   (optional) Return only issues in series whose title starts with the input.
     * @param object $startYear         (optional) Return only issues in series whose start year matches the input.
     * @param object $issueNumber       (optional) Return only issues in series whose issue number matches the input.
     * @param object $diamondCode       (optional) Filter by diamond code.
     * @param object $digitalId         (optional) Filter by digital comic id.
     * @param object $upc               (optional) Filter by UPC.
     * @param object $isbn              (optional) Filter by ISBN.
     * @param object $ean               (optional) Filter by EAN.
     * @param object $issn              (optional) Filter by ISSN.
     * @param object $hasDigitalIssue   (optional) Include only results which are available digitally. (Acceptable
     *                                  values are: "true")
     * @param object $modifiedSince     (optional) Return only comics which have been modified since the specified date.
     * @param object $characters        (optional) Return only comics which feature the specified characters (accepts a
     *                                  comma-separated list of ids).
     * @param object $series            (optional) Return only comics which are part of the specified series (accepts a
     *                                  comma-separated list of ids).
     * @param object $events            (optional) Return only comics which take place in the specified events (accepts
     *                                  a comma-separated list of ids).
     * @param object $stories           (optional) Return only comics which contain the specified stories (accepts a
     *                                  comma-separated list of ids).
     * @param object $sharedAppearances (optional) Return only comics in which the specified characters appear together
     *                                  (for example in which BOTH Spider-Man and Wolverine appear).
     * @param object $collaborators     (optional) Return only comics in which the specified creators worked together
     *                                  (for example in which BOTH Stan Lee and Jack Kirby did work).
     * @param object $orderBy           (optional) Order the result set by a field or fields. Add a "-" to the value
     *                                  sort in descending order. Multiple values are given priority in the order in
     *                                  which they are passed. (Acceptable values are: "focDate", "onsaleDate", "title",
     *                                  "issueNumber", "modified", "-focDate", "-onsaleDate", "-title", "-issueNumber",
     *                                  "-modified")
     * @param object $limit             (optional) Limit the result set to the specified number of resources.
     * @param object $offset            (optional) Skip the specified number of resources in the result set.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getComicsCollectionByCreatorId(
        $creatorId,
        $format = null,
        $formatType = null,
        $noVariants = null,
        $dateDescriptor = null,
        $dateRange = null,
        $title = null,
        $titleStartsWith = null,
        $startYear = null,
        $issueNumber = null,
        $diamondCode = null,
        $digitalId = null,
        $upc = null,
        $isbn = null,
        $ean = null,
        $issn = null,
        $hasDigitalIssue = null,
        $modifiedSince = null,
        $characters = null,
        $series = null,
        $events = null,
        $stories = null,
        $sharedAppearances = null,
        $collaborators = null,
        $orderBy = null,
        $limit = null,
        $offset = null
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/creators/{creatorId}/comics';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'creatorId'         => $creatorId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'format'            => $format,
            'formatType'        => $formatType,
            'noVariants'        => $noVariants,
            'dateDescriptor'    => $dateDescriptor,
            'dateRange'         => $dateRange,
            'title'             => $title,
            'titleStartsWith'   => $titleStartsWith,
            'startYear'         => $startYear,
            'issueNumber'       => $issueNumber,
            'diamondCode'       => $diamondCode,
            'digitalId'         => $digitalId,
            'upc'               => $upc,
            'isbn'              => $isbn,
            'ean'               => $ean,
            'issn'              => $issn,
            'hasDigitalIssue'   => $hasDigitalIssue,
            'modifiedSince'     => $modifiedSince,
            'characters'        => $characters,
            'series'            => $series,
            'events'            => $events,
            'stories'           => $stories,
            'sharedAppearances' => $sharedAppearances,
            'collaborators'     => $collaborators,
            'orderBy'           => $orderBy,
            'limit'             => $limit,
            'offset'            => $offset,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'      => 'APIMATIC 2.0',
            'Accept'          => 'application/json',
            'referer' => Configuration::$referer
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 409) {
            throw new APIException('Limit greater than 100.', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'MarvelComicsLib\\Models\\ComicDataWrapper');
    }

    /**
     * Fetches lists of events filtered by a creator id.
     *
     * @param object $creatorId      A single creator id.
     * @param object $name           (optional) Filter the event list by name.
     * @param object $nameStartsWith (optional) Return events with names that begin with the specified string (e.g. Sp).
     * @param object $modifiedSince  (optional) Return only events which have been modified since the specified date.
     * @param object $characters     (optional) Return only events which feature the specified characters (accepts a
     *                               comma-separated list of ids).
     * @param object $series         (optional) Return only events which are part of the specified series (accepts a
     *                               comma-separated list of ids).
     * @param object $comics         (optional) Return only events which take place in the specified comics (accepts a
     *                               comma-separated list of ids).
     * @param object $stories        (optional) Return only events which contain the specified stories (accepts a comma-
     *                               separated list of ids).
     * @param object $orderBy        (optional) Order the result set by a field or fields. Add a "-" to the value sort
     *                               in descending order. Multiple values are given priority in the order in which they
     *                               are passed. (Acceptable values are: "name", "startDate", "modified", "-name", "-
     *                               startDate", "-modified")
     * @param object $limit          (optional) Limit the result set to the specified number of resources.
     * @param object $offset         (optional) Skip the specified number of resources in the result set.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCreatorEventsCollection(
        $creatorId,
        $name = null,
        $nameStartsWith = null,
        $modifiedSince = null,
        $characters = null,
        $series = null,
        $comics = null,
        $stories = null,
        $orderBy = null,
        $limit = null,
        $offset = null
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/creators/{creatorId}/events';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'creatorId'      => $creatorId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'name'           => $name,
            'nameStartsWith' => $nameStartsWith,
            'modifiedSince'  => $modifiedSince,
            'characters'     => $characters,
            'series'         => $series,
            'comics'         => $comics,
            'stories'        => $stories,
            'orderBy'        => $orderBy,
            'limit'          => $limit,
            'offset'         => $offset,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'referer' => Configuration::$referer
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 409) {
            throw new APIException('Limit greater than 100.', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'MarvelComicsLib\\Models\\EventDataWrapper');
    }

    /**
     * Fetches lists of series filtered by a creator id.
     *
     * @param object $creatorId       A single creator id.
     * @param object $title           (optional) Filter by series title.
     * @param object $titleStartsWith (optional) Return series with titles that begin with the specified string (e.g.
     *                                Sp).
     * @param object $startYear       (optional) Return only series matching the specified start year.
     * @param object $modifiedSince   (optional) Return only series which have been modified since the specified date.
     * @param object $comics          (optional) Return only series which contain the specified comics (accepts a comma-
     *                                separated list of ids).
     * @param object $stories         (optional) Return only series which contain the specified stories (accepts a
     *                                comma-separated list of ids).
     * @param object $events          (optional) Return only series which have comics that take place during the
     *                                specified events (accepts a comma-separated list of ids).
     * @param object $characters      (optional) Return only series which feature the specified characters (accepts a
     *                                comma-separated list of ids).
     * @param object $seriesType      (optional) Filter the series by publication frequency type. (Acceptable values
     *                                are: "collection", "one shot", "limited", "ongoing")
     * @param object $contains        (optional) Return only series containing one or more comics with the specified
     *                                format. (Acceptable values are: "comic", "magazine", "trade paperback",
     *                                "hardcover", "digest", "graphic novel", "digital comic", "infinite comic")
     * @param object $orderBy         (optional) Order the result set by a field or fields. Add a "-" to the value sort
     *                                in descending order. Multiple values are given priority in the order in which
     *                                they are passed. (Acceptable values are: "title", "modified", "startYear", "-
     *                                title", "-modified", "-startYear")
     * @param object $limit           (optional) Limit the result set to the specified number of resources.
     * @param object $offset          (optional) Skip the specified number of resources in the result set.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCreatorSeriesCollection(
        $creatorId,
        $title = null,
        $titleStartsWith = null,
        $startYear = null,
        $modifiedSince = null,
        $comics = null,
        $stories = null,
        $events = null,
        $characters = null,
        $seriesType = null,
        $contains = null,
        $orderBy = null,
        $limit = null,
        $offset = null
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/creators/{creatorId}/series';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'creatorId'       => $creatorId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'title'           => $title,
            'titleStartsWith' => $titleStartsWith,
            'startYear'       => $startYear,
            'modifiedSince'   => $modifiedSince,
            'comics'          => $comics,
            'stories'         => $stories,
            'events'          => $events,
            'characters'      => $characters,
            'seriesType'      => $seriesType,
            'contains'        => $contains,
            'orderBy'         => $orderBy,
            'limit'           => $limit,
            'offset'          => $offset,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'referer' => Configuration::$referer
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 409) {
            throw new APIException('Limit greater than 100.', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'MarvelComicsLib\\Models\\SeriesDataWrapper');
    }

    /**
     * Fetches lists of stories filtered by a creator id.
     *
     * @param object $creatorId     A single creator id.
     * @param object $modifiedSince (optional) Return only stories which have been modified since the specified date.
     * @param object $comics        (optional) Return only stories contained in the specified comics (accepts a comma-
     *                              separated list of ids).
     * @param object $series        (optional) Return only stories contained the specified series (accepts a comma-
     *                              separated list of ids).
     * @param object $events        (optional) Return only stories which take place during the specified events
     *                              (accepts a comma-separated list of ids).
     * @param object $characters    (optional) Return only stories which feature the specified characters (accepts a
     *                              comma-separated list of ids).
     * @param object $orderBy       (optional) Order the result set by a field or fields. Add a "-" to the value sort
     *                              in descending order. Multiple values are given priority in the order in which they
     *                              are passed. (Acceptable values are: "id", "modified", "-id", "-modified")
     * @param object $limit         (optional) Limit the result set to the specified number of resources.
     * @param object $offset        (optional) Skip the specified number of resources in the result set.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCreatorStoryCollection(
        $creatorId,
        $modifiedSince = null,
        $comics = null,
        $series = null,
        $events = null,
        $characters = null,
        $orderBy = null,
        $limit = null,
        $offset = null
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/creators/{creatorId}/stories';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'creatorId'     => $creatorId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'modifiedSince' => $modifiedSince,
            'comics'        => $comics,
            'series'        => $series,
            'events'        => $events,
            'characters'    => $characters,
            'orderBy'       => $orderBy,
            'limit'         => $limit,
            'offset'        => $offset,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'referer' => Configuration::$referer
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 409) {
            throw new APIException('Limit greater than 100.', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'MarvelComicsLib\\Models\\StoryDataWrapper');
    }

    /**
     * Fetches lists of creators.
     *
     * @param object $firstName            (optional) Filter by creator first name (e.g. Brian).
     * @param object $middleName           (optional) Filter by creator middle name (e.g. Michael).
     * @param object $lastName             (optional) Filter by creator last name (e.g. Bendis).
     * @param object $suffix               (optional) Filter by suffix or honorific (e.g. Jr., Sr.).
     * @param object $nameStartsWith       (optional) Filter by creator names that match critera (e.g. B, St L).
     * @param object $firstNameStartsWith  (optional) Filter by creator first names that match critera (e.g. B, St L).
     * @param object $middleNameStartsWith (optional) Filter by creator middle names that match critera (e.g. Mi).
     * @param object $lastNameStartsWith   (optional) Filter by creator last names that match critera (e.g. Ben).
     * @param object $modifiedSince        (optional) Return only creators which have been modified since the specified
     *                                     date.
     * @param object $comics               (optional) Return only creators who worked on in the specified comics
     *                                     (accepts a comma-separated list of ids).
     * @param object $series               (optional) Return only creators who worked on the specified series (accepts
     *                                     a comma-separated list of ids).
     * @param object $events               (optional) Return only creators who worked on comics that took place in the
     *                                     specified events (accepts a comma-separated list of ids).
     * @param object $stories              (optional) Return only creators who worked on the specified stories (accepts
     *                                     a comma-separated list of ids).
     * @param object $orderBy              (optional) Order the result set by a field or fields. Add a "-" to the value
     *                                     sort in descending order. Multiple values are given priority in the order in
     *                                     which they are passed. (Acceptable values are: "lastName", "firstName",
     *                                     "middleName", "suffix", "modified", "-lastName", "-firstName", "-middleName",
     *                                     "-suffix", "-modified")
     * @param object $limit                (optional) Limit the result set to the specified number of resources.
     * @param object $offset               (optional) Skip the specified number of resources in the result set.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCreatorCollection(
        $firstName = null,
        $middleName = null,
        $lastName = null,
        $suffix = null,
        $nameStartsWith = null,
        $firstNameStartsWith = null,
        $middleNameStartsWith = null,
        $lastNameStartsWith = null,
        $modifiedSince = null,
        $comics = null,
        $series = null,
        $events = null,
        $stories = null,
        $orderBy = null,
        $limit = null,
        $offset = null
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/creators';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'firstName'            => $firstName,
            'middleName'           => $middleName,
            'lastName'             => $lastName,
            'suffix'               => $suffix,
            'nameStartsWith'       => $nameStartsWith,
            'firstNameStartsWith'  => $firstNameStartsWith,
            'middleNameStartsWith' => $middleNameStartsWith,
            'lastNameStartsWith'   => $lastNameStartsWith,
            'modifiedSince'        => $modifiedSince,
            'comics'               => $comics,
            'series'               => $series,
            'events'               => $events,
            'stories'              => $stories,
            'orderBy'              => $orderBy,
            'limit'                => $limit,
            'offset'               => $offset,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'         => 'APIMATIC 2.0',
            'Accept'             => 'application/json',
            'referer' => Configuration::$referer
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 409) {
            throw new APIException('Limit greater than 100.', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'MarvelComicsLib\\Models\\CreatorDataWrapper');
    }
}
