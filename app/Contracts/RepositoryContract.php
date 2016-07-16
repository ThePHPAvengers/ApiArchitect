<?php

namespace ApiArchitect\Contracts;

/**
 * Interface RepositoryInterface
 *
 * @package ApiArchitect\Repositories
 * @author James Kirkby <hello@jameskirkby.com>
 */
interface RepositoryContract
{

    /**
     * Returns all _camel_casePlural_
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all();

    /**
     * Returns all paginated $MODEL_NAME_PLURAL$
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function paginated($paginate);

    /**
     * Search _camel_case_
     *
     * @param array $input
     * @param $paginate
     * @return mixed
     */
    public function search(array $input, $paginate);

    /**
     * Stores _camel_case_ into database
     *
     * @param array $input
     *
     * @return _camel_case_
     */
    public function create(array $input);

    /**
     * Find _camel_case_ by given id
     *
     * @param int $id
     *
     * @return \Illuminate\Support\Collection|null|static|_camel_case_
     */
    public function find($id);

    /**
     * Destroy _camel_case_
     *
     * @param int $id
     *
     * @return \Illuminate\Support\Collection|null|static|_camel_case_
     */
    public function destroy($id);

    /**
     * Updates _camel_case_ in the database
     *
     * @param int $id
     * @param array $inputs
     *
     * @return _camel_case_
     */
    public function update($id,array $inputs);
}