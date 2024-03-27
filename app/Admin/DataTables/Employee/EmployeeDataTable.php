<?php
namespace App\Admin\DataTables\Employee;
use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Employee\EmployeeRepositoryInterface;
use App\Enums\Gender;
use App\Enums\Employee\EmployeeRoles;

class EmployeeDataTable extends BaseDataTable
{
protected $nameTable = 'employeeTable';
public function __construct(
EmployeeRepositoryInterface $repository){
    $this->repository = $repository;
    parent::__construct();
    }
    public function setView(){
    $this->view = [
        'action' => 'admin.employee.datatable.action',
        'fullname' => 'admin.employee.datatable.fullname',
    ];
    }
    public function setColumnSearch(){
        $this->columnAllSearch = [1, 2, 3, 4, 5, 6, 7];
        $this->columnSearchDate = [6];
        $this->columnSearchSelect = [
            [
                'column' => 5,
                'data' => Gender::asSelectArray()
            ],
            [
                'column' => 4,
                'data' => EmployeeRoles::asSelectArray()
            ]
        ];
    }
    public function query()
    {
        return $this->repository->getQueryBuilderOrderBy();
    }
    protected function setCustomColumns(){
        $this->customColumns = config('datatables_columns.employee', []);
    }
    protected function setCustomEditColumns()
    {
        $this->customEditColumns = [
            'fullname' => $this->view['fullname'],
            'roles' => function ($employee) {
                return $employee->roles->description();
            },
            'gender' => function ($employee) {
                return $employee->gender->description();
            },
            'created_at' => '{{ format_date($created_at) }}',
            'birthday' => '{{ format_date($birthday) }}'
        ];
    }
    protected function startBuilderDataTable($query){
        $this->instanceDataTable = datatables()->eloquent($query)->addIndexColumn();
    }
    protected function setCustomAddColumns(){
        $this->customAddColumns = [
        'action' => $this->view['action'],
        ];
    }
    protected function setCustomRawColumns(){
        $this->customRawColumns = ['fullname', 'action'];
    }
}