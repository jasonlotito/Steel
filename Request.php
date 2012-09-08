<?php

namespace Steel;

use Steel\Interfaces\Request as IRequest;

/**
 *
 */
class Request implements IRequest
{
  use Injectors\Config;

  /**
   *
   */
  public function __construct()
  {
  }

  /**
   * @return mixed
   */
  public function getAction()
  {
    return $_SERVER['REQUEST_METHOD'];
  }

  /**
   * @return string
   */
  public function getEntity()
  {
    return isset( $_SERVER['REDIRECT_URL'] ) ? $_SERVER['REDIRECT_URL'] : '/';
  }

  /**
   * @return bool
   */
  public function isConfig()
  {
    return isset( $_SERVER['REDIRECT_QUERY_STRING'] ) && $_SERVER['REDIRECT_QUERY_STRING'] === $this->getConfig()->get()->config;
  }

  /**
   * @param $type
   * @return bool
   */
  public function accepts( $type )
  {
    return false !== stripos( $_SERVER['HTTP_ACCEPT'], $type );
  }
}
