<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class FilterController extends Controller
{
    //

    public function new(){
        $data = Order::where('status_id',1)
        ->orderBy('created_at','desc')
        ->paginate(10);
        $user = Auth::user();
        return view('/orders.filters.ack',[
            'orders' => $data,
            'user' => $user,
        ]);
    }
    public function ack(){
        $data = Order::where('status_id',2)
        ->orderBy('created_at','desc')
        ->paginate(10);
        $user = Auth::user();
        return view('/orders.filters.ack',[
            'orders' => $data,
            'user' => $user,
        ]);
    }

    public function pending(){
        $data = Order::where('status_id',3)
        ->orderBy('created_at','desc')
        ->paginate(10);
        $user = Auth::user();
        return view('/orders.filters.ack',[
            'orders' => $data,
            'user' => $user,
        ]);
    }

    public function approved(){
        $data = Order::where('status_id',4)
        ->orderBy('created_at','desc')
        ->paginate(10);
        $user = Auth::user();
        return view('/orders.filters.ack',[
            'orders' => $data,
            'user' => $user,
        ]);
    }

    public function ordered(){
        $data = Order::where('status_id',5)
        ->orderBy('created_at','desc')
        ->paginate(10);
        $user = Auth::user();
        return view('/orders.filters.ack',[
            'orders' => $data,
            'user' => $user,
        ]);
    }

    public function ar(){
        $data = Order::where('status_id',6)
        ->orderBy('created_at','desc')
        ->paginate(10);
        $user = Auth::user();
        return view('/orders.filters.ack',[
            'orders' => $data,
            'user' => $user,
        ]);
    }

    public function closedorder(){
        $data = Order::where('status_id',7)
        ->orderBy('created_at','desc')
        ->paginate(10);
        $user = Auth::user();
        return view('orders.filters.ack',[
            'orders' => $data,
            'user' => $user,
        ]);
    }

    public function unavailable(){
        $data = Order::where('status_id',8)
        ->orderBy('created_at','desc')
        ->paginate(10);
        $user = Auth::user();
        return view('/orders.filters.ack',[
            'orders' => $data,
            'user' => $user,
        ]);
    }

    public function gold(){
        $data = Order::where('category', "Gold")
                ->orderBy('status_id', 'desc')
                ->paginate(10);
        $user = Auth::user();

            return view('orders.filters.ack',[
                'orders' => $data,
                'user' => $user,
            ]);
    }

    public function K18(){
        $data = Order::where('category', "18K")
                ->orderBy('status_id', 'desc')
                ->paginate(10);
        $user = Auth::user();

            return view('orders.filters.ack',[
                'orders' => $data,
                'user' => $user,
            ]);
    }

    public function diamond(){
        $data = Order::where('category', "Diamond")
                ->orderBy('status_id', 'desc')
                ->paginate(10);
        $user = Auth::user();

            return view('orders.filters.ack',[
                'orders' => $data,
                'user' => $user,
            ]);
    }

    public function gems(){
        $data = Order::where('category', "Gems")
                ->orderBy('status_id', 'desc')
                ->paginate(10);
        $user = Auth::user();

            return view('orders.filters.ack',[
                'orders' => $data,
                'user' => $user,
            ]);
    }

    public function dynamicfilter(){
        $user = Auth::user();
        // request()->status;
        // @dd(request()->status_id);
        $query = Order::query();

        if (request()->has('branch')) {
            $query->where('branch', request()->branch);
        }

        if (request()->has('design')) {
            $query->where('design', request()->design);
        }
// @dd(request()->all());
        if (request()->has('status_id')) {
            $query->where('status_id', request()->status_id);
        }

        if (request()->has('category' )) {
            $query->where('category', request()->category);
        }


        $data = $query->paginate(10);
        // @dd($data);

        return view('orders.filters.added',[
            'orders' => $data,
            'user' => $user,
        ]);
    }
}
