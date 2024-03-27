<?php

namespace App\Repositories\Blog;
use App\Admin\Repositories\EloquentRepositoryInterface;

interface CategoryRepositoryInterface extends EloquentRepositoryInterface
{
    public function getFlatTreeNotInNode(array $nodeId);
    
    public function getFlatTree();
}