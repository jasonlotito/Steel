<?php

namespace Apex;

class View
{
  use
    Injectors\View\Template,
    Injectors\View\Data,
    Injectors\Config,
    Injectors\Renderer;

  const DEFAULT_NAME = 'View\\';

  protected $view;

  protected $template;

  protected $data;

  protected $name;

  protected $config;

  protected function __construct( $name )
  {
    $this->config = $this->getConfig( );
    $this->name = stripslashes( $name );
    $this->template = str_replace( '\\', '/', $name);
    $this->renderer = $this->getRenderer( $this->config->get( )->renderer );
    $this->data = $this->getData( $this->name, $this->renderer->getDataType( ) );
    $this->baseTemplate = $this->config->get( )->baseTemplate;
  }  

  public static function create( $name )
  {
    return new self( $name );
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
    $this->data->setData( $name, $value );
  }

  public function output( )
  {
    $data = $this->renderer->render( $this->data, $this->template );
    $container = $this->getData( 'BaseTemplate', $this->renderer->getDataType( ) );
    $container->setData( 'content', $data );

    echo $this->renderer->render( $container, $this->baseTemplate );
  }
}
