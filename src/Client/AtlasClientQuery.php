<?php

namespace Gtechmx\Atlas\Client;

class AtlasClientQuery extends AtlasLoadQuery
{

    public  function eventEditions($query = false)
    {
        $query = $this->getEventEditions($query);
        return $this->query($query);
    }

    public function exhibitingOrganisation($query = false)
    {
        $query = $this->getExhibitingOrganisation($query);
        return $this->query($query);
    }

    public function exhibitingOrganisations($query = false)
    {
        $query = $this->getExhibitingOrganisations($query);
        return $this->query($query);
    }

    public function exhibitingOrganisationsMultilingual($query = false)
    {
        $query = $this->getExhibitingOrganisationsMultilingual($query);
        return $this->query($query);
    }

    public function exhibitorProfileQuestions($query = false)
    {
        $query = $this->getExhibitorProfileQuestions($query);
        return $this->query($query);
    }
}
