<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoPlayerController extends Controller
{
    public function videoPlayerisVideo()
    {
        $groups = Video::distinct('group')->get(['group', 'photo']);
        return view('video_playeris_video', ['groups' => $groups]);
    }

    public function videoPlayerisVideoGroup($group)
    {
        $groups = Video::select('group', 'photo')->distinct()->get();
        $videos = Video::where('group', $group)->get();
        return view('video_playeris_video', ['groups' => $groups, 'videos' => $videos]);
    }
}
