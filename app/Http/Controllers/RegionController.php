<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->filled('id')) {
            $region = Region::find($request->query('id'));

            if (!$region) {
                return ApiResponse::notFound('Region not found');
            }

            return ApiResponse::success($region, 'success');
        }

        // LIST
        $regions = Region::paginate(10);

        return ApiResponse::success($regions, 'success');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegionRequest $request)
    {
        $region = Region::create($request->validated());

        return ApiResponse::created($region);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegionRequest $request, string $id)
    {
        // Cari region berdasarkan id dari parameter URL
        $region = Region::find($id);

        if (!$region) {
            return ApiResponse::notFound('Region not found');
        }

        // Isi data dengan data yang sudah tervalidasi
        $region->fill($request->validated());
        $region->save();

        return ApiResponse::success(
            $region->fresh(),
            'Region updated successfully'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $region = Region::find($id);

        if (!$region) {
            return ApiResponse::notFound('Region not found');
        }

        $region->delete();

        return ApiResponse::success(null, 'Region deleted');
    }
}
