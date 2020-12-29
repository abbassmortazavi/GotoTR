<?php

namespace App\Repositories;

use Exception;
use Illuminate\Container\Container as Application;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Events\RepositoryEntityUpdated;
use Prettus\Repository\Exceptions\RepositoryException as RepositoryExceptionAlias;
use Prettus\Validator\Exceptions\ValidatorException;


abstract class BaseRepository extends \Prettus\Repository\Eloquent\BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Application
     */
    protected $app;

    /**
     * @param Application $app
     *
     * @throws Exception
     */
    public function __construct(Application $app)
    {
        parent::__construct($app);
    }

    /**
     * Get searchable fields array
     *
     * @return array
     */
    public function getFieldsSearchable(){
        return parent::getFieldsSearchable();
    }

    /**
     * Configure the Model
     *
     * @return string
     */
    abstract public function model();

    /**
     * Make Model instance
     *
     * @throws Exception
     *
     * @return Model
     */
    public function makeModel()
    {
        return parent::makeModel();
    }

    /**
     * Retrieve all data of repository, paginated
     *
     * @param null|int $limit
     * @param array $columns
     * @param string $method
     *
     * @return mixed
     */
    public function paginate($limit = null, $columns = ['*'], $method = "paginate")
    {
        return parent::paginate($limit, $columns, $method);
    }

    /**
     * Build a query for retrieving all records.
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @return Builder
     */
    public function allQuery($search = [], $skip = null, $limit = null)
    {
        $query = $this->model->newQuery();

        if (count($search)) {
            foreach($search as $key => $value) {
                if (in_array($key, $this->getFieldsSearchable())) {
                    $query->where($key, $value);
                }
            }
        }

        if (!is_null($skip)) {
            $query->skip($skip);
        }

        if (!is_null($limit)) {
            $query->limit($limit);
        }

        return $query;
    }

    /**
     * Retrieve all records with given filter criteria
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @param array $columns
     *
     * @return LengthAwarePaginator|Builder[]|Collection
     * @throws RepositoryExceptionAlias
     */
    public function all($search = [], $skip = null, $limit = null, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();

        $query = $this->allQuery($search, $skip, $limit);
        $results = $query->get($columns);

        $this->resetModel();
        $this->resetScope();

        return $this->parserResult($results);
    }

    /**
     * Save a new entity in repository
     *
     * @throws ValidatorException
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create($attributes)
    {
        return parent::create($attributes);
    }

    /**
     * Find data by id
     *
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->find($id, $columns);
        $this->resetModel();

        return $this->parserResult($model);    }

    /**
     * Update a entity in repository by id
     *
     * @throws ValidatorException
     *
     * @param array $attributes
     * @param       $id
     *
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        return parent::update($attributes, $id);
    }

    /**
     * @param int $id
     *
     * @throws Exception
     *
     * @return bool|mixed|null
     */
    public function delete($id)
    {
        return parent::delete($id);
    }


    public function deleteWhereIn(array $where , $key ,array $items)
    {
        $this->model->whereIn($key, $items);
        return $this->deleteWhere($where);
    }


    public function updateWhere($where, array $attributes)
    {
        $this->applyScope();

        $temporarySkipPresenter = $this->skipPresenter;
        $this->skipPresenter(true);

        $this->applyConditions($where);

        $deleted = $this->model->update($attributes);

        event(new RepositoryEntityUpdated($this, $this->model->getModel()));

        $this->skipPresenter($temporarySkipPresenter);
        $this->resetModel();

        return $deleted;

    }
}
