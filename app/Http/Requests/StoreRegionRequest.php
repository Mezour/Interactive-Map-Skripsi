<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegionRequest extends RequestForm
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     */
    public function rules(): array
    {
        return [
            'province' => ['required', 'string', 'max:255', 'unique:regions,province'],
            'latitude' => ['required', 'numeric', 'between:-90,90'],
            'longitude' => ['required', 'numeric', 'between:-180,180'],
        ];
    }

    public function messages(): array
    {
        return [
            'province.required' => 'Nama provinsi wajib diisi.',
            'province.unique' => 'Provinsi tersebut sudah terdaftar.',
            'latitude.between' => 'Latitude harus di antara -90 sampai 90.',
            'longitude.between' => 'Longitude harus di antara -180 sampai 180.',
        ];
    }
}
