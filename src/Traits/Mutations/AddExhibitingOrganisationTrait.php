<?php
namespace Gtechmx\Atlas\Traits\Mutations;

trait AddExhibitingOrganisationTrait
{ 
    public function getAddExhibitingOrganisation($query){
        $select =  $this->select ?? ' id,
                countryCode,
                companyName,
                organisationId,
                displayName,
                logoUrl,
                stands {
                    name
                },
                productsAndServices,
                exhibitorStatus,
                profileQuestions{
                    responses{
                        answerId
                    }
                }';
        return '
        mutation
        {
            addExhibitingOrganisation
            (
                 eventEditionId: "'.$this->event_id.'",
                 '. $query .'
            )
            {
               '.$select. '
            }
        }
        ';
die();
    }
}
