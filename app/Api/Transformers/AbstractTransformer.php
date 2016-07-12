<?php

namespace Api\Transformers;

use League\Fractal\TransformerAbstract;

/**
 * Class AbstractTransformer
 * @package Api\Transformers
 */
abstract class AbstractTransformer extends TransformerAbstract implements TransformerInterface
{

    /**
     * @param Model $model
     * @return mixed
     */
    abstract public function transform(Model $model);

}