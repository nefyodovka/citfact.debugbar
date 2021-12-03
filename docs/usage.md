Пример использования
=========

Для добавления отладочной информации
-----------------------------

Через функцию:

``` php
debugbar_log($arResult, 'debug');
```

Через статичный метод:

``` php
\QBS\DebugBar\Debug::getInstance()->log($arResult, 'info');
```

Как получить DebugBar объект?
-----------------------------

``` php
$debugbar = \QBS\DebugBar\Debug::getInstance()->getDebugBar();
```

