<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanySize;
use App\Models\Position;
use App\Models\City;
use App\Models\Province;
use App\Models\AddressDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class RegisteredUserController extends Controller
{
    // Show the registration form
    public function create()
    {
        $company_sizes = CompanySize::all();
        $companies = Company::all();
        $positions = Position::all();
        $cities = City::all();
        $provinces = Province::all();

        return view('auth.register', compact('company_sizes', 'positions', 'cities', 'provinces', 'companies'));
    }

    // Handle the registration process
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'required|string',
            'position_name' => 'required|string',
            'province_name' => 'required|string',
            'city_name' => 'required|string',
            'company_size_name' => 'required|string',
            'address_detail' => 'required|string|max:255',
            'whatsapp_number' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $company = Company::firstOrCreate(['name' => $validatedData['company_name']]);
            $position = Position::firstOrCreate(['name' => $validatedData['position_name']]);
            $province = Province::firstOrCreate(['name' => $validatedData['province_name']]);
            $city = City::firstOrCreate(['name' => $validatedData['city_name']]);
            $companySize = CompanySize::firstOrCreate(['name' => $validatedData['company_size_name']]);

            // Ensure company is linked with company size
            $company->company_size_id = $companySize->id;
            $company->save();

            $position->company_id = $company->id;
            $position->save();

            // Create or update address detail
            $addressDetail = AddressDetail::updateOrCreate([
                'address' => $validatedData['address_detail'],
                'province_id' => $province->id,
                'city_id' => $city->id,
            ]);

            // Create user
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'company_id' => $company->id,
                'position_id' => $position->id,
                'address_details_id' => $addressDetail->id,
                'whatsapp_number' => $validatedData['whatsapp_number'],
            ]);

            if ($request->hasFile('profile_picture')) {
                $user->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
            }

        $user->save();

            // Redirect with a success message
            Session::flash('message', 'Successfully registered!');
            return Redirect::to('/');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
