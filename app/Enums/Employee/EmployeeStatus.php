<?php

namespace App\Enums\Employee;

use App\Supports\Enum;

enum EmployeeStatus: int
{
    use Enum;

    case Active = 1;
    case Locked = 2;
}
