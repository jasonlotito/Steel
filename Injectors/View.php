<?php

namespace Steel\Injectors;

use \Steel\Container;
use \Steel\View as SteelView;

trait View
{
    public function getView( $viewName = 'View' )
    {
        if (Container::isStored( $viewName )) {
            return Container::getStored( $viewName );
        }

        return Container::store( $viewName, SteelView::create( $viewName ) );
    }
}
