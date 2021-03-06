@extends('layout')

@section('title', 'Update Profile')

@section('contents')
    <p id="title">Update Courier</p>
    <hr>

    <div class="form-insert">
        <form action="/profile" method="post" enctype="multipart/form-data">
            @csrf
            {{method_field('put')}}
            <label for="field1"><span>Name</span>
                <input type="text" class="input-field" name="nameregister" value="{{ Session::get('username') }}" autofocus>
                <td>
                    {{$errors->first('nameregister')}}
                </td>
            </label>
            <label for="field1"><span>E-Mail Address</span>
                <input type="text" class="input-field" name="emailregister" value="{{ Session::get('email') }}" autofocus>
                <td>
                    {{$errors->first('emailregister')}}
                </td>
            </label>

            <label for="field1"><span>Phone Number</span>
                <input type="tel" class="input-field" name="phoneregister" value="{{ Session::get('phone') }}" autofocus>
                <td>
                    {{$errors->first('phoneregister')}}
                </td>
            </label>

            <label><span>Gender</span>
                <div class="radio-group">
                    <label>
                        <input type="radio" value="male" name="gender" <?php if(old('gender')== "male") { echo 'checked="checked"'; } ?>>
                        Male
                    </label>

                    <label>
                        <input type="radio" value="female" name="gender" <?php if(old('gender')== "female") { echo 'checked="checked"'; } ?>>
                        Female
                        <span></span>
                    </label>

                    <td>
                        {{$errors->first('gender')}}
                    </td>
                </div>
            </label>

            <label><span>Address</span>
                <textarea class="textarea-field" name="address" id="address" cols="100" rows="10" >{{Session::get('address')}}</textarea>

                <td>
                    {{$errors->first('address')}}
                </td>
            </label>
            <label>
                <span>Profile image</span>
                <input type="file" class="input-field" name="product_image">
                <td>
                    {{$errors->first('product_image')}}
                </td>
            </label>
            <div class="submit">
                <input type="submit" name="" value="Update">
            </div>
        </form>
    </div>
@endsection
