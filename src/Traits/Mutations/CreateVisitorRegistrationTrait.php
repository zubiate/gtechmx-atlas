<?php
namespace Gtechmx\Atlas\Traits\Mutations;


trait CreateVisitorRegistrationTrait
{
    public function setCreateVisitorRegistration( $user){
        if( is_a($user, config('auth.providers.' . config('auth.guards.web.provider'). '.model'))){
            dd( $this->getQueryCreateVisitorRegistration($user));
            return $this->getQueryCreateVisitorRegistration($user);
        }else{
            abort(422,'Model '. config('auth.providers.' . config('auth.guards.web.provider'). '.model').' not found' );
        }

    }

    private function getQueryCreateVisitorRegistration($user){
        return '
        mutation{
            createVisitorRegistration(
                eventEditionId: "'. $this->event_id .'",
                locale: "'. $this->locale.'",
                badgeNumber: "'.$user->.'",
                visitorProfile: {
                accessToken: "",
                organisation: {
                    name: ""
                },
                person: {
                    firstName: "",
                    lastName: "",
                    email:  "",
                    jobTitle: "",
                    phone: ""
                },
                profileResponses:[
                    {
                    answerIds: [
                        "id_1,
                        "id_2"
                    ]
                    }
                ],
                visitorType: null,

                }
            )
            }';
    }
}
