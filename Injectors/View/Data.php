<?php

namespace Steel\Injectors\View;

use \Steel\Container;
use \Steel\View\Data as SteelData;

trait Data
{
    public function getData( $viewName, $type )
    {
        $dataName = $viewName . 'Data';

        if (Container::isStored( $dataName )) {
            return Container::getStored( $dataName );
        }

        return Container::store( $dataName, SteelData::build( $type, $viewName ) );
    }
}
