<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use App\Models\ForumDetail;
use App\Models\Subjects;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumStudentController extends Controller {

    public function DataForum() {
        $userSubject = Subjects::latest('name_subject', 'ASC')
            ->join('class_details', 'subjects.id_class', '=', 'class_details.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();

        $userClass = Subjects::latest('name_subject', 'ASC')
            ->join('class_details', 'subjects.id_class', '=', 'class_details.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();

        $userForum = Forum::join('subjects', 'forums.id_subject', '=', 'subjects.id_sub')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'subjects.id_class', '=', 'class_details.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();

        return view('student.forum.data_forum', compact('userSubject', 'userForum', 'userClass'));
    }

    public function SearchForum(Request $request) {
        $userSubject = Subjects::latest('name_subject', 'ASC')
            ->join('class_details', 'subjects.id_class', '=', 'class_details.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();

        $userClass = Subjects::latest('name_subject', 'ASC')
            ->join('class_details', 'subjects.id_class', '=', 'class_details.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();

        $search_query_subject = $request->query('SearchSubject');

        $userForum = Forum::join('subjects', 'forums.id_subject', '=', 'subjects.id_sub')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'subjects.id_class', '=', 'class_details.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->where('subjects.id_sub', "LIKE", "%$search_query_subject%")
            ->get();

        return view('student.forum.data_forum', compact('userSubject', 'userForum', 'userClass'));
    }

    public function AddForum(Request $request) {
        $addForum = new Forum();

        $request->validate([
            'id_subject' => ['required'],
            'title_forum' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        $addForum->id_subject = $request->input('id_subject');
        $addForum->title_forum = $request->input('title_forum');
        $addForum->id_user_full = Auth::user()->id;
        $addForum->description = $request->input('description');
        $addForum->done = '0';
        $addForum->date_forum = Carbon::now();

        $addForum->save();
        return redirect()->back();
    }

    public function UpdateForum(Request $request){
        $forum_id = $request->id_forum;

        Forum::findOrFail($forum_id)->update([
            'title_forum' => $request->title_forum,
            'description' => $request->description,
            'done' => '1',
            'date_forum' => Carbon::now(),
        ]);

        return redirect()->back();
    }

    public function DeleteForum($id){
        Forum::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function ViewForum($id){
        $forums = Forum::findOrFail($id);
        $forumDetails = ForumDetail::join('forums', 'forum_details.id_forum', '=', 'forums.id_forum')
            ->where('forum_details.id_forum', '=', $id)
            ->get();

        return view('student.forum.view_forum', compact( 'forums', 'forumDetails'));
    }

    public function AddForumDetail(Request $request) {
        $addForum = new ForumDetail();

        $request->validate([
            'description_detail' => ['required', 'string'],
        ]);

        $addForum->id_forum = $request->input('id_forum');
        $addForum->id_user_full1 = Auth::user()->id;
        $addForum->description_detail = $request->input('description_detail');
        $addForum->done_detail = '0';
        $addForum->date_forum_detail = Carbon::now();

        $addForum->save();
        return redirect()->back();
    }

    public function DeleteForumDetail($id){
        ForumDetail::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function UpdateForumDetail(Request $request){
        $forum_detail_id = $request->id_forum_detail;

        ForumDetail::findOrFail($forum_detail_id)->update([
            'description_detail' => $request->description_detail,
            'done_detail' => '1',
            'date_forum_detail' => Carbon::now(),
        ]);

        return redirect()->back();
    }
}


