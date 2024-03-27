<?php

namespace App\Observers;

use App\Enums\Employee\EmployeeStatus;
use App\Models\Employee;

class EmployeeObserver
{
    /**
     * Handle the Job "creating" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function creating(Employee $employee)
    {
        $employee->code = 'U'.uniqid_real();
        $employee->slug = str()->uuid().'-'.time();
        $employee->avatar = config('custom.images.avatar');
        $employee->status = EmployeeStatus::Active;
    }
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(Employee $employee)
    {
        //
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function updated(Employee $employee)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(Employee $employee)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(Employee $employee)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
