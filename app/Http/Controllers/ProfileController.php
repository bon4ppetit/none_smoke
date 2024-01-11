<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Services\Profile\ProfileService;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

/**
 *  Controller User's Profile
 */
class ProfileController extends Controller
{
    public ProfileService $service;

    /**
     * @param ProfileService $service
     */
    public function __construct(ProfileService $service)
    {
       $this->service = $service;
    }

    /**
     * Render window for edit user's account info
     *
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request)
    {
        return $this->service->edit($request);
    }

    /**
     * Update user's data
     *
     * @param ProfileUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        return $this->service->update($request);
    }

    /**
     * Delete user's account
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        return $this->service->destroy($request);
    }
}
