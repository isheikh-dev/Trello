<?php

namespace UserModule\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthLoginResource extends JsonResource
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
            'data' => [
                'access_token'  => $this->access_token, 
            ] ,
            'status' => 'Success' ,
            'status_code' => 200
        ];
    }
}
