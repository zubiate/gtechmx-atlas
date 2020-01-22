<?php

namespace Gtechmx\Atlas\Traits\Query;

trait EventEditionsTrait
{
    protected function getEventEditions($query) 
    {
        if (!$query) {
            return $this->fullQuery();
        }

        return $query;
    }

    private function fullQuery()
    {
        $query = $this->select ?? 'name, id';

        return "{
            eventEditions {
                '.$query.'
            }
        }";
    }
}
