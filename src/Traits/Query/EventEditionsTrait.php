<?php

namespace Gtechmx\Atlas\Traits\Query;

trait EventEditionsTrait
{
    protected static function getEventEditions($query) 
    {
        if (!$query) {
            return self::fullQuery();
        }

        return $query;
    }

    private static function fullQuery()
    {
        return "{
            eventEditions {
                name, id
            }
        }";
    }
}
