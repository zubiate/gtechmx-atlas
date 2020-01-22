<?php
namespace Gtechmx\Atlas\Traits\Mutations;

use App\Models\Answer;
use App\Models\MatchMaking\Category;
use Uuid;

trait CreateVisitorRegistrationTrait
{
    public function setCreateVisitorRegistration( $user){
        if( is_a($user, config('auth.providers.' . config('auth.guards.web.provider'). '.model'))){
            
            return $this->getQueryCreateVisitorRegistration($user);
        }else{
            abort(422,'Model '. config('auth.providers.' . config('auth.guards.web.provider'). '.model').' not found' );
        }

    }

    private function getQueryCreateVisitorRegistration($user){        
        $phone = ($user->questions->where('question_id', \config('atlas.profile_questions.phone'))->first() == null) ? 0 : $user->questions->where('question_id', \config('atlas.profile_questions.phone'))->first()->pivot->text;

        return '
        mutation{
            createVisitorRegistration(
                eventEditionId: "'. $this->event_id .'",
                locale: "'. $this->locale.'", 
                badgeNumber: "'.$user->id.'",
                visitorProfile: {
                    accessToken: "'.$user->user_guid.'",
                    organisation: {
                        name: "'.$user->questions->whereIn('question_id', \config('atlas.profile_questions.company'))->first()->pivot->text.'",
                        address:{
                            addressLine1: "notset",
                            addressLine2: "notset",
                            countryIsoCode: "MEX"
                        }
                    },
                    person: {
                        firstName: "'.$user->questions->where('question_id', \config('atlas.profile_questions.firstname'))->first()->pivot->text.'",
                        lastName: "'.$user->questions->where('question_id', \config('atlas.profile_questions.lastname'))->first()->pivot->text.'",
                        email:  "'.$user->email.'",
                        jobTitle: "'.Answer::where('answer_id', $user->questions->where('question_id', \config('atlas.profile_questions.jobtitle'))->first()->pivot->text)->first()->description.'",
                    
                        phone: "'.$phone.'"
                    },
                    profileResponses:[
                        {
                        answerIds: [
                            '.$this->getAnswerIds($user).'
                        ]
                        }
                    ],
                    privacyResponses:[
                        {
                            level: "event",
                            channelSettings: {
                                phone: "out",
                                mail: "notset",
                                email: "in",
                                sms: "notset",
                                thirdParty: "notset"
                            }
                        },
                        {
                            level: "bu",
                            channelSettings: {
                                phone: "out",
                                mail: "notset",
                                email: "in",
                                sms: "notset",
                                thirdParty: "notset"
                            }
                        }
                    ],
                
                }
            )
        }';
    }

    private function getAnswerIds($user){
         $user_answers = $user->questions()->whereIn('catalogue_questions.question_id', \config('atlas.profile_questions.categories_ids'))->select()->get();
         $questions = [];
         foreach ($user_answers as $question) {
             $questions = array_merge(
               $questions, 
               explode(',',
                    str_replace("'", '',
                            str_replace("[",'',
                                    str_replace("]", '',$question->pivot->text)
                            )
                    )
                )
            );
         }

         $categories = Category::whereIn('us_id', $questions)->select('pps')->get();
       
         $pps = [];
         foreach ($categories as $key => $value) {
            $pps[] = '"'.$value->pps.'"';
         }

        return implode(',',$pps);
    }
}
