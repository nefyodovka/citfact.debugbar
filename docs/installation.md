Установка через composer
=========

Создайте или обновите ``composer.json`` файл и запустите `composer update``
``` json
  {
      "require": {
          "qbs/debugbar": "dev-master"
      }
  }
```
Подключите composer автолоадер 
``` php
// init.php

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
```

Далее в административной панели в разделе "Marketplace > Установленные решения" устанавливаем модуль.

