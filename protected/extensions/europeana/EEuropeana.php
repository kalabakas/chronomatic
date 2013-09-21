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
    public function search($term)
    {
        $response = (object)$this->_internalSearch($term);
        $data = array();
        if($response->itemsCount > 0) {
            foreach($response->items as $item)
            {
                $data[] = $this->prepareItem($item);
            }
        }
        return new CArrayDataProvider($data);
    }
    
    protected function prepareItem($item)
    {
        $item = (object)$item;
        //Prepare item 
        $eItem   = new EEuropeanaItem();
        $mapAttr = $eItem->mapAttributes();
        foreach($eItem->attributeNames() as $attr)
        {
            $key = (array_key_exists($attr,$mapAttr)) ? $mapAttr[$attr] : $attr;
            if(is_array($item->{$attr})) {
                $eItem->{$attr} = array_pop($item->{$attr});
            } else {
                $eItem->{$attr} = $item->{$key};
            }
        }
        return $eItem;
    }
    /**
     * @return array raw data from europeana
     **/
    private function _internalSearch($term)
    {
        if(!($term instanceof EEuropeanaSearch)) {
            $term = http_build_query(array('query'=>$term));
        }
        return $this->client->get("search.json?{$term}")->send()->json();
    }
}
