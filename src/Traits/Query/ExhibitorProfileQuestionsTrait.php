<?php

namespace Gtechmx\Atlas\Traits\Query;

/**
 *
 */
trait ExhibitorProfileQuestionsTrait
{
    protected  function getExhibitorProfileQuestions( $query)
    {

        if (!$query) {
            return $this->fullExhibitorProfileQuestions();
        }

        return $query;
    }

    private  function fullExhibitorProfileQuestions()
    {
        $query = $this->select ?? 'answers{
            id,
            parentId,
            taxonomyId,
            text
        }';

        return '
        {
            exhibitorProfileQuestions
            (
                eventEditionId: "'.$this->event_id.'",
                locale: "'.$this->locale.'"
            )
            {
                '.$query.'
            }
        }
        ';
    }
}
