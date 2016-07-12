<?php

namespace Api\Controllers;

use Illuminate\Http\Request;
use Api\Requests\DogRequest;
use Api\Transformers\DogTransformer;
use Illuminate\Support\Collection;
use ApiArchitect\Repositories\Dog\DogRepository;

/**
 * @Resource('Dogs', uri='/dogs')
 */
class DogsController extends BaseController
{

    public function __construct(DogRepository $dogRepository)
    {
        $this->dogRepository = $dogRepository;
    //    $this->middleware('jwt.auth');
    }

    /**
     * Show all dogs
     *
     * Get a JSON representation of all the dogs
     * 
     * @Get('/')
     */
    public function index()
    {
        return $this->collection(Collection::make($this->dogRepository->findAll()), new DogTransformer);
    }

    /**
     * Store a new dog in the database.
     *
     * @param DogRequest $request
     * @return \ApiArchitect\Entities\Dog
     */
    public function store(DogRequest $request)
    {
        return $this->dogRepository->create($request->only(['name', 'age']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->item(Collection::make($this->dogRepository->findAll()), new DogTransformer);
    }

    /**
     * Update the dog in the database.
     *
     * @param DogRequest $request
     * @param $id
     * @return mixed
     */
    public function update(DogRequest $request, $id)
    {
        $dog = $this->dogRepository->find($id);
        $dog->update($request->only(['name', 'age']));
        return $dog;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Dog::destroy($id);
    }
}
