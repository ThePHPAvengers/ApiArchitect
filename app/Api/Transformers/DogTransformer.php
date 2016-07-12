<?php

namespace Api\Transformers;

use ApiArchitect\Entities\Dog;
use League\Fractal\TransformerAbstract;

/**
 * Class DogTransformer
 *
 * @package Api\Transformers
 * @author James Kirkby <heelo@jameskirkby.com>
 */
class DogTransformer extends TransformerAbstract
{

    /**
     * @param Dog $dog
     * @return array
     */
	public function transform(Dog $dog)
	{
		return [
			'id' 	=> (int) $dog->getId(),
			'name'  => $dog->getName(),
			'age'	=> (int) $dog->getAge()
		];
	}
}