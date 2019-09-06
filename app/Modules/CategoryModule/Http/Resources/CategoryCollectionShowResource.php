<?php

namespace CategoryModule\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryCollectionShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data'       => $this->collection , 
            'status'     => 'Success',
            'statusCode' => 200
        ];
    }
}
