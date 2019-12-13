@extends('admin.layoutadmin')

@section('title', 'Update Courier')

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
    <p id="title">Update Courier</p>
    <hr>
    @if(\Session::has('alert-fail'))
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Sorry, </strong> {{Session::get('alert-fail')}} <strong> Try another keywords.</strong>
        </div>
    @endif
    <div class="form-insert">
        <form action="/courier/{{$courier->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <table id="courier-insert">
                <tr>
                    <td><span>Courier ID</span></td>
                    <td><input type="text" name="courier_name" value="{{$courier->id}}" disabled></td>
                </tr>
                <tr>
                    <td><span>Courier Name</span></td>
                    <td><input type="text" name="courier_name" value="" placeholder="{{$courier->courier_name}}"></td>
                    {{$errors->first('courier_name')}}
                </tr>
                <tr>
                    <td><span>Shipping Cost</span></td>
                    <td><input type="number" name="courier_price" value="" placeholder="{{$courier->courier_price}}"></td>
                    {{$errors->first('courier_price')}}
                </tr>
            </table>
            <div class="submit">
                <input type="submit" name="" value="Update">
            </div>
        </form>
    </div>
@endsection
