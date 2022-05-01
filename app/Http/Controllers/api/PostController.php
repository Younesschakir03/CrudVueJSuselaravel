<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResources;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use App\Http\Controllers\api;

class PostController extends Controller
{
    public function index()
    {
        $datas = DB::table('tests')->get();
        if ($datas) {
            return $this->getApi(PostResources::collection($datas), "200", "ok");
        } else {
            return $this->getApi(null, "401", "the post was not found");
        }
    }

    public function show($id)
    {
        $data = Test::find($id);
        if ($data) {
            return $this->getApi(new PostResources($data), "200", "ok");
        } else {
            return $this->getApi(null, "401", "the post was not found");
        }
    }
    public function getApi($data = null, $status = null, $message = null)
    {
        $array = [
            'data' => $data,
            'satatus' => $status,
            'message' => $message
        ];
        return response($array);
    }
    public function store(Request $request)
    {
        Test::create($request->all());
    }
}