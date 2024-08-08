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
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $cities = City::with('province')->get();
        $provinces = Province::all();

        $citiesByProvince = $cities->groupBy('province_id');

        return view('auth.register', compact('company_sizes', 'positions', 'cities', 'provinces', 'companies', 'citiesByProvince'));
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

        $companySize = CompanySize::firstOrCreate(['name' => $validatedData['company_size_name']]);
        $company = Company::firstOrCreate(['name' => $validatedData['company_name']]);

        // Ensure company is linked with company size
        $company->company_size_id = $companySize->id;
        $company->save();

        // Create or fetch the position without setting company_id
        $position = Position::firstOrCreate(['name' => $validatedData['position_name'], 'company_id' => $company->id]);

        // Ensure the position is linked with the company if it doesn't have one already

        $province = Province::firstOrCreate(['name' => $validatedData['province_name']]);
        $city = City::firstOrCreate(['name' => $validatedData['city_name']]);

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
        $user->save();
        Auth::login($user);
        return redirect('/dashboard');
    }
}
