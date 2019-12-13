@extends('admin.layoutadmin')
@section('title', "Manage Flower Types")
<style>
    .topcard {
        height: 50%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .bottomcard {
        height: 50%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .cardview {
        display: flex;
        flex-direction: row;
        flex-flow: wrap;
        justify-content: center;
        margin-bottom: 50px;
    }

    .card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        max-width: 233px;
        min-width: 220px;
        height: fit-content;
        padding: 10px;
        background-color: #ffffff;
        border-width: 2px;
        border-radius: 10px;
        border-color: #F37A71;
        border-style: solid;
        margin-right: 20px;
        margin-left: 20px;
        margin-top: 50px;
    }

    .image img {
        padding-top: 9px;
        width: 92%;
        height: 150px;
        max-height: 150px;
        padding-left: 9px;
        border-radius: 20px;
    }

    .detailorder form {
        width: 100%;
        display: flex;
        justify-content: space-around;
    }

    .detailorder {
        display: flex;
    }

    .name {
        text-align: center;
        padding-top: 10px;
        font-size: 22px;
        font-weight: bold;
    }

    .detailorder input[type=submit] {
        border: none;
        padding: 10px 15px 10px 15px;
        color: #fff;
        font-size: 20px;
        box-shadow: 1px 1px 4px #DADADA;
        border-radius: 6px;
        width: 100px;
        margin-bottom: 10px;
    }

    #update {
        border: solid #CBB956 1px;
        background-color: #CBB956;
    }

    #delete {
        border: solid #bf5329 1px;
        background-color: #bf5329;
    }

    #update:hover, #delete:hover {
        border: solid #F37A71 1px;
        background-color: white;
        color: #F37A71;
        cursor: pointer;
    }


    .pagination li {
        display: inline-block;
        color: black;
        float: left;
        text-decoration: none;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin: 20px 5px 20px 5px;
    }

    .pagination a {
        display: inline-block;
        padding: 8px 16px;
        text-decoration: none;
    }

    .pagination li.active {
        padding: 8px 16px;
        background-color: #F37A71;
        color: white;
        border: 1px solid #F37A71;
    }

    .pagination li.disabled {
        padding: 8px 16px;
    }

    .pagination li:hover:not(.active) {
        background-color: #ddd;
    }

    .pagination li:first-child {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .pagination li:last-child {
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .alert {
        font-size: 18px;
        margin-top: 40px;
        padding: 20px;
        background-color: #f44336;
        color: white;
        border-radius: 7px;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }


</style>

@section('contents')
    <p id="title">Manage Flower Types</p>
    <hr>
    <a href="/admin/flowers/type/insert" class="insertbtn">Insert Flower Type</a>
    <form class="search" action="/admin/flowers/type/search" method="get">
        <input type="text" placeholder="I want to find ..." name="search">
        <button type="submit">Search</button>
    </form>

    @if(\Session::has('alert'))
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Sorry, </strong> {{Session::get('alert')}} <strong> Try another keywords.</strong>
        </div>
    @endif

    @if(\Session::has('alert-success'))
        <div class="alert" style="background-color: #3490dc">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Nice! </strong> {{Session::get('alert-success')}}
        </div>
    @endif

    @if(\Session::has('alert-update'))
        <div class="alert" style="background-color: #3490dc">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Good job! </strong> {{Session::get('alert-update')}}
        </div>
    @endif

    @if(\Session::has('alert-delete'))
        <div class="alert" style="background-color: #3490dc">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Success! </strong> {{Session::get('alert-delete')}}
        </div>
    @endif


    <div class="cardview">
        @foreach($types as $type)
            <div class="card">
                <div class="topcard">
                    <div class="name">
                        <p>{{$type->flower_type}}</p>
                    </div>
                </div>
                <div class="bottomcard">
                    <div class="detailorder">
                        <form action="/admin/flowers/type/{{$type->id}}/edit" method="get">
                            @csrf
                            <input id="update" type="submit" value="Update">
                        </form>
                        <form action="/admin/flowers/type/{{$type->id}}/delete" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input id="delete" type="submit" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{$types->links()}}
@endsection
