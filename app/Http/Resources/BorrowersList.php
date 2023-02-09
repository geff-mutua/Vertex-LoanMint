<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BorrowersList extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"=>1,
            "avatar"=>"10.png",
            "full_name"=>"Korrie O'Crevy",
            "kim"=>'kiom',
            "post"=>"Nuclear Power Engineer",
            "email"=>"kocrevy0@thetimes.co.uk",
            "city"=>"Krasnosilka",
            "start_date"=>"09/23/2021",
            "salary"=>"$23896.35",
            "age"=>"61",
            "experience"=>"1 Year",
            "status"=>2
        ];
    }
}
