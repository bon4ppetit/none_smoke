<?php

namespace App\Models;

use App\Repositories\GoalDBRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'goal';
    protected $guarded = false;

        protected function getGoal()
        {
            $data = GoalDBRepository::getUserAllGoalsDBRepository();
            if (count($data) === 0)
                return false;
            else
                return $data;
        }
}
