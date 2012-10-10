<?php

namespace Steel;

use Steel\Interfaces\Request as IRequest;
use Steel\Request\Header\Accepts\InterfaceAccepts;

class Request implements IRequest
{
    use Injectors\Config;

    /**
     * @var string[]
     */
    protected $requestHeaders;

    /**
     * @param string[] $request
     */
    public function __construct($request = null)
    {
        $this->requestHeaders = isset( $request ) ? $request : $_SERVER;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->requestHeaders['REQUEST_METHOD'];
    }

    /**
     * @return string
     */
    public function getEntity()
    {
        return isset( $this->requestHeaders['REDIRECT_URL'] )
            ? $this->requestHeaders['REDIRECT_URL'] : '/';
    }

    /**
     * @param $type
     * @return bool
     */
    public function accepts( InterfaceAccepts $type )
    {
        return $type->accepts( $this->requestHeaders['HTTP_ACCEPT']);
    }

    /**
     * @param $contains
     * @return bool
     */
    public function userAgentContains($contains)
    {
        if (!isset( $this->requestHeaders['HTTP_USER_AGENT'] )) {
            return false;
        }

        return false !== stripos($this->requestHeaders['HTTP_USER_AGENT'], $contains);
    }

    /**
     * @return string
     */
    public function getAccept()
    {
        return $this->requestHeaders['HTTP_ACCEPT'];
    }

    public function getAcceptList()
    {
        static $acceptList;

        if (!isset( $acceptList )) {
            list( $accept, ) = explode(';', $this->getAccept());
            $acceptList = explode(',', $accept);
        }

        return $acceptList;
    }

    /**
     * @return string
     */
    public function getAcceptEncoding()
    {
        return $this->requestHeaders['HTTP_ACCEPT_ENCODING'];
    }

    /**
     * @return string
     */
    public function getAcceptLanguage()
    {
        return $this->requestHeaders['HTTP_ACCEPT_LANGUAGE'];
    }

    /**
     * Get the Charset
     *
     * @return string
     */
    public function getAcceptCharset()
    {
        return $this->requestHeaders['HTTP_ACCEPT_CHARSET'];
    }

    /**
     * Get an array of character sets
     *
     * @return array
     */
    public function getAcceptCharsetList()
    {
        static $charSetList;

        if (!isset( $charSetList )) {
            list( $charSets, ) = explode(';', $this->getAcceptCharset());
            $charSetList = explode(',', $charSets);
        }

        return $charSetList;
    }

    /**
     * @return string
     */
    public function getUserAgent()
    {
        return $this->requestHeaders['HTTP_USER_AGENT'];
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->requestHeaders['HTTP_HOST'];
    }

    /**
     * @return float
     */
    public function getRequestTime()
    {
        return $this->requestHeaders['REQUEST_TIME_FLOAT'];
    }

    /**
     * @return bool
     */
    public function isXmlHttpRequest()
    {
        static $isXmlHttpRequest;

        if (!isset( $isXmlHttpRequest )) {
            $isXmlHttpRequest = isset( $this->requestHeaders['X-Requested-With'] )
                && !empty( $this->requestHeaders['X-Requested-With'] )
                && stristr(strtolower($this->requestHeaders['X-Requested-With']), 'xmlhttp');
        }

        return $isXmlHttpRequest;
    }
}
