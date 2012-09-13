<?php

namespace Steel;

class Response
{
    const HEADER_404 = 'HTTP/1.0 404 Not Found';

    public function addHeader( $header )
    {
        header( $header );
    }

    public function notFound( )
    {
        $this->addHeader(self::HEADER_404);
    }

}
