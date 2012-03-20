<?php

namespace Apex;

class View
{
  use
    Injectors\View\Template,
    Injectors\View\Data,
    Injectors\Config,
    Injectors\Renderer;

  const DEFAULT_NAME = 'View';

  protected $view;

  protected $template;

  protected $data;

  protected $name;

  protected $config;

  protected function __construct( $name, $view )
  {
    $this->config = $this->getConfig( );
    $this->view = $view;
    $this->name = $name;
    $this->renderer = $this->getRenderer( $this->config->get( )->renderer );
    $this->data = $this->getData( $this->name, $this->renderer->getDataType( ) );
  }  

  public static function create( $view, $name = '' )
  {
    // If no name is passed, we still end up with just the Default
    $viewName = self::DEFAULT_NAME . $name;

    if ( Container::available( $viewName ) )
    {
      return Container::get( $viewName );
    }

    return Container::set( $viewName, new self( $viewName, $view ) );
  }

  public function setRenderer( Interfaces\Renderer $renderer )
  {
    $this->renderer = $renderer;
  } 

  public function setTemplate( $template )
  {
    $this->template = $this->getTemplate( $this->name ); 
  }

  public function attach( $name, $value )
  {
    $this->data[ $name ] = $value;
  }

  public function output( )
  {
    $this->renderer->render( $this->data, $this->template );
  }
}
