<?php

namespace App\Http\Controllers;

use App\Revision;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\application;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function new(){
        $user = User::Where('role', 'General Manager')->orWhere('role', 'Manager')->get();
        return view('request.new', ['user'=>$user]);
    }

    public function post(Request $req){
        $new = new application();
        $new->batch_number = 1..rand(1,1000);
        $new->applicationtitle = $req->applicationtitle;
        $new->request_text = $req->request_text;
        $new->costcode = $req->costcode;
        $new->authorizedby = $req->authorizedby;
        $new->acceptedby = $req->acceptedby;
        $new->daterequest = substr($req->daterange, 0, 10);
        $new->dateexpected = substr($req->daterange, 13, 10);
        $new->status = "Request";
        $new->requester_id = Auth::user()->id;
        $new->approved = 0;
        $new->save();

        return redirect()->route('request.view');
    }

    public function view(){
        $id = Auth::user()->id;
        $role = Auth::user()->role;

        if($role == "Manager"){
            $application = application::Where('authorizedby', $id)->where('status', 'Request')->orWhere('status', 'Done')->get();
        }elseif($role == "General Manager"){
            $application = application::Where('authorizedby', $id)->where('status', 'Request')->orWhere('status', 'Done')->get();
        }elseif ($role == "Admin"){
            $application = application::Where('status', 'Proses')->orWhere('status', 'Development')->orWhere('status', 'Done')->get();
        }else{
            $application = application::Where('requester_id', $id)->get();
        }

        return view('request.view', ['application'=>$application]);
    }

    public function edit($id){
        $application = application::find($id);
        return view('request.edit', ['app'=>$application]);
    }

    public function editpost(Request $request){
        $application = application::find($request->id);
        $application->applicationtitle = $request->applicationtitle;
        $application->request_text = $request->request_text;
        $application->save();

        return redirect()->route('request.view');
    }

    public function test(){
        return view('test');
    }

    public function test_regist(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->division = $request->division;
        $user->department = $request->department;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    }

    public function ajax_view_request(Request $request){
        $application = DB::table('requests')->where('requests.id', $request->id)->join('users', 'requests.requester_id', '=', 'users.id')->get();
        $data_array = json_decode(json_encode($application));
        $data_array['request_id'] = $request->id;
        return json_encode($data_array);
    }

    public function ajax_update_request(Request $request){
        $application = application::find($request->id);
        $application->approved = 1;
        $application->status = "Proses";
        $application->save();
        return json_encode($request->id);
    }

    public function ajax_update_request_development(Request $request){
        $application = application::find($request->id);
        $application->status = "Development";
        $application->save();
        return json_encode($request->id);
    }

    public function ajax_update_request_done(Request $request){
        $application = application::find($request->id);
        $application->status = "Done";
        $application->save();
        return json_encode($request->id);
    }

    public function revision($id){
        $application = application::find($id);
        return view('request.revision',['app'=>$application]);
    }

    public function revision_post(Request $request){
        $revision = new Revision();
        $revision->request_id = $request->id;
        $revision->user_id = Auth::user()->id;
        $revision->requester_id = $request->requester;
        $revision->revision = $request->revision;
        $revision->save();

        return redirect()->route('request.view');
    }

    public function revision_list(){
        $id = Auth::user()->id;
        if(Auth::user()->role == "User"){
            $revision = Revision::distinct()->where('requester_id', $id)->get();
        }else{
            $revision = Revision::where('user_id', $id)->get();
        }
        return view('request.revisionlist', ['revision'=>$revision]);
    }
}
