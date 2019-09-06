<?php

namespace CategoryModule\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListShowResource extends JsonResource
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
            'data'       => [
                                'title' => $this->title
                            ]
            , 
            'status'     => 'Success',
            'statusCode' => 200
        ];
    }
}
