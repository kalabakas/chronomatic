chronomatic
===========

Create thematic timelines with open data!

##Installation
* ``` git  https://github.com/kalabakas/chronomatic.git```
* ``` git submodule init ```
* ``` git submodule update ```
* ``` Create db schema. CREATE SCHEMA `chronomatic` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ; ```
* cp protected/config/main-example.php protected/config/main.php
* edit main.php (db credentials/europeana api)

* ~$ php composer.phar install
  

##Developer documentation

* [Yii Bootstrap](http://www.cniska.net/yii-bootstrap/index.html)
* [Guzzlephp\Client](http://guzzlephp.org/http-client/client.html)
