<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    public function index()
    {

        $berita = Berita::all();

        $response = [

            'message' => 'List Data Berita',
            'data' => $berita

        ];

        return response()->json($response, Response::HTTP_OK);
    }
}
