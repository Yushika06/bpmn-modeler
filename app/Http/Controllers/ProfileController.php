<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\AddressDetail;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = auth()->user();
        $addressDetail = $user->addressDetail;
        return view('profile.edit', compact('user', 'addressDetail'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->fill($request->only(['name', 'whatsapp_number', 'profile_picture', 'company_id', 'position_id']));

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // Update address details
        $addressDetail = $user->addressDetail;
        if (!$addressDetail) {
            $addressDetail = new AddressDetail();
            $addressDetail->user_id = $user->id;
        }

        $addressDetail->province_id = $request->input('province_id');
        $addressDetail->city_id = $request->input('city_id');
        $addressDetail->address = $request->input('address');
        $addressDetail->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
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
class ProfileUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'whatsapp_number' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'address' => 'nullable|string|max:255',
            'province_id' => 'nullable|exists:provinces,id',
            'city_id' => 'nullable|exists:cities,id',
            'company_id' => 'nullable|exists:companies,id',
            'position_id' => 'nullable|exists:positions,id',
        ];
    }
}
