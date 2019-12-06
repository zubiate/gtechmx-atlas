<?php

namespace Gtechmx\Atlas\Traits\Query;

trait ExhibitingOrganisationsTrait
{
    protected  function getExhibitingOrganisations( $query)
    {
 
        if (!$query) {
            return self::fullExhibitingOrganisationsQuery();
        }

        return $query;
    }

    private  function fullExhibitingOrganisationsQuery()
    {
        return '{
  exhibitingOrganisations(
    eventEditionId: "'.$this->event_id.'"
  ){
    id,
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
    }
  }
}';
    }
}
