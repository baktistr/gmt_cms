<?php

namespace App\Http\Controllers\Api\Staticpages;

use App\Asset;
use App\Http\Controllers\Controller;
use App\Http\Resources\StaticPagesResource;
use App\StaticPages;
use Illuminate\Http\Resources\Json\JsonResource;

class StaticPagesController extends Controller
{
    /**
     * Show Static pages
     * 
     * @return Illuminate\Http\Resources\Json\JsonResource
     * @param $slug 
     */
    public function show(StaticPages $slug) : JsonResource
    {
        return new StaticPagesResource($slug);
    }
}
