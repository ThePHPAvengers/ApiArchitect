<?php

namespace Api\Transformers;

/**
 * Class TransformerInterface
 * @package Api\Transformers
 */
interface TransformerInterface
{
    /**
     * @param Model $model
     * @return mixed
     */
    public function transform(Model $model);
}