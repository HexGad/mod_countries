<?php

namespace HexGad\Countries\Http\Controllers;

use HexGad\Countries\Models\Country;
use HexGad\Countries\Http\DataTables\CountriesDataTable;
use HexGad\Countries\Http\Requests\StoreCountriesRequest;
use HexGad\Countries\Http\Requests\UpdateCountriesRequest;
use App\Exceptions\ApiException;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param CountriesDataTable $datatable
     * @return Renderable|JsonResponse
     */
    public function index(CountriesDataTable $datatable): Renderable|JsonResponse
    {
        return $datatable->render('countries::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('countries::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCountriesRequest $request
     *
     * @return JsonResponse
     * @throws ApiException
     */
    public function store(StoreCountriesRequest $request): JsonResponse
    {
        if($country = Country::create($request->validated()))
            return response()->json($country);

        throw new ApiException;
    }

    /**
     * Show the specified resource.
     *
     * @param Country $country
     *
     * @return Renderable
     */
    public function show(Country $country): Renderable
    {
        return view('countries::show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Country $country
     *
     * @return Renderable
     */
    public function edit(Country $country): Renderable
    {
        return view('countries::edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCountriesRequest $request
     * @param Country $country
     *
     * @return JsonResponse
     * @throws ApiException
     */
    public function update(UpdateCountriesRequest $request, Country $country): JsonResponse
    {
        if($country->update($request->validated()))
            return response()->json($country);

        throw new ApiException;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Country $country
     *
     * @return JsonResponse
     * @throws ApiException
     */
    public function destroy(Country $country): JsonResponse
    {
        if($country->delete())
            return response()->json($country);

        throw new ApiException;
    }
}
