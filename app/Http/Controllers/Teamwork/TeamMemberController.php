<?php

namespace App\Http\Controllers\Teamwork;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Mpociot\Teamwork\Facades\Teamwork;
use Mpociot\Teamwork\TeamInvite;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\True_;

//use DB; 

class TeamMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$data['xusers'] = User::all();
        $data['xusers'] = User::orderBy('id','DESC')->get();
        $teamModel = config('teamwork.team_model');
        //$team = $teamModel::findOrFail($id);
        $data['team'] = $teamModel::findOrFail($id);
        //return view('teamwork_master.members.member_list')->withTeam($team);
        return view('teamwork_master.members.member_list',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function adduser(Request $request, $teamid)
    {
        //$where=array('id' => $request->id,'current_team_id' => $team_id );
        //$user = User::where('id', $request->id)->where('current_team_id', $teamid )->get()->toArray();
        // $user = DB::select("SELECT * FROM `users` WHERE `id`=$request->id ");

        $user = User::where('id', $request->id)->first();
        if($user->current_team_id != "" ){
            if($user->current_team_id == $teamid ){
                return redirect()->back()->withErrors([
                'id' => 'This User Is Already In This Team.',
                ]);
            }else{
                return redirect()->back()->withErrors([
                'id' => 'This User Is Another Team Member.',
                ]);
            }
        }else{
            $team_user=config('teamwork.team_user_table');
            $team = DB::table($team_user)->insert([
                'user_id'=>$request->id,
                'team_id'=> $teamid,
            ]);
            $user = User::where('id',$request->id)->update(['current_team_id'=>$teamid]);

            return redirect()->back()->with('success','Team Member Are Now Added');
        }

        // $user = DB::table('team_user')
        //->where('user_id', $request->id)->where('team_id', $teamid )->get()->toArray();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($team_id, $user_id)
    {
        $teamModel = config('teamwork.team_model');
        $team = $teamModel::findOrFail($team_id);
        
        if (! auth()->user()->isOwnerOfTeam($team)) {
            abort(403);
        }

        $userModel = config('teamwork.user_model');
        $user = $userModel::findOrFail($user_id);
        if ($user->getKey() === auth()->user()->getKey()) {
            abort(403);
        }

        $user->detachTeam($team);

        return redirect()->route('teams.index');
    }
    public function invite(Request $request, $team_id)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $teamModel = config('teamwork.team_model');
        $team = $teamModel::findOrFail($team_id);

        if (! Teamwork::hasPendingInvite($request->email, $team)) {
            Teamwork::inviteToTeam($request->email, $team, function ($invite) {
                Mail::send('teamwork_master.emails.invite', ['team' => $invite->team, 'invite' => $invite], function ($m) use ($invite) {
                    $m->to($invite->email)->subject('Invitation to join team '.$invite->team->name);
                });
                // Send email to user
            });
        } else {
            return redirect()->back()->withErrors([
                'email' => 'The email address is already invited to the team.',
            ]);
        }

        return redirect()->route('teams.members.show', $team->id);
    }
    public function resendInvite($invite_id)
    {
        $invite = TeamInvite::findOrFail($invite_id);
        Mail::send('teamwork_master.emails.invite', ['team' => $invite->team, 'invite' => $invite], function ($m) use ($invite) {
            $m->to($invite->email)->subject('Invitation to join team '.$invite->team->name);
        });

        return redirect()->route('teams.members.show', $invite->team);
    }
}
