<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResources;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:tests|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->getApi(null, "401", $validator->errors());
            // return  $validator->$validator->safe()->only(['title', 'body']);;
        }

        // $data = Test::create($request->all());
        $data = new Test();
        $data->title = $request->title;
        $data->body = $request->body;
        $data->save();
        if ($data) {
            return $this->getApi(new PostResources($data), "201", "Created");
        } else {
            return $this->getApi(null, "400", "Created is not a valid");
        }
        return $data;
    }
    public function update(Request $request, $id)
    {
        $data = Test::find($id);


        // $data = Test::find($id);

        if ($data) {
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255|unique:tests,title,' . $id,
                'body' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->getApi(null, "401", $validator->errors());
            }

            $data->title = $request->title;
            $data->body = $request->body;
            $data->save();
            return $this->getApi(new PostResources($data), "201", "Created");
        } else {
            return $this->getApi(null, "400", "update is not a valid");
        }
        // return $data;
    }
    public function destroy($id)
    {
        $data = Test::find($id);
        if (!$data) {
            return $this->getApi($id, "404", "the post is not found");
        } else {
            $data->delete();
            return $this->getApi((new PostResources($data))["title"], "200", "delete post is successful");
        }
    }
}