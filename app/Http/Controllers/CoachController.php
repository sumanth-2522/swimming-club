<?php

namespace App\Http\Controllers;

use App\Models\RaceData;
use App\Models\Squad;
use App\Models\SwimMetric;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CoachController extends Controller
{
    public function addMembersToSquad($id){
        Log::error('Squad id in: ' . $id);
        $squad = Squad::find($id);
        $members = User::where('coach_id', Auth::id())->get();

        return view('addMembers',['members'=>$members, 'squad'=>$squad]);
    }

    public function insertSquadMembers(Request $request){
        $request->validate([
            'members' => 'required',
        ]);

        $members = $request->input('members');
        $squad = Squad::find($request->input('squadId'));

        foreach ($members as $member){
            Log::error('Id is '. $member . ' and Squad id is: ' . $squad->id);
            $member = User::find($member);
            $member->squad_id = $squad->id;

            $member->save();
        }

        $squads = Squad::where('employee_id', Auth::user()->id)->get();
        $members1 = User::where('coach_id', Auth::id())->paginate(4);
        return view('coachdash', ['squads'=>$squads, 'members'=>$members1]);

    }

    public function removeSquadMembers($id){
        Log::error('Squad id in: ' . $id);
        $squad = Squad::find($id);
        $members = Squad::find($id)->users;
        return view('removeMembers',['members'=>$members, 'squad'=>$squad]);
    }

    public function deleteSquadMembers(Request $request){

        $request->validate([
            'members' => 'required',
        ]);
        $members = $request->input('members');
        $squad = Squad::find($request->input('squadId'));

        foreach ($members as $member){
            Log::error('Id is '. $member . ' and Squad id is: ' . $squad->id);
            $member = User::find($member);
            $member->squad_id = 0;

            $member->save();
        }

        $squads = Squad::where('employee_id', Auth::user()->id)->get();
        $members1 = User::where('coach_id', Auth::id())->paginate(4);
        return view('coachdash', ['squads'=>$squads, 'members'=>$members1]);

    }

    public function addTrainingSPD($id){
        $member = User::find($id);
        return view('coach.createSPD', ['member'=>$member]);
    }

    public function insertTrainingSPD(Request $request){
        $request->validate([
            'id'=>'required|numeric|max:255',
            'time'=>'required|numeric|max:255',
            'heartrate'=>'required|numeric|max:255',
            'distance'=>'required|numeric|max:255',
            'pace'=>'required|numeric|max:255',
            'strokecount'=>'required|numeric|max:255',
            'strokerate'=>'required|numeric|max:255',
            'calories'=>'required|numeric|max:255',
            'distanceperstroke'=>'required|numeric|max:255',
            'updatedby'=>'required|numeric|max:255',

        ]);
        $member = User::find($request->input('id'));

        $swimData = new SwimMetric([
            'time' => $request->input('time'),
            'heart_rate' =>$request->input('heartrate'),
            'distance'=>$request->input('distance'),
            'pace'=>$request->input('pace'),
            'stroke_count'=>$request->input('strokecount'),
            'stroke_rate'=>$request->input('strokerate'),
            'calories'=>$request->input('calories'),
            'distance_per_stroke'=>$request->input('distanceperstroke'),
            'updated_by'=>$request->input('updatedby'),
        ]);

        $member->swimMetrics()->save($swimData);

        $squads = Squad::where('employee_id', Auth::user()->id)->get();
        $members = User::where('coach_id', Auth::id())->paginate(4);

        return view('coachdash',['squads' => $squads, 'members' => $members]);
    }

    public function insertRaceData(Request $request){

        $request->validate([
            'id'=>'required',
            'tournament'=>'required|string|max:255',
            'swimstroke'=>'required|string|max:255',
            'course'=>'required|string|max:255',
            'competition'=>'required|string|max:255',
            'position'=>'required|numeric|max:255',
            'updated_by'=>'required|numeric|max:255',
        ]);
        $member = User::find($request->input('id'));

        $raceData = new RaceData([
            'tournament' => $request->input('tournament'),
            'swim_stroke' =>$request->input('swimstroke'),
            'course'=>$request->input('course'),
            'competition'=>$request->input('competition'),
            'position'=>$request->input('position'),
            'updated_by'=>$request->input('updatedby'),
        ]);

        $member->raceData()->save($raceData);

        $squads = Squad::where('employee_id', Auth::user()->id)->get();
        $members = User::where('coach_id', Auth::id())->paginate(4);
        return view('coachdash', ['squads' => $squads, 'members' => $members]);
    }

    public function addRaceData($id){
        $member = User::find($id);
        return view('coach.createRaceData', ['member'=>$member]);
    }

    public function getRaceData(){
        $raceData = RaceData::paginate(5);
        $members = User::whereRoleIs('member')->get();
        return view('viewRaceData', ['raceData' => $raceData, 'members'=>$members]);
    }

}
