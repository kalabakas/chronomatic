<?php
class EEuropeanaSearch extends CFormModel
{
    public $term;

    public $type;

    public $from = 0;
    public $to   = date('Y', time());

    public function rules()
    {
        return array(
            array('term', 'required')
        );
    }
}
