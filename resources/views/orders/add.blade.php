<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Order</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="container col-md-8">

        {{-- top indicator  --}}

        <div class="clearfix mb-4">
            <div class=" float-end"
             style="width: 450px; background: #0a0225ef;
                    border-top-right-radius: 500px;
                    border-bottom-left-radius: 500px;
             ">
             {{-- stutus bar  --}}
                <div class="py-3 ps-5" style="width: 115px; background: #7bff00ef;
                border-top-right-radius: 500px;
                border-bottom-left-radius: 500px;
         ">
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
        {{-- form start  --}}

        <form method="POST" enctype="multipart/form-data">
        @csrf
            <div class="rounded-5 p-4" style="height: auto; background: #63c94fb6;">

                {{-- Categories bar  --}}
                <div class="p-1 btn-group mb-3" role="group" aria-label="Basic radio toggle button group">
                    <span class="input-group-text">Category</span>

                    @foreach ($cats as $category)
                        <input type="radio" class="btn-check" name="category" value="{{$category['name']}}" id="{{$category['name']}}" autocomplete="off" />
                        <label for="{{$category['name']}}" class="btn btn-outline-dark">{{$category['name']}} </label>
                    @endforeach
                </div>

                {{-- photo input & branch  --}}
                <div class="row mb-3 col-md-12 justify-content-between">
                    <div class="mb-2 col-md-6">
                        <div class="input-group">
                            <input class="form-control" type="file" accept="image/*" name="orderimg" />
                            <span class="input-group-text">
                                <x-bi-image class="icon" />
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-text"> <x-bi-buildings/></span>
                            <select class="form-control" name="branch" id="">
                                <option value="Branch_1" selected>Branch 1</option>
                                <option value="Branch_2">Branch 2</option>
                                <option value="HO">HO</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- design group  --}}
                <div class="input-group">
                    <span class="input-group-text" style="color: #202216;">Design</span>
                        <select class="" name="design" style="color: #b6cf43; width: 100px;">
                            <option disabled selected>Select</option>

                            @foreach ($designs as $design)
                             <option  value="{{$design['name']}}">{{$design['id']}}- {{$design['name']}} </option>
                            @endforeach
                        </select>
                        <input name="detail" class="form-control" required placeholder="detail" style="color: #b6cf43;"/>
                </div>

                {{-- details of product --}}
                <div class="row g-4 py-5 justify-content-between" style="padding-left: 7px;">
                    <div class="col-md-2">
                        <label for="quality" style="cursor:help">Quality</label>
                        <select id="quality" name="quality" class="form-control form-control-sm">
                            <option value="" disabled selected>Shwe</option>
                            @foreach ($qualities as $quality)
                                <option  value="{{$quality}}">{{$quality}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label  style="cursor:help">Weight</label>
                        <input name="weight" autocomplete="off" class="form-control form-control-sm" placeholder="Tatar" required />
                    </div>
                    <div class="col-md-2">
                        <label style="cursor:help">Size</label>
                        <input name="size" autocomplete="off" class="form-control form-control-sm" placeholder="-" required />
                    </div>
                    <div class="col-md-2">
                        <label style="cursor:help">Quantity</label>
                        <input name="qty" type="number" autocomplete="off" class="form-control form-control-sm" placeholder="Gold"  required/>
                    </div>
                    <div class="col-md-2">
                        <label for="grade" style="cursor:help" >Grade</label>
                        <select name="grade" id="grade" class="form-control form-control-sm" >
                            <option value="" disabled selected>&</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label style="cursor:help">Sell/Month</label>
                        <input name="sell_rate" autocomplete="off" type="number" class="form-control form-control-sm" placeholder="Jewelry" required />
                    </div>
                    <div class="col-md-2">
                        <label style="cursor:help">CounterStock</label>
                        <input name="counterstock" autocomplete="off" type="number" class="form-control form-control-sm" required/>
                    </div>

                    {{-- Hide inputs --}}
                    <input type="number" value="1" name="status_id" hidden/>
                    <input name="user_id" class="form-control form-control-sm" value="1" hidden />
              </div>

              {{-- note field  and Request Branch --}}
              <div class="py-3">
                <label for="note">Note</label>
                <textarea name="note" id="note" class="form-control"></textarea>
              </div>
              {{-- submit buttom  --}}
              @auth
              <div>
                <button class="btn btn-success">save <x-bi-check2-circle/></button>
              </div>
              @endauth

            </div>
        </form>
    </div>
    @endsection
</body>
</html>
