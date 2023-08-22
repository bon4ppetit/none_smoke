<?php

namespace App\Services\Profile;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserCigarette;
use App\Models\UserVape;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ProfileService
{

    /**
     *  Change the user's profile type smoking
     * @param string $type
     * @return \Exception|string
     */
    protected function changeTypeSmoke(string $type): \Exception|string
    {
        try {
            return auth()->user()->update(['type_smoke' => $type]);
        }
        catch (\Exception $e) {
            return $e;
        }
    }


    /**
     *  Store the user's profile statistic
     * @param $data
     * @param string $type
     * @return false|UserCigarette|UserVape
     */
    public function storeStatistic($data, string $type): bool|UserCigarette|UserVape
    {
        $data['user_id'] = auth()->user()->id;
        $this->changeTypeSmoke($type);

        if ($type === 'cigarette') return UserCigarette::create($data);
        elseif ($type === 'vape') return UserVape::create($data);
        else return false;
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

}
