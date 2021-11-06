<?php

namespace App\Http\Controllers;

// 休日設定、カレンダーコントローラー、ログイン＆登録画面使用宣言
use App\Models\Holiday;
use App\Calendar;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function getHoliday(Request $request)
    {
        // 休日データ取得
        $data = new Holiday();
        $list = Holiday::all();
        return view('calendar.holiday', ['list' => $list, 'data' => $data]);
    }

    public function getHolidayId($id)
    {
        // 休日データ取得
        $data = new Holiday();
        if (isset($id)) {
            $data = Holiday::where('id', '=', $id)->first();
        }
        $list = Holiday::all();
        return view('calendar.holiday', ['list' => $list, 'data' => $data]);
    }

    public function postHoliday(Request $request)
    {
        $validateData = $request->validate([
            'day' => 'required|date_format:Y-m-d',
            'description' => 'required',
        ]);

        // POSTで受信した休日データの登録
        if(isset($request->id)) {
            $holiday = Holiday::where('id', '=', $request->id)->first();
            $holiday->day = $request->day;
            $holiday->description = $request->description;
            $holiday->save();
        } else {
            $holiday = new Holiday();
            $holiday->day = $request->day;
            $holiday->description = $request->description;
            $holiday->save();
        }
        // 休日データ取得
        $data = new Holiday();
        $list = Holiday::all();
        return view('calendar.holiday', ['list' => $list, 'data' => $data]);
    }

    public function deleteHoliday(Request $request)
    {
        // DELETEで受信した休日データの削除
        if (isset($request->id)) {
            $holiday = Holiday::where('id', '=', $request->id)->first();
            $holiday->delete();
        }
        // 休日データ取得
        $data = new Holiday();
        $list = Holiday::all();
        return view('calendar.holiday', ['list' => $list, 'data' => $data]);
    }

    public function index(Request $request, $year = null, $month = null )
    {
        // カレンダー表示
        // $list = Holiday::all();

        $begin = date('Y-m-1');
        $end = date('Y-m-t');
        if( $year ){
            $time = strtotime("{$year}-{$month}-1");
            $begin = date('Y-m-1',$time);
            $end = date('Y-m-t', $time);
        }
        $list = Holiday::where('day', '>=', $begin )
                    ->where('day', '<=', $end)
                    ->get();

        $cal = new Calendar($list);

        $tag = $cal->showCalendarTag($month,$year);

        return view('calendar.index', ['cal_tag' => $tag]);
    }

}
