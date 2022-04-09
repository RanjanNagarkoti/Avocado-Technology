<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoList;
use App\Models\Video;
use Illuminate\Support\Facades\DB;

class VideoListController extends Controller
{
    public function __construct(VideoList $videoList)
    {
        $this->videoList = $videoList;
    }

    public function index($id)
    {
        $data = Video::find($id);
        $links = Video::find($id)->getLink;
        return view('link.index', compact('data', 'links'));
    }

    public function create($id)
    {
        $data = Video::find($id);
        return view('link.create', compact('data'));
    }

    public function store(Request $req, $id)
    {
        $data = $req->except('_token');
        $name = array($data);
        for ($i = 0; $i <= count($data) - 2; $i++) {
            array_push($name, ['link' => $data['link' . $i], 'video_id' => $id, 'name' => $data['name']]);
        }
        unset($name[0]);
        DB::table('video_lists')->insert($name);
        return redirect('/video');
    }

    public function destroy($id)
    {
        $data = $this->videoList->findorFail($id)->delete();
        return redirect('/video');
    }

    public function edit($id)
    {
        $data = VideoList::findOrFail($id);
        return view('link.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $data = $req->all('link');
        $this->videoList->where('id', $id)->update($data);
        return redirect('/video');
    }
}
