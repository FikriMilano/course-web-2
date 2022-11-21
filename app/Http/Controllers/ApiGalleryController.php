<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class ApiGalleryController extends Controller
{


    /**
     * @OA\Get(
     *     path="/api/gallery2",
     *     tags={"gallery"},
     *     summary="Returns a Sample API response",
     *     description="A sample gallery2 to test out the API",
     *     operationId="gallery2",
     * @OA\Response(
     *         response="default",
     * description="successful operation" *)
     *)
     */
    public function gallery2(Request $request)
    {
        $data = array(
            'id' => 'posts',
            'menu' => 'Gallery',
            'galleries' => Education::where('picture', '!=', '')
                ->whereNotNull('picture')
                ->orderBy('created_at', 'desc')
                ->paginate(30)
        );

        return $data;
    }
}
