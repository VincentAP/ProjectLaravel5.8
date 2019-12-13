@extends('layout')

@section('title', 'Register')

@section('contents')
    <p id="title">Register</p>
    <hr>
    <div class="form-insert">
        <form action="{{url('/registerPost')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="field1"><span>Name</span>
                <input type="text" class="input-field" name="nameregister" value="{{ old('nameregister') }}" autofocus>
                <td>
                    {{$errors->first('nameregister')}}
                </td>
            </label>

            <label for="field1"><span>E-Mail Address</span>
                <input type="text" class="input-field" name="emailregister" value="{{ old('emailregister') }}" autofocus>
                <td>
                    {{$errors->first('emailregister')}}
                </td>
            </label>

            <label for="field1"><span>Phone Number</span>
                <input type="tel" class="input-field" name="phoneregister" value="{{ old('phoneregister') }}" autofocus>
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
                <textarea class="textarea-field" name="txtarea" id="address" cols="100" rows="10" >{{ old('txtarea') }}</textarea>

                <td>
                    {{$errors->first('txtarea')}}
                </td>
            </label>

            <div class="form-group">
                <label for="password"><span>Password</span>
                    <input type="password" class="input-field" id="password" name="password">
                    <td>
                        {{$errors->first('password')}}
                    </td>
                </label>
            </div>

            <div class="form-group">
                <label for="password-confirmation"><span>Confirm Password</span>
                    <input type="password" class="input-field" id="password-confirmation" name="password_confirmation">
                    <td>
                        {{$errors->first('password_confirmation')}}
                    </td>
                </label>
            </div>

            <label>
                <span>Image</span>
                <input type="file" class="input-field" name="product_image">
                <!-- code error here -->
                <td>
                    {{$errors->first('product_image')}}
                </td>
            </label>

            <div class="submit"><input type="submit" value="Register" /></div>
        </form>
    </div>
@endsection
