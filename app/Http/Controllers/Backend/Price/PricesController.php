<?php

namespace App\Http\Controllers\Backend\Price;

use App\Models\Price\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Price\CreateResponse;
use App\Http\Responses\Backend\Price\EditResponse;
use App\Repositories\Backend\Price\PriceRepository;
use App\Http\Requests\Backend\Price\ManagePriceRequest;
use App\Http\Requests\Backend\Price\EditPriceRequest;
use App\Http\Requests\Backend\Price\UpdatePriceRequest;

/**
 * PricesController
 */
class PricesController extends Controller
{
    /**
     * variable to store the repository object
     * @var PriceRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PriceRepository $repository;
     */
    public function __construct(PriceRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Price\ManagePriceRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManagePriceRequest $request)
    {
        return new ViewResponse('backend.prices.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Price\Price  $price
     * @param  EditPriceRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Price\EditResponse
     */
    public function edit(Price $price, EditPriceRequest $request)
    {
        return new EditResponse($price);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePriceRequestNamespace  $request
     * @param  App\Models\Price\Price  $price
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdatePriceRequest $request, Price $price)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $price, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.prices.index'), ['flash_success' => trans('alerts.backend.prices.updated')]);
    }
    
}
