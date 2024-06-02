<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait RenderToJson
{
    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'errpr' => class_basename($this),
            'message' => $this->getMessage(),
        ], $this->getCode());
    }
}
