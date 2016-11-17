<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;

use App\User;
use App\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      date_default_timezone_set("Asia/Hong_Kong");

      $dates = [];

      for ($iterateYear =2017; $iterateYear<2018; $iterateYear++) {
        for ($iterateMonth=1; $iterateMonth<=12; $iterateMonth++) {

          /* Set the date */
          $months = date(strtotime(sprintf('%s-%s-01', $iterateYear, $iterateMonth)));

          $dates[] = $months;
        }
      }

      $dates[] = $this->renderCalenderMonth($dates);

      // $users = DB::table('users')->where('roles_id', '2')->get();
      //
      return view('transaction.index');

    }

    public function renderCalenderMonth($dates) {

      foreach($dates as $date) {
        // $date = strtotime(date("Y-m-d"));
        $NUMBER_OF_COLUMNS = 37;

        $day = date('d', $date);
        $month = date('m', $date);
        $year = date('Y', $date);

        $firstDay = mktime(0,0,0,$month, 1, $year);
        $title = strftime('%B', $firstDay);
        $dayOfWeek = date('D', $firstDay);
        $daysInMonth = cal_days_in_month(0, $month, $year);

        /* Get the name of the week days */
        $timestamp = strtotime('next Sunday');
        $weekDays = [];

        for($i = 0; $i < $NUMBER_OF_COLUMNS; $i++) {
            $weekDays[] = strftime('%a', $timestamp);
            $timestamp = strtotime('+1 day', $timestamp);
        }

        $blank = date('w', strtotime("{$year}-{$month}-01"));

        $divid = $title.$year;

        echo $divid;
        echo $NUMBER_OF_COLUMNS;

        return view('transaction.index', [
          'day' => $day,
          'month' => $month,
          'year' => $year,
          'firstDay' => $firstDay,
          'title' => $title,
          'dayOfWeek' => $dayOfWeek,
          'daysInMonth' => $daysInMonth,
          'timestamp' => $timestamp,
          'weekDays' => $weekDays,
          'blank' => $blank,
          'divid' => $divid,
          'NUMBER_OF_COLUMNS' => $NUMBER_OF_COLUMNS
        ]);
      }
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
        //
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
    public function destroy($id)
    {
        //
    }
}
