<?php

namespace Api\Transformers;

use ApiArchitect\Entities\User as Model;
use League\Fractal\TransformerAbstract;

/**
 * Class UserTransformer
 *
 * @package ApiArchitect\Transformers
 * @author James Kirkby <heelo@jameskirkby.com>
 */
class UserTransformer extends AbstractTransformer
{

    /**
     * @param Model $model
     * @return array
     */
    public function transform(Model $model)
    {
        return [
            'user' => [
                'id' 	=> $model->getId(),
                'name'  => $model->getName(),
                'email'	=> $model->getEmail()
            ]
        ];
    }
}