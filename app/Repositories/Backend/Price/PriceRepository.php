<?php

namespace App\Repositories\Backend\Price;

use DB;
use Carbon\Carbon;
use App\Models\Price\Price;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PriceRepository.
 */
class PriceRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Price::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.prices.table').'.id',
                config('module.prices.table').'.created_at',
                config('module.prices.table').'.updated_at',
            ]);
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Price $price
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Price $price, array $input)
    {
    	if ($price->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.prices.update_error'));
    }

}
