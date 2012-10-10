<?php

namespace Steel\Interfaces;

use Steel\Request\Header\Accepts\InterfaceAccepts;

/**
 * Request Interface
 */
/**

 */interface Request
{
    /**
     * @return float
     */
    public function getRequestTime();

    /**
     * @return string
     */
    public function getAction();

    /**
     * @return string
     */
    public function getEntity();

    /**
     * @param $type
     * @return boolean
     */
    public function accepts(InterfaceAccepts $type);

    /**
     * @param $contains
     * @return string
     */
    public function userAgentContains( $contains );

    /**
     * @return string
     */
    public function getAccept();

    /**
     * @return string
     */
    public function getAcceptEncoding();

    /**
     * @return string
     */
    public function getAcceptLanguage();

    /**
     * @return string
     */
    public function getAcceptCharset();

    /**
     * @return string
     */
    public function getUserAgent();

    /**
     * @return string
     */
    public function getHost();

    /**
     * @return boolean
     */
    public function isXmlHttpRequest();
}
