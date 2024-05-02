<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order-no {{$order['id']}} </title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="container col-md-8">

        {{-- top indicator  --}}

        <div class="clearfix mb-4">
            <div class=" float-end "
             style="width: 450px; background: #0a0225ef;
                    border-top-right-radius: 500px;
                    border-bottom-left-radius: 500px;
                    position: relative;
             ">
             {{-- stutus bar  --}}
                <div class="py-3 ps-5"
                @if ($order['status_id'] === 1)
                    style="
                width: 115px;
                background: #ff7300ef;
                border-top-right-radius: 500px;
                border-bottom-left-radius: 500px;"
                @elseif ($order['status_id'] === 2)
                style="width: 170px;
                background: #ff7300ef;
                border-top-right-radius: 500px;
                border-bottom-left-radius: 500px;"
                @elseif ($order['status_id'] === 3)
                style="width: 240px;
                background: #ff7300ef;
                border-top-right-radius: 500px;
                border-bottom-left-radius: 500px;"
                @elseif ($order['status_id'] === 4)
                style="width: 320px;
                background: #ff7300ef;
                border-top-right-radius: 500px;
                border-bottom-left-radius: 500px;"
                 @elseif ($order['status_id'] === 5)
                 style="width: 395px;
                 background: #ff7300ef;
                 border-top-right-radius: 500px;
                 border-bottom-left-radius: 395px;"
                  @elseif ($order['status_id'] === 6)
                  style="width: 435px;
                  background: #ff7300ef;
                  border-top-right-radius: 500px;
                  border-bottom-left-radius: 500px;"
                  @elseif ($order['status_id'] === 8)
                  style="width: 240px;
                  background: #ff7300ef;
                  border-top-right-radius: 500px;
                  border-bottom-left-radius: 500px;"
                @endif


                >
        {{--Add - 115 px
            Ack- 170px
            Pending- 240px
            Approved - 320px
            Ordered - 395px
            Ar -  435px --}}

                    <div class="btn-group" role="group">
                        <button type="button" class="btn" style="color: white;">Add</button>
                        <button type="button" class="btn" style="color: white;">Ack</button>
                        <button type="button" class="btn " style="color: white;">Pending</button>
                        <button type="button" class="btn text-body-light">Approved</button>
                        <button type="button" class="btn ">Ordered</button>
                        <button type="button" class="btn ">Ar</button>
                    </div>

                    {{-- Unavailiable title according by status code  --}}
                    @if ($order['status_id'] === 8)
                        <div class="text-center" style="width: 400px;height: 360px; background: #be0000b4;
                        border-bottom-right-radius: 200px;
                        border-top-left-radius: 200px;
                        margin-top: 40px;
                        margin-left: -50px;
                        position:absolute;
                        "><b class="" style="color: white;position:relative"><br/></b></div>
                        @elseif ($order['status_id'] === 7)
                        <div class="text-center" style="width: 400px;height: 360px; background: #ffae00b4;
                        border-bottom-right-radius: 200px;
                        border-top-left-radius: 200px;
                        margin-top: 40px;
                        margin-left: -50px;
                        position:absolute;
                        "><b class="" style="color: white;position:relative"><br/></b></div>
                    @endif
                </div>

            </div>
        </div>
        {{-- error showing  --}}
        @if ($errors->any())

            <div class="alert alert-success">
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ol>
            </div>
        @endif

        {{-- Order form start  --}}
        <form method="POST">
        @csrf
            <div class="rounded-5 p-4" style="height: auto; background: #dee2018f;">

                {{-- Categories bar  --}}
                <div class="p-1 btn-group mb-3" role="group" aria-label="Basic radio toggle button group">
                    <span class="input-group-text">Category</span>
                        <input type="radio" class="btn-check" name="{{$order['category']}}" id="{{$order['category']}}" autocomplete="off" checked />
                        <label for="{{$order['category']}}" class="btn btn-outline-dark">{{$order['category']}} </label>
                </div>
                {{-- photo div  --}}
                <div class="container">
                    <div class="row g-2">
                        <div class="col-md-4 col-lg-4 overflow-hidden" style="width:150px; height:150px; background: white;">
                            @foreach ($order->photos as $image)
                            <a href="{{ asset('storage/' . $image->orderimg) }}">
                                <img src="{{ asset('storage/' . $image->orderimg) }}" alt="Product" style="width: 150px">
                            </a>
                            @endforeach
                        </div>

                        <div class="col-md-4">
                            <ul>
                                <li>{{$order['design']}} </li>
                                <li>{{$order['detail']}} </li>

                                   <li>Order id - {{$order['id']}}</li>
                                   {{-- <li>{{$photo}}</li> --}}
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- design group  --}}
                {{-- <div class="input-group">
                    <span class="input-group-text" style="color: #202216;">Design</span>
                        <input class="" name="design" value="{{$order['design']}}" style="color: #1c1d1a; width: 100px;" disabled>

                        <input name="detail" value="{{$order['detail']}}" class="form-control" placeholder="Design detail" style="color: #b6cf43;" disabled/>
                </div> --}}

                {{-- details of product --}}
                <div class="row g-4 py-5 justify-content-between" style="padding-left: 7px;">
                    <div class="col-md-2">
                        <label for="quality" style="cursor:help">Quality</label>
                        <input name="quality" value="{{$order['quality']}}" disabled id="quality" class="form-control form-control-sm col-sm-3"/>
                    </div>
                    <div class="col-md-2">
                        <label  style="cursor:help">Weight</label>
                        <input name="weight"  value="{{$order['weight']}}" disabled class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        <label style="cursor:help">Size</label>
                        <input name="size"  value="{{$order['size']}}" disabled  class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        <label style="cursor:help">Quantity</label>
                        <input name="qty" type="number" value="{{$order['qty']}}"
                        @auth
                            @if ($user->id !== 2 && $user->id !== 1)
                            disabled
                            @endif
                        @endauth class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        <label style="cursor:help">Grade</label>
                        <input name="grade" type="text" value="{{$order['grade']}}" disabled class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        <label style="cursor:help">Sell/Month</label>
                        <input name="sell_rate" type="number" value="{{$order['sell_rate']}}" disabled class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        <label style="cursor:help">CounterStock</label>
                        <input name="counterstock" type="number" value="{{$order['counterstock']}}" disabled class="form-control form-control-sm" />
                    </div>

                    {{-- button selection / enable for inventory user 3/ code 2 --}}


                    @if ($order['status_id']>1)
                    <div class="col-md-2">
                        <label style="cursor:help">In hand</label>
                        <input name="instockqty" type="number" value="{{$order['instockqty']}}" class="form-control form-control-sm"
                        @auth
                            @if ($user->id !== 3 && $user->id !== 1)
                            disabled
                            @endif
                            @if (in_array($user->id,[1,3]))
                            required
                            @endif
                        @endauth

                        @guest
                                disabled
                        @endguest
                        />
                    </div>

                    <div class="col-md-2">
                        <label style="cursor:help">ကြာချိန်/Days</label>
                        <input name="estimatetime" autocomplete="off" value="{{$order['estimatetime']}}" class="form-control form-control-sm" value="{{$order['estimatetime']}}"
                        @auth
                            @if ($user->id !== 3 && $user->id !== 1)
                            disabled
                            @endif
                            @if (in_array($user->id,[1,3]))
                            required
                            @endif
                        @endauth
                                 @guest
                                         disabled
                                 @endguest

                        />
                    </div>

                    <div class="col-md-2">
                        <label style="cursor:help">Un/Available</label>
                        <select name="available" id="statusid" class="form-control form-control-sm">
                            <option value="1" @if ($order['status_id'] !== 8)
                                selected
                            @endif>Available</option>
                            <option value="0"
                            @if ($order['status_id'] === 8)
                                selected
                            @endif
                            @auth
                                @if ($user->id !== 1 && $user->id !== 3 && $user->id !== 2)
                                disabled
                                @endif
                            @endauth

                            @guest
                                disabled
                            @endguest
                            >Unavailable</option>
                        </select>
                    </div>
                    @endif
                    {{-- end for status code 3  --}}

                    {{-- ar qty code 5  --}}
                    @if ($order['status_id'] >= 5)
                            <div class="col-md-2">
                                <label style="cursor:help">arQty</label>
                                <input name="arqty" type="number" autocomplete="off" value="{{$order['arqty']}}"  class="form-control form-control-sm"
                                @auth
                            @if ($user->id !== 3 && $user->id !== 1)
                            disabled
                            @endif
                            @if (in_array($user->id,[1,3]))
                            required
                            @endif
                        @endauth />
                            </div>
                    @endif

                    @if ($order['status_id'] >= 6)
                            <div class="col-md-2">
                                <label style="cursor:help">close-Qty</label>
                                <input name="closeqty" type="number" value="{{$order['closeqty']}}" class="form-control form-control-sm"
                                @auth
                            @if ($user->id !== 3 && $user->id !== 1)
                            disabled
                            @endif
                            @if (in_array($user->id,[1,3]))
                            required
                            @endif
                        @endauth />
                            </div>
                    @endif

                    {{-- Hide inputs --}}
                    {{-- <input type="number" value="1" name="status_id" hidden/> --}}




              </div>

              {{-- note field  and Request Branch --}}
              <div class="py-3">
                <label for="note">Note</label>
                <textarea name="note" disabled id="note" class="form-control">{{$order['note']}}</textarea>
              </div>

              {{-- submit buttom  --}}
              <div>
                @auth
                    @if(in_array($user->id, [1,3]) && $order['status_id'] === 2)
                        <button name="action" class="btn btn-warning" type="submit" value="request"
                        @if ($user->id !== 3 && $user->id !== 1)
                            disabled
                        @endif>Request</button>
                    @endif

                    @if (in_array($user->id, [1,2,3]) && $order['status_id'] === 3)
                        <button name="action" class="btn btn-warning" type="submit" value="approve"
                        @if ($user->id !== 2 && $user->id !== 1 && $user->id !== 3)
                            disabled
                        @endif>Approve</button>
                    @endif
                    @if (in_array($user->id,[1,3]) && $order['status_id'] === 4)
                        <button name="action" class="btn btn-warning" type="submit" value="ordered"
                        @if ($user->id !== 3 && $user->id !== 1)
                            disabled
                        @endif>Ordered</button>
                    @endif
                    @if (in_array($user->id,[1,3]) && $order['status_id'] === 5)
                        <button name="action" class="btn btn-warning" type="submit" value="arrived"
                        @if ($user->id !== 3 && $user->id !== 1)
                            disabled
                        @endif>Arrived</button>
                    @endif
                    @if (in_array($user->id,[1,3]) && $order['status_id'] === 6)
                        <button name="action" class="btn btn-warning" type="submit" value="closeorder"
                        @if ($user->id !== 3 && $user->id !== 1)
                            disabled
                        @endif>Close Order</button>
                    @endif
                @endauth
              </div>
            </div>
        </form>
    </div>
    {{-- comment section  --}}
    <div class="container col-md-8">
        <div class="py-5">
            @auth
            <h4>Add a Comment </h4>
            <form action="{{ url ('/comments/add')}}" method="POST">
                @csrf

                    <input name="order_id" value="{{$order['id']}}" hidden />
                    <input name="user_id" value="{{$user->id}}" hidden/>
                    <textarea name="content" class="form-control" placeholder="New Comment" required></textarea>

                    @if (in_array($user->id,[1,2,3,4]))
                        <input type="submit" class="btn btn-primary mt-2" value="comment"/>
                    @endif
            @endauth
            </form>
        </div>
    </div>
    {{-- end of comment section  --}}

    <div class="container col-md-8">
        <div>
            @foreach ($order->comments as $comment)
                <div class="mb-3 border-bottom border-secondary clearfix">
                    <b class="text-muted">{{$comment->user->name}}</b>
                    <ul>
                        <li>{{$comment['content']}}</li>
                    </ul>
                    <i class="text-muted float-end">{{$comment->created_at->diffForHumans()}}</i>
                </div>

            @endforeach
        </div>
    </div>

    @endsection
</body>
</html>
