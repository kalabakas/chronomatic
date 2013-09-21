<?php
class EEuropeanaItem extends CModel
{
    public $id;

    public $title;

    public function rules()
    {
        return array(
            array('id', 'safe', 'on'=>'search'),
        );
    }
    public function attributeNames()
    {
        return array(
            'id',
            'title',
        );
    }
    public function mapAttributes()
    {
        return array(
        );
    }
}
