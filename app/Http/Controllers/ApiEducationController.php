<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

///**
// * @OA\Info(
// *     description="Contoh API doc menggunakan OpenAPI/Swagger",
// *     version="0.0.1",
// *     title="Contoh API documentation",
// *     termsOfService="http://swagger.io/terms/",
// *     @OA\Contact(
// *         email="choirudin.emchagmail.com"
// *     ),
// *     @OA\License(
// *         name="Apache 2.0",
// * url="http://www.apache.org/licenses/LICENSE-2.0.html" *)
// *)
// */
class ApiEducationController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/gallery",
     *     tags={"gallery"},
     *     summary="Returns a Sample API response",
     *     description="A sample gallery to test out the API",
     *     operationId="gallery",
     * @OA\Response(
     *         response="default",
     * description="successful operation" *)
     *)
     */
    public function gallery(Request $request)
    {

        $data = array(
            'id' => 'educations',
            'educations' => Education::orderBy('created_at', 'desc')->paginate(10)
        );

        return $data;
    }
}
