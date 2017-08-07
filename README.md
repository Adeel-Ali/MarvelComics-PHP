# Getting started

Marvel Comics API SDK

## How to Build

The generated code has dependencies over external libraries like UniRest. These dependencies are defined in the ```composer.json``` file that comes with the SDK. 
To resolve these dependencies, we use the Composer package manager which requires PHP greater than 5.3.2 installed in your system. 
Visit [https://getcomposer.org/download/](https://getcomposer.org/download/) to download the installer file for Composer and run it in your system. 
Open command prompt and type ```composer --version```. This should display the current version of the Composer installed if the installation was successful.

* Using command line, navigate to the directory containing the generated files (including ```composer.json```) for the SDK. 
* Run the command ```composer install```. This should install all the required dependencies and create the ```vendor``` directory in your project directory.

![Building SDK - Step 1](https://apidocs.io/illustration/php?step=installDependencies&workspaceFolder=MarvelComics-PHP)

### [For Windows Users Only] Configuring CURL Certificate Path in php.ini

CURL used to include a list of accepted CAs, but no longer bundles ANY CA certs. So by default it will reject all SSL certificates as unverifiable. You will have to get your CA's cert and point curl at it. The steps are as follows:

1. Download the certificate bundle (.pem file) from [https://curl.haxx.se/docs/caextract.html](https://curl.haxx.se/docs/caextract.html) on to your system.
2. Add curl.cainfo = "PATH_TO/cacert.pem" to your php.ini file located in your php installation. “PATH_TO” must be an absolute path containing the .pem file.

```ini
[curl]
; A default value for the CURLOPT_CAINFO option. This is required to be an
; absolute path.
;curl.cainfo =
```

## How to Use

The following section explains how to use the MarvelComics library in a new project.

### 1. Open Project in an IDE

Open an IDE for PHP like PhpStorm. The basic workflow presented here is also applicable if you prefer using a different editor or IDE.

![Open project in PHPStorm - Step 1](https://apidocs.io/illustration/php?step=openIDE&workspaceFolder=MarvelComics-PHP)

Click on ```Open``` in PhpStorm to browse to your generated SDK directory and then click ```OK```.

![Open project in PHPStorm - Step 2](https://apidocs.io/illustration/php?step=openProject0&workspaceFolder=MarvelComics-PHP)     

### 2. Add a new Test Project

Create a new directory by right clicking on the solution name as shown below:

![Add a new project in PHPStorm - Step 1](https://apidocs.io/illustration/php?step=createDirectory&workspaceFolder=MarvelComics-PHP)

Name the directory as "test"

![Add a new project in PHPStorm - Step 2](https://apidocs.io/illustration/php?step=nameDirectory&workspaceFolder=MarvelComics-PHP)
   
Add a PHP file to this project

![Add a new project in PHPStorm - Step 3](https://apidocs.io/illustration/php?step=createFile&workspaceFolder=MarvelComics-PHP)

Name it "testSDK"

![Add a new project in PHPStorm - Step 4](https://apidocs.io/illustration/php?step=nameFile&workspaceFolder=MarvelComics-PHP)

Depending on your project setup, you might need to include composer's autoloader in your PHP code to enable auto loading of classes.

```PHP
require_once "../vendor/autoload.php";
```

It is important that the path inside require_once correctly points to the file ```autoload.php``` inside the vendor directory created during dependency installations.

![Add a new project in PHPStorm - Step 4](https://apidocs.io/illustration/php?step=projectFiles&workspaceFolder=MarvelComics-PHP)

After this you can add code to initialize the client library and acquire the instance of a Controller class. Sample code to initialize the client library and using controller methods is given in the subsequent sections.

### 3. Run the Test Project

To run your project you must set the Interpreter for your project. Interpreter is the PHP engine installed on your computer.

Open ```Settings``` from ```File``` menu.

![Run Test Project - Step 1](https://apidocs.io/illustration/php?step=openSettings&workspaceFolder=MarvelComics-PHP)

Select ```PHP``` from within ```Languages & Frameworks```

![Run Test Project - Step 2](https://apidocs.io/illustration/php?step=setInterpreter0&workspaceFolder=MarvelComics-PHP)

Browse for Interpreters near the ```Interpreter``` option and choose your interpreter.

![Run Test Project - Step 3](https://apidocs.io/illustration/php?step=setInterpreter1&workspaceFolder=MarvelComics-PHP)

Once the interpreter is selected, click ```OK```

![Run Test Project - Step 4](https://apidocs.io/illustration/php?step=setInterpreter2&workspaceFolder=MarvelComics-PHP)

To run your project, right click on your PHP file inside your Test project and click on ```Run```

![Run Test Project - Step 5](https://apidocs.io/illustration/php?step=runProject&workspaceFolder=MarvelComics-PHP)

## How to Test

Unit tests in this SDK can be run using PHPUnit. 

1. First install the dependencies using composer including the `require-dev` dependencies.
2. Run `vendor\bin\phpunit --verbose` from commandline to execute tests. If you have 
   installed PHPUnit globally, run tests using `phpunit --verbose` instead.

You can change the PHPUnit test configuration in the `phpunit.xml` file.

## Initialization

### Authentication
In order to setup authentication and initialization of the API client, you need the following information.

| Parameter | Description |
|-----------|-------------|
| referer | TODO: add a description |



API client can be initialized as following.

```php
$referer = 'referer';

$client = new MarvelComicsLib\MarvelComicsClient($referer);
```


# Class Reference

## <a name="list_of_controllers"></a>List of Controllers

* [StoriesController](#stories_controller)
* [SeriesController](#series_controller)
* [EventsController](#events_controller)
* [CreatorsController](#creators_controller)
* [ComicsController](#comics_controller)
* [CharactersController](#characters_controller)

## <a name="stories_controller"></a>![Class: ](https://apidocs.io/img/class.png ".StoriesController") StoriesController

### Get singleton instance

The singleton instance of the ``` StoriesController ``` class can be accessed from the API Client.

```php
$stories = $client->getStories();
```

### <a name="get_story_individual"></a>![Method: ](https://apidocs.io/img/method.png ".StoriesController.getStoryIndividual") getStoryIndividual

> Fetches a single comic story by id.


```php
function getStoryIndividual($storyId)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| storyId |  ``` Required ```  | Filter by story id. |



#### Example Usage

```php
$storyId = array('key' => 'value');

$result = $stories->getStoryIndividual($storyId);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 404 | Story not found. |



### <a name="get_character_collection_by_story_id"></a>![Method: ](https://apidocs.io/img/method.png ".StoriesController.getCharacterCollectionByStoryId") getCharacterCollectionByStoryId

> Fetches lists of characters filtered by a story id.


```php
function getCharacterCollectionByStoryId(
        $storyId,
        $name = null,
        $nameStartsWith = null,
        $modifiedSince = null,
        $comics = null,
        $series = null,
        $events = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| storyId |  ``` Required ```  | Filter by story id. |
| name |  ``` Optional ```  | Return only characters matching the specified full character name (e.g. Spider-Man). |
| nameStartsWith |  ``` Optional ```  | Return characters with names that begin with the specified string (e.g. Sp). |
| modifiedSince |  ``` Optional ```  | Return only characters which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only characters which appear in the specified comics (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only characters which appear the specified series (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only characters which appear comics that took place in the specified events (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "name", "modified", "-name", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$storyId = array('key' => 'value');
$name = array('key' => 'value');
$nameStartsWith = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$series = array('key' => 'value');
$events = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $stories->getCharacterCollectionByStoryId($storyId, $name, $nameStartsWith, $modifiedSince, $comics, $series, $events, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_comics_collection_by_story_id"></a>![Method: ](https://apidocs.io/img/method.png ".StoriesController.getComicsCollectionByStoryId") getComicsCollectionByStoryId

> Fetches lists of comics filtered by a story id.


```php
function getComicsCollectionByStoryId(
        $storyId,
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
        $creators = null,
        $characters = null,
        $series = null,
        $events = null,
        $sharedAppearances = null,
        $collaborators = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| storyId |  ``` Required ```  | Filter by story id. |
| format |  ``` Optional ```  | Filter by the issue format (e.g. comic, digital comic, hardcover). (Acceptable values are: "comic", "magazine", "trade paperback", "hardcover", "digest", "graphic novel", "digital comic", "infinite comic") |
| formatType |  ``` Optional ```  | Filter by the issue format type (comic or collection). |
| noVariants |  ``` Optional ```  | Exclude variant comics from the result set. (Acceptable values are: "true") |
| dateDescriptor |  ``` Optional ```  | Return comics within a predefined date range. |
| dateRange |  ``` Optional ```  | Return comics within a predefined date range.  Dates must be specified as date1,date2 (e.g. 2013-01-01,2013-01-02).  Dates are preferably formatted as YYYY-MM-DD but may be sent as any common date format. |
| title |  ``` Optional ```  | Return only issues in series whose title matches the input. |
| titleStartsWith |  ``` Optional ```  | Return only issues in series whose title starts with the input. |
| startYear |  ``` Optional ```  | Return only issues in series whose start year matches the input. |
| issueNumber |  ``` Optional ```  | Return only issues in series whose issue number matches the input. |
| diamondCode |  ``` Optional ```  | Filter by diamond code. |
| digitalId |  ``` Optional ```  | Filter by digital comic id. |
| upc |  ``` Optional ```  | Filter by UPC. |
| isbn |  ``` Optional ```  | Filter by ISBN. |
| ean |  ``` Optional ```  | Filter by EAN. |
| issn |  ``` Optional ```  | Filter by ISSN. |
| hasDigitalIssue |  ``` Optional ```  | Include only results which are available digitally. (Acceptable values are: "true") |
| modifiedSince |  ``` Optional ```  | Return only comics which have been modified since the specified date. |
| creators |  ``` Optional ```  | Return only comics which feature work by the specified creators (accepts a comma-separated list of ids). |
| characters |  ``` Optional ```  | Return only comics which feature the specified characters (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only comics which are part of the specified series (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only comics which take place in the specified events (accepts a comma-separated list of ids). |
| sharedAppearances |  ``` Optional ```  | Return only comics in which the specified characters appear together (for example in which BOTH Spider-Man and Wolverine appear). |
| collaborators |  ``` Optional ```  | Return only comics in which the specified creators worked together (for example in which BOTH Stan Lee and Jack Kirby did work). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "focDate", "onsaleDate", "title", "issueNumber", "modified", "-focDate", "-onsaleDate", "-title", "-issueNumber", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$storyId = array('key' => 'value');
$format = array('key' => 'value');
$formatType = string::COLLECTION;
$noVariants = array('key' => 'value');
$dateDescriptor = string::LASTWEEK;
$dateRange = array('key' => 'value');
$title = array('key' => 'value');
$titleStartsWith = array('key' => 'value');
$startYear = array('key' => 'value');
$issueNumber = array('key' => 'value');
$diamondCode = array('key' => 'value');
$digitalId = array('key' => 'value');
$upc = array('key' => 'value');
$isbn = array('key' => 'value');
$ean = array('key' => 'value');
$issn = array('key' => 'value');
$hasDigitalIssue = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$creators = array('key' => 'value');
$characters = array('key' => 'value');
$series = array('key' => 'value');
$events = array('key' => 'value');
$sharedAppearances = array('key' => 'value');
$collaborators = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $stories->getComicsCollectionByStoryId($storyId, $format, $formatType, $noVariants, $dateDescriptor, $dateRange, $title, $titleStartsWith, $startYear, $issueNumber, $diamondCode, $digitalId, $upc, $isbn, $ean, $issn, $hasDigitalIssue, $modifiedSince, $creators, $characters, $series, $events, $sharedAppearances, $collaborators, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_creator_collection_by_story_id"></a>![Method: ](https://apidocs.io/img/method.png ".StoriesController.getCreatorCollectionByStoryId") getCreatorCollectionByStoryId

> Fetches lists of creators filtered by a story id.


```php
function getCreatorCollectionByStoryId(
        $storyId,
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
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| storyId |  ``` Required ```  | Filter by story id. |
| firstName |  ``` Optional ```  | Filter by creator first name (e.g. brian). |
| middleName |  ``` Optional ```  | Filter by creator middle name (e.g. Michael). |
| lastName |  ``` Optional ```  | Filter by creator last name (e.g. Bendis). |
| suffix |  ``` Optional ```  | Filter by suffix or honorific (e.g. Jr., Sr.). |
| nameStartsWith |  ``` Optional ```  | Filter by creator names that match critera (e.g. B, St L). |
| firstNameStartsWith |  ``` Optional ```  | Filter by creator first names that match critera (e.g. B, St L). |
| middleNameStartsWith |  ``` Optional ```  | Filter by creator middle names that match critera (e.g. Mi). |
| lastNameStartsWith |  ``` Optional ```  | Filter by creator last names that match critera (e.g. Ben). |
| modifiedSince |  ``` Optional ```  | Return only creators which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only creators who worked on in the specified comics (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only creators who worked on the specified series (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only creators who worked on comics that took place in the specified events (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "lastName", "firstName", "middleName", "suffix", "modified", "-lastName", "-firstName", "-middleName", "-suffix", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$storyId = array('key' => 'value');
$firstName = array('key' => 'value');
$middleName = array('key' => 'value');
$lastName = array('key' => 'value');
$suffix = array('key' => 'value');
$nameStartsWith = array('key' => 'value');
$firstNameStartsWith = array('key' => 'value');
$middleNameStartsWith = array('key' => 'value');
$lastNameStartsWith = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$series = array('key' => 'value');
$events = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $stories->getCreatorCollectionByStoryId($storyId, $firstName, $middleName, $lastName, $suffix, $nameStartsWith, $firstNameStartsWith, $middleNameStartsWith, $lastNameStartsWith, $modifiedSince, $comics, $series, $events, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_events_collection_by_story_id"></a>![Method: ](https://apidocs.io/img/method.png ".StoriesController.getEventsCollectionByStoryId") getEventsCollectionByStoryId

> Fetches lists of events filtered by a story id.


```php
function getEventsCollectionByStoryId(
        $storyId,
        $name = null,
        $nameStartsWith = null,
        $modifiedSince = null,
        $creators = null,
        $characters = null,
        $series = null,
        $comics = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| storyId |  ``` Required ```  | Filter by story id. |
| name |  ``` Optional ```  | Filter the event list by name. |
| nameStartsWith |  ``` Optional ```  | Return events with names that begin with the specified string (e.g. Sp). |
| modifiedSince |  ``` Optional ```  | Return only events which have been modified since the specified date. |
| creators |  ``` Optional ```  | Return only events which feature work by the specified creators (accepts a comma-separated list of ids). |
| characters |  ``` Optional ```  | Return only events which feature the specified characters (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only events which are part of the specified series (accepts a comma-separated list of ids). |
| comics |  ``` Optional ```  | Return only events which take place in the specified comics (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "name", "startDate", "modified", "-name", "-startDate", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$storyId = array('key' => 'value');
$name = array('key' => 'value');
$nameStartsWith = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$creators = array('key' => 'value');
$characters = array('key' => 'value');
$series = array('key' => 'value');
$comics = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $stories->getEventsCollectionByStoryId($storyId, $name, $nameStartsWith, $modifiedSince, $creators, $characters, $series, $comics, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_story_series_collection"></a>![Method: ](https://apidocs.io/img/method.png ".StoriesController.getStorySeriesCollection") getStorySeriesCollection

> Fetches lists of series filtered by a story id.


```php
function getStorySeriesCollection(
        $storyId,
        $events = null,
        $title = null,
        $titleStartsWith = null,
        $startYear = null,
        $modifiedSince = null,
        $comics = null,
        $creators = null,
        $characters = null,
        $seriesType = null,
        $contains = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| storyId |  ``` Required ```  | Filter by story id. |
| events |  ``` Optional ```  | Return only series which have comics that take place during the specified events (accepts a comma-separated list of ids). |
| title |  ``` Optional ```  | Filter by series title. |
| titleStartsWith |  ``` Optional ```  | Return series with titles that begin with the specified string (e.g. Sp). |
| startYear |  ``` Optional ```  | Return only series matching the specified start year. |
| modifiedSince |  ``` Optional ```  | Return only series which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only series which contain the specified comics (accepts a comma-separated list of ids). |
| creators |  ``` Optional ```  | Return only series which feature work by the specified creators (accepts a comma-separated list of ids). |
| characters |  ``` Optional ```  | Return only series which feature the specified characters (accepts a comma-separated list of ids). |
| seriesType |  ``` Optional ```  | Filter the series by publication frequency type. (Acceptable values are: "collection", "one shot", "limited", "ongoing") |
| contains |  ``` Optional ```  | Return only series containing one or more comics with the specified format. (Acceptable values are: "comic", "magazine", "trade paperback", "hardcover", "digest", "graphic novel", "digital comic", "infinite comic") |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "title", "modified", "startYear", "-title", "-modified", "-startYear") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$storyId = array('key' => 'value');
$events = array('key' => 'value');
$title = array('key' => 'value');
$titleStartsWith = array('key' => 'value');
$startYear = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$creators = array('key' => 'value');
$characters = array('key' => 'value');
$seriesType = array('key' => 'value');
$contains = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $stories->getStorySeriesCollection($storyId, $events, $title, $titleStartsWith, $startYear, $modifiedSince, $comics, $creators, $characters, $seriesType, $contains, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_story_collection"></a>![Method: ](https://apidocs.io/img/method.png ".StoriesController.getStoryCollection") getStoryCollection

> Fetches lists of stories.


```php
function getStoryCollection(
        $modifiedSince = null,
        $comics = null,
        $series = null,
        $events = null,
        $creators = null,
        $characters = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| modifiedSince |  ``` Optional ```  | Return only stories which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only stories contained in the specified (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only stories contained the specified series (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only stories which take place during the specified events (accepts a comma-separated list of ids). |
| creators |  ``` Optional ```  | Return only stories which feature work by the specified creators (accepts a comma-separated list of ids). |
| characters |  ``` Optional ```  | Return only stories which feature the specified characters (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "id", "modified", "-id", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$series = array('key' => 'value');
$events = array('key' => 'value');
$creators = array('key' => 'value');
$characters = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $stories->getStoryCollection($modifiedSince, $comics, $series, $events, $creators, $characters, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



[Back to List of Controllers](#list_of_controllers)

## <a name="series_controller"></a>![Class: ](https://apidocs.io/img/class.png ".SeriesController") SeriesController

### Get singleton instance

The singleton instance of the ``` SeriesController ``` class can be accessed from the API Client.

```php
$series = $client->getSeries();
```

### <a name="get_series_individual"></a>![Method: ](https://apidocs.io/img/method.png ".SeriesController.getSeriesIndividual") getSeriesIndividual

> Fetches a single comic series by id.


```php
function getSeriesIndividual($seriesId)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| seriesId |  ``` Required ```  | Filter by series title. |



#### Example Usage

```php
$seriesId = array('key' => 'value');

$result = $series->getSeriesIndividual($seriesId);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 404 | Series not found. |



### <a name="get_series_character_wrapper"></a>![Method: ](https://apidocs.io/img/method.png ".SeriesController.getSeriesCharacterWrapper") getSeriesCharacterWrapper

> Fetches lists of characters filtered by a series id.


```php
function getSeriesCharacterWrapper(
        $seriesId,
        $name = null,
        $nameStartsWith = null,
        $modifiedSince = null,
        $comics = null,
        $events = null,
        $stories = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| seriesId |  ``` Required ```  | Filter by series title. |
| name |  ``` Optional ```  | Return only characters matching the specified full character name (e.g. Spider-Man). |
| nameStartsWith |  ``` Optional ```  | Return characters with names that begin with the specified string (e.g. Sp). |
| modifiedSince |  ``` Optional ```  | Return only characters which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only characters which appear in the specified comics (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only characters which appear comics that took place in the specified events (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only characters which appear the specified stories (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "name", "modified", "-name", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$seriesId = array('key' => 'value');
$name = array('key' => 'value');
$nameStartsWith = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$events = array('key' => 'value');
$stories = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $series->getSeriesCharacterWrapper($seriesId, $name, $nameStartsWith, $modifiedSince, $comics, $events, $stories, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_comics_collection_by_series_id"></a>![Method: ](https://apidocs.io/img/method.png ".SeriesController.getComicsCollectionBySeriesId") getComicsCollectionBySeriesId

> Fetches lists of comics filtered by a series id.


```php
function getComicsCollectionBySeriesId(
        $seriesId,
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
        $creators = null,
        $characters = null,
        $events = null,
        $stories = null,
        $sharedAppearances = null,
        $collaborators = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| seriesId |  ``` Required ```  | Filter by series title. |
| format |  ``` Optional ```  | Filter by the issue format (e.g. comic, digital comic, hardcover). (Acceptable values are: "comic", "magazine", "trade paperback", "hardcover", "digest", "graphic novel", "digital comic", "infinite comic") |
| formatType |  ``` Optional ```  | Filter by the issue format type (comic or collection). |
| noVariants |  ``` Optional ```  | Exclude variant comics from the result set. (Acceptable values are: "true") |
| dateDescriptor |  ``` Optional ```  | Return comics within a predefined date range. |
| dateRange |  ``` Optional ```  | Return comics within a predefined date range.  Dates must be specified as date1,date2 (e.g. 2013-01-01,2013-01-02).  Dates are preferably formatted as YYYY-MM-DD but may be sent as any common date format. |
| title |  ``` Optional ```  | Return only issues in series whose title matches the input. |
| titleStartsWith |  ``` Optional ```  | Return only issues in series whose title starts with the input. |
| startYear |  ``` Optional ```  | Return only issues in series whose start year matches the input. |
| issueNumber |  ``` Optional ```  | Return only issues in series whose issue number matches the input. |
| diamondCode |  ``` Optional ```  | Filter by diamond code. |
| digitalId |  ``` Optional ```  | Filter by digital comic id. |
| upc |  ``` Optional ```  | Filter by UPC. |
| isbn |  ``` Optional ```  | Filter by ISBN. |
| ean |  ``` Optional ```  | Filter by EAN. |
| issn |  ``` Optional ```  | Filter by ISSN. |
| hasDigitalIssue |  ``` Optional ```  | Include only results which are available digitally. (Acceptable values are: "true") |
| modifiedSince |  ``` Optional ```  | Return only comics which have been modified since the specified date. |
| creators |  ``` Optional ```  | Return only comics which feature work by the specified creators (accepts a comma-separated list of ids). |
| characters |  ``` Optional ```  | Return only comics which feature the specified characters (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only comics which take place in the specified events (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only comics which contain the specified stories (accepts a comma-separated list of ids). |
| sharedAppearances |  ``` Optional ```  | Return only comics in which the specified characters appear together (for example in which BOTH Spider-Man and Wolverine appear). |
| collaborators |  ``` Optional ```  | Return only comics in which the specified creators worked together (for example in which BOTH Stan Lee and Jack Kirby did work). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "focDate", "onsaleDate", "title", "issueNumber", "modified", "-focDate", "-onsaleDate", "-title", "-issueNumber", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$seriesId = array('key' => 'value');
$format = array('key' => 'value');
$formatType = string::COLLECTION;
$noVariants = array('key' => 'value');
$dateDescriptor = string::LASTWEEK;
$dateRange = array('key' => 'value');
$title = array('key' => 'value');
$titleStartsWith = array('key' => 'value');
$startYear = array('key' => 'value');
$issueNumber = array('key' => 'value');
$diamondCode = array('key' => 'value');
$digitalId = array('key' => 'value');
$upc = array('key' => 'value');
$isbn = array('key' => 'value');
$ean = array('key' => 'value');
$issn = array('key' => 'value');
$hasDigitalIssue = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$creators = array('key' => 'value');
$characters = array('key' => 'value');
$events = array('key' => 'value');
$stories = array('key' => 'value');
$sharedAppearances = array('key' => 'value');
$collaborators = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $series->getComicsCollectionBySeriesId($seriesId, $format, $formatType, $noVariants, $dateDescriptor, $dateRange, $title, $titleStartsWith, $startYear, $issueNumber, $diamondCode, $digitalId, $upc, $isbn, $ean, $issn, $hasDigitalIssue, $modifiedSince, $creators, $characters, $events, $stories, $sharedAppearances, $collaborators, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_creator_collection_by_series_id"></a>![Method: ](https://apidocs.io/img/method.png ".SeriesController.getCreatorCollectionBySeriesId") getCreatorCollectionBySeriesId

> Fetches lists of creators filtered by a series id.


```php
function getCreatorCollectionBySeriesId(
        $seriesId,
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
        $events = null,
        $stories = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| seriesId |  ``` Required ```  | Filter by series title. |
| firstName |  ``` Optional ```  | Filter by creator first name (e.g. brian). |
| middleName |  ``` Optional ```  | Filter by creator middle name (e.g. Michael). |
| lastName |  ``` Optional ```  | Filter by creator last name (e.g. Bendis). |
| suffix |  ``` Optional ```  | Filter by suffix or honorific (e.g. Jr., Sr.). |
| nameStartsWith |  ``` Optional ```  | Filter by creator names that match critera (e.g. B, St L). |
| firstNameStartsWith |  ``` Optional ```  | Filter by creator first names that match critera (e.g. B, St L). |
| middleNameStartsWith |  ``` Optional ```  | Filter by creator middle names that match critera (e.g. Mi). |
| lastNameStartsWith |  ``` Optional ```  | Filter by creator last names that match critera (e.g. Ben). |
| modifiedSince |  ``` Optional ```  | Return only creators which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only creators who worked on in the specified comics (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only creators who worked on comics that took place in the specified events (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only creators who worked on the specified stories (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "lastName", "firstName", "middleName", "suffix", "modified", "-lastName", "-firstName", "-middleName", "-suffix", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$seriesId = array('key' => 'value');
$firstName = array('key' => 'value');
$middleName = array('key' => 'value');
$lastName = array('key' => 'value');
$suffix = array('key' => 'value');
$nameStartsWith = array('key' => 'value');
$firstNameStartsWith = array('key' => 'value');
$middleNameStartsWith = array('key' => 'value');
$lastNameStartsWith = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$events = array('key' => 'value');
$stories = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $series->getCreatorCollectionBySeriesId($seriesId, $firstName, $middleName, $lastName, $suffix, $nameStartsWith, $firstNameStartsWith, $middleNameStartsWith, $lastNameStartsWith, $modifiedSince, $comics, $events, $stories, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_events_collection_by_series_id"></a>![Method: ](https://apidocs.io/img/method.png ".SeriesController.getEventsCollectionBySeriesId") getEventsCollectionBySeriesId

> Fetches lists of events filtered by a series id.


```php
function getEventsCollectionBySeriesId(
        $seriesId,
        $name = null,
        $nameStartsWith = null,
        $modifiedSince = null,
        $creators = null,
        $characters = null,
        $comics = null,
        $stories = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| seriesId |  ``` Required ```  | Filter by series title. |
| name |  ``` Optional ```  | Filter the event list by name. |
| nameStartsWith |  ``` Optional ```  | Return events with names that begin with the specified string (e.g. Sp). |
| modifiedSince |  ``` Optional ```  | Return only events which have been modified since the specified date. |
| creators |  ``` Optional ```  | Return only events which feature work by the specified creators (accepts a comma-separated list of ids). |
| characters |  ``` Optional ```  | Return only events which feature the specified characters (accepts a comma-separated list of ids). |
| comics |  ``` Optional ```  | Return only events which take place in the specified comics (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only events which contain the specified stories (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "name", "startDate", "modified", "-name", "-startDate", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$seriesId = array('key' => 'value');
$name = array('key' => 'value');
$nameStartsWith = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$creators = array('key' => 'value');
$characters = array('key' => 'value');
$comics = array('key' => 'value');
$stories = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $series->getEventsCollectionBySeriesId($seriesId, $name, $nameStartsWith, $modifiedSince, $creators, $characters, $comics, $stories, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_series_story_collection"></a>![Method: ](https://apidocs.io/img/method.png ".SeriesController.getSeriesStoryCollection") getSeriesStoryCollection

> Fetches lists of stories filtered by a series id.


```php
function getSeriesStoryCollection(
        $seriesId,
        $modifiedSince = null,
        $comics = null,
        $events = null,
        $creators = null,
        $characters = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| seriesId |  ``` Required ```  | Filter by series title. |
| modifiedSince |  ``` Optional ```  | Return only stories which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only stories contained in the specified (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only stories which take place during the specified events (accepts a comma-separated list of ids). |
| creators |  ``` Optional ```  | Return only stories which feature work by the specified creators (accepts a comma-separated list of ids). |
| characters |  ``` Optional ```  | Return only stories which feature the specified characters (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "id", "modified", "-id", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$seriesId = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$events = array('key' => 'value');
$creators = array('key' => 'value');
$characters = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $series->getSeriesStoryCollection($seriesId, $modifiedSince, $comics, $events, $creators, $characters, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_series_collection"></a>![Method: ](https://apidocs.io/img/method.png ".SeriesController.getSeriesCollection") getSeriesCollection

> Fetches lists of series.


```php
function getSeriesCollection(
        $title = null,
        $titleStartsWith = null,
        $startYear = null,
        $modifiedSince = null,
        $comics = null,
        $stories = null,
        $events = null,
        $creators = null,
        $characters = null,
        $seriesType = null,
        $contains = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| title |  ``` Optional ```  | Return only series matching the specified title. |
| titleStartsWith |  ``` Optional ```  | Return series with titles that begin with the specified string (e.g. Sp). |
| startYear |  ``` Optional ```  | Return only series matching the specified start year. |
| modifiedSince |  ``` Optional ```  | Return only series which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only series which contain the specified comics (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only series which contain the specified stories (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only series which have comics that take place during the specified events (accepts a comma-separated list of ids). |
| creators |  ``` Optional ```  | Return only series which feature work by the specified creators (accepts a comma-separated list of ids). |
| characters |  ``` Optional ```  | Return only series which feature the specified characters (accepts a comma-separated list of ids). |
| seriesType |  ``` Optional ```  | Filter the series by publication frequency type. (Acceptable values are: "collection", "one shot", "limited", "ongoing") |
| contains |  ``` Optional ```  | Return only series containing one or more comics with the specified format. (Acceptable values are: "comic", "magazine", "trade paperback", "hardcover", "digest", "graphic novel", "digital comic", "infinite comic") |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "title", "modified", "startYear", "-title", "-modified", "-startYear") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$title = array('key' => 'value');
$titleStartsWith = array('key' => 'value');
$startYear = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$stories = array('key' => 'value');
$events = array('key' => 'value');
$creators = array('key' => 'value');
$characters = array('key' => 'value');
$seriesType = array('key' => 'value');
$contains = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $series->getSeriesCollection($title, $titleStartsWith, $startYear, $modifiedSince, $comics, $stories, $events, $creators, $characters, $seriesType, $contains, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



[Back to List of Controllers](#list_of_controllers)

## <a name="events_controller"></a>![Class: ](https://apidocs.io/img/class.png ".EventsController") EventsController

### Get singleton instance

The singleton instance of the ``` EventsController ``` class can be accessed from the API Client.

```php
$events = $client->getEvents();
```

### <a name="get_event_individual"></a>![Method: ](https://apidocs.io/img/method.png ".EventsController.getEventIndividual") getEventIndividual

> Fetches a single event by id.


```php
function getEventIndividual($eventId)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| eventId |  ``` Required ```  | A single event. |



#### Example Usage

```php
$eventId = array('key' => 'value');

$result = $events->getEventIndividual($eventId);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 404 | Event not found. |



### <a name="get_event_character_collection"></a>![Method: ](https://apidocs.io/img/method.png ".EventsController.getEventCharacterCollection") getEventCharacterCollection

> Fetches lists of characters filtered by an event id.


```php
function getEventCharacterCollection(
        $eventId,
        $name = null,
        $nameStartsWith = null,
        $modifiedSince = null,
        $comics = null,
        $series = null,
        $stories = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| eventId |  ``` Required ```  | A single event. |
| name |  ``` Optional ```  | Return only characters matching the specified full character name (e.g. Spider-Man). |
| nameStartsWith |  ``` Optional ```  | Return characters with names that begin with the specified string (e.g. Sp). |
| modifiedSince |  ``` Optional ```  | Return only characters which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only characters which appear in the specified comics (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only characters which appear the specified series (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only characters which appear the specified stories (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "name", "modified", "-name", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$eventId = array('key' => 'value');
$name = array('key' => 'value');
$nameStartsWith = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$series = array('key' => 'value');
$stories = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $events->getEventCharacterCollection($eventId, $name, $nameStartsWith, $modifiedSince, $comics, $series, $stories, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_comics_collection_by_event_id"></a>![Method: ](https://apidocs.io/img/method.png ".EventsController.getComicsCollectionByEventId") getComicsCollectionByEventId

> Fetches lists of comics filtered by an event id.


```php
function getComicsCollectionByEventId(
        $eventId,
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
        $creators = null,
        $characters = null,
        $series = null,
        $events = null,
        $stories = null,
        $sharedAppearances = null,
        $collaborators = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| eventId |  ``` Required ```  | A single event. |
| format |  ``` Optional ```  | Filter by the issue format (e.g. comic, digital comic, hardcover). (Acceptable values are: "comic", "magazine", "trade paperback", "hardcover", "digest", "graphic novel", "digital comic", "infinite comic") |
| formatType |  ``` Optional ```  | Filter by the issue format type (comic or collection). |
| noVariants |  ``` Optional ```  | Exclude variant comics from the result set. (Acceptable values are: "true") |
| dateDescriptor |  ``` Optional ```  | Return comics within a predefined date range. |
| dateRange |  ``` Optional ```  | Return comics within a predefined date range.  Dates must be specified as date1,date2 (e.g. 2013-01-01,2013-01-02).  Dates are preferably formatted as YYYY-MM-DD but may be sent as any common date format. |
| title |  ``` Optional ```  | Return only issues in series whose title matches the input. |
| titleStartsWith |  ``` Optional ```  | Return only issues in series whose title starts with the input. |
| startYear |  ``` Optional ```  | Return only issues in series whose start year matches the input. |
| issueNumber |  ``` Optional ```  | Return only issues in series whose issue number matches the input. |
| diamondCode |  ``` Optional ```  | Filter by diamond code. |
| digitalId |  ``` Optional ```  | Filter by digital comic id. |
| upc |  ``` Optional ```  | Filter by UPC. |
| isbn |  ``` Optional ```  | Filter by ISBN. |
| ean |  ``` Optional ```  | Filter by EAN. |
| issn |  ``` Optional ```  | Filter by ISSN. |
| hasDigitalIssue |  ``` Optional ```  | Include only results which are available digitally. (Acceptable values are: "true") |
| modifiedSince |  ``` Optional ```  | Return only comics which have been modified since the specified date. |
| creators |  ``` Optional ```  | Return only comics which feature work by the specified creators (accepts a comma-separated list of ids). |
| characters |  ``` Optional ```  | Return only comics which feature the specified characters (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only comics which are part of the specified series (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only comics which take place in the specified events (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only comics which contain the specified stories (accepts a comma-separated list of ids). |
| sharedAppearances |  ``` Optional ```  | Return only comics in which the specified characters appear together (for example in which BOTH Spider-Man and Wolverine appear). |
| collaborators |  ``` Optional ```  | Return only comics in which the specified creators worked together (for example in which BOTH Stan Lee and Jack Kirby did work). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "focDate", "onsaleDate", "title", "issueNumber", "modified", "-focDate", "-onsaleDate", "-title", "-issueNumber", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$eventId = array('key' => 'value');
$format = array('key' => 'value');
$formatType = string::COLLECTION;
$noVariants = array('key' => 'value');
$dateDescriptor = string::LASTWEEK;
$dateRange = array('key' => 'value');
$title = array('key' => 'value');
$titleStartsWith = array('key' => 'value');
$startYear = array('key' => 'value');
$issueNumber = array('key' => 'value');
$diamondCode = array('key' => 'value');
$digitalId = array('key' => 'value');
$upc = array('key' => 'value');
$isbn = array('key' => 'value');
$ean = array('key' => 'value');
$issn = array('key' => 'value');
$hasDigitalIssue = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$creators = array('key' => 'value');
$characters = array('key' => 'value');
$series = array('key' => 'value');
$events = array('key' => 'value');
$stories = array('key' => 'value');
$sharedAppearances = array('key' => 'value');
$collaborators = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $events->getComicsCollectionByEventId($eventId, $format, $formatType, $noVariants, $dateDescriptor, $dateRange, $title, $titleStartsWith, $startYear, $issueNumber, $diamondCode, $digitalId, $upc, $isbn, $ean, $issn, $hasDigitalIssue, $modifiedSince, $creators, $characters, $series, $events, $stories, $sharedAppearances, $collaborators, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_creator_collection_by_event_id"></a>![Method: ](https://apidocs.io/img/method.png ".EventsController.getCreatorCollectionByEventId") getCreatorCollectionByEventId

> Fetches lists of creators filtered by an event id.


```php
function getCreatorCollectionByEventId(
        $eventId,
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
        $stories = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| eventId |  ``` Required ```  | A single event. |
| firstName |  ``` Optional ```  | Filter by creator first name (e.g. brian). |
| middleName |  ``` Optional ```  | Filter by creator middle name (e.g. Michael). |
| lastName |  ``` Optional ```  | Filter by creator last name (e.g. Bendis). |
| suffix |  ``` Optional ```  | Filter by suffix or honorific (e.g. Jr., Sr.). |
| nameStartsWith |  ``` Optional ```  | Filter by creator names that match critera (e.g. B, St L). |
| firstNameStartsWith |  ``` Optional ```  | Filter by creator first names that match critera (e.g. B, St L). |
| middleNameStartsWith |  ``` Optional ```  | Filter by creator middle names that match critera (e.g. Mi). |
| lastNameStartsWith |  ``` Optional ```  | Filter by creator last names that match critera (e.g. Ben). |
| modifiedSince |  ``` Optional ```  | Return only creators which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only creators who worked on in the specified comics (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only creators who worked on the specified series (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only creators who worked on the specified stories (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "lastName", "firstName", "middleName", "suffix", "modified", "-lastName", "-firstName", "-middleName", "-suffix", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$eventId = array('key' => 'value');
$firstName = array('key' => 'value');
$middleName = array('key' => 'value');
$lastName = array('key' => 'value');
$suffix = array('key' => 'value');
$nameStartsWith = array('key' => 'value');
$firstNameStartsWith = array('key' => 'value');
$middleNameStartsWith = array('key' => 'value');
$lastNameStartsWith = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$series = array('key' => 'value');
$stories = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $events->getCreatorCollectionByEventId($eventId, $firstName, $middleName, $lastName, $suffix, $nameStartsWith, $firstNameStartsWith, $middleNameStartsWith, $lastNameStartsWith, $modifiedSince, $comics, $series, $stories, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_event_series_collection"></a>![Method: ](https://apidocs.io/img/method.png ".EventsController.getEventSeriesCollection") getEventSeriesCollection

> Fetches lists of series filtered by an event id.


```php
function getEventSeriesCollection(
        $eventId,
        $title = null,
        $titleStartsWith = null,
        $startYear = null,
        $modifiedSince = null,
        $comics = null,
        $stories = null,
        $creators = null,
        $characters = null,
        $seriesType = null,
        $contains = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| eventId |  ``` Required ```  | A single event. |
| title |  ``` Optional ```  | Filter by series title. |
| titleStartsWith |  ``` Optional ```  | Return series with titles that begin with the specified string (e.g. Sp). |
| startYear |  ``` Optional ```  | Return only series matching the specified start year. |
| modifiedSince |  ``` Optional ```  | Return only series which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only series which contain the specified comics (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only series which contain the specified stories (accepts a comma-separated list of ids). |
| creators |  ``` Optional ```  | Return only series which feature work by the specified creators (accepts a comma-separated list of ids). |
| characters |  ``` Optional ```  | Return only series which feature the specified characters (accepts a comma-separated list of ids). |
| seriesType |  ``` Optional ```  | Filter the series by publication frequency type. (Acceptable values are: "collection", "one shot", "limited", "ongoing") |
| contains |  ``` Optional ```  | Return only series containing one or more comics with the specified format. (Acceptable values are: "comic", "magazine", "trade paperback", "hardcover", "digest", "graphic novel", "digital comic", "infinite comic") |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "title", "modified", "startYear", "-title", "-modified", "-startYear") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$eventId = array('key' => 'value');
$title = array('key' => 'value');
$titleStartsWith = array('key' => 'value');
$startYear = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$stories = array('key' => 'value');
$creators = array('key' => 'value');
$characters = array('key' => 'value');
$seriesType = array('key' => 'value');
$contains = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $events->getEventSeriesCollection($eventId, $title, $titleStartsWith, $startYear, $modifiedSince, $comics, $stories, $creators, $characters, $seriesType, $contains, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_event_story_collection"></a>![Method: ](https://apidocs.io/img/method.png ".EventsController.getEventStoryCollection") getEventStoryCollection

> Fetches lists of stories filtered by an event id.


```php
function getEventStoryCollection(
        $eventId,
        $modifiedSince = null,
        $comics = null,
        $series = null,
        $creators = null,
        $characters = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| eventId |  ``` Required ```  | A single event. |
| modifiedSince |  ``` Optional ```  | Return only stories which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only stories contained in the specified (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only stories contained the specified series (accepts a comma-separated list of ids). |
| creators |  ``` Optional ```  | Return only stories which feature work by the specified creators (accepts a comma-separated list of ids). |
| characters |  ``` Optional ```  | Return only stories which feature the specified characters (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "id", "modified", "-id", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$eventId = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$series = array('key' => 'value');
$creators = array('key' => 'value');
$characters = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $events->getEventStoryCollection($eventId, $modifiedSince, $comics, $series, $creators, $characters, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_events_collection"></a>![Method: ](https://apidocs.io/img/method.png ".EventsController.getEventsCollection") getEventsCollection

> Fetches lists of events.


```php
function getEventsCollection(
        $name = null,
        $nameStartsWith = null,
        $modifiedSince = null,
        $creators = null,
        $characters = null,
        $series = null,
        $comics = null,
        $stories = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| name |  ``` Optional ```  | Return only events which match the specified name. |
| nameStartsWith |  ``` Optional ```  | Return events with names that begin with the specified string (e.g. Sp). |
| modifiedSince |  ``` Optional ```  | Return only events which have been modified since the specified date. |
| creators |  ``` Optional ```  | Return only events which feature work by the specified creators (accepts a comma-separated list of ids). |
| characters |  ``` Optional ```  | Return only events which feature the specified characters (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only events which are part of the specified series (accepts a comma-separated list of ids). |
| comics |  ``` Optional ```  | Return only events which take place in the specified comics (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only events which take place in the specified stories (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "name", "startDate", "modified", "-name", "-startDate", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$name = array('key' => 'value');
$nameStartsWith = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$creators = array('key' => 'value');
$characters = array('key' => 'value');
$series = array('key' => 'value');
$comics = array('key' => 'value');
$stories = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $events->getEventsCollection($name, $nameStartsWith, $modifiedSince, $creators, $characters, $series, $comics, $stories, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



[Back to List of Controllers](#list_of_controllers)

## <a name="creators_controller"></a>![Class: ](https://apidocs.io/img/class.png ".CreatorsController") CreatorsController

### Get singleton instance

The singleton instance of the ``` CreatorsController ``` class can be accessed from the API Client.

```php
$creators = $client->getCreators();
```

### <a name="get_creator_individual"></a>![Method: ](https://apidocs.io/img/method.png ".CreatorsController.getCreatorIndividual") getCreatorIndividual

> Fetches a single creator by id.


```php
function getCreatorIndividual($creatorId)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| creatorId |  ``` Required ```  | A single creator id. |



#### Example Usage

```php
$creatorId = array('key' => 'value');

$result = $creators->getCreatorIndividual($creatorId);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 404 | Creator not found. |



### <a name="get_comics_collection_by_creator_id"></a>![Method: ](https://apidocs.io/img/method.png ".CreatorsController.getComicsCollectionByCreatorId") getComicsCollectionByCreatorId

> Fetches lists of comics filtered by a creator id.


```php
function getComicsCollectionByCreatorId(
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
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| creatorId |  ``` Required ```  | A single creator id. |
| format |  ``` Optional ```  | Filter by the issue format (e.g. comic, digital comic, hardcover). (Acceptable values are: "comic", "magazine", "trade paperback", "hardcover", "digest", "graphic novel", "digital comic", "infinite comic") |
| formatType |  ``` Optional ```  | Filter by the issue format type (comic or collection). |
| noVariants |  ``` Optional ```  | Exclude variant comics from the result set. (Acceptable values are: "true") |
| dateDescriptor |  ``` Optional ```  | Return comics within a predefined date range. |
| dateRange |  ``` Optional ```  | Return comics within a predefined date range.  Dates must be specified as date1,date2 (e.g. 2013-01-01,2013-01-02).  Dates are preferably formatted as YYYY-MM-DD but may be sent as any common date format. |
| title |  ``` Optional ```  | Return only issues in series whose title matches the input. |
| titleStartsWith |  ``` Optional ```  | Return only issues in series whose title starts with the input. |
| startYear |  ``` Optional ```  | Return only issues in series whose start year matches the input. |
| issueNumber |  ``` Optional ```  | Return only issues in series whose issue number matches the input. |
| diamondCode |  ``` Optional ```  | Filter by diamond code. |
| digitalId |  ``` Optional ```  | Filter by digital comic id. |
| upc |  ``` Optional ```  | Filter by UPC. |
| isbn |  ``` Optional ```  | Filter by ISBN. |
| ean |  ``` Optional ```  | Filter by EAN. |
| issn |  ``` Optional ```  | Filter by ISSN. |
| hasDigitalIssue |  ``` Optional ```  | Include only results which are available digitally. (Acceptable values are: "true") |
| modifiedSince |  ``` Optional ```  | Return only comics which have been modified since the specified date. |
| characters |  ``` Optional ```  | Return only comics which feature the specified characters (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only comics which are part of the specified series (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only comics which take place in the specified events (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only comics which contain the specified stories (accepts a comma-separated list of ids). |
| sharedAppearances |  ``` Optional ```  | Return only comics in which the specified characters appear together (for example in which BOTH Spider-Man and Wolverine appear). |
| collaborators |  ``` Optional ```  | Return only comics in which the specified creators worked together (for example in which BOTH Stan Lee and Jack Kirby did work). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "focDate", "onsaleDate", "title", "issueNumber", "modified", "-focDate", "-onsaleDate", "-title", "-issueNumber", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$creatorId = array('key' => 'value');
$format = array('key' => 'value');
$formatType = string::COLLECTION;
$noVariants = array('key' => 'value');
$dateDescriptor = string::LASTWEEK;
$dateRange = array('key' => 'value');
$title = array('key' => 'value');
$titleStartsWith = array('key' => 'value');
$startYear = array('key' => 'value');
$issueNumber = array('key' => 'value');
$diamondCode = array('key' => 'value');
$digitalId = array('key' => 'value');
$upc = array('key' => 'value');
$isbn = array('key' => 'value');
$ean = array('key' => 'value');
$issn = array('key' => 'value');
$hasDigitalIssue = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$characters = array('key' => 'value');
$series = array('key' => 'value');
$events = array('key' => 'value');
$stories = array('key' => 'value');
$sharedAppearances = array('key' => 'value');
$collaborators = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $creators->getComicsCollectionByCreatorId($creatorId, $format, $formatType, $noVariants, $dateDescriptor, $dateRange, $title, $titleStartsWith, $startYear, $issueNumber, $diamondCode, $digitalId, $upc, $isbn, $ean, $issn, $hasDigitalIssue, $modifiedSince, $characters, $series, $events, $stories, $sharedAppearances, $collaborators, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_creator_events_collection"></a>![Method: ](https://apidocs.io/img/method.png ".CreatorsController.getCreatorEventsCollection") getCreatorEventsCollection

> Fetches lists of events filtered by a creator id.


```php
function getCreatorEventsCollection(
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
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| creatorId |  ``` Required ```  | A single creator id. |
| name |  ``` Optional ```  | Filter the event list by name. |
| nameStartsWith |  ``` Optional ```  | Return events with names that begin with the specified string (e.g. Sp). |
| modifiedSince |  ``` Optional ```  | Return only events which have been modified since the specified date. |
| characters |  ``` Optional ```  | Return only events which feature the specified characters (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only events which are part of the specified series (accepts a comma-separated list of ids). |
| comics |  ``` Optional ```  | Return only events which take place in the specified comics (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only events which contain the specified stories (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "name", "startDate", "modified", "-name", "-startDate", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$creatorId = array('key' => 'value');
$name = array('key' => 'value');
$nameStartsWith = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$characters = array('key' => 'value');
$series = array('key' => 'value');
$comics = array('key' => 'value');
$stories = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $creators->getCreatorEventsCollection($creatorId, $name, $nameStartsWith, $modifiedSince, $characters, $series, $comics, $stories, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_creator_series_collection"></a>![Method: ](https://apidocs.io/img/method.png ".CreatorsController.getCreatorSeriesCollection") getCreatorSeriesCollection

> Fetches lists of series filtered by a creator id.


```php
function getCreatorSeriesCollection(
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
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| creatorId |  ``` Required ```  | A single creator id. |
| title |  ``` Optional ```  | Filter by series title. |
| titleStartsWith |  ``` Optional ```  | Return series with titles that begin with the specified string (e.g. Sp). |
| startYear |  ``` Optional ```  | Return only series matching the specified start year. |
| modifiedSince |  ``` Optional ```  | Return only series which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only series which contain the specified comics (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only series which contain the specified stories (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only series which have comics that take place during the specified events (accepts a comma-separated list of ids). |
| characters |  ``` Optional ```  | Return only series which feature the specified characters (accepts a comma-separated list of ids). |
| seriesType |  ``` Optional ```  | Filter the series by publication frequency type. (Acceptable values are: "collection", "one shot", "limited", "ongoing") |
| contains |  ``` Optional ```  | Return only series containing one or more comics with the specified format. (Acceptable values are: "comic", "magazine", "trade paperback", "hardcover", "digest", "graphic novel", "digital comic", "infinite comic") |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "title", "modified", "startYear", "-title", "-modified", "-startYear") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$creatorId = array('key' => 'value');
$title = array('key' => 'value');
$titleStartsWith = array('key' => 'value');
$startYear = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$stories = array('key' => 'value');
$events = array('key' => 'value');
$characters = array('key' => 'value');
$seriesType = array('key' => 'value');
$contains = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $creators->getCreatorSeriesCollection($creatorId, $title, $titleStartsWith, $startYear, $modifiedSince, $comics, $stories, $events, $characters, $seriesType, $contains, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_creator_story_collection"></a>![Method: ](https://apidocs.io/img/method.png ".CreatorsController.getCreatorStoryCollection") getCreatorStoryCollection

> Fetches lists of stories filtered by a creator id.


```php
function getCreatorStoryCollection(
        $creatorId,
        $modifiedSince = null,
        $comics = null,
        $series = null,
        $events = null,
        $characters = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| creatorId |  ``` Required ```  | A single creator id. |
| modifiedSince |  ``` Optional ```  | Return only stories which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only stories contained in the specified comics (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only stories contained the specified series (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only stories which take place during the specified events (accepts a comma-separated list of ids). |
| characters |  ``` Optional ```  | Return only stories which feature the specified characters (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "id", "modified", "-id", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$creatorId = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$series = array('key' => 'value');
$events = array('key' => 'value');
$characters = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $creators->getCreatorStoryCollection($creatorId, $modifiedSince, $comics, $series, $events, $characters, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_creator_collection"></a>![Method: ](https://apidocs.io/img/method.png ".CreatorsController.getCreatorCollection") getCreatorCollection

> Fetches lists of creators.


```php
function getCreatorCollection(
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
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| firstName |  ``` Optional ```  | Filter by creator first name (e.g. Brian). |
| middleName |  ``` Optional ```  | Filter by creator middle name (e.g. Michael). |
| lastName |  ``` Optional ```  | Filter by creator last name (e.g. Bendis). |
| suffix |  ``` Optional ```  | Filter by suffix or honorific (e.g. Jr., Sr.). |
| nameStartsWith |  ``` Optional ```  | Filter by creator names that match critera (e.g. B, St L). |
| firstNameStartsWith |  ``` Optional ```  | Filter by creator first names that match critera (e.g. B, St L). |
| middleNameStartsWith |  ``` Optional ```  | Filter by creator middle names that match critera (e.g. Mi). |
| lastNameStartsWith |  ``` Optional ```  | Filter by creator last names that match critera (e.g. Ben). |
| modifiedSince |  ``` Optional ```  | Return only creators which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only creators who worked on in the specified comics (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only creators who worked on the specified series (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only creators who worked on comics that took place in the specified events (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only creators who worked on the specified stories (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "lastName", "firstName", "middleName", "suffix", "modified", "-lastName", "-firstName", "-middleName", "-suffix", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$firstName = array('key' => 'value');
$middleName = array('key' => 'value');
$lastName = array('key' => 'value');
$suffix = array('key' => 'value');
$nameStartsWith = array('key' => 'value');
$firstNameStartsWith = array('key' => 'value');
$middleNameStartsWith = array('key' => 'value');
$lastNameStartsWith = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$series = array('key' => 'value');
$events = array('key' => 'value');
$stories = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $creators->getCreatorCollection($firstName, $middleName, $lastName, $suffix, $nameStartsWith, $firstNameStartsWith, $middleNameStartsWith, $lastNameStartsWith, $modifiedSince, $comics, $series, $events, $stories, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



[Back to List of Controllers](#list_of_controllers)

## <a name="comics_controller"></a>![Class: ](https://apidocs.io/img/class.png ".ComicsController") ComicsController

### Get singleton instance

The singleton instance of the ``` ComicsController ``` class can be accessed from the API Client.

```php
$comics = $client->getComics();
```

### <a name="get_comic_individual"></a>![Method: ](https://apidocs.io/img/method.png ".ComicsController.getComicIndividual") getComicIndividual

> Fetches a single comic by id.


```php
function getComicIndividual($comicId)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| comicId |  ``` Required ```  | A single comic. |



#### Example Usage

```php
$comicId = array('key' => 'value');

$result = $comics->getComicIndividual($comicId);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 404 | Comic not found. |



### <a name="get_comic_character_collection"></a>![Method: ](https://apidocs.io/img/method.png ".ComicsController.getComicCharacterCollection") getComicCharacterCollection

> Fetches lists of characters filtered by a comic id.


```php
function getComicCharacterCollection(
        $comicId,
        $name = null,
        $nameStartsWith = null,
        $modifiedSince = null,
        $series = null,
        $events = null,
        $stories = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| comicId |  ``` Required ```  | A single comic. |
| name |  ``` Optional ```  | Return only characters matching the specified full character name (e.g. Spider-Man). |
| nameStartsWith |  ``` Optional ```  | Return characters with names that begin with the specified string (e.g. Sp). |
| modifiedSince |  ``` Optional ```  | Return only characters which have been modified since the specified date. |
| series |  ``` Optional ```  | Return only characters which appear the specified series (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only characters which appear comics that took place in the specified events (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only characters which appear the specified stories (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "name", "modified", "-name", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$comicId = array('key' => 'value');
$name = array('key' => 'value');
$nameStartsWith = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$series = array('key' => 'value');
$events = array('key' => 'value');
$stories = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $comics->getComicCharacterCollection($comicId, $name, $nameStartsWith, $modifiedSince, $series, $events, $stories, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_creator_collection_by_comic_id"></a>![Method: ](https://apidocs.io/img/method.png ".ComicsController.getCreatorCollectionByComicId") getCreatorCollectionByComicId

> Fetches lists of creators filtered by a comic id.


```php
function getCreatorCollectionByComicId(
        $comicId,
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
        $stories = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| comicId |  ``` Required ```  | A single comic. |
| firstName |  ``` Optional ```  | Filter by creator first name (e.g. brian). |
| middleName |  ``` Optional ```  | Filter by creator middle name (e.g. Michael). |
| lastName |  ``` Optional ```  | Filter by creator last name (e.g. Bendis). |
| suffix |  ``` Optional ```  | Filter by suffix or honorific (e.g. Jr., Sr.). |
| nameStartsWith |  ``` Optional ```  | Filter by creator names that match critera (e.g. B, St L). |
| firstNameStartsWith |  ``` Optional ```  | Filter by creator first names that match critera (e.g. B, St L). |
| middleNameStartsWith |  ``` Optional ```  | Filter by creator middle names that match critera (e.g. Mi). |
| lastNameStartsWith |  ``` Optional ```  | Filter by creator last names that match critera (e.g. Ben). |
| modifiedSince |  ``` Optional ```  | Return only creators which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only creators who worked on in the specified comics (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only creators who worked on the specified series (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only creators who worked on the specified stories (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "lastName", "firstName", "middleName", "suffix", "modified", "-lastName", "-firstName", "-middleName", "-suffix", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$comicId = array('key' => 'value');
$firstName = array('key' => 'value');
$middleName = array('key' => 'value');
$lastName = array('key' => 'value');
$suffix = array('key' => 'value');
$nameStartsWith = array('key' => 'value');
$firstNameStartsWith = array('key' => 'value');
$middleNameStartsWith = array('key' => 'value');
$lastNameStartsWith = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$series = array('key' => 'value');
$stories = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $comics->getCreatorCollectionByComicId($comicId, $firstName, $middleName, $lastName, $suffix, $nameStartsWith, $firstNameStartsWith, $middleNameStartsWith, $lastNameStartsWith, $modifiedSince, $comics, $series, $stories, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_issue_events_collection"></a>![Method: ](https://apidocs.io/img/method.png ".ComicsController.getIssueEventsCollection") getIssueEventsCollection

> Fetches lists of events filtered by a comic id.


```php
function getIssueEventsCollection(
        $comicId,
        $name = null,
        $nameStartsWith = null,
        $modifiedSince = null,
        $creators = null,
        $characters = null,
        $series = null,
        $stories = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| comicId |  ``` Required ```  | A single comic. |
| name |  ``` Optional ```  | Filter the event list by name. |
| nameStartsWith |  ``` Optional ```  | Return events with names that begin with the specified string (e.g. Sp). |
| modifiedSince |  ``` Optional ```  | Return only events which have been modified since the specified date. |
| creators |  ``` Optional ```  | Return only events which feature work by the specified creators (accepts a comma-separated list of ids). |
| characters |  ``` Optional ```  | Return only events which feature the specified characters (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only events which are part of the specified series (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only events which contain the specified stories (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "name", "startDate", "modified", "-name", "-startDate", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$comicId = array('key' => 'value');
$name = array('key' => 'value');
$nameStartsWith = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$creators = array('key' => 'value');
$characters = array('key' => 'value');
$series = array('key' => 'value');
$stories = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $comics->getIssueEventsCollection($comicId, $name, $nameStartsWith, $modifiedSince, $creators, $characters, $series, $stories, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_comic_story_collection_by_comic_id"></a>![Method: ](https://apidocs.io/img/method.png ".ComicsController.getComicStoryCollectionByComicId") getComicStoryCollectionByComicId

> Fetches lists of stories filtered by a comic id.


```php
function getComicStoryCollectionByComicId(
        $comicId,
        $modifiedSince = null,
        $series = null,
        $events = null,
        $creators = null,
        $characters = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| comicId |  ``` Required ```  | A single comic. |
| modifiedSince |  ``` Optional ```  | Return only stories which have been modified since the specified date. |
| series |  ``` Optional ```  | Return only stories contained the specified series (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only stories which take place during the specified events (accepts a comma-separated list of ids). |
| creators |  ``` Optional ```  | Return only stories which feature work by the specified creators (accepts a comma-separated list of ids). |
| characters |  ``` Optional ```  | Return only stories which feature the specified characters (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "id", "modified", "-id", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources. |



#### Example Usage

```php
$comicId = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$series = array('key' => 'value');
$events = array('key' => 'value');
$creators = array('key' => 'value');
$characters = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $comics->getComicStoryCollectionByComicId($comicId, $modifiedSince, $series, $events, $creators, $characters, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_comics_collection"></a>![Method: ](https://apidocs.io/img/method.png ".ComicsController.getComicsCollection") getComicsCollection

> Fetches lists of comics.


```php
function getComicsCollection(
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
        $creators = null,
        $characters = null,
        $series = null,
        $events = null,
        $stories = null,
        $sharedAppearances = null,
        $collaborators = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| format |  ``` Optional ```  | Filter by the issue format (e.g. comic, digital comic, hardcover). (Acceptable values are: "comic", "magazine", "trade paperback", "hardcover", "digest", "graphic novel", "digital comic", "infinite comic") |
| formatType |  ``` Optional ```  | Filter by the issue format type (comic or collection). |
| noVariants |  ``` Optional ```  | Exclude variants (alternate covers, secondary printings, director's cuts, etc.) from the result set. (Acceptable values are: "true") |
| dateDescriptor |  ``` Optional ```  | Return comics within a predefined date range. |
| dateRange |  ``` Optional ```  | Return comics within a predefined date range.  Dates must be specified as date1,date2 (e.g. 2013-01-01,2013-01-02).  Dates are preferably formatted as YYYY-MM-DD but may be sent as any common date format. |
| title |  ``` Optional ```  | Return only issues in series whose title matches the input. |
| titleStartsWith |  ``` Optional ```  | Return only issues in series whose title starts with the input. |
| startYear |  ``` Optional ```  | Return only issues in series whose start year matches the input. |
| issueNumber |  ``` Optional ```  | Return only issues in series whose issue number matches the input. |
| diamondCode |  ``` Optional ```  | Filter by diamond code. |
| digitalId |  ``` Optional ```  | Filter by digital comic id. |
| upc |  ``` Optional ```  | Filter by UPC. |
| isbn |  ``` Optional ```  | Filter by ISBN. |
| ean |  ``` Optional ```  | Filter by EAN. |
| issn |  ``` Optional ```  | Filter by ISSN. |
| hasDigitalIssue |  ``` Optional ```  | Include only results which are available digitally. (Acceptable values are: "true") |
| modifiedSince |  ``` Optional ```  | Return only comics which have been modified since the specified date. |
| creators |  ``` Optional ```  | Return only comics which feature work by the specified creators (accepts a comma-separated list of ids). |
| characters |  ``` Optional ```  | Return only comics which feature the specified characters (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only comics which are part of the specified series (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only comics which take place in the specified events (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only comics which contain the specified stories (accepts a comma-separated list of ids). |
| sharedAppearances |  ``` Optional ```  | Return only comics in which the specified characters appear together (for example in which BOTH Spider-Man and Wolverine appear). Accepts a comma-separated list of ids. |
| collaborators |  ``` Optional ```  | Return only comics in which the specified creators worked together (for example in which BOTH Stan Lee and Jack Kirby did work). Accepts a comma-separated list of ids. |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "focDate", "onsaleDate", "title", "issueNumber", "modified", "-focDate", "-onsaleDate", "-title", "-issueNumber", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$format = array('key' => 'value');
$formatType = string::COLLECTION;
$noVariants = array('key' => 'value');
$dateDescriptor = string::LASTWEEK;
$dateRange = array('key' => 'value');
$title = array('key' => 'value');
$titleStartsWith = array('key' => 'value');
$startYear = array('key' => 'value');
$issueNumber = array('key' => 'value');
$diamondCode = array('key' => 'value');
$digitalId = array('key' => 'value');
$upc = array('key' => 'value');
$isbn = array('key' => 'value');
$ean = array('key' => 'value');
$issn = array('key' => 'value');
$hasDigitalIssue = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$creators = array('key' => 'value');
$characters = array('key' => 'value');
$series = array('key' => 'value');
$events = array('key' => 'value');
$stories = array('key' => 'value');
$sharedAppearances = array('key' => 'value');
$collaborators = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $comics->getComicsCollection($format, $formatType, $noVariants, $dateDescriptor, $dateRange, $title, $titleStartsWith, $startYear, $issueNumber, $diamondCode, $digitalId, $upc, $isbn, $ean, $issn, $hasDigitalIssue, $modifiedSince, $creators, $characters, $series, $events, $stories, $sharedAppearances, $collaborators, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



[Back to List of Controllers](#list_of_controllers)

## <a name="characters_controller"></a>![Class: ](https://apidocs.io/img/class.png ".CharactersController") CharactersController

### Get singleton instance

The singleton instance of the ``` CharactersController ``` class can be accessed from the API Client.

```php
$characters = $client->getCharacters();
```

### <a name="get_character_individual"></a>![Method: ](https://apidocs.io/img/method.png ".CharactersController.getCharacterIndividual") getCharacterIndividual

> Fetches a single character by id.


```php
function getCharacterIndividual($characterId)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| characterId |  ``` Required ```  | A single character id. |



#### Example Usage

```php
$characterId = array('key' => 'value');

$result = $characters->getCharacterIndividual($characterId);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 404 | Character not found. |



### <a name="get_comics_character_collection"></a>![Method: ](https://apidocs.io/img/method.png ".CharactersController.getComicsCharacterCollection") getComicsCharacterCollection

> Fetches lists of comics filtered by a character id.


```php
function getComicsCharacterCollection(
        $characterId,
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
        $creators = null,
        $series = null,
        $events = null,
        $stories = null,
        $sharedAppearances = null,
        $collaborators = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| characterId |  ``` Required ```  | A single character id. |
| format |  ``` Optional ```  | Filter by the issue format (e.g. comic, digital comic, hardcover). (Acceptable values are: "comic", "magazine", "trade paperback", "hardcover", "digest", "graphic novel", "digital comic", "infinite comic") |
| formatType |  ``` Optional ```  | Filter by the issue format type (comic or collection). |
| noVariants |  ``` Optional ```  | Exclude variant comics from the result set. (Acceptable values are: "true") |
| dateDescriptor |  ``` Optional ```  | Return comics within a predefined date range. |
| dateRange |  ``` Optional ```  | Return comics within a predefined date range.  Dates must be specified as date1,date2 (e.g. 2013-01-01,2013-01-02).  Dates are preferably formatted as YYYY-MM-DD but may be sent as any common date format. |
| title |  ``` Optional ```  | Return only issues in series whose title matches the input. |
| titleStartsWith |  ``` Optional ```  | Return only issues in series whose title starts with the input. |
| startYear |  ``` Optional ```  | Return only issues in series whose start year matches the input. |
| issueNumber |  ``` Optional ```  | Return only issues in series whose issue number matches the input. |
| diamondCode |  ``` Optional ```  | Filter by diamond code. |
| digitalId |  ``` Optional ```  | Filter by digital comic id. |
| upc |  ``` Optional ```  | Filter by UPC. |
| isbn |  ``` Optional ```  | Filter by ISBN. |
| ean |  ``` Optional ```  | Filter by EAN. |
| issn |  ``` Optional ```  | Filter by ISSN. |
| hasDigitalIssue |  ``` Optional ```  | Include only results which are available digitally. (Acceptable values are: "true") |
| modifiedSince |  ``` Optional ```  | Return only comics which have been modified since the specified date. |
| creators |  ``` Optional ```  | Return only comics which feature work by the specified creators (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only comics which are part of the specified series (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only comics which take place in the specified events (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only comics which contain the specified stories (accepts a comma-separated list of ids). |
| sharedAppearances |  ``` Optional ```  | Return only comics in which the specified characters appear together (for example in which BOTH Spider-Man and Wolverine appear). |
| collaborators |  ``` Optional ```  | Return only comics in which the specified creators worked together (for example in which BOTH Stan Lee and Jack Kirby did work). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "focDate", "onsaleDate", "title", "issueNumber", "modified", "-focDate", "-onsaleDate", "-title", "-issueNumber", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$characterId = array('key' => 'value');
$format = array('key' => 'value');
$formatType = string::COLLECTION;
$noVariants = array('key' => 'value');
$dateDescriptor = string::LASTWEEK;
$dateRange = array('key' => 'value');
$title = array('key' => 'value');
$titleStartsWith = array('key' => 'value');
$startYear = array('key' => 'value');
$issueNumber = array('key' => 'value');
$diamondCode = array('key' => 'value');
$digitalId = array('key' => 'value');
$upc = array('key' => 'value');
$isbn = array('key' => 'value');
$ean = array('key' => 'value');
$issn = array('key' => 'value');
$hasDigitalIssue = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$creators = array('key' => 'value');
$series = array('key' => 'value');
$events = array('key' => 'value');
$stories = array('key' => 'value');
$sharedAppearances = array('key' => 'value');
$collaborators = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $characters->getComicsCharacterCollection($characterId, $format, $formatType, $noVariants, $dateDescriptor, $dateRange, $title, $titleStartsWith, $startYear, $issueNumber, $diamondCode, $digitalId, $upc, $isbn, $ean, $issn, $hasDigitalIssue, $modifiedSince, $creators, $series, $events, $stories, $sharedAppearances, $collaborators, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_character_events_collection"></a>![Method: ](https://apidocs.io/img/method.png ".CharactersController.getCharacterEventsCollection") getCharacterEventsCollection

> Fetches lists of events filtered by a character id.


```php
function getCharacterEventsCollection(
        $characterId,
        $name = null,
        $nameStartsWith = null,
        $modifiedSince = null,
        $creators = null,
        $series = null,
        $comics = null,
        $stories = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| characterId |  ``` Required ```  | A single character id. |
| name |  ``` Optional ```  | Filter the event list by name. |
| nameStartsWith |  ``` Optional ```  | Return events with names that begin with the specified string (e.g. Sp). |
| modifiedSince |  ``` Optional ```  | Return only events which have been modified since the specified date. |
| creators |  ``` Optional ```  | Return only events which feature work by the specified creators (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only events which are part of the specified series (accepts a comma-separated list of ids). |
| comics |  ``` Optional ```  | Return only events which take place in the specified comics (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only events which contain the specified stories (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "name", "startDate", "modified", "-name", "-startDate", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$characterId = array('key' => 'value');
$name = array('key' => 'value');
$nameStartsWith = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$creators = array('key' => 'value');
$series = array('key' => 'value');
$comics = array('key' => 'value');
$stories = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $characters->getCharacterEventsCollection($characterId, $name, $nameStartsWith, $modifiedSince, $creators, $series, $comics, $stories, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_character_series_collection"></a>![Method: ](https://apidocs.io/img/method.png ".CharactersController.getCharacterSeriesCollection") getCharacterSeriesCollection

> Fetches lists of series filtered by a character id.


```php
function getCharacterSeriesCollection(
        $characterId,
        $title = null,
        $titleStartsWith = null,
        $startYear = null,
        $modifiedSince = null,
        $comics = null,
        $stories = null,
        $events = null,
        $creators = null,
        $seriesType = null,
        $contains = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| characterId |  ``` Required ```  | A single character id. |
| title |  ``` Optional ```  | Filter by series title. |
| titleStartsWith |  ``` Optional ```  | Return series with titles that begin with the specified string (e.g. Sp). |
| startYear |  ``` Optional ```  | Return only series matching the specified start year. |
| modifiedSince |  ``` Optional ```  | Return only series which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only series which contain the specified comics (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only series which contain the specified stories (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only series which have comics that take place during the specified events (accepts a comma-separated list of ids). |
| creators |  ``` Optional ```  | Return only series which feature work by the specified creators (accepts a comma-separated list of ids). |
| seriesType |  ``` Optional ```  | Filter the series by publication frequency type. (Acceptable values are: "collection", "one shot", "limited", "ongoing") |
| contains |  ``` Optional ```  | Return only series containing one or more comics with the specified format. (Acceptable values are: "comic", "magazine", "trade paperback", "hardcover", "digest", "graphic novel", "digital comic", "infinite comic") |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "title", "modified", "startYear", "-title", "-modified", "-startYear") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$characterId = array('key' => 'value');
$title = array('key' => 'value');
$titleStartsWith = array('key' => 'value');
$startYear = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$stories = array('key' => 'value');
$events = array('key' => 'value');
$creators = array('key' => 'value');
$seriesType = array('key' => 'value');
$contains = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $characters->getCharacterSeriesCollection($characterId, $title, $titleStartsWith, $startYear, $modifiedSince, $comics, $stories, $events, $creators, $seriesType, $contains, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_character_story_collection"></a>![Method: ](https://apidocs.io/img/method.png ".CharactersController.getCharacterStoryCollection") getCharacterStoryCollection

> Fetches lists of stories filtered by a character id.


```php
function getCharacterStoryCollection(
        $characterId,
        $modifiedSince = null,
        $comics = null,
        $series = null,
        $events = null,
        $creators = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| characterId |  ``` Required ```  | A single character id. |
| modifiedSince |  ``` Optional ```  | Return only stories which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only stories contained in the specified (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only stories contained the specified series (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only stories which take place during the specified events (accepts a comma-separated list of ids). |
| creators |  ``` Optional ```  | Return only stories which feature work by the specified creators (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "id", "modified", "-id", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$characterId = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$series = array('key' => 'value');
$events = array('key' => 'value');
$creators = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $characters->getCharacterStoryCollection($characterId, $modifiedSince, $comics, $series, $events, $creators, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



### <a name="get_character_collection"></a>![Method: ](https://apidocs.io/img/method.png ".CharactersController.getCharacterCollection") getCharacterCollection

> Fetches lists of characters.


```php
function getCharacterCollection(
        $name = null,
        $nameStartsWith = null,
        $modifiedSince = null,
        $comics = null,
        $series = null,
        $events = null,
        $stories = null,
        $orderBy = null,
        $limit = null,
        $offset = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| name |  ``` Optional ```  | Return only characters matching the specified full character name (e.g. Spider-Man). |
| nameStartsWith |  ``` Optional ```  | Return characters with names that begin with the specified string (e.g. Sp). |
| modifiedSince |  ``` Optional ```  | Return only characters which have been modified since the specified date. |
| comics |  ``` Optional ```  | Return only characters which appear in the specified comics (accepts a comma-separated list of ids). |
| series |  ``` Optional ```  | Return only characters which appear the specified series (accepts a comma-separated list of ids). |
| events |  ``` Optional ```  | Return only characters which appear in the specified events (accepts a comma-separated list of ids). |
| stories |  ``` Optional ```  | Return only characters which appear the specified stories (accepts a comma-separated list of ids). |
| orderBy |  ``` Optional ```  | Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed. (Acceptable values are: "name", "modified", "-name", "-modified") |
| limit |  ``` Optional ```  | Limit the result set to the specified number of resources. |
| offset |  ``` Optional ```  | Skip the specified number of resources in the result set. |



#### Example Usage

```php
$name = array('key' => 'value');
$nameStartsWith = array('key' => 'value');
$modifiedSince = array('key' => 'value');
$comics = array('key' => 'value');
$series = array('key' => 'value');
$events = array('key' => 'value');
$stories = array('key' => 'value');
$orderBy = array('key' => 'value');
$limit = array('key' => 'value');
$offset = array('key' => 'value');

$result = $characters->getCharacterCollection($name, $nameStartsWith, $modifiedSince, $comics, $series, $events, $stories, $orderBy, $limit, $offset);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 409 | Limit greater than 100. |



[Back to List of Controllers](#list_of_controllers)



