<?php

namespace Gtechmx\Atlas\Client;

use Gtechmx\Atlas\Support\AtlasClient;
use Gtechmx\Atlas\Traits\Query\EventEditionsTrait;
use Gtechmx\Atlas\Traits\Query\ExhibitingOrganisationsTrait;
use Gtechmx\Atlas\Traits\Query\ExhibitingOrganisationsMultilingualTrait;
use Gtechmx\Atlas\Traits\Query\ExhibitingOrganisationTrait;
use Gtechmx\Atlas\Traits\Query\ExhibitorProfileQuestionsTrait;
use Gtechmx\Atlas\Traits\Query\ExhibitorRecommendationsTrait;

class AtlasLoadQuery extends AtlasClient
{
   use EventEditionsTrait,
       ExhibitingOrganisationsTrait,
       ExhibitingOrganisationsMultilingualTrait,
       ExhibitingOrganisationTrait, 
       ExhibitorProfileQuestionsTrait,
       ExhibitorRecommendationsTrait;

   public $event_id = null;
   public $exhibitor_id = null;
   public $organisation_id = null;
   public $select = null;
   public $locale = "Es-MX";
   public $access_token = null;
   public $max_results = 3;

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

   public function setOrganisation($organisation){
       $this->organisation_id = $organisation;
       return $this;
   }
   
   public function setLocale($locale){
       $this->locale = $locale;
       return $this;
   }
   
   public function setAccessToken($access_token){
       $this->access_token = $access_token;
       return $this;
   }
   
   public function setMaxResults($max_results){
       $this->max_results = $max_results;
       return $this;
   }
}
