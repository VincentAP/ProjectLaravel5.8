@extends('admin.layoutadmin')
@section('title', "Update Flower Type")
<style>
    .alert {
        font-size: 18px;

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
    <p id="title">Update Flower Type</p>
    <hr>
    @if(\Session::has('alert-fail'))
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Sorry, </strong> {{Session::get('alert-fail')}} <strong> Try another keywords.</strong>
        </div>
    @endif
    <div class="form-insert">
        <form action="/admin/flowers/type/{{$flower->id}}/update" method="post">
            @csrf
            <label for="id"><span>Flower Type</span><input disabled type="text" class="input-field" name="id" value="{{$flower->id}}" /></label>
            <label for="flower_type"><span>Flower Type</span><input type="text" class="input-field" name="flower_type" value="" placeholder="{{$flower->flower_type}}" /></label>
            <div class="submit"><input type="submit" value="Update" /></div>
        </form>
    </div>
@endsection

