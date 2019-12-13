<?php

namespace Gtechmx\Atlas\Traits\Query;

trait ExhibitingOrganisationTrait
{
    protected  function getExhibitingOrganisation( $query)
    {
 
        if (!$query) {
            return self::fullExhibitingOrganisationQuery();
        }

        return $query;
    }

    private  function fullExhibitingOrganisationQuery()
    {
        return '{
    exhibitingOrganisation(
    exhibitingOrganisationId: "'.$this->exhibitor_id.'",
    eventEditionId: "'.$this->event_id.'",
    organisationId: "'.$this->organisation_id.'")
  {
    accompanyingWebsiteUrl,
    companyName,
    contactEmail,
    entitlements{
        productCode,
      totalValue
    },
    eventEditionId,
    exhibitorType,
    extraCharacteristics{
        id,
      multilingualItems{
        locale,
        name
      }
    },
    filterCategories{
      id,
      multilingual{
        locale,
        name
      },
    
      responses{
        answerId, multilingual{
          locale, name
        }, parentId, taxonomyId
      }
    },
   
    id,
    isNew,
   
    isReturning,
    multilingual{
      addressLine1,
      addressLine2,
      city,
      countryCode,
      coverImageUrl,
      description,
      displayName,
      locale,
      logoUrl,
      postcode,
      representedBrands{
        name
      },
      showObjective,
      sortAlias,
      stateProvince
    },
   
    organisationId,
    packageId,
    parentId,
    phone,
    products{
      id,
      imageUrl,
      isInnovative,
      multilingual{
        description,
        locale,
        title
      }
    }
    profileCompleteness,
    profileQuestions{
      id,
      multilingual{
        locale, name
      }
    
      responses{
        answerId,multilingual{locale, name}, parentId, taxonomyId
      }
    },
    socialMedia{
      name,
      url
    },
    sponsoredCategory{
      id,
      multilingual{
        locale, name
      }
    },
    stands{
      name
    },
    website
  }
}
';
    }
}
