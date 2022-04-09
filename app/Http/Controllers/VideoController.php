<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoList;
use App\Models\Video;

class VideoController extends Controller
{
    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    public function index()
    {
        $data = $this->video->all();
        return view('index', compact('data'));
    }

    public function create()
    {
        return view('crud.create');
    }

    public function store(Request $req)
    {
        $data = $req->all();
        $this->video->create($data);
        return redirect('/video');
    }

    public function edit($id)
    {
        $data = $this->video->findOrFail($id);
        return view('crud.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $data = $req->except('_token', '_method');
        $this->video->where("id", $id)->update($data);
        return redirect('/video');
    }

    public function destroy($id)
    {
        $link = VideoList::where('video_id', $id)->delete();
        $data = $this->video->findOrFail($id)->delete();
        return redirect('/video');
    }
}
