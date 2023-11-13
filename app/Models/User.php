<?php

namespace App\Models;

use App\Repositories\SmokeRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;


/**
 * Common model User
 *
 * @method getDataSmokeDBUser,
 * @method getUserTypeSmoke,
 * @method getDayDontSmoke,
 * @method getMoneySaving,
 * @method getBasicInfoSmoke,
 * @method resetProgress,
 *
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

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
     * Get the user's data smoke from database
     * @return mixed
     */
    protected static function getDataSmokeDBUser(): mixed
    {
        if (self::getUserTypeSmoke() === 'vape') {
            return SmokeRepository::getDataSmokeDBVapeTypeRepository();
        } elseif (self::getUserTypeSmoke() === 'cigarette') {
            return SmokeRepository::getDataSmokeDBCigaretteTypeRepository();
        } else {
            return false;
        }
    }

    /**
     * Get the user's type smoke
     * @return bool|string
     */
    protected static function getUserTypeSmoke(): bool|string
    {
        if (auth()->user()->type_smoke === null) {
            return false;
        } else {
            return auth()->user()->type_smoke;
        }
    }


    /**
     * Get the user's day not smoking
     * @return string
     */
    protected static function getDayDontSmoke(): string
    {
        if (self::getDataSmokeDBUser()) {
            $userStatistic = self::getDataSmokeDBUser()->date_finish_smoke;
            return Carbon::now()->diffInDays($userStatistic);
        } else {
            return false;
        }
    }

    /**
     * Get the user's money that his saving
     * @return int
     */
    protected static function getMoneySaving(): int
    {
        if (self::getUserTypeSmoke() === 'vape') {
            return UserVape::getMoneySavingVape();
        } elseif (self::getUserTypeSmoke() === 'cigarette') {
            return UserCigarette::getMoneySavingCigarette();
        } else {
            return false;
        }
    }

    /**
     * Get the user's money that his spend for time smoking
     * @return int
     */
    protected static function getMoneySpend(): int
    {
        if (self::getUserTypeSmoke() === 'vape') {
            return UserVape::getMoneySpendVape();
        } elseif (self::getUserTypeSmoke() === 'cigarette') {
            return UserCigarette::getMoneySpendCigarette();
        } else {
            return false;
        }
    }

    /**
     * Get the user's basic info smoke
     * @return array|bool
     */
    protected static function getBasicInfoSmoke(): array|bool
    {
        if (self::getUserTypeSmoke()) {
            return [
                'money_spend' => self::getMoneySpend(),
                'money_saving' => self::getMoneySaving(),
                'day_dont_smoke' => self::getDayDontSmoke()
            ];
        } else {
            return false;
        }
    }

    /**
     * Model Method: Reset User's Progress
     *
     * @return string[]
     */
    protected static function resetProgress(): array
    {
        try {
            DB::table('user_type_' . self::getUserTypeSmoke())
                ->where('user_id', auth()->user()->id)
                ->update(['date_dont_smoke' => Carbon::now()]);

            return ['status' => 'success', 'message' => 'Progress reset successfully.'];
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => "Progress don't reset successfully. Error: {$e->getMessage()}"];
        }
    }
}
