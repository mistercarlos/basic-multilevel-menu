@extends('layouts.admin')

@section('content')
<div class="col-lg-9 col-md-12 pt-5 justify-content-around" style="min-height: calc(100vh - 56px); overflow-y: scroll; background-color: #fefefe; font-size: 20px;">
    <p>My Menu</p>
    <div class="card ml-3 pl-3">
        <div class="card-body">
            <div>
                <a role="button" href="{{route('menu.create')}}" style="float: right;" class="btn btn-primary"> Add</a>
            </div>
            
            <br><br>
            <table id="myTable" class="table display " width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Link / route</th>
                        <th>Type</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach($menus as $key => $menu)

                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$menu['name']}}</td>
                            <td>{{$menu['link']}}</td>
                            <td>{{$menu['menu_id'] ? "Link to ". $menu['menu_id'] : "Main menu" }}</td>
                        </tr>

                    @php
                        $i++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>              

</div>

@endsection

@section('js')

<script>

$(document).ready( function () {
	$('#myTable').DataTable();
	
});

</script>


@endsection
