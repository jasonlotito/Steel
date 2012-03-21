<?php

namespace Apex;

/**
 * Controller
 */
abstract class Controller
{
  use
    Injectors\View,
    Injectors\Request,
    Injectors\Response,
    Injectors\Config;

  protected $request;
  protected $response;
  protected $view;
  protected $templateName = 'Default';

  public function __construct( )
  {
    $this->request = $this->getRequest( ); 
    $this->response = $this->getResponse( );
    $this->view = $this->getView( $this->templateName );
  }

  public function setView( $view )
  {
    $this->view = $view;
  }

  protected function attach( $name, $value )
  {
    return $this->view->attach( $name, $value );
  }

  protected function output( )
  {
    $this->view->output( );
  }
}
