<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementStudentController extends Controller
{
    public function DataAnnouncement(){
        $dataAnnouncement = Announcement::latest('post_date', 'ASC')->where('id_user', '=', 0)->paginate(5);
        return view('student.announcement.data_announcement', compact( 'dataAnnouncement'));
    }

    public function ViewAnnouncement($id){
        $announcement = Announcement::findOrFail($id);
        return view('student.announcement.data_announcement',compact('announcement'));
    }
}
