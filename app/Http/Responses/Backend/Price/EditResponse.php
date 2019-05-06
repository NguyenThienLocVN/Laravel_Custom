<?php

namespace App\Http\Responses\Backend\Price;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Price\Price
     */
    protected $prices;

    /**
     * @param App\Models\Price\Price $prices
     */
    public function __construct($prices)
    {
        $this->prices = $prices;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.prices.edit')->with([
            'prices' => $this->prices
        ]);
    }
}