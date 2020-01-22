<?php

namespace Gtechmx\Atlas\Client;



class AtlasClientMutation extends AtlasLoadMutation
{

    public function addExhibitingOrganisation($query)
    {
        $query = $this->getAddExhibitingOrganisation($query);
        return $this->mutation($query);
    }

    public function createVisitorRegistration($user){
        $query = $this->setCreateVisitorRegistration($user);
      
        return $this->mutation($query);
    }

}
