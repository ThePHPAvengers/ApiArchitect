<?php

namespace ApiArchitect\Http\Controllers;

use  ApiArchitect\Http\Requests\DogRequest;
use Illuminate\Support\Collection;
use  ApiArchitect\Http\Transformers\DogTransformer;
use ApiArchitect\Repositories\DogRepository;
use ApiArchitect\Core\Http\Controllers\ApiController;

/**
 * Class DogsController
 *
 * @package Api\Controllers
 * @Resource('Dogs', uri='/dogs')
 * @author James Kirkby <hello@jameskirkby.com>
 */
class DogsController extends ApiController
{

    /**
     * DogsController constructor.
     *
     * @param DogRepository $dogRepository
     */
    public function __construct(DogRepository $dogRepository)
    {
        $this->repository = $dogRepository;
        $this->transformer = new DogTransformer;
    }

    /**
     * Show all dogs
     *
     * @Get('/')
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->sendResponse(Collection::make($this->repository->all()),$this->transformer);
    }

    /**
     * Store a new dog in the database.
     *
     * @param DogRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(DogRequest $request)
    {
        return $this->sendResponse(Collection::make($this->repository->create($request->only(['name', 'age'])), $this->transformer));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {

        return $this->sendResponse(Collection::make($this->repository->find($id), $this->transformer));
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


        return $this->sendResponse(Collection::make($this->repository->update($id,$request->only(['name', 'age']))), $this->transformer);
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
