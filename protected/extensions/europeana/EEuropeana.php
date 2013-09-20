<?php
use Guzzle\Http\Client;

class EEuropeana extends CApplicationComponent
{
    /**
     * @var string api key
     **/
    public $key;
    /**
     * @var string private key
     **/
    public $secret;

    /**
     * @var Guzzle\Http\Client
     **/
    private $_client;

    /**
     * @see EEuropeana::getClient()
     * @var string base url
     **/
    protected static $url = 'http://www.europeana.eu/api';

    /**
     * @see EEuropeana::getClient()
     * @var string version used in url
     **/
    protected static $version = 'v2';

    /**
     * Initializes the application component.
     * @override
     **/
    public function init()
    {
        if($this->key===null || $this->secret===null) {
            throw new CException(__CLASS__.'both $key & $secret must be set');
        }
    }

    /**
     * @return Guzzle\Http\Client
     **/
    protected function getClient()
    {
        if($this->_client===null) {
            $this->_client = new Client(self::$url.'/{version}', array(
                'version'        => self::$version,
                'request.options' => array(
                    'query'   => array(
                        'wskey' => $this->key,
                    ),
                )
            ));
        }
        return $this->_client;
    }

    /**
     * TODO: $term must something more complex than string
     */
    public function search($term='paris')
    {
        $query = 'search.json?'.http_build_query(array('query'=>$term));
        return $this->client->get($query)->send()->json();
    }
}
