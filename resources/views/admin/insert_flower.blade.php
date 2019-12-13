@extends('admin.layoutadmin')
@section('title', "Insert Flower")

@section('contents')
    <p id="title">Insert Flowers</p>
    <hr>
    <div class="form-insert">
        <form action="/admin/flowers/insert" method="post" enctype="multipart/form-data">
            @csrf

            <label for="flower_name"><span>Flower Name</span>
                <p>{{$errors->first('flower_name')}}</p><input type="text" class="input-field" name="flower_name"
                                                               value=""/></label>
            <label for="flower_price"><span>Flower Price</span>
                <p>{{$errors->first('flower_price')}}</p><input type="number" class="input-field" name="flower_price"
                                                                value=""/></label>
            <label for="flower_stock"><span>Flower Stock</span>
                <p>{{$errors->first('flower_stock')}}</p><input type="number" class="input-field" name="flower_stock"
                                                                value=""/></label>
            <label for="flower_type"><span>Flower Type</span><select name="flower_type" class="select-field">
                    @foreach($flower_types as $type)
                        <option value="{{$type->flower_type}}">{{$type->flower_type}}</option>
                    @endforeach
                </select></label>

            <label for="flower_description"><span>Flower Description</span>
                <p>{{$errors->first('flower_description')}}</p><textarea name="flower_description"
                                                                         class="textarea-field"></textarea></label>

            <label for="flower_image"><span>img_url</span>
                <p>{{$errors->first('flower_image')}}</p><input type="file" class="input-field" name="flower_image"
                                                                value=""/></label>
            <div class="submit"><input type="submit" value="Insert"/></div>
        </form>
    </div>

@endsection

