<?php

namespace Apex;

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

  public function __construct( )
  {
    $this->request = $this->getRequest( ); 
    $this->response = $this->getResponse( );
    $this->view = $this->getView( );
  }

  protected function output( $name = '' )
  {
    $view = $this->getView( $name ); 

    $view->output( );
  }
}
