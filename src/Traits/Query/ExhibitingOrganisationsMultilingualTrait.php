<?php

namespace Gtechmx\Atlas\Traits\Query;

trait ExhibitingOrganisationsMultilingualTrait
{
    protected  function getExhibitingOrganisationsMultilingual($query)
    {
        if (!$query) {
            return self::fullExhibitingOrganisationsMultilingualQuery();
        }
        return $query;
    }

    private  function fullExhibitingOrganisationsMultilingualQuery()
    {
        return '{
  exhibitingOrganisationsMultilingual(
    eventEditionId: "'.$this->event_id.'"
  ){
      companyName,
      multilingual {
          addressLine1,
          displayName,
          showObjective,
          description,
          locale

      },
      socialMedia {
          name,
          url
      },
      stands {
          name
      },
      productsAndServicesMapping  {
          id,
          multilingualItems
          {
              locale,
              name
          }
      },
      website,
      contactEmail,
      phone,
      exhibitorStatus,
      organisationId,
      id
  }
}';
    }
}
