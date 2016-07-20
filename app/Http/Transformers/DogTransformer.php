<?php

namespace ApiArchitect\Http\Transformers;

use ApiArchitect\Entities\Dog;
use ApiArchitect\Core\Abstracts\Http\Transformers\TransformerAbstract;

/**
 * Class DogTransformer
 *
 * @package Api\Transformers
 * @author James Kirkby <hello@jameskirkby.com>
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