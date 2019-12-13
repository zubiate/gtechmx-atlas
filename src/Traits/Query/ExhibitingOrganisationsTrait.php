<?php

namespace Gtechmx\Atlas\Traits\Query;

trait ExhibitingOrganisationsTrait
{
    protected  function getExhibitingOrganisations( $query)
    {
 
        if (!$query) {
            return $this->fullExhibitingOrganisationsQuery();
        }

        return $query;
    }

    private  function fullExhibitingOrganisationsQuery()
    {
        $query = $this->query ?? 'id,
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

        return '{
  exhibitingOrganisations(
    eventEditionId: "'.$this->event_id.'"
  ){
    '.$query.'
  }
}';
    }
}
