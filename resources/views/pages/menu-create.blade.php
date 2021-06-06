@extends('layouts.admin')

@section('content')
<div class="col-lg-9 col-md-12 pt-5 justify-content-around" style="min-height: calc(100vh - 56px); overflow-y: scroll; background-color: #fefefe; font-size: 20px;">
    <h2>Create Menu </h2>
        <div class="shadow-lg">
            <div class="col-lg-12 zoomin-anim bg-light rounded border-0 p-4">

                    @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li><strong>{{ $error }}</strong></li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                    @if (session()->has('status') && !session('status'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{session('message')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                <form method="POST" action="{{ route('menu.store') }}" >
                    @csrf
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="name" class="sr-only">Menu Name </label>
                                <input type="text" id="name" name="name" class="form-control mb-2" placeholder="Enter a menu title" required autofocus>
                            </div>
                            <div class="col-sm-6">
                                <label for="link" class="sr-only">Route name</label>
                                <input type="text" id="link" name="link" class="form-control mb-2" placeholder="Enter a route name" required>
                            </div>
                        </div>
                    </div>
                    <h5><code>If this menu is a submenu, choose his parent. If not click Save</code></h5>
                    <div class="form-group">
                        <label for="menu_id" class="sr-only"> Submenu </label>
                        <select name="ref" id="ref">
                            <option value="-1" selected> -- Select a parent menu -- </option>
                            @foreach($menus as $key => $menu)
                                <option value="{{$menu['id']}}" > {{$menu['name']}} </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button class="btn bg-danger text-light border-0 mt-4" type="submit" name="submit">Save</button>
                </form>
            </div>
        </div>

</div>

@endsection