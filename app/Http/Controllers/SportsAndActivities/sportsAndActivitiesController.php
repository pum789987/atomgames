<?php

namespace App\Http\Controllers\SportsAndActivities;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Traits\styleController;
use App\Competition;
use DB;
use Session;
use Illuminate\Pagination\Paginator;

class sportsAndActivitiesController extends Controller
{
    use styleController ;
    public function __construct()
    {

    }
    public function formSchedule(Request $request){
        $data = array(
            'style' => $this->style(),
            'scriptT' => $this->scriptT(),
            'scriptB' => $this->scriptB()
        );
        return view('sports/formSchedule',$data);
    }

    public function getNameOfSnA(Request $request){
        $NameOfSnA = DB::table('type_of_sna')
            ->where([
                ['S_TYPE_FORMAT', $request->SnA],
                ['S_TYPE_GENDER', $request->type],
                ['S_YEAR','=',2019],
            ])
            ->lists(DB::raw('CONCAT(S_NAME_T, " (", S_NAME_E,")") AS S_NAME'),"S_ID");
        return response()->json($NameOfSnA);
    }
    public function get_teamTotal(Request $request){
        $max_id = DB::table('competition')
            ->where([
                ['S_ID', $request->S_ID],
                ['S_YEAR','=',2019],
            ])
            ->max('CP_ID');
        $round_names = DB::table('competition')
            ->select("CP_ROUND_NAME","CP_ROUND_NUM")
            ->where([
                ['S_ID', $request->S_ID],
                ['S_YEAR','=',2019],
                ['CP_ID','=',$max_id],
            ])
            ->get();
        if($round_names){
            $teamTotal = 0;
            foreach ($round_names as $key => $round_name) {
                if($key == 0) {
                    $teamTotal = DB::table('competition')
                        ->select(DB::raw('COUNT(CP_ID) as Total'))
                        ->where([
                            ['S_ID', $request->S_ID],
                            ['S_YEAR', '=', 2019],
                            ['CP_ROUND_NAME', $round_name->CP_ROUND_NAME],
                            ['CP_ROUND_NUM', $round_name->CP_ROUND_NUM],
                        ])
                        ->whereIn('CP_STATUS', ['F', 'B', 'D'])
                        ->get();
                }
            }
            return response()->json($teamTotal);
        }else{
            $teamTotal = DB::table('sna_at_participating_uns')
                ->select(DB::raw('COUNT(PU_ID) as Total'))
                ->where([
                    ['S_ID', $request->S_ID],
                    ['S_YEAR','=',2019],
                ])
                ->get();
            return response()->json($teamTotal);
        }
    }

    public function get_round(Request $request){
        $max_id = DB::table('competition')
            ->where([
                ['S_ID', $request->S_ID],
                ['S_YEAR','=',2019],
            ])
            ->max('CP_ID');
        $round_names = DB::table('competition')
            ->select("CP_ROUND_NAME","CP_ROUND_NUM")
            ->where([
                ['S_ID', $request->S_ID],
                ['S_YEAR','=',2019],
                ['CP_ID','=',$max_id],
            ])
            ->get();
        return response()->json($round_names);
    }
    public function get_Competing(Request $request){
        $result = 0;
        $Check_CP_ID = DB::table('competition')
            ->select("CP_ID","PU_ID","CP_STATUS")
            ->where([
                ['S_ID', $request->S_ID],
                ['S_YEAR', '=', 2019],
                ['CP_ROUND_NAME', $request->CP_ROUND_NAME],
                ['CP_ROUND_NUM', $request->CP_ROUND_NUM],
            ])->get();
        foreach ($Check_CP_ID as $CP_ID) {
            if($CP_ID->CP_STATUS == null || $CP_ID->PU_ID == null){
                $result+=1;
            }
        }
        return response()->json($result);
    }
    public function get_NType(Request $request){
        $Nt = 'true';
        $Ntypes = DB::table('competition')
            ->select(DB::raw('COUNT(MT_ID) as Num_type'))
            ->where([
                ['CP_NUM_PG','=',1],
                ['CP_ROUND_NAME',$request->CP_ROUND_NAME],
            ])
            ->groupBy("MT_ID")
            ->havingRaw("MAX(CP_ROUND_NUM) = MAX(CP_ROUND_NUM)")
            ->get();
        if($Ntypes) {
            foreach ($Ntypes as $Ntype) {
                if ($Ntype->Num_type == 3) {
                    $Nt = 'true';
                }else{
                    $Nt = 'false';
                }
            }
        }
        if($request->S_ID) {
            $beforeID = DB::table('competition')
                ->select(DB::raw('COUNT(CP_ID) as Num_ID'))
                ->where([
                        ['S_ID', $request->S_ID],
                        ['S_YEAR','=', 2019],
                        ['CP_ROUND_NAME', '=', "SF"],
                    ])
                ->get();
            foreach ($beforeID as $beforeIDs) {
                if($beforeIDs->Num_ID == 3){
                    $Nt = 'false';
                }
            }
        }
        return response()->json($Nt);

    }
    public function dataSchedule($min_id ,$max_id){
        $dataSchedule = DB::table('competition')
            ->whereBetween('CP_ID', [$min_id, $max_id])
            ->get();
        return $dataSchedule;
    }
    public function dataSchedule2($S_ID,$CP_ROUND_NAME,$CP_ROUND_NUM){
        $dataSchedule = DB::table('competition')
            ->where([
                ['S_ID',$S_ID],
                ['CP_ROUND_NAME',$CP_ROUND_NAME],
                ['CP_ROUND_NUM',$CP_ROUND_NUM],
                ['S_YEAR','=',2019],
                ])
            ->get();
        return $dataSchedule;
    }

    public function nameNgenderOfS($S_ID){
        $nameNgenderOfS = DB::table('type_of_sna')
            ->select(DB::raw('CONCAT(S_NAME_T, " (", S_NAME_E,")") AS S_NAME'),'S_TYPE_GENDER')
            ->where([
                ['S_ID',$S_ID],
            ])
            ->get();
        return $nameNgenderOfS;
    }
    public function nameOfM($MT_ID){
        $nameOfM = DB::table('match_type')
            ->select('MT_NAME_T','MT_NAME_E')
            ->where([
                ['MT_ID',$MT_ID],
            ])
            ->get();
        return $nameOfM;
    }
    public function beforeID($S_ID,$CP_ID){
        $beforeID = DB::table('competition')
            ->select('CP_ID','CP_NUM_PG')
            ->where([
                ['S_ID',$S_ID],
                ['CP_ID','<',$CP_ID],
            ])
            ->orderBy('CP_ID','desc')
            ->take(1)
            ->first();
        return $beforeID;
    }
    public function roundNamesNNum($S_ID,$S_YEAR,$CP_ID){
        $round_names = DB::table('competition')
            ->select("CP_ROUND_NAME","CP_ROUND_NUM")
            ->where([
                ['S_ID', $S_ID],
                ['S_YEAR',$S_YEAR],
                ['CP_ID',$CP_ID],
            ])
            ->get();
        return $round_names;
    }
    public function USCom($S_ID,$S_YEAR,$CP_ROUND_NAME,$CP_ROUND_NUM){
        $USCom = DB::table('competition')
            ->select('PU_ID')
            ->where([
                ['S_ID', $S_ID],
                ['S_YEAR',$S_YEAR],
                ['CP_ROUND_NAME',$CP_ROUND_NAME],
                ['CP_ROUND_NUM',$CP_ROUND_NUM],
            ])
            ->whereIn('CP_STATUS',['F','B','D'])
            ->get();
        return $USCom;
    }
    public function US4T($S_ID,$S_YEAR,$CP_ROUND_NAME,$CP_ROUND_NUM,$CP_NUM_PG){
        if($CP_NUM_PG == 1){
            $USCom = DB::table('competition')
                ->select('PU_ID')
                ->where([
                    ['S_ID', $S_ID],
                    ['S_YEAR', $S_YEAR],
                    ['CP_ROUND_NAME',$CP_ROUND_NAME],
                    ['CP_ROUND_NUM',$CP_ROUND_NUM],
                ])
                ->whereIn('CP_STATUS', ['E'])
                ->get();
        }else {
            $USCom = DB::table('competition')
                ->select('PU_ID')
                ->where([
                    ['S_ID', $S_ID],
                    ['S_YEAR', $S_YEAR],
                    ['CP_ROUND_NAME', '=', 'SF'],
                    ['CP_ROUND_NUM', '=', '1'],
                ])
                ->whereIn('CP_STATUS', ['E'])
                ->get();
        }
        return $USCom;
    }
    public function USPa($S_ID,$S_YEAR){
        $USPa = DB::table('sna_at_participating_uns')
            ->select('PU_ID')
            ->where([
                ['S_ID',$S_ID],
                ['S_YEAR',$S_YEAR],
            ])
            ->get();
        return $USPa;
    }
    public function idNnameOfUS($PU_ID,$S_YEAR){
        $idNnameOfUS = DB::table('participation_of_uns')
            ->select('PU_ID','PU_NAME')
            ->where([
                ['PU_ID', $PU_ID],
                ['HE_YEAR',$S_YEAR],
                ['PU_STATUS','=','O'],
            ])
            ->get();
        return $idNnameOfUS;
    }
    public function imgNnameOfUS ($PU_NAME){
        $imgNnameOfUS = DB::table('university')
            ->select('UN_IMG')
            ->where([
                ['UN_NAME', $PU_NAME],
            ])
            ->get();
        return $imgNnameOfUS;
    }
    public function insert_Schedule(Request $request){
         $n = $request->total;
         $pair = 1 ;
         $round_num = 1;
         $collection = collect([]);
         $typeSchedule = "";

        if($request->Round == 'QT'){
            $round_num = DB::table('competition')
            ->select(DB::raw('IFNULL(MAX(CP_ROUND_NUM)+1,1) ROUND_NUM'))
                ->where([
                    ['S_ID', $request->Name],
                    ['S_YEAR','=',2019],
                    ['CP_ROUND_NAME',$request->Round],
                ])
                ->first()
                ->ROUND_NUM;
        }

         if($request->match_type == 'MT11'){
             $typeSchedule = "SE";
            if($n%2 == 0){
                for($i = 0;$i<($n/2);$i++){
                    for($j = 0;$j < 2;$j++){
                        $com = New competition;
                        $running = DB::table('competition')
                            ->select(DB::raw('CONCAT(DATE_FORMAT(NOW(),"CP%Y%m%d"),IFNULL(LPAD(MAX(SUBSTR(CP_ID,11))+1,4,"0"),"0001")) running'))
                            ->where([
                                [DB::raw('SUBSTR(CP_ID,1,10)'),'=',DB::raw('DATE_FORMAT(NOW(),"CP%Y%m%d")')],
                            ])
                            ->first()
                            ->running;
                        $collection->push($running);
                        $com->CP_ID = $running;
                        $com->MT_ID = $request->match_type;
                        $com->S_ID = $request->Name;
                        $com->S_YEAR = 2019;
                        $com->CP_PAIR = $pair;
                        $com->CP_ROUND_NAME = $request->Round;
                        $com->CP_ROUND_NUM = $round_num;
                        $com->save();
                    }
                    $pair+=1;
                }
            }else{
                for($i = 0;$i<ceil($n/2);$i++){
                    if($i == ceil($n/2)-1){
                        $com = New competition;
                        $running = DB::table('competition')
                            ->select(DB::raw('CONCAT(DATE_FORMAT(NOW(),"CP%Y%m%d"),IFNULL(LPAD(MAX(SUBSTR(CP_ID,11))+1,4,"0"),"0001")) running'))
                            ->where([
                                [DB::raw('SUBSTR(CP_ID,1,10)'),'=',DB::raw('DATE_FORMAT(NOW(),"CP%Y%m%d")')],
                            ])
                            ->first()
                            ->running;
                        $collection->push($running);
                        $com->CP_ID = $running;
                        $com->MT_ID = $request->match_type;
                        $com->S_ID = $request->Name;
                        $com->S_YEAR = 2019;
                        $com->CP_PAIR = $pair;
                        $com->CP_ROUND_NAME = $request->Round;
                        $com->CP_ROUND_NUM = $round_num;
                        $com->CP_STATUS = 'B';
                        $com->save();
                    }else{
                        for($j = 0;$j < 2;$j++){
                            $com = New competition;
                            $running = DB::table('competition')
                                ->select(DB::raw('CONCAT(DATE_FORMAT(NOW(),"CP%Y%m%d"),IFNULL(LPAD(MAX(SUBSTR(CP_ID,11))+1,4,"0"),"0001")) running'))
                                ->where([
                                    [DB::raw('SUBSTR(CP_ID,1,10)'),'=',DB::raw('DATE_FORMAT(NOW(),"CP%Y%m%d")')],
                                ])
                                ->first()
                                ->running;
                            $collection->push($running);
                            $com->CP_ID = $running;
                            $com->MT_ID = $request->match_type;
                            $com->S_ID = $request->Name;
                            $com->S_YEAR = 2019;
                            $com->CP_PAIR = $pair;
                            $com->CP_ROUND_NAME = $request->Round;
                            $com->CP_ROUND_NUM = $round_num;

                            $com->save();
                        }
                    }
                    $pair+=1;
                }
            }
         }else if($request->match_type == 'MT12'){
             $typeSchedule = "SE";
             $sum = 0;
             for($i = 1;$sum<$n;$i++){
                 $sum = pow(2,$i);
             }
             $bye = $sum-$n;
             $non_bye = $n-$bye;
             for($j = 0;$j<($non_bye/2);$j++){
                 for($k = 0;$k < 2;$k++){
                     $com = New competition;
                     $running = DB::table('competition')
                         ->select(DB::raw('CONCAT(DATE_FORMAT(NOW(),"CP%Y%m%d"),IFNULL(LPAD(MAX(SUBSTR(CP_ID,11))+1,4,"0"),"0001")) running'))
                         ->where([
                             [DB::raw('SUBSTR(CP_ID,1,10)'),'=',DB::raw('DATE_FORMAT(NOW(),"CP%Y%m%d")')],
                         ])
                         ->first()
                         ->running;
                     $collection->push($running);
                     $com->CP_ID = $running;
                     $com->MT_ID = $request->match_type;
                     $com->S_ID = $request->Name;
                     $com->S_YEAR = 2019;
                     $com->CP_PAIR = $pair;
                     $com->CP_ROUND_NAME = $request->Round;
                     $com->CP_ROUND_NUM = $round_num;

                     $com->save();
                 }
                 $pair+=1;
             }
             if($bye != 0){
                 for($m = 0;$m<$bye;$m++){
                     $com = New competition;
                     $running = DB::table('competition')
                         ->select(DB::raw('CONCAT(DATE_FORMAT(NOW(),"CP%Y%m%d"),IFNULL(LPAD(MAX(SUBSTR(CP_ID,11))+1,4,"0"),"0001")) running'))
                         ->where([
                             [DB::raw('SUBSTR(CP_ID,1,10)'),'=',DB::raw('DATE_FORMAT(NOW(),"CP%Y%m%d")')],
                         ])
                         ->first()
                         ->running;
                     $collection->push($running);
                     $com->CP_ID = $running;
                     $com->MT_ID = $request->match_type;
                     $com->S_ID = $request->Name;
                     $com->S_YEAR = 2019;
                     $com->CP_PAIR = $pair;
                     $com->CP_ROUND_NAME = $request->Round;
                     $com->CP_ROUND_NUM = $round_num;
                     $com->CP_STATUS = 'B';
                     $com->save();
                     $pair+=1;
                 }
             }
         }
        $AddressMaxID = count($collection)-1;
        $dataSchedule = self::dataSchedule($collection[0] ,$collection[$AddressMaxID]);
        $nameOfS = self::nameNgenderOfS($dataSchedule[0]->S_ID);
        $nameOfM = self::nameOfM($dataSchedule[0]->MT_ID);
        $checkData = self::beforeID($dataSchedule[0]->S_ID,$collection[0]);
        $US =(object)"";
        $USbefore = (object)"";
        if($checkData){
            $round_names = self::roundNamesNNum($dataSchedule[0]->S_ID, $dataSchedule[0]->S_YEAR, $checkData->CP_ID);
            if($dataSchedule[0]->CP_ROUND_NAME == "FS"){
                $USCom = self::US4T($dataSchedule[0]->S_ID,$dataSchedule[0]->S_YEAR,$round_names[0]->CP_ROUND_NAME, $round_names[0]->CP_ROUND_NUM,$checkData->CP_NUM_PG);
            }else {
                $USCom = self::USCom($dataSchedule[0]->S_ID, $dataSchedule[0]->S_YEAR, $round_names[0]->CP_ROUND_NAME, $round_names[0]->CP_ROUND_NUM);
            }
            foreach($USCom as $key => $USComs) {
                $idNnameOfUS = self::idNnameOfUS($USComs->PU_ID,$dataSchedule[0]->S_YEAR);
                $imgNnameOfUS = self::imgNnameOfUS($idNnameOfUS[0]->PU_NAME);
                foreach ($imgNnameOfUS as $imgNnameOfUSs) {
                    $idNnameOfUS[0]->PU_IMG = $imgNnameOfUSs->UN_IMG;
                }
                if($key == 0){
                    $US = $idNnameOfUS;
                    $USbefore = $idNnameOfUS;
                }else{
                    $US = (object)array_merge((array) $US, (array) $idNnameOfUS);
                    $USbefore = (object)array_merge((array) $USbefore, (array) $idNnameOfUS);
                }
            }
            foreach($US as $key => $USs) {
                $checkUs = 0;
                foreach ($dataSchedule as $dataSchedules) {
                    if ($USs->PU_ID == $dataSchedules->PU_ID)
                        $checkUs += 1;
                }
                if($checkUs > 0)
                    unset($USbefore->{$key});
            }
        }else{
            $USPa = self::USPa($dataSchedule[0]->S_ID,$dataSchedule[0]->S_YEAR);
            foreach($USPa as $key => $USPas) {
                $idNnameOfUS = self::idNnameOfUS($USPas->PU_ID,$dataSchedule[0]->S_YEAR);
                $imgNnameOfUS = self::imgNnameOfUS($idNnameOfUS[0]->PU_NAME);
                foreach ($imgNnameOfUS as $imgNnameOfUSs) {
                    $idNnameOfUS[0]->PU_IMG = $imgNnameOfUSs->UN_IMG;
                }
                if($key == 0){
                    $US = $idNnameOfUS;
                    $USbefore = $idNnameOfUS;
                }else{
                    $US = (object)array_merge((array) $US, (array) $idNnameOfUS);
                    $USbefore = (object)array_merge((array) $USbefore, (array) $idNnameOfUS);
                }
            }
            foreach($US as $key => $USs) {
                $checkUs = 0;
                foreach ($dataSchedule as $dataSchedules) {
                    if ($USs->PU_ID == $dataSchedules->PU_ID)
                        $checkUs += 1;
                }
                if($checkUs > 0)
                    unset($USbefore->{$key});
            }
        }
        $msg = "insert";
        $page = "after_insert";
        $data = array(
            'style' => $this->style(),
            'scriptT' => $this->scriptT(),
            'scriptB' => $this->scriptB(),
            'type' => $typeSchedule,
            'data' => $dataSchedule,
            'nameOfS' => $nameOfS,
            'nameOfM' => $nameOfM,
            'US' => (array)$US,
            'USbefore' => (array)$USbefore,
            'msg' => $msg,
            'page' => $page
        );
        return view('sports/resultSchedule',$data);
    }


    public function update_Schedule(Request $request){
        if($request->has('delete')){
            foreach($request->id as $key => $id) {
                competition::destroy($request->id[$key]);
            }
            $msg = "ลบตารางสำเร็จ";
            if($request->page == "after_insert")
                return redirect('createSchedule')->with('msg', $msg);
            elseif ($request->page == "S_update")
                return Redirect::route('allSchedule', array('types_of_S' => 'sport','format' => 'all'))->with('msg', $msg);
            else
                return Redirect::route('allSchedule', array('types_of_S' => 'activites','format' => 'all'))->with('msg', $msg);

        }else if($request->has('delete2')){
            foreach($request->id as $key => $id) {
                competition::destroy($request->id[$key]);
            }
            $msg = "ลบตารางสำเร็จ";
            if ($request->page == "S_update")
                return Redirect::route('allSchedule', array('types_of_S' => 'sport','format' => 'score'))->with('msg', $msg);
            else
                return Redirect::route('allSchedule', array('types_of_S' => 'activites','format' => 'score'))->with('msg', $msg);

        }else if($request->has('update')){
            foreach($request->id as $key => $ids) {
                $line = $request->line[$key];
                if (!$line && $request->STT[$key] != "B" && ($key%2 != 0)) {
                    $line = $request->line[$key - 1];
                    if($line == "")
                        $line = null;
                }else if($key != 0 && $line != $request->line[$key - 1] && $request->STT[$key] != "B" && ($key%2 != 0)){
                    $line = $request->line[$key - 1];
                }else if($line == ""){
                    $line = null;
                }
                $datetime = $request->datetime[$key];
                if (!$datetime && $request->STT[$key] != "B" && ($key%2 != 0)) {
                    $datetime = $request->datetime[$key - 1];
                    if($datetime == "")
                        $datetime = null;
                }else if($key != 0 && $datetime != $request->datetime[$key - 1] && $request->STT[$key] != "B" && ($key%2 != 0)){
                    $datetime = $request->datetime[$key - 1];
                }else if($datetime == ""){
                    $datetime = null;
                }
                $race = $request->race[$key];
                if (!$race && $request->STT[$key] != "B" && ($key%2 != 0)) {
                   $race = $request->race[$key - 1];
                    if($race == "")
                        $race = null;
                }else if($key != 0 && $race != $request->race[$key - 1] && $request->STT[$key] != "B" && ($key%2 != 0)){
                    $race = $request->race[$key - 1];
                }else if($race == ""){
                    $race = null;
                }
                $PU = $request->PU_ID[$key];
                if(!$PU){
                    $PU = null;
                }
                $com = competition::find($ids);
                $com->PU_ID = $PU;
                $com->CP_LINE = $line;
                $com->CP_DATE = $datetime;
                $com->CP_RAC_PLA = $race;
                $com->save();
            }
            $AddressMaxID = count($request->id)-1;
            $dataSchedule = self::dataSchedule($request->id[0] ,$request->id[$AddressMaxID]);
            $nameOfS = self::nameNgenderOfS($dataSchedule[0]->S_ID);
            $nameOfM = self::nameOfM($dataSchedule[0]->MT_ID);
            $checkData = self::beforeID($dataSchedule[0]->S_ID,$request->id[0]);
            $US =(object)"";
            $USbefore = (object)"";
            if($checkData){
                $round_names = self::roundNamesNNum($dataSchedule[0]->S_ID, $dataSchedule[0]->S_YEAR, $checkData->CP_ID);
                if($dataSchedule[0]->CP_ROUND_NAME == "FS"){
                    $USCom = self::US4T($dataSchedule[0]->S_ID,$dataSchedule[0]->S_YEAR,$round_names[0]->CP_ROUND_NAME, $round_names[0]->CP_ROUND_NUM,$checkData->CP_NUM_PG);
                }else {
                    $USCom = self::USCom($dataSchedule[0]->S_ID, $dataSchedule[0]->S_YEAR, $round_names[0]->CP_ROUND_NAME, $round_names[0]->CP_ROUND_NUM);
                }
                foreach($USCom as $key => $USComs) {
                    $idNnameOfUS = self::idNnameOfUS($USComs->PU_ID,$dataSchedule[0]->S_YEAR);
                    $imgNnameOfUS = self::imgNnameOfUS($idNnameOfUS[0]->PU_NAME);
                    foreach ($imgNnameOfUS as $imgNnameOfUSs) {
                        $idNnameOfUS[0]->PU_IMG = $imgNnameOfUSs->UN_IMG;
                    }
                    if($key == 0){
                        $US = $idNnameOfUS;
                        $USbefore = $idNnameOfUS;
                    }else{
                        $US = (object)array_merge((array) $US, (array) $idNnameOfUS);
                        $USbefore = (object)array_merge((array) $USbefore, (array) $idNnameOfUS);
                    }
                }
                foreach($US as $key => $USs) {
                    $checkUs = 0;
                    foreach ($dataSchedule as $dataSchedules) {
                        if ($USs->PU_ID == $dataSchedules->PU_ID)
                            $checkUs += 1;
                    }
                    if($checkUs > 0)
                        unset($USbefore->{$key});
                }
            }else{
                $USPa = self::USPa($dataSchedule[0]->S_ID,$dataSchedule[0]->S_YEAR);
                foreach($USPa as $key => $USPas) {
                    $idNnameOfUS = self::idNnameOfUS($USPas->PU_ID,$dataSchedule[0]->S_YEAR);
                    $imgNnameOfUS = self::imgNnameOfUS($idNnameOfUS[0]->PU_NAME);
                    foreach ($imgNnameOfUS as $imgNnameOfUSs) {
                        $idNnameOfUS[0]->PU_IMG = $imgNnameOfUSs->UN_IMG;
                    }
                    if($key == 0){
                        $US = $idNnameOfUS;
                        $USbefore = $idNnameOfUS;
                    }else{
                        $US = (object)array_merge((array) $US, (array) $idNnameOfUS);
                        $USbefore = (object)array_merge((array) $USbefore, (array) $idNnameOfUS);
                    }
                }
                foreach($US as $key => $USs) {
                    $checkUs = 0;
                    foreach ($dataSchedule as $dataSchedules) {
                        if ($USs->PU_ID == $dataSchedules->PU_ID)
                            $checkUs += 1;
                    }
                    if($checkUs > 0)
                        unset($USbefore->{$key});
                }
            }
            $msg = "อัพเดตสำเร็จ";
            $data = array(
                'style' => $this->style(),
                'scriptT' => $this->scriptT(),
                'scriptB' => $this->scriptB(),
                'type' => $request->type,
                'data' => $dataSchedule,
                'nameOfS' => $nameOfS,
                'nameOfM' => $nameOfM,
                'US' => (array)$US,
                'USbefore' => (array)$USbefore,
                'msg' => $msg,
                'page' => $request->page
            );
            return view('sports/resultSchedule',$data);
        }else if($request->has('update2')){
            foreach($request->id as $key => $ids) {
                $PU = $request->PU_ID[$key];
                if(!$PU){
                    $PU = null;
                }
                $Score = $request->score[$key];
                if(!$Score){
                    $Score = null;
                }
                $Medal = $request->MD[$key];
                if(!$Medal){
                    $Medal = null;
                }
                $Status = $request->STT[$key];
                if(!$Status){
                    $Status = null;
                }
                $com = competition::find($ids);
                $com->PU_ID = $PU;
                $com->CP_STATUS = $Status;
                $com->CP_SCORE = $Score;
                $com->CP_MEDAL = $Medal;
                $com->save();
            }
            $AddressMaxID = count($request->id)-1;
            $dataSchedule = self::dataSchedule($request->id[0] ,$request->id[$AddressMaxID]);
            $nameOfS = self::nameNgenderOfS($dataSchedule[0]->S_ID);
            $nameOfM = self::nameOfM($dataSchedule[0]->MT_ID);
            $checkData = self::beforeID($dataSchedule[0]->S_ID,$request->id[0]);
            $US =(object)"";
            $USbefore = (object)"";
            if($checkData){
                $round_names = self::roundNamesNNum($dataSchedule[0]->S_ID, $dataSchedule[0]->S_YEAR, $checkData->CP_ID);
                if($dataSchedule[0]->CP_ROUND_NAME == "FS"){
                    $USCom = self::US4T($dataSchedule[0]->S_ID,$dataSchedule[0]->S_YEAR,$round_names[0]->CP_ROUND_NAME, $round_names[0]->CP_ROUND_NUM,$checkData->CP_NUM_PG);
                }else {
                    $USCom = self::USCom($dataSchedule[0]->S_ID, $dataSchedule[0]->S_YEAR, $round_names[0]->CP_ROUND_NAME, $round_names[0]->CP_ROUND_NUM);
                }
                foreach($USCom as $key => $USComs) {
                    $idNnameOfUS = self::idNnameOfUS($USComs->PU_ID,$dataSchedule[0]->S_YEAR);
                    $imgNnameOfUS = self::imgNnameOfUS($idNnameOfUS[0]->PU_NAME);
                    foreach ($imgNnameOfUS as $imgNnameOfUSs) {
                        $idNnameOfUS[0]->PU_IMG = $imgNnameOfUSs->UN_IMG;
                    }
                    if($key == 0){
                        $US = $idNnameOfUS;
                        $USbefore = $idNnameOfUS;
                    }else{
                        $US = (object)array_merge((array) $US, (array) $idNnameOfUS);
                        $USbefore = (object)array_merge((array) $USbefore, (array) $idNnameOfUS);
                    }
                }
                foreach($US as $key => $USs) {
                    $checkUs = 0;
                    foreach ($dataSchedule as $dataSchedules) {
                        if ($USs->PU_ID == $dataSchedules->PU_ID)
                            $checkUs += 1;
                    }
                    if($checkUs > 0)
                        unset($USbefore->{$key});
                }
            }else{
                $USPa = self::USPa($dataSchedule[0]->S_ID,$dataSchedule[0]->S_YEAR);
                foreach($USPa as $key => $USPas) {
                    $idNnameOfUS = self::idNnameOfUS($USPas->PU_ID,$dataSchedule[0]->S_YEAR);
                    $imgNnameOfUS = self::imgNnameOfUS($idNnameOfUS[0]->PU_NAME);
                    foreach ($imgNnameOfUS as $imgNnameOfUSs) {
                        $idNnameOfUS[0]->PU_IMG = $imgNnameOfUSs->UN_IMG;
                    }
                    if($key == 0){
                        $US = $idNnameOfUS;
                        $USbefore = $idNnameOfUS;
                    }else{
                        $US = (object)array_merge((array) $US, (array) $idNnameOfUS);
                        $USbefore = (object)array_merge((array) $USbefore, (array) $idNnameOfUS);
                    }
                }
                foreach($US as $key => $USs) {
                    $checkUs = 0;
                    foreach ($dataSchedule as $dataSchedules) {
                        if ($USs->PU_ID == $dataSchedules->PU_ID)
                            $checkUs += 1;
                    }
                    if($checkUs > 0)
                        unset($USbefore->{$key});
                }
            }
            $msg = "อัพเดตสำเร็จ";
            $data = array(
                'style' => $this->style(),
                'scriptT' => $this->scriptT(),
                'scriptB' => $this->scriptB(),
                'type' => $request->type,
                'data' => $dataSchedule,
                'nameOfS' => $nameOfS,
                'nameOfM' => $nameOfM,
                'US' => (array)$US,
                'USbefore' => (array)$USbefore,
                'msg' => $msg,
                'page' => $request->page
            );
            return view('sports/scoreEditSchedule',$data);
        }
    }
    public function allSchedule($types_of_S = null,$format = null){
        if(!$types_of_S){
            $types_of_S = "sport";
        }
        if(!$format){
            $format = "all";
        }
        if($types_of_S == "sport") {
            $allSchedule = DB::table('competition')
                ->join('type_of_sna', function ($join) {
                    $join->on('type_of_sna.S_ID', '=', 'competition.S_ID')
                        ->where('type_of_sna.S_TYPE_FORMAT','=','S');
                })
                ->select('competition.S_ID', 'type_of_sna.S_NAME_T','type_of_sna.S_NAME_E',
                    'type_of_sna.S_TYPE_GENDER', 'competition.CP_ROUND_NAME', 'competition.CP_ROUND_NUM')
                ->where([
                    ['competition.S_YEAR','=',2019],
                ])
                ->distinct()
                ->groupBy('type_of_sna.S_NAME_T', 'type_of_sna.S_TYPE_GENDER', 'competition.CP_ROUND_NAME', 'competition.CP_ROUND_NUM')
                ->paginate(5);
        }
        else {
            $allSchedule = DB::table('competition')
                ->join('type_of_sna', function ($join) {
                    $join->on('type_of_sna.S_ID', '=', 'competition.S_ID')
                        ->where('type_of_sna.S_TYPE_FORMAT','=','A');
                })
                ->select('competition.S_ID', 'type_of_sna.S_NAME_T','type_of_sna.S_NAME_E',
                    'type_of_sna.S_TYPE_GENDER', 'competition.CP_ROUND_NAME', 'competition.CP_ROUND_NUM')
                ->where([
                    ['competition.S_YEAR','=',2019],
                ])
                ->distinct()
                ->groupBy('type_of_sna.S_NAME_T', 'type_of_sna.S_TYPE_GENDER', 'competition.CP_ROUND_NAME', 'competition.CP_ROUND_NUM')
                ->paginate(5);
        }
        $data = array(
            'style' => $this->style(),
            'scriptT' => $this->scriptT(),
            'scriptB' => $this->scriptB(),
            'types_of_S' => $types_of_S,
            'format' => $format,
            'sportSchedule' => $allSchedule
        );
        if($format == "all")
          return view('sports/allSchedule',$data);
        else
          return view('sports/scoreSchedule',$data);
    }
    public function allSchedule_functions(Request $request){
        if($request->has('seeD') || $request->has('seeS')){
            $dataSchedule = self::dataSchedule2($request->S,$request->RN,$request->RM);
            $nameOfS = self::nameNgenderOfS($dataSchedule[0]->S_ID);
            $nameOfM = self::nameOfM($dataSchedule[0]->MT_ID);
            $checkData = self::beforeID($dataSchedule[0]->S_ID,$dataSchedule[0]->CP_ID);
            $US =(object)"";
            if($checkData){
                $round_names = self::roundNamesNNum($dataSchedule[0]->S_ID, $dataSchedule[0]->S_YEAR, $checkData->CP_ID);
                if($dataSchedule[0]->CP_ROUND_NAME == "FS"){
                    $USCom = self::US4T($dataSchedule[0]->S_ID,$dataSchedule[0]->S_YEAR,$round_names[0]->CP_ROUND_NAME, $round_names[0]->CP_ROUND_NUM,$checkData->CP_NUM_PG);
                }else {
                    $USCom = self::USCom($dataSchedule[0]->S_ID, $dataSchedule[0]->S_YEAR, $round_names[0]->CP_ROUND_NAME, $round_names[0]->CP_ROUND_NUM);
                }
                foreach($USCom as $key => $USComs) {
                    $idNnameOfUS = self::idNnameOfUS($USComs->PU_ID,$dataSchedule[0]->S_YEAR);
                    $imgNnameOfUS = self::imgNnameOfUS($idNnameOfUS[0]->PU_NAME);
                    foreach ($imgNnameOfUS as $imgNnameOfUSs) {
                        $idNnameOfUS[0]->PU_IMG = $imgNnameOfUSs->UN_IMG;
                    }
                    if($key == 0){
                        $US = $idNnameOfUS;
                    }else{
                        $US = (object)array_merge((array) $US, (array) $idNnameOfUS);
                    }
                }
            }else{
                $USPa = self::USPa($dataSchedule[0]->S_ID,$dataSchedule[0]->S_YEAR);
                foreach($USPa as $key => $USPas) {
                    $idNnameOfUS = self::idNnameOfUS($USPas->PU_ID,$dataSchedule[0]->S_YEAR);
                    $imgNnameOfUS = self::imgNnameOfUS($idNnameOfUS[0]->PU_NAME);
                    foreach ($imgNnameOfUS as $imgNnameOfUSs) {
                        $idNnameOfUS[0]->PU_IMG = $imgNnameOfUSs->UN_IMG;
                    }
                    if($key == 0){
                        $US = $idNnameOfUS;
                    }else{
                        $US = (object)array_merge((array) $US, (array) $idNnameOfUS);
                    }
                }
            }
            $page = "";
            if($request->T == "sport")
                $page = "S_update";
            else
                $page = "A_update";
            $typeSchedule = "";
            if($dataSchedule[0]->MT_ID == 'MT11' || $dataSchedule[0]->MT_ID == 'MT12' )
                $typeSchedule = "SE";
            elseif ($dataSchedule[0]->MT_ID == 'MT21' || $dataSchedule[0]->MT_ID == 'MT22')
                $typeSchedule = "RR";
            else
                $typeSchedule = "SC";
            $data = array(
                'style' => $this->style(),
                'scriptT' => $this->scriptT(),
                'scriptB' => $this->scriptB(),
                'type' => $typeSchedule,
                'data' => $dataSchedule,
                'nameOfS' => $nameOfS,
                'nameOfM' => $nameOfM,
                'US' => (array)$US,
                'page' => $page
            );
            if($request->F == "all")
                return view('sports/detailsDataSchedule',$data);
            else
                return view('sports/detailsScoreSchedule',$data);
        }else if ($request->has('updateD')){

            $dataSchedule = self::dataSchedule2($request->S,$request->RN,$request->RM);
            $nameOfS = self::nameNgenderOfS($dataSchedule[0]->S_ID);
            $nameOfM = self::nameOfM($dataSchedule[0]->MT_ID);
            $checkData = self::beforeID($dataSchedule[0]->S_ID,$dataSchedule[0]->CP_ID);
            $US =(object)"";
            $USbefore = (object)"";
            if($checkData){
                $round_names = self::roundNamesNNum($dataSchedule[0]->S_ID, $dataSchedule[0]->S_YEAR, $checkData->CP_ID);
                if($dataSchedule[0]->CP_ROUND_NAME == "FS"){
                    $USCom = self::US4T($dataSchedule[0]->S_ID,$dataSchedule[0]->S_YEAR,$round_names[0]->CP_ROUND_NAME, $round_names[0]->CP_ROUND_NUM,$checkData->CP_NUM_PG);
                }else {
                    $USCom = self::USCom($dataSchedule[0]->S_ID, $dataSchedule[0]->S_YEAR, $round_names[0]->CP_ROUND_NAME, $round_names[0]->CP_ROUND_NUM);
                }
                foreach($USCom as $key => $USComs) {
                    $idNnameOfUS = self::idNnameOfUS($USComs->PU_ID,$dataSchedule[0]->S_YEAR);
                    $imgNnameOfUS = self::imgNnameOfUS($idNnameOfUS[0]->PU_NAME);
                    foreach ($imgNnameOfUS as $imgNnameOfUSs) {
                        $idNnameOfUS[0]->PU_IMG = $imgNnameOfUSs->UN_IMG;
                    }
                    if($key == 0){
                        $US = $idNnameOfUS;
                        $USbefore = $idNnameOfUS;
                    }else{
                        $US = (object)array_merge((array) $US, (array) $idNnameOfUS);
                        $USbefore = (object)array_merge((array) $USbefore, (array) $idNnameOfUS);
                    }
                }
                foreach($US as $key => $USs) {
                    $checkUs = 0;
                    foreach ($dataSchedule as $dataSchedules) {
                        if ($USs->PU_ID == $dataSchedules->PU_ID)
                            $checkUs += 1;
                    }
                    if($checkUs > 0)
                        unset($USbefore->{$key});
                }
            }else{
                $USPa = self::USPa($dataSchedule[0]->S_ID,$dataSchedule[0]->S_YEAR);
                foreach($USPa as $key => $USPas) {
                    $idNnameOfUS = self::idNnameOfUS($USPas->PU_ID,$dataSchedule[0]->S_YEAR);
                    $imgNnameOfUS = self::imgNnameOfUS($idNnameOfUS[0]->PU_NAME);
                    foreach ($imgNnameOfUS as $imgNnameOfUSs) {
                        $idNnameOfUS[0]->PU_IMG = $imgNnameOfUSs->UN_IMG;
                    }
                    if($key == 0){
                        $US = $idNnameOfUS;
                        $USbefore = $idNnameOfUS;
                    }else{
                        $US = (object)array_merge((array) $US, (array) $idNnameOfUS);
                        $USbefore = (object)array_merge((array) $USbefore, (array) $idNnameOfUS);
                    }
                }
                foreach($US as $key => $USs) {
                    $checkUs = 0;
                    foreach ($dataSchedule as $dataSchedules) {
                        if ($USs->PU_ID == $dataSchedules->PU_ID)
                            $checkUs += 1;
                    }
                    if($checkUs > 0)
                        unset($USbefore->{$key});
                }
            }
            $msg = "insert";
            $page = "";
            if($request->T == "sport")
                $page = "S_update";
            else
                $page = "A_update";
            $typeSchedule = "";
            if($dataSchedule[0]->MT_ID == 'MT11' || $dataSchedule[0]->MT_ID == 'MT12' )
                $typeSchedule = "SE";
            elseif ($dataSchedule[0]->MT_ID == 'MT21' || $dataSchedule[0]->MT_ID == 'MT22')
                $typeSchedule = "RR";
            else
                $typeSchedule = "SC";
            $data = array(
                'style' => $this->style(),
                'scriptT' => $this->scriptT(),
                'scriptB' => $this->scriptB(),
                'type' => $typeSchedule,
                'data' => $dataSchedule,
                'nameOfS' => $nameOfS,
                'nameOfM' => $nameOfM,
                'US' => (array)$US,
                'USbefore' => (array)$USbefore,
                'msg' => $msg,
                'page' => $page
            );
            return view('sports/resultSchedule',$data);
        }else if ($request->has('updateS')){
            $dataSchedule = self::dataSchedule2($request->S,$request->RN,$request->RM);
            $nameOfS = self::nameNgenderOfS($dataSchedule[0]->S_ID);
            $nameOfM = self::nameOfM($dataSchedule[0]->MT_ID);
            $checkData = self::beforeID($dataSchedule[0]->S_ID,$dataSchedule[0]->CP_ID);
            $US =(object)"";
            $USbefore = (object)"";
            if($checkData){
                $round_names = self::roundNamesNNum($dataSchedule[0]->S_ID, $dataSchedule[0]->S_YEAR, $checkData->CP_ID);
                if($dataSchedule[0]->CP_ROUND_NAME == "FS"){
                    $USCom = self::US4T($dataSchedule[0]->S_ID,$dataSchedule[0]->S_YEAR,$round_names[0]->CP_ROUND_NAME, $round_names[0]->CP_ROUND_NUM,$checkData->CP_NUM_PG);
                }else {
                    $USCom = self::USCom($dataSchedule[0]->S_ID, $dataSchedule[0]->S_YEAR, $round_names[0]->CP_ROUND_NAME, $round_names[0]->CP_ROUND_NUM);
                }
                foreach($USCom as $key => $USComs) {
                    $idNnameOfUS = self::idNnameOfUS($USComs->PU_ID,$dataSchedule[0]->S_YEAR);
                    $imgNnameOfUS = self::imgNnameOfUS($idNnameOfUS[0]->PU_NAME);
                    foreach ($imgNnameOfUS as $imgNnameOfUSs) {
                        $idNnameOfUS[0]->PU_IMG = $imgNnameOfUSs->UN_IMG;
                    }
                    if($key == 0){
                        $US = $idNnameOfUS;
                        $USbefore = $idNnameOfUS;
                    }else{
                        $US = (object)array_merge((array) $US, (array) $idNnameOfUS);
                        $USbefore = (object)array_merge((array) $USbefore, (array) $idNnameOfUS);
                    }
                }
                foreach($US as $key => $USs) {
                    $checkUs = 0;
                    foreach ($dataSchedule as $dataSchedules) {
                        if ($USs->PU_ID == $dataSchedules->PU_ID)
                            $checkUs += 1;
                    }
                    if($checkUs > 0)
                        unset($USbefore->{$key});
                }
            }else{
                $USPa = self::USPa($dataSchedule[0]->S_ID,$dataSchedule[0]->S_YEAR);
                foreach($USPa as $key => $USPas) {
                    $idNnameOfUS = self::idNnameOfUS($USPas->PU_ID,$dataSchedule[0]->S_YEAR);
                    $imgNnameOfUS = self::imgNnameOfUS($idNnameOfUS[0]->PU_NAME);
                    foreach ($imgNnameOfUS as $imgNnameOfUSs) {
                        $idNnameOfUS[0]->PU_IMG = $imgNnameOfUSs->UN_IMG;
                    }
                    if($key == 0){
                        $US = $idNnameOfUS;
                        $USbefore = $idNnameOfUS;
                    }else{
                        $US = (object)array_merge((array) $US, (array) $idNnameOfUS);
                        $USbefore = (object)array_merge((array) $USbefore, (array) $idNnameOfUS);
                    }
                }
                foreach($US as $key => $USs) {
                    $checkUs = 0;
                    foreach ($dataSchedule as $dataSchedules) {
                        if ($USs->PU_ID == $dataSchedules->PU_ID)
                            $checkUs += 1;
                    }
                    if($checkUs > 0)
                        unset($USbefore->{$key});
                }
            }
            $msg = "insert";
            $page = "";
            if($request->T == "sport")
                $page = "S_update";
            else
                $page = "A_update";
            $typeSchedule = "";
            if($dataSchedule[0]->MT_ID == 'MT11' || $dataSchedule[0]->MT_ID == 'MT12' )
                $typeSchedule = "SE";
            elseif ($dataSchedule[0]->MT_ID == 'MT21' || $dataSchedule[0]->MT_ID == 'MT22')
                $typeSchedule = "RR";
            else
                $typeSchedule = "SC";
            $data = array(
                'style' => $this->style(),
                'scriptT' => $this->scriptT(),
                'scriptB' => $this->scriptB(),
                'type' => $typeSchedule,
                'data' => $dataSchedule,
                'nameOfS' => $nameOfS,
                'nameOfM' => $nameOfM,
                'US' => (array)$US,
                'USbefore' => (array)$USbefore,
                'msg' => $msg,
                'page' => $page
            );
            return view('sports/scoreEditSchedule',$data);
        }else if($request->has('delete')) {
            DB::table('competition')
                ->where([
                    ['S_ID', $request->S],
                    ['CP_ROUND_NAME', $request->RN],
                    ['CP_ROUND_NUM', $request->RM],
                    ['S_YEAR', '=', 2019],
                ])
                ->delete();
            $types_of_S = $request->T;
            $format = $request->F;
            $msg = "ลบตารางสำเร็จ";
            return Redirect::route('allSchedule', array('types_of_S' => $types_of_S,'format'=>$format))->with('msg', $msg);
        }
    }
}
