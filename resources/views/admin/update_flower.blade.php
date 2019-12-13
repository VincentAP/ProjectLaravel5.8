@extends('admin.layoutadmin')

@section('title', "Update Flower")

@section('contents')
    <p id="title">Update Flowers</p>
    <hr>

    <div class="form-insert">
        <form action="/admin/flowers/{{$flower->id}}/update" method="post" enctype="multipart/form-data">
            @csrf
            <label for="flower_name"><span>Flower Name</span>
                {{$errors->first('flower_name')}}<input type="text" class="input-field" name="flower_name" placeholder="{{$flower->flower_name}}"/></label>
            <label for="flower_price"><span>Flower Price</span>
                {{$errors->first('flower_price')}}<input type="number" class="input-field"
                                                                name="flower_price" placeholder="{{$flower->flower_price}}"/></label>
            <label for="flower_stock"><span>Flower Stock</span>
                {{$errors->first('flower_stock')}}<input type="number" class="input-field"
                                                                name="flower_stock" placeholder="{{$flower->flower_stock}}"/></label>
            <label for="flower_type"><span>Flower Type</span>
                {{$errors->first('flower_type')}}<select name="flower_type" class="select-field">
                    @foreach($flower_types as $type)
                        @if($type->flower_type == $flower->flower_type)
                            <option selected value="{{$type->flower_type}}">{{$type->flower_type}}</option>
                        @else
                            <option value="{{$type->flower_type}}">{{$type->flower_type}}</option>
                        @endif
                    @endforeach
                </select></label>
            <label for="flower_description"><span>Flower Description</span>
                {{$errors->first('flower_description')}}<textarea name="flower_description"
                                                                         class="textarea-field"
                                                                         placeholder="{{$flower->flower_description}}"></textarea></label>
            <label for="flower_image"><span>img_url</span>
                {{$errors->first('flower_image')}}<input type="file" class="flower_image" name="flower_image"
                                                                value=""/></label>
            <div class="submit"><input type="submit" value="Update"/></div>
        </form>
    </div>
@endsection

