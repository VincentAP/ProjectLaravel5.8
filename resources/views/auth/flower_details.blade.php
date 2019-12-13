@extends('layout')
@section('title', "Flower Details")
<style>
    .vl {
        border-left: 2px solid #F37A71;
        height: auto;
        margin-right: 40px;
        margin-left: 40px;
    }

    .box{
        display: flex;
        width: 80%;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .imgBx img{
        width: 250px;
        height: 250px;
        border-radius: 30px;
        margin-left: 20px;
    }

    .detail{
        margin-top: 25px;
    }

    .detail .contentdata{
        margin-top: 20px;
        margin-left: 20px;
        display: flex;
        flex-direction: row;
    }

    .detail .contentdata input[type=number]{
        width: 105px;
        height: 40px;
        border-radius: 10px;
        border-width: 2px;
    }

    .detail .contentdata .leftcontent{
        display: flex;
        flex-direction: column;
    }

    .detail .contentdata .leftcontent label{
        margin-bottom: 10px;
    }

    .detail .contentdata .leftcontent input{
        padding-left: 8px;
    }

    .detail .contentdata .rightcontent{
        display: flex;
        flex-direction: row;
        margin-left: 260px;
        margin-top: 5px;
    }

    .addcart{
        position: fixed;
        margin-left: 265px;
    }

    .rcp{
        font-size: 30px;
        font-family: "Sitka Banner";
        color: #F37A71;
        margin-left: 80px;
    }

    h2{
        margin-bottom: 5px;
        font-size: 40px;
    }

    .box .detail .text {
        margin: 0;
        padding-right: 100px;
        text-align: justify;
    }

    .box .detail .contentdata .rightcontent input {
        border: solid #F37A71 1px;
        padding: 5px 15px 5px 15px;
        background: #F37A71;
        color: #fff;
        font-size: 20px;
        box-shadow: 1px 1px 4px #DADADA;
        border-radius: 6px;
        width: 125px;
        height: 40px;
        margin-bottom: 10px;
    }

    .align{
        position: relative;
        margin-top: 50px;
    }

    .rightcontent p{
        margin-top: 10px;
    }

</style>
@section('contents')
    @if(count($errors))
        <div class="alert-danger">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            Quantity should be <strong>at least 1</strong> to be added to cart
        </div>
    @endif
    @if(\Session::has('alert-success'))
        <div class="messagealert">
            <div class="alert-success" role="alert">
                <div>{{Session::get('alert-success')}}</div>
            </div>
        </div>
    @endif
    <p id="title">Flower Details</p>
    <hr>
    <div class="box">
        <div class="imgBx">
            <img src="{{ asset('storage/images/'.$detail->flower_image)}}" alt="flower image">
        </div>

        <div class="vl"></div>

        <div class="detail">
            <h2>{{$detail->flower_name}}</h2>
            <p class="text">{{$detail->flower_description}}</p>

            <form action="/flowers/{{$detail->id}}/orderdetail" method="get"
                  enctype="multipart/form-data">
                <div class="align">
                    <div class="contentdata">
                        <div class="leftcontent">
                            <label for="flower_stock">stock : {{$detail->flower_stock}}</label>
                            <input type="number" name="flower_stock"/>
                        </div>

                        <div class="rightcontent">
                            <p class="rcp">Rp.{{$detail->flower_price}}</p>
                            <input type="submit" value="Add to cart" class="addcart"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
