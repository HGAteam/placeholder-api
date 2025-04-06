<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceholderRequest;
use App\Services\ImagePlaceholderService;

class PlaceholderController extends Controller
{
    public function __construct(protected ImagePlaceholderService $service)
    {}

    public function generate(PlaceholderRequest $request)
    {
        try {
            $data = $request->validated();
            $size = $data['size'] ?? '300x200';
            $format = strtolower($request->get('format', 'png'));
    
            $image = $this->service->generate($size, $data);
    
            return response($image)->header('Content-Type', "image/{$format}");
        } catch (\Throwable $e) {
            return response()->json([
                'error' => 'Error generating image',
                'message' => $e->getMessage(),
            ], 422); // 422 o 400 según corresponda
        }
    }
    
}
