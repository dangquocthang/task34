<?php

namespace App\Repositories\Blog;
use App\Admin\Repositories\EloquentRepositoryInterface;

interface PostRepositoryInterface extends EloquentRepositoryInterface
{
    public function findBy(array $filter, array $relations = []);
    public function getByLimit(array $filter, array $filterRelation = [], array
    $relations = [], int $limit = 10, array $sort = ['id', 'asc']);
    public function paginate(array $filter, array $relationCondition = [], array
    $relations = [], int $paginate = 10);
}