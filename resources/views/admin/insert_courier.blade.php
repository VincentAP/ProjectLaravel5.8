@extends('admin.layoutadmin')
@section('title', "Insert Courier")

<style>
    .alert {
        font-size: 18px;
        margin-top: 15px;
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
    <p id="title">Insert Courier</p>
    <hr>
    <div class="form-insert">
        <form action="" method="post">
            @csrf
            <label for="courier_name"><span>Courier Name</span><input type="text" class="input-field" name="courier_name" value="" /></label>
            <label for="courier_price"><span>Courier Price</span><input type="number" class="input-field" name="courier_price" value="" /></label>
            <div class="submit"><input type="submit" value="Insert" /></div>
            @if(\Session::has('alert-fail'))
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Insert failed! </strong> {{Session::get('alert-fail')}}
                </div>
            @endif
        </form>
    </div>
@endsection

