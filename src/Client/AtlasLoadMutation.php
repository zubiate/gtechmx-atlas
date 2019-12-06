<?php
namespace Gtechmx\Atlas\Client;

use Gtechmx\Atlas\Support\AtlasClient;
use  Gtechmx\Atlas\Traits\Mutations\AddExhibitingOrganisationTrait;
class AtlasLoadMutation extends AtlasClient
{
    use AddExhibitingOrganisationTrait;


    public  $event_id, $exhibitor_id, $select;

    public function select($select){
       $this->select = $select;
       return $this;
    }

    public function setEvent($event){
       $this->event_id = $event;
       return $this;
    } 

    public function setExhibitor($exhibitor){
       $this->exhibitor_id = $exhibitor;
       return $this;
    }
}
