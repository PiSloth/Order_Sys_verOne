<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Photo;
use App\Models\Category;
use App\Models\Design;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        $designs = Design::all();
        $data = Order::latest()->take(10)->get();
                // ->paginate(10);

        $statusCounts = Order::select('status_id', DB::raw('count(*) as count'))
                        ->groupBy('status_id')
                        ->get()
                        ->keyBy('status_id');

                        $new = $statusCounts->get(1)->count ?? 0;
                        $ack = $statusCounts->get(2)->count ?? 0;
                        $pending = $statusCounts->get(3)->count ?? 0;
                        $approved = $statusCounts->get(4)->count ?? 0;
                        $ordered = $statusCounts->get(5)->count ?? 0;
                        $ar = $statusCounts->get(6)->count ?? 0;
                        $closedorder = $statusCounts->get(7)->count ?? 0;
                        $unavailable = $statusCounts->get(8)->count ?? 0;

        $statusCounts = Order::select('category', DB::raw('count(*) as count'))
                        ->groupBy('category')
                        ->get()
                        ->keyBy('category');
                        $gold = $statusCounts->get('Gold')->count ?? 0;
                        $diamond = $statusCounts->get('Diamond')->count ?? 0;
                        $K18 = $statusCounts->get('18K')->count ?? 0;
                        $gem = $statusCounts->get('Gems')->count ?? 0;

                        // sum of target items
                        //gold-C-ordered-qty
        // $searchGold = Order::where('category','Gold')
        //                 ->where('status_id', 1);
        // $totalGorders = $searchGold->sum('qty');


        $user = Auth::user();
        return view('orders.index', [
            'orders' => $data,
            'user' => $user,
            'new' => $new,
            'ack' => $ack,
            'pending' => $pending,
            'approved' => $approved,
            'ordered' => $ordered,
            'ar' => $ar,
            'closedorder' => $closedorder,
            'unavailable' => $unavailable,
            'K18' => $K18,
            'gold' => $gold,
            'diamond' => $diamond,
            'gem'     => $gem,
            'designs' => $designs,


        ]);
    }
    public function add() {
        $data = Category::all();
        $design = Design::all();
        $quality = [
            "999","S","A","B","BKL","C","18K","Dim",
        ];


        return view('orders.add', [
            'cats' => $data,
            'designs' => $design,
            'qualities' => $quality,
        ]);
    }

    public function create(){

        // $validator = validator(request()->all(),[
        //     'category' => 'required',
        //     'design' => 'required',
        //     'detail' => 'required',
        //     'quality' => 'required',
        //     'weight' => 'required',
        //     'size' => 'required',
        //     'qty' => 'required',
        //     'grade' => 'required',
        //     'counterstock' => 'required',
        //     'note' => 'required',
        // ]);

        // if($validator->fails()){
        //     return back()->withErrors($validator);
        // }

        $order = new Order();
        $order->category = request()->category;
        $order->branch = request()->branch;
        $order->status_id = request()->status_id;
        $order->design = request()->design;
        $order->detail = request()->detail;
        $order->quality = request()->quality;
        $order->weight = request()->weight;
        $order->size = request()->size;
        $order->qty = request()->qty;
        $order->grade = request()->grade;
        $order->counterstock = request()->counterstock;
        $order->sell_rate = request()->sell_rate;
        $order->note = request()->note;
        $order->user_id = request()->user_id;
        $order->save();

        $last_id = Order::latest()->first();
        $id = $last_id->id;

        if (request()->hasFile('orderimg')) {

            // Store the uploaded image in the "public" disk
            $path = request()->file('orderimg')->store('order_images', 'public');

            // Create the order record and associate the image path
            $image = new Photo();
            // Set other order attributes from the form
            // ...
            $image->orderimg = $path; // Store the image path
            $image->order_id = $id;
            $image->save();
        }

        return redirect('/');
    }

    public function view($id) {
        // image check for this id
        // $image = Photo::findOrFail($id);

    // Check if the order has an associated image
    // if ($image->orderimg) {
    //     $imagePath = asset('storage/' . $image->orderimg);
    // }
        // dd("Hello");
        $user = Auth::user();
        $data = Order::find($id);
        return view('orders.view',[
            'order' => $data,
            'user' => $user,
        ]);
    }

    public function update($id) {
        $aciton = request()->action;

        switch ($aciton) {
            // for inventory user status code - 3 (pending)
            //estimate time,in hand qty,status id can edit! (3 types of data)
            case 'request':
                    // $validator = validator(request()->all(), [
                    //     'estimatetime'
                    // ]);
                    $data = Order::find(request()->id);

                    if(request()->available < 1){
                        $status_code = 8;
                    }else {
                        $status_code = 3;
                    }
                    $data-> estimatetime = request()->estimatetime;
                    $data-> instockqty = request()->instockqty;
                    $data-> status_id = $status_code;
                    $data->save();
                    return back();
                break;
                //for approver status code - 4 (approved)
                // Stats id and Qty only can edit! (2 types of data)
            case 'approve':
                $data = Order::find(request()->id);
                // $data-> status_id = 4;
                if(request()->available < 1){
                    $status_code = 8;
                }else {
                    $status_code = 4;
                    // dd(request()->avaliable);
                    }
                    $data-> status_id = $status_code;
                    $data-> qty = 0;
                    // dd( $status_code );
                    $data->save();
                    return back();

                break;
                //for inventory user to order form a supplier status code - 5 (ordered)
                //only status code edit!  (1 type of data)!
            case 'ordered':
                $data = Order::find(request()->id);
                // $data-> status_id = 5;
                if(request()->available < 1){
                    $status_code = 8;
                }else {
                    $status_code = 5;
                }
                $data-> status_id = $status_code;
                $data->save();
                return back();
                break;
                //for inventory user when arrived goods status code - 6 (Ar)
                //ar Qty, statis id (2 types of data)!
            case 'arrived':
                $data = Order::find(request()->id);
                $data-> status_id = 6;
                $data-> arqty = request()->arqty;
                $data->save();
                return back();
                break;

                //for order add user to close order - status code - 7 (Close Order)
                //close Qty, status id ( 2 types of data);
            case 'closeorder':
                $data = Order::find(request()->id);
                $data-> status_id = 7;
                $data-> closeqty = request()->closeqty;
                $data->save();
                return back();
                break;
            default:
            // status code of Unavailable is code - 8 !!
                return("Nice");
                break;
        }
    }

    public function ack(){
        $id = request()->id;
        $data = Order::find($id);
        $data->status_id = request()->status_id;
        $data->save();
        return back();
    }
}
