@extends('layout')

@section('title', 'Cart')

<style>
    .table-head th{
    }

    .table-row, .table-head{
        display: table;
        width: 78%;
        font-family: sans-serif;
        background: transparent;
        padding: 12px 0;
        color: black;
        font-size: 20px;
        border-style: solid;
        border-right-style: none;
        border-left-style: none;
        border-top-style: none;
        border-width: 2px;
        border-color: #636b6f;
    }

    .table-content{
        display: table;
        width: 78%;
        padding: 12px 0;
        color: gray;
        font-size: 20px;
        border-style: solid;
        border-right-style: none;
        border-left-style: none;
        border-top-style: none;
        border-width: 1px;
        border-color: gray;
    }

    .table-cell{
        display: table-cell;
        width: 30%;
        text-align: center;
        padding-left: 90px;
        padding-right: 90px;
        border-right: 1px solid #38c172;
        vertical-align: middle;
    }

    .table-cell-no-border{
        display: table-cell;
        width: 30%;
        text-align: center;
        padding-left: 90px;
        padding-right: 90px;
        vertical-align: middle;
    }

    .content_table{
        display: flex;
        align-items: center;
        margin-top: 10px;
    }

    .table-content .image img{
        border-radius: 15px;
        width: 200px;
        height: 180px;
    }
    .table-content th{
        align-content: center;
        font-family: "Sitka Banner";
    }

    table{
        table-layout: fixed;
    }

    #delete {
        border: solid #bf5329 1px;
        background-color: #bf5329;
    }

    #delete:hover {
        border: solid #F37A71 1px;
        background-color: white;
        color: #F37A71;
        cursor: pointer;
    }

    #checkout {
        border: solid mediumseagreen 1px;
        background-color: mediumseagreen;
        margin-left: 452px;
    }

    #checkout:hover {
        border: solid mediumseagreen 1px;
        background-color: white;
        color: mediumseagreen;
        cursor: pointer;
    }

    .table-content input[type=submit] {
        border: none;
        padding-top: 6px;
        padding-bottom: 8px;
        color: #fff;
        font-size: 20px;
        box-shadow: 1px 1px 4px #DADADA;
        border-radius: 6px;
        width: 100px;
        margin-bottom: 10px;
    }

    .holder2 input[type=submit]{
        border: none;
        padding-top: 4px;
        padding-bottom: 6px;
        color: #fff;
        font-size: 20px;
        box-shadow: 1px 1px 4px #DADADA;
        border-radius: 6px;
        width: 175px;
        margin-bottom: 10px;
        margin-left: 150px;
    }

    .courierselect select{
        width: 500px;
        height: 35px;
        border-radius: 5px;
        padding-left: 13px;
        font-family: "Sitka Banner";
        font-size: 18px;
    }

    .holder{
        margin-top: 10px;
        display: flex;
        margin-left: 610px;
        align-items: center;
    }

    .holder2{
        margin-top: 10px;
        display: flex;
        margin-left: 590px;
        align-items: center;
        width: 630px;
    }

    .holder p, .holder2 p{
        margin-right: 35px;
        font-family: "Sitka Banner";
        font-size: 18px;
    }

    .holder2 .price{
        position: absolute;
        width: 80px;
        padding-top: 7px;
    }

    .holder2 .value{
        position: absolute;
        margin-left: 108px;
        max-width: 340px;
        padding-top: 7px;
    }

    .check{
        position: relative;
    }

    .prc{
        margin-top: 20px;
    }

    option{
        font-family: "Sitka Banner";
    }
</style>

@section('contents')
    @if(\Session::has('alert-delete'))
        <div class="alert-success" role="alert">
            <span class="closebtns" onclick="this.parentElement.style.display='none';">&times;</span>
            <div>{{Session::get('alert-delete')}}</div>
        </div>
    @endif
    <p id="title">Cart</p>
    <hr>

    <table class="table-head" id="products">
        <tr>
            <th>Picture</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </table>

    @foreach($carts as $cart)
        <table class="table-content" id="products">
            <tr>
                <th class="image">
                    <img src="{{ asset('storage/images/'.$cart->flower_image)}}">
                </th>
                <th>
                    {{$cart->flower_name}}
                </th>
                <th>
                    {{$cart->quantity}}
                </th>
                <th>
                    {{$cart->price}}
                </th>
                <th>
                    <form action="/cart/{{$cart->id}}/delete" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input id="delete" type="submit" value="Remove">
                    </form>
                </th>
            </tr>
        </table>
    @endforeach


    <form action="/cart/checkout" method="post">
        @csrf
        {{ method_field('post') }}
        <div class="holder">
            <p>Courier</p>
            <div class="courierselect">
                <div class="select">
                    <select name="selectvalue">
                        @foreach($couriers as $courier)
                            <option>{{$courier->courier_name}} - {{$courier->courier_price}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="prc">
            <div class="holder2">
                <div class="check">
                    <p class="price">Total Price:</p>
                    <p class="value">Rp.{{Session::get('totalprice')}}</p>
                    <input id="checkout" type="submit" value="Checkout">
                </div>
            </div>
        </div>
    </form>
@endsection
