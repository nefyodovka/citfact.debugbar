<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace QBS\DebugBar;

use Bitrix\Main\Config;
use DebugBar\DebugBar as BaseDebugBar;
use DebugBar\DataCollector\PhpInfoCollector;
use DebugBar\DataCollector\MessagesCollector;
use DebugBar\DataCollector\TimeDataCollector;
use DebugBar\DataCollector\RequestDataCollector;
use DebugBar\DataCollector\MemoryCollector;
use DebugBar\DataCollector\ExceptionsCollector;
use QBS\DebugBar\DataCollector\UrlRewriterDataCollector;

class Debug
{
    /**
     * @var \DebugBar\DebugBar
     */
    protected $debugBar;

    /**
     * @var Debug
     */
    protected static $instance = null;

    /**
     * Construct object
     */
    public function __construct()
    {
        $this->debugBar = new BaseDebugBar();
        $this->debugBar->addCollector(new PhpInfoCollector());
        $this->debugBar->addCollector(new MessagesCollector());
        $this->debugBar->addCollector(new RequestDataCollector());
        $this->debugBar->addCollector(new UrlRewriterDataCollector());
        $this->debugBar->addCollector(new TimeDataCollector());
        $this->debugBar->addCollector(new MemoryCollector());
        $this->debugBar->addCollector(new ExceptionsCollector());
    }

    /**
     * Returns current instance of the Debug.
     *
     * @return Debug
     */
    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return (Config\Option::get('qbs.debugbar', 'ACTIVE') == 'Y');
    }

    /**
     * @return bool
     */
    public function isGranted()
    {
        $checkPermission = (Config\Option::get('qbs.debugbar', 'GRANTED') == 'Y');

        return ($checkPermission) ? $GLOBALS['USER']->IsAdmin() : true;
    }

    /**
     * @return BaseDebugBar
     */
    public function getDebugBar()
    {
        return $this->debugBar;
    }

    /**
     * @param string $message
     * @param string $type
     */
    public function log($message, $type = 'debug')
    {
        $this->debugBar['messages']->addMessage($message, $type);
    }
}