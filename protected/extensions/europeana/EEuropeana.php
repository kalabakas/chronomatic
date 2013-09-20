<?php
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
     * Initializes the application component.
     * @override
     **/
    public function init()
    {
        if($this->key===null || $this->secret===null) {
            throw new CException(__CLASS__.'both $key & $secret must be set');
        }
    }
}
