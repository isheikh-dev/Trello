<?php

namespace TaskModule\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskCollectionShowResource extends JsonResource
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
