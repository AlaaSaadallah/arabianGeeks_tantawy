<?php

namespace Modules\CartModule\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class CartItemResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "item_id" => $this->item_id,
            "item_type" => $this->item_type,
            "name" => ($this->item_type == 'test') ? $this->test->name :  $this->package->name,
            "price" => ($this->item_type == 'test') ? $this->test->price :  $this->package->price,
            "qty" => $this->qty,
        ];
    }
}
