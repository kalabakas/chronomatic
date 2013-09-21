<?php
foreach($provider->getData() as $data)
{
    CVarDumper::dump($data->attributes,10,1);
}
