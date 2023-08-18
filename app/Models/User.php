<?php

namespace App\Models;

use App\Repositories\DataSmokeDBRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'type_smoke',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /**
     * Get the user's type smoke
     * @return bool|string
     */
    protected function getUserTypeSmoke(): bool|string
    {
        if (auth()->user()->type_smoke === null)
            return false;
        else
            return auth()->user()->type_smoke;
    }

    /**
     * Get the user's data smoke from database
     * @return mixed
     */
    protected function getDataSmokeDBUser(): mixed
    {
        if ($this->getUserTypeSmoke() === 'vape')
            return DataSmokeDBRepository::getDataSmokeDBVapeTypeRepository(auth()->user());
        else if ($this->getUserTypeSmoke() === 'cigarette')
            return DataSmokeDBRepository::getDataSmokeDBCigaretteTypeRepository(auth()->user());
        else
            return false;
    }


    /**
     * Get the user's day not smoking
     * @return string
     */
    protected function getDayDontSmoke(): string
    {
        if ($this->getDataSmokeDBUser())
        {
            $userStatistic = $this->getDataSmokeDBUser()->date_dont_smoke;
            return Carbon::now()->diffInDays($userStatistic);
        }
        else
            return false;
    }

    /**
     * Get the user's money that his saving
     * @return int
     */
    protected function getMoneySaving(): int
    {
        if ($this->getUserTypeSmoke() === 'vape')
            return UserVape::getMoneySavingVape();
        else if ($this->getUserTypeSmoke() === 'cigarette')
            return UserCigarette::getMoneySavingCigarette();
        else
            return false;

    }

    /**
     * Get the user's money that his spend for time smoking
     * @return int
     */
    protected function getMoneySpend(): int
    {
        if ($this->getUserTypeSmoke() === 'vape')
            return UserVape::getMoneySpendVape();
        else if ($this->getUserTypeSmoke() === 'cigarette')
            return UserCigarette::getMoneySpendCigarette();
        else
            return false;
    }

    /**
     * Get the user's basic info smoke
     * @return array|bool
     */
    protected function getBasicInfoSmoke(): array|bool
    {
        if ($this->getUserTypeSmoke())
        {
            return [
                'money_spend' =>  $this->getMoneySpend(),
                'money_saving' => $this->getMoneySaving(),
                'day_dont_smoke' => $this->getDayDontSmoke()
            ];
        }
        else
        {
            return false;
        }
    }

}
