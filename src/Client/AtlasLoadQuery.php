<?php

namespace Gtechmx\Atlas\Client;

use Gtechmx\Atlas\Support\AtlasClient;
use Gtechmx\Atlas\Traits\Query\EventEditionsTrait;
use Gtechmx\Atlas\Traits\Query\ExhibitingOrganisationsTrait;
use Gtechmx\Atlas\Traits\Query\ExhibitingOrganisationsMultilingualTrait;
use Gtechmx\Atlas\Traits\Query\ExhibitingOrganisationTrait;

class AtlasLoadQuery extends AtlasClient
{
   use EventEditionsTrait, 
       ExhibitingOrganisationsTrait, 
       ExhibitingOrganisationsMultilingualTrait,
       ExhibitingOrganisationTrait;

   public  $event_id = null;
   public  $exhibitor_id = null;
   public  $organisation_id = null;

   public function setEvent($event){
       $this->event_id = $event;
       return $this;
   }
 
   public function setExhibitor($exhibitor){
       $this->exhibitor_id = $exhibitor;
       return $this;
   }
   
   public function setOrganisation($organisation){
       $this->organisation_id = $organisation;
       return $this;
   }
}
