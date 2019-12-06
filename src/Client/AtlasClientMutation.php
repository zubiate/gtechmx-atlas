<?php

namespace Gtechmx\Atlas\Client;


class AtlasClientMutation extends AtlasLoadMutation
{

    public function addExhibitingOrganisation($query)
    {
        $query = $this->getAddExhibitingOrganisation($query);
        return $this->mutation($query);
    }

}
 