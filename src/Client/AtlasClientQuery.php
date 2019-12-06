<?php

namespace Gtechmx\Atlas\Client;

class AtlasClientQuery extends AtlasLoadQuery
{

    public  function eventEditions($query = false)
    {
        $query = $this->getEventEditions($query);
        return $this->query($query);
    }

    public function exhibitingOrganisations($query = false)
    {
        $query = $this->getExhibitingOrganisations( $query);
        return $this->query($query);
    }

 
}
