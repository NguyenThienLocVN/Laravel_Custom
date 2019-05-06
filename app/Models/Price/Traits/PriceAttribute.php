<?php

namespace App\Models\Price\Traits;

/**
 * Class PriceAttribute.
 */
trait PriceAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-price", "admin.prices.edit").'
                '.$this->getDeleteButtonAttribute("delete-price", "admin.prices.destroy").'
                </div>';
    }
}
