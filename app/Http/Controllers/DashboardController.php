<?php

namespace App\Http\Controllers;

use App\Models\RaceData;
use App\Models\Relative;
use App\Models\Squad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $members = User::whereRoleIs('member')->paginate(4);
            $coaches = User::whereRoleIs('coach')->paginate(4);
            return view('dashboard',['members'=>$members, 'coaches'=>$coaches]);
        } elseif (Auth::user()->hasRole('coach')) {
            $squads = Squad::where('employee_id', Auth::user()->id)->get();
            $members = User::where('coach_id', Auth::id())->paginate(4);
            return view('coachdash', ['squads' => $squads, 'members' => $members]);
        } elseif (Auth::user()->hasRole('member')) {
            $relative = User::find(Auth::id())->relative;
            return view('memberdash', ['relative'=> $relative]);
        } elseif (Auth::user()->hasRole('parent')) {
            return view('memberdash');
        } else {
            return view('login');
        }
    }

    public function myprofile()
    {
//        $member = null;
        if(Auth::user()->hasRole('parent')){
            $relatives = Relative::all();
            foreach($relatives as $relative){
                Log::error("relative: ". $relative->email . ' Current: '. Auth::user()->email);
                if($relative->email == Auth::user()->email){
                    Log::error('Equal' . ' Id is: ' . $relative->id);
                    $member = User::where('relative_id', $relative->id)->first();
                    Log::error("member: ". $member->email);
                    break;
                } else {
                    Log::error('Not Equal');
                }
            }
            return view('myprofile', ['member'=>$member]);
        } else {
            return view('myprofile');
        }


    }

    public function editProfile()
    {
        return view('editProfile');
    }

    public function viewspd()
    {
        Log::error("in viewSPD");
        $member = User::find(Auth::id());
        $swimData = $member->swimMetrics;
        foreach ($swimData as $data) {
            Log::error($data->distance);
            Log::error($data->first_name);
        }

        return view('viewspd', ['swimData' => $swimData]);
    }

    public function showCompareSpd()
    {
        $members = User::whereRoleIs('member')->get();

        return view('comparespd', ['members' => $members, 'member1' => [], 'member2' => []]);
    }

    public function compareSpd(Request $request)
    {
        $request->validate([
            'choose'=>'required',
            'choose2'=>'required',
        ]);

        $member1 = User::find($request->input('choose'));
        $member2 = User::find($request->input('choose2'));

        $swimData1 = $member1->swimMetrics;
        $swimData2 = $member2->swimMetrics;

        Log::error(' Count: ' . count($swimData2));

        $members = User::whereRoleIs('member')->get();

        return view('comparespd', ['member1' => $swimData1, 'member2' => $swimData2, 'members' => $members]);
    }


    public function createSquad()
    {
        return view('createSquad');
    }

    public function viewSquad($id)
    {
        $squad = Squad::find($id);
        $members = Squad::find($id)->users;
        return view('viewSquad', ['squad' => $squad, 'members' => $members]);
    }

    public function editSquad($id)
    {
        $squad = Squad::find($id);
        return view('editSquad', ['squad' => $squad]);
    }

    public function updateSquad(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'count' => 'required|numeric|max:255',
        ]);

        Log::error('This is errors printed by me' . 'Id is:' . $request->input('id') . ' ' . $request->input('name'));

        $squad = Squad::find($request->input('id'));

        Log::error($squad);

        $squad->name = $request->input('name');
        $squad->member_count = $request->input('count');

        $squad->save();

        $squads = Squad::where('employee_id', Auth::id())->get();
        $members = User::where('coach_id', Auth::id())->paginate(4);
        return view('coachdash', ['squads' => $squads, 'members'=>$members]);
    }

    public function viewMembers()
    {
        $members = User::whereRoleIs('member')->paginate(4);
        return view('dashboard', ['members' => $members]);
    }

    public function viewCoaches()
    {
        $coaches = User::whereRoleIs('coach')->paginate(4);
        return view('viewCoaches', ['coaches' => $coaches]);
    }

    public function insertSquad(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'count' => 'required|numeric|max:255',
        ]);

        $squad = Squad::create([
            'name' => $request->name,
            'member_count' => $request->count,
            'current_member_count' => 0,
            'employee_id' => Auth::user()->id,
        ]);

        $squad->save();
        $squads = Squad::where('employee_id', Auth::user()->id)->get();
        $members = User::where('coach_id', Auth::id())->paginate(4);
        return view('coachdash', ['squads' => $squads, 'members'=>$members]);
    }

    public function editDetails(Request $request)
    {
        $request->validate([
            'lastname' => 'required|string|max:255',
            'age' => 'required|numeric|max:255',
            'address1' => 'required|string|max:255',
            'address2' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
        ]);

        $user = User::find(Auth::id());

        $user->first_name = Auth::user()->first_name;
        $user->last_name = $request->input('lastname');
        $user->age = $request->input('age');
        $user->address1 = $request->input('address1');
        $user->address2 = $request->input('address2');
        $user->city = $request->input('city');
        $user->post_code = $request->input('postcode');

        $user->save();
        Log::info($user->wasChanged());
        return redirect()->route('dashboard.myprofile');
    }

    public function getEditChildDetailsPage($id){
        $member = User::find($id);
        return view('editChildProfile', ['member'=>$member]);
    }

    public function editChildDetails(Request $request)
    {
        $request->validate([
            'lastname' => 'required|string|max:255',
            'age' => 'required|numeric|max:255',
            'address1' => 'required|string|max:255',
            'address2' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
        ]);

        $user = User::find($request->input('id'));

        Log::error('user Obj: ' . $user->first_name);

        $user->first_name = $user->first_name;
        $user->last_name = $request->input('lastname');
        $user->age = $request->input('age');
        $user->address1 = $request->input('address1');
        $user->address2 = $request->input('address2');
        $user->city = $request->input('city');
        $user->post_code = $request->input('postcode');

        $user->save();
        Log::info($user->wasChanged());
        return redirect()->route('dashboard.myprofile');
    }

    public function deleteRaceData($id){
        $raceData = RaceData::find($id);
        $raceData->delete();
        return redirect()->back();
    }

    public function validateRaceData($id){
        $raceData = RaceData::find($id);
        $raceData->validate = true;
        $raceData->save();
        return redirect()->back();
    }

    public function editRaceData($id){
        $raceData = RaceData::find($id);
        $member = User::find($raceData->user_id);
        return view('editRaceData', ['raceData'=>$raceData, 'member'=>$member]);
    }

    public function updateRaceData(Request $request){
        $request->validate([
            'id'=>'required',
            'raceid'=>'required',
            'tournament'=>'required|string|max:255',
            'swimstroke'=>'required|string|max:255',
            'course'=>'required|string|max:255',
            'competition'=>'required|string|max:255',
            'position'=>'required|numeric|max:255',
            'updatedby'=>'required|numeric|max:255',
        ]);
        $member = User::find($request->input('id'));

        $raceData = RaceData::find($request->input('raceid'));

        $raceData->tournament = $request->input('tournament');
        $raceData->swim_stroke = $request->input('swimstroke');
        $raceData->course = $request->input('course');
        $raceData->competition = $request->input('competition');
        $raceData->position = $request->input('position');
        $raceData->updated_by = $request->input('updatedby');

        $member->raceData()->save($raceData);

        return redirect()->route('dashboard.viewRaceData');
    }

    public function getAssignCoachPage($id){
        $member = User::find($id);

        $coaches = User::whereRoleIs('coach')->get();

        return view('assignCoach', ['member'=>$member, 'coaches'=>$coaches]);
    }

    public function updateCoach(Request $request){
        $request->validate([
            'coach'=> 'required|numeric|max:255',
            'id'=> 'required|numeric|max:255',
        ]);

        $member = User::find($request->input('id'));

        $member->coach_id = $request->input('coach');

        $member->save();

        return redirect()->route('dashboard');


    }

}

