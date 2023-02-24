<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentHistoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name'  => $this -> name,
            'last_name' => $this -> last_name,
            'labor_profile' => $this -> labor_profile,
            'amount' => $this -> amount,
          ];
    }
}
