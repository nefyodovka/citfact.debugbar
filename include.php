<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Bitrix\Main\Loader;

require_once __DIR__.'/lib/DebugFunctions.php';

Loader::registerAutoLoadClasses('qbs.debugbar', [
    'QBS\DebugBar\DataCollector\UrlRewriterDataCollector' => 'lib/QBS/DebugBar/DataCollector/UrlRewriterDataCollector.php',
    'QBS\DebugBar\Debug' => 'lib/QBS/DebugBar/Debug.php',
    'QBS\DebugBar\DebugEvent' => 'lib/QBS/DebugBar/DebugEvent.php',
]);