<?php

namespace Api\Transformers;

use ApiArchitect\Entities\User;

/**
 * Class UserTransformer
 *
 * @package ApiArchitect\Transformers
 * @author James Kirkby <hello@jameskirkby.com>
 */
class UserTransformer extends AbstractTransformer
{

    /**
     * @param User $User
     * @return array
     */
    public function transform(User $User)
    {
        return [
            'user' => [
                'id' 	=> $User->getId(),
                'name'  => $User->getName(),
                'email'	=> $User->getEmail()
            ]
        ];
    }
}