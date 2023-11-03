<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arrivals</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <section class="container py-5">
    {{$orders->links()}}
        <div class="row g-5">
    @foreach ($orders as $order)

             {{-- a container --}}
             <div class="col-12 col-md-6 col-lg-6">
                <div class="ms-3">
                    {{-- code 1 add --}}
                    @if ($order['status_id']=== 1)
                    <div><x-bi-star-half style="color: #02767a;"/>
                        <x-bi-star style="color: #02767a;"/>
                        <x-bi-star style="color: #02767a;"/>
                        </div>
                    @endif

                    {{-- code 2 request --}}
                    @if ($order['status_id']=== 2)
                    <div><x-bi-star-fill style="color: #02767a;"/>
                        <x-bi-star style="color: #02767a;"/>
                        <x-bi-star style="color: #02767a;"/>
                        </div>
                    @endif

                    {{-- code 3 pending --}}
                    @if ($order['status_id']=== 3)
                    <div><x-bi-star-fill style="color: #02767a;"/>
                        <x-bi-star-half style="color: #02767a;"/>
                        <x-bi-star style="color: #02767a;"/>
                        </div>
                    @endif

                    {{-- code 4 approved --}}
                    @if ($order['status_id']=== 4)
                    <div><x-bi-star-fill style="color: #02767a;"/>
                        <x-bi-star-fill style="color: #02767a;"/>
                        <x-bi-star style="color: #02767a;"/>
                        </div>
                    @endif

                     {{-- code 5 ordered --}}
                     @if ($order['status_id']=== 5)
                     <div><x-bi-star-fill style="color: #02767a;"/>
                        <x-bi-star-fill style="color: #02767a;"/>
                        <x-bi-star-half style="color: #02767a;"/>
                        </div>
                    @endif

                    {{-- code 6 Ar  --}}
                    @if ($order['status_id']=== 6)
                    <div><x-bi-star-fill style="color: #02767a;"/>
                        <x-bi-star-fill style="color: #02767a;"/>
                        <x-bi-star-fill style="color: #02767a;"/>
                        </div>
                    @endif

                    {{-- code 7 Close  --}}
                    @if ($order['status_id']=== 7)
                    <div><x-bi-star-fill style="color: green;"/>
                        {{-- <x-bi-star-fill style="color: #02767a;"/>
                        <x-bi-star-fill style="color: #02767a;"/> --}}
                        </div>
                    @endif

                    {{-- code 6 Ar  --}}
                    @if ($order['status_id']=== 8)
                    <div><x-bi-star-fill style="color: red;"/>
                        {{-- <x-bi-star-fill style="color: #02767a;"/>
                        <x-bi-star-fill style="color: #02767a;"/> --}}
                        </div>
                    @endif

                </div>
                <div class="rounded-4 py-3" style="height: 300px; padding: 10px; background:#ffd000bb;">

                    {{-- Order No and status--}}
                    <div class="bg-light rounded-5 " style="padding: 10px;">
                        <div><span style="color: #02767a"> Order No: </i> </span> <span style="color: #3a3a3abd;">{{$order['id']}}</span>
                            <i class="text-muted float-end">
                                @switch($order['status_id'])
                                    @case(1)
                                        Added
                                    @break
                                    @case(2)
                                        Acked
                                    @break
                                    @case(3)
                                        Pending
                                    @break
                                    @case(4)
                                        Approved by AGM
                                    @break
                                    @case(5)
                                        Ordered
                                    @break
                                    @case(6)
                                        Arrived
                                    @break
                                    @case(7)
                                        Successed
                                    @break
                                    @case(8)
                                        UnAvailable
                                    @default

                                @endswitch
                            </i></div>
                        <div><span><i  style="color: #02767a">Category:</i><b  style="color: #850091"> {{$order['category']}}</b> <i>& Design:</i> {{$order['design']}}/{{$order['detail']}} </span></div>
                    </div>

                    {{-- Quality/Qty/gram/S,L/Qty/Grade of product --}}
                    <div class="mt-4" style="padding-left: 7px;">
                        <button type="button" class="btn btn-outline-secondary position-relative me-2">Quality
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-light">
                             {{$order['quality']}}</span>
                        </button>
                         <button type="button" class="btn btn-outline-secondary position-relative me-2">Gram
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-light">
                             {{$order['weight']}}</span>
                        </button>
                        <button type="button" class="btn btn-outline-secondary position-relative me-2">S/L
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-light">
                                 {{$order['size']}}</span>
                        </button>
                        <button type="button" class="btn btn-outline-secondary position-relative me-2">Qty
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-light">
                            {{$order['qty']}}</span>
                        </button>
                        <button type="button" class="btn btn-outline-secondary position-relative me-2">Grade
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-light">
                            {{$order['grade']}}</span>
                        </button>
                    </div>

                    {{-- note of product --}}
                    <div class="mt-3">
                        <label for="note" style="color: rgb(250, 247, 247);">Note</label>
                        <i id="note" class="" style="color: #866300;">{{$order['note']}}
                        </i>
                    </div>

                    {{-- action buttons--}}
                    <div class="mt-3 rounded-3 clearfix  border-bottom border-secondary "  style="padding-lef 20px;" >
                        <div class="">
                            <form method="POST" action="{{url("/ack")}}">
                                @csrf
                                <input name="status_id" value="2" hidden/>
                                <input name="id" value="{{$order['id']}} " hidden/>
                                @auth
                                    <input type="submit" class="btn btn-outline-danger rounded-pill float-start" value="Ack"
                                    @if ($order['status_id'] > '1')
                                    hidden
                                    @endif
                                    @auth
                                        @if ($user->id !== 1)
                                            disabled
                                        @endif
                                    @endauth>
                                @endauth
                                <a class="btn btn-outline-primary rounded-pill float-end" href="{{url("/orders/view/$order->id")}}">view</a>
                            </form>
                        </div>

                    </div>

                    {{-- date & request shop --}}
                    <div class="clearifx mt-1">
                        <span class="float-start" style="color: #00000081; font-size: 14px"><x-bi-clock-history/> {{$order->created_at->diffForHumans()}}</span>
                        <span class="float-end"  style="color: #00000081; font-size: 14px"> <x-bi-buildings style="color: #00000081;"/> {{$order['branch']}}</span>
                    </div>
                </div>
            </div>

    @endforeach

        </div>
    </section>

    <footer class="container">
<div class="border-top border-top-2 py-5 text-center text-muted">
&copy; Copyright kabukii
</div>
</footer>
@endsection
</body>
</html>
