<?php
namespace Grambas\QueueView;


use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use App\User;

use Yajra\Datatables\Datatables;
use View;


use Grambas\QueueView\Queue;

class QueueViewController extends Controller
{
    public function __construct()
    {
        $this->queue = config('QueueView.tableQueue');
        $this->failed = config('QueueView.tableFailed');
    }

	public function index()
{

    return view('QueueView::index');
}

	public function failedIndex()
{
    return view('QueueView::failedIndex');
}


    public function queueGet()
    {
         $queue = DB::table($this->queue)->select(['*']);
        return Datatables::of($queue)
            ->editColumn('reserved_at', function ($queue) {
                return $queue->reserved_at ? with(new Carbon( "@" . $queue->reserved_at))->toDateTimeString() : '';})
            ->editColumn('available_at', function ($queue) {
                return $queue->available_at ? with(new Carbon( "@" . $queue->available_at))->toDateTimeString() : '';})
            ->editColumn('created_at', function ($queue) {
                return $queue->created_at ? with(new Carbon( "@" . $queue->created_at))->toDateTimeString() : '';})
            ->addColumn('paylaod', function ($queue) {
            	//$payload = json_decode($queue->payload);
				//$command = unserialize($payload->data->command);
                return (string)$queue->payload ;})
            ->addColumn('action', function ($queue) {
                return '<a href="queue/delete/'.$queue->id.'" class="btn btn-xs btn-danger">Delete</a>';})
            ->make(true);
    }


     public function failedGet()
    {
         $queue = DB::table($this->failed)->select(['*']);
        return Datatables::of($queue)
            ->editColumn('failed_at', function ($queue) {
                return $queue->failed_at ? with(new Carbon($queue->failed_at))->toDateTimeString() : '';})
            ->addColumn('action', function ($queue) {
                return '<a href="failed/delete/'.$queue->id.'" class="btn btn-xs btn-danger">Delete</a>';})
            ->make(true);
    }


    public function queueDelete($id)
    {
        $result = DB::table($this->queue)->where('id', '=', $id)->delete();
        //result ons success = 1
        return view('QueueView::index');
    }

    public function failedDelete($id)
    {
        $result = DB::table($this->failed)->where('id', '=', $id)->delete();
        //result ons success = 1
        return view('QueueView::failedIndex');
    }


}