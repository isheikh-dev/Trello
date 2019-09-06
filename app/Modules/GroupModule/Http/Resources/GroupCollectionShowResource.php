<?php

namespace GroupModule\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupCollectionShowResource extends JsonResource
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
