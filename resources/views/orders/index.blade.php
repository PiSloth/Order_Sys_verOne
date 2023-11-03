<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

</head>
<body style="background: ivory;">
    @extends('layouts.app')
    @section('content')
    <main class=" p-5">
        <div class="rounded" style="background: rgb(255, 255, 255);">
            <div class="p-3">
                <form action="{{url('orders/filters')}}" method="GET">
                    <div class="row flex-column flex-lg-row p-3 mb-4">
                            @csrf
                            <div class="col">
                                 <h2 class="text-secondary h6">Branch
                                    <x-bi-buildings/>
                                    <select name="branch" class="btn btn-outline-secondary">
                                        <option disabled selected>Choose</option>
                                        <option value="Branch_1">Branch 1</option>
                                        <option value="Branch_2">Branch 2</option>
                                        <option value="HO">HO</option>
                                    </select>
                                    <x-bi-list-stars/> Design
                                    <select name="design" class="btn btn-outline-secondary">
                                        <option disabled selected>Choose</option>

                                        @foreach ($designs as $design)
                                                <option value="{{$design['name']}}">{{$design['name']}}</option>
                                        @endforeach
                                    </select>
                                    <x-bi-list-stars/> Status
                                    <select name="status_id" class="btn btn-outline-secondary">
                                        <option disabled selected>Choose</option>
                                        <option value="1">New</option>
                                        <option value="2">Acked</option>
                                        <option value="3">Pending</option>
                                        <option value="4">Approved</option>
                                        <option value="5">Ordered</option>
                                        <option value="6">Arrived</option>
                                        <option value="7">Success</option>
                                        <option value="8">Unavailable</option>
                                    </select>
                                </h2>
                                <div class="card">
                                    <div class="card-body text-muted clearfix">
                                        <div class="row justify-content-between">
                                            <div class="col-md-8 mt-1">
                                                <input type="radio" name="category" id="gold" value="Gold"/>
                                                <label for="gold">Gold</label>
                                                <input type="radio" name="category" id="K18" value="18K"/>
                                                <label for="K18">18K</label>
                                                <input type="radio" name="category" id="diamond" value="Diamond"/>
                                                <label for="diamond">Diamond</label>
                                                <input type="radio" name="category" id="gems" value="Gems"/>
                                                <label for="gems">Gems</label>
                                            </div>
                                           <div class="col-md-4">
                                                <button type="submit" class="btn btn-outline-success float-end" >search <x-bi-search/></button>
                                           </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                    {{-- search button end  --}}

                <div class="row flex-column flex-lg-row">

                    <h2 class="text-dark-50 h6">Quick Select</h2>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">{{$gold}}</h3>
                                <a href="/orders/gold" class="text-success" style="text-decoration: none">
                                    <x-bi-graph-up-arrow/>
                                    Gold
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">{{$K18}}</h3>
                                <a href="/orders/18K" class="text-success" style="text-decoration: none">
                                    <x-bi-graph-up-arrow/>
                                    18K
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">{{$diamond}}</h3>
                                <a href="/orders/diamond" class="text-success" style="text-decoration: none">
                                    <x-bi-graph-up-arrow/>
                                    Diamond
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">{{$gem}}</h3>
                                <a href="/orders/gems" class="text-success" style="text-decoration: none">
                                    <x-bi-graph-up-arrow/>
                                    Gems
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3 row flex-column flex-lg-row">
                <div class="col">
                    <h6 class="text-dark-50">Initial Processes</h6>
                    <div class="card">
                        <div class="card-body">
                            <a href="{{url ('/orders/new')}}" style="text-decoration: none;" class="text-muted"><x-bi-list-stars/> New request <i style="font-size: 11px; color: rgb(0, 168, 98);">{{$new}} </i></a>
                            <div class="progress mb-4 mt-2" style="height: 5px">
                                <div class="progress-bar bg-success" style="width: {{$new}}px"></div>
                            </div>
                            <a href="{{url ('/orders/ack')}}" style="text-decoration: none;" class="text-muted"><x-bi-pin-angle-fill/> Well noted <i style="font-size: 11px; color: rgb(0, 168, 98);">{{$ack}} </i></a>
                            <div class="progress mb-4 mt-2" style="height: 5px">
                                <div class="progress-bar bg-success" style="width: {{$ack}}px"></div>
                            </div>
                            <a href="{{url ('/orders/pending')}}" style="text-decoration: none;" class="text-muted"><x-bi-person-lines-fill/> Requested to GM <i style="font-size: 11px; color: rgb(0, 168, 98);">{{$pending}} </i></a>
                            <div class="progress mb-4 mt-2" style="height: 5px">
                                <div class="progress-bar bg-success" style="width: {{$pending}}px"></div>
                            </div>
                            <a href="{{url ('/orders/approved')}}" style="text-decoration: none;" class="text-muted"><x-bi-person-fill-check/> Approved <i style="font-size: 11px; color: rgb(0, 168, 98);">{{$approved}} </i></a>
                            <div class="progress mb-4 mt-2" style="height: 5px">
                                <div class="progress-bar bg-success" style="width: {{$approved}}px"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h6 class="text-dark-50">After Processes</h6>
                    <div class="card">
                        <div class="card-body">
                            <a href="{{url ('/orders/ordered')}}" style="text-decoration: none;" class="text-muted"><x-bi-shop-window/> Ordered to supplier <i style="font-size: 11px; color: rgb(0, 168, 98);">{{$ordered}} </i></a>
                            <div class="progress mb-4 mt-2" style="height: 5px">
                                <div class="progress-bar bg-success" style="width: {{$ordered}}px"></div>
                            </div>
                            <a href="{{url ('/orders/ar')}}" style="text-decoration: none;" class="text-muted"><x-bi-truck/> Arrivals <i style="font-size: 11px; color: rgb(0, 168, 98);">{{$ar}} </i></a>
                            <div class="progress mb-4 mt-2" style="height: 5px">
                                <div class="progress-bar bg-success" style="width: {{$ar}}px"></div>
                            </div>
                            <a href="{{url ('/orders/success')}}" style="text-decoration: none;" class="text-muted"><x-bi-bag-check/> Success orders <i style="font-size: 11px; color: rgb(0, 168, 98);">{{$closedorder}} </i></a>
                            <div class="progress mb-4 mt-2" style="height: 5px">
                                <div class="progress-bar bg-success" style="width: {{$closedorder}}px"></div>
                            </div>
                            <a href="{{url ('/orders/unavailable')}}" style="text-decoration: none;" class="text-muted"><x-bi-plug-fill/> Unavailable <i style="font-size: 11px; color: rgb(0, 168, 98);">{{$unavailable}} </i></a>
                            <div class="progress mb-4 mt-2" style="height: 5px">
                                <div class="progress-bar bg-success" style="width: {{$unavailable}}px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
        <section class="container">
            {{-- {{ $orders->links()}} --}}
            @isset($_GET['status'])
                <div class="alert alert-success">Successfully Ack</div>
            @endisset
            <div class="row g-5">
        @foreach ($orders as $order)

                 {{-- a container --}}
                 <div class="col-12 col-md-6 col-lg-6">
                    <div class="ms-3 clearfix row">
                        <div class="col-md-8">
                                {{-- code 1 add --}}
                            @if ($order['status_id']=== 1)
                            <div><x-bi-star-half style="color: #02767a;" />
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
                        <div class="col-md-4 claearfix pe-4"><span class="float-end"><small style="font-size: 11px;">{{count($order->comments)}}</small> <x-bi-chat-text/> </span></div>
                    </div>

                    <div class="rounded-4 py-3" style="height: 300px; padding: 10px; background:rgb(255, 255, 200);">

                        {{-- Order No and status--}}
                        <div class="bg-light rounded-5 " style="padding: 10px;">
                            <div><span style="color: #02767a"> Order No: </i> </span> <span style="color: #3a3a3abd;">{{$order['id']}}</span>
                                <i class="text-muted float-end"><x-bi-info-circle/>
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
                                            @if (in_array($user->id,[2,4]))
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

    <script src="js/index.js"></script>
</body>
</html>
