<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TrainController extends Controller{

    public function book (Request $request){
        $route = $request->route;
        $seatCategory = $request->seatCategory;
        $source = $request->source;
        $destination =$request->destination;
        $trainNumber = $request->trainNumber;
        $selectedDate = $request-> selectedDate;
        $selectedDepartureTime= $request-> selectedDepartureTime;
        $ticketFare= $request-> ticketFare;
        $name= $request-> name;
        $age= $request-> age;
        $sex= $request-> sex;
        $address= $request-> address;
        $contact= $request-> contact;
        if($trainNumber==="Train Iron"){
            $trainNumber = 1;
        }
        elseif($trainNumber==="Train Spider"){
            $trainNumber = 2;
        }
        elseif($trainNumber==="Train Panther"){
            $trainNumber = 3;
        }
        elseif($trainNumber==="Train Loki"){
            $trainNumber = 4;
        }
        elseif($trainNumber==="Train Gamora"){
            $trainNumber = 5;
        }
        elseif($trainNumber==="Train Rocket"){
            $trainNumber = 6;
        }
        elseif($trainNumber==="Train Star"){
            $trainNumber = 7;
        }
        elseif($trainNumber==="Train Fury"){
            $trainNumber = 8;
        }
        elseif($trainNumber="Train Mantis"){
            $trainNumber = 9;
        }
        elseif($trainNumber==="Train Aneka"){
            $trainNumber = 10;
        }
        $result = DB::select('CALL Booking(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $trainNumber,
            $selectedDate,
            $seatCategory,
            $name,
            $age,
            $sex,
            $address,
            $selectedDepartureTime,
            $source,
            $destination,
            $route
        ]);

        return response()->json(['trainNumber'=>$result,"destination"=>$destination,'selectedDate'=>$selectedDate,"seatCategory"=>$seatCategory,'name'=>$name,"sex"=>$sex,"age"=>$age,"address"=>$address,"selectedDepartureTime"=>$selectedDepartureTime,"source"=>$source,"route"=>$route]);
    }

    function cancel(Request $request){
        $id =$request->inputValue;
        $result = DB::select('CALL Cancel1(?)',[$id]);
        return response()->json(['result'=>$result]);
    }
}