<?php

namespace App\Enums\Employee;

use App\Supports\Enum;

enum EmployeeRoles: int
{
    use Enum;

    case Employee = 1;
    case Manage = 2;

   
    
   /* public function listRolesEmployeeAfterCase(){
        $case = [];
        $flag = false;
        $currentCase = $this;
        
        if($currentCase == self::Employee){
            $flag = true;
            $case = self::cases();
        }

        if(!$flag){
            foreach(self::cases() as $item){
                if($this == $item){
                    $flag = true;   
                }
    
                if($flag){
                    $case[] = $item;
                }
            }
        }
        return $case;
    }

    public function asArraySelectListRolesEmployeeAfterCase(){
        $case = [];
        foreach($this->listRolesEmployeeAfterCase() as $item) {
            $case[$item->value] = $item->description();
        }
        return $case;
    }*/
}
