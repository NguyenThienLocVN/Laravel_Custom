<?php

namespace App\Http\Controllers\Backend\Price;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Price\PriceRepository;
use App\Http\Requests\Backend\Price\ManagePriceRequest;

/**
 * Class PricesTableController.
 */
class PricesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PriceRepository
     */
    protected $price;

    /**
     * contructor to initialize repository object
     * @param PriceRepository $price;
     */
    public function __construct(PriceRepository $price)
    {
        $this->price = $price;
    }

    /**
     * This method return the data of the model
     * @param ManagePriceRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePriceRequest $request)
    {
        return Datatables::of($this->price->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($price) {
                return Carbon::parse($price->created_at)->toDateString();
            })
            ->addColumn('actions', function ($price) {
                return $price->action_buttons;
            })
            ->make(true);
    }
}
