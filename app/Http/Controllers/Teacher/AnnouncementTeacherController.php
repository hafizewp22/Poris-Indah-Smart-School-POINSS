<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementTeacherController extends Controller
{
    public function DataAnnouncement(){
        $dataAnnouncement = Announcement::latest('post_date', 'ASC')->where('id_user', '=', 2)->paginate(5);
        return view('teacher.announcement.data_announcement', compact( 'dataAnnouncement'));
    }

    public function ViewAnnouncement($id){
        $announcement = Announcement::findOrFail($id);
        return view('teacher.announcement.data_announcement',compact('announcement'));
    }
}
