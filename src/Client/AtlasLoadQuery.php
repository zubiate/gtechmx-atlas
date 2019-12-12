<?php

namespace Gtechmx\Atlas\Client;

use Gtechmx\Atlas\Support\AtlasClient;
use Gtechmx\Atlas\Traits\Query\EventEditionsTrait;
use Gtechmx\Atlas\Traits\Query\ExhibitingOrganisationsTrait;
use Gtechmx\Atlas\Traits\Query\ExhibitingOrganisationsMultilingualTrait;

class AtlasLoadQuery extends AtlasClient
{
   use EventEditionsTrait, 
       ExhibitingOrganisationsTrait, 
       ExhibitingOrganisationsMultilingualTrait;

   public  $event_id, $exhibitor_id;

   public function setEvent($event){
       $this->event_id = $event;
       return $this;
   }
 
   public function setExhibitor($exhibitor){
       $this->exhibitor_id = $exhibitor;
       return $this;
   }
}
