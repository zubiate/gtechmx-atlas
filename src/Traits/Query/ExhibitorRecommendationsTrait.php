<?php

namespace Gtechmx\Atlas\Traits\Query;

trait ExhibitorRecommendationsTrait 
{
    protected  function getExhibitorRecommendations( $query)
    {

        if (!$query) {
            return $this->fullExhibitorRecommendations();
        }

        return $query;
    }

    private  function fullExhibitorRecommendations()
    {
        $query = $this->select ?? 'categories {
                    name
                },
                id,
                title,
                logo,
                link,
                description,
                isInnovator,
                isNewToShow
        ';
        $accessToken = '"'.$this->access_token.'"' ?? "";

        return '
        {
            exhibitorRecommendations (
                eventEditionId: "'.$this->event_id.'", 
                locale:"'.$this->locale.'", 
                accessToken:'.$accessToken.',
                interfaceLocale:"Es-MX"
                maxResult: '.$this->max_results.'
            )
            {
                '.$query.'
            }
        }
        ';
    }
}