<?php

namespace App\Admin\Http\Controllers\Employee;

use App\Admin\Http\Controllers\BaseSearchSelectController;
use App\Admin\Repositories\Employee\EmployeeRepositoryInterface;
use App\Admin\Http\Resources\Employee\EmployeeSearchSelectResource;

class EmployeeSearchSelectController extends BaseSearchSelectController
{
    public function __construct(
        EmployeeRepositoryInterface $repository
    ){
        $this->repository = $repository;
    }

    protected function selectResponse(){
        $this->instance = [
            'results' => EmployeeSearchSelectResource::collection($this->instance)
        ];
    }
}