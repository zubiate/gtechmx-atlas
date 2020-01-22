<?php

namespace Gtechmx\Atlas\Facades;

use Illuminate\Support\Facades\Facade;

class AtlasQuery extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Gtechmx\Atlas\Client\AtlasClientQuery';
    } 
}
