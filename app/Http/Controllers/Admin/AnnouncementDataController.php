<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnnouncementDataController extends Controller
{
    public function DataAnnouncement(){
        $dataAnnouncement = Announcement::latest('post_date', 'ASC')->paginate(5);
        return view('admin.announcement.data_announcement', compact( 'dataAnnouncement'));
    }

    public function AddAnnouncement(Request $request) {
        $addAnnouncement = new Announcement();

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'detail_information' => ['required', 'string'],
        ]);

        $addAnnouncement->title = $request->input('title');
        $addAnnouncement->detail_information = $request->input('detail_information');
        $addAnnouncement->id_user = $request->input('id_user');
        $addAnnouncement->post_date = Carbon::now();
        $addAnnouncement->valid_date = $request->input('valid_date');

        $addAnnouncement->save();

        return redirect()->back();
    }

    public function EditAnnouncement($id){
        $announcement = Announcement::findOrFail($id);
        return view('admin.announcement.data_announcement',compact('announcement'));
    }

    public function UpdateAnnouncement(Request $request){
        $anouncement_id = $request->id;

        Announcement::findOrFail($anouncement_id)->update([
            'title' => $request->title,
            'detail_information' => $request->detail_information,
            'id_user' => $request->id_user,
            'valid_date' => $request->valid_date,
        ]);

        return redirect()->back();
    }

    public function DeleteAnnouncement($id){
        Announcement::findOrFail($id)->delete();

        return redirect()->back();
    }
}
