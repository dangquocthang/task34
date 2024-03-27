<?php
namespace App\Admin\Http\Requests\Employee;
use App\Admin\Http\Requests\BaseRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\Employee\EmployeeRoles; 
use App\Enums\Gender;
class EmployeeRequest extends BaseRequest
{
protected function methodPost()
{
return [
'username' => [
'required',
'string', 'min:6', 'max:50',
'unique:App\Models\Employee,username',
'regex:/^[A-Za-z0-9_-]+$/',
function ($attribute, $value, $fail) {
    if (in_array(strtolower($value), ['admin', 'user', 'employee', 'password'])) {
        $fail('The ' . $attribute . ' cannot be a common
        keyword.');
    }
    },
    ],
    'fullname' => ['required', 'string'],
    'email' => ['required', 'email', 'unique:App\Models\Employee,email'],
    'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/',
    'unique:App\Models\Employee,phone'],
    'gender' => ['required', new Enum(Gender::class)],
    'password' => ['required', 'string', 'confirmed'],
    'roles' => ['required', new Enum(EmployeeRoles::class)],
    'birthday' => ['required', 'date_format:Y-m-d']
    ];
}
protected function methodPut()
{
return [
'id' => ['required', 'exists:App\Models\Employee,id'],
'username' => [
    'required',
    'string', 'min:6', 'max:50',
    'unique:App\Models\Employee,username,' . $this->id,
    'regex:/^[A-Za-z0-9_-]+$/',
function ($attribute, $value, $fail) {
    if (in_array(strtolower($value), ['admin', 'user',
    'password'])) {
        $fail('The ' . $attribute . ' cannot be a common
        keyword.');
    }
    },
    ],
    'fullname' => ['required', 'string'],
    'email' => ['required', 'email', 'unique:App\Models\Employee,email,' .
    $this->id],
    'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/',
    'unique:App\Models\Employee,phone,' . $this->id],
    'gender' => ['required', new Enum(Gender::class)],
    'password' => ['nullable', 'string', 'confirmed'],
    'birthday' => ['required', 'date_format:Y-m-d'],
    'roles' => ['required', new Enum(EmployeeRoles::class)],
    ];
    }
}