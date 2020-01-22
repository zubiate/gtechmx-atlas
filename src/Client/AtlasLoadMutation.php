<?php
namespace Gtechmx\Atlas\Client;

use Gtechmx\Atlas\Support\AtlasClient;
use  Gtechmx\Atlas\Traits\Mutations\AddExhibitingOrganisationTrait;
use  Gtechmx\Atlas\Traits\Mutations\CreateVisitorRegistrationTrait;
class AtlasLoadMutation extends AtlasClient
{
    use AddExhibitingOrganisationTrait, CreateVisitorRegistrationTrait;



    public  $event_id, $exhibitor_id, $select, $locale;

    public function __construct(){
        $this->locale = \config('atlas.profile_questions.locale');
    }

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

    public function setLocale($locale){
       $this->locale = $locale;
       return $this;
    }


}
