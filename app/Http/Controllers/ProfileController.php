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

class ProfileController extends Controller
{
    public ProfileService $service;
    public function __construct(ProfileService $service)
    {
       $this->service = $service;
    }


    public function edit(Request $request)
    {
        return $this->service->edit($request);
    }

    public function update(ProfileUpdateRequest $request)
    {
        return $this->service->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->service->destroy($request);
    }
}
