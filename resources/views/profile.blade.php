@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <img src="{{Storage::url(Auth::user()->logo)}}" style="width:150px;height:150px;float:left;border-radius: 50%;margin-right: 25px;">
                    <h2>{{Auth::user()->name}}'s profile</h2>
                <form action="/user-update/{{ Auth::user()->id }}" method="POST" style="width: 200px; margin-left:24%;" enctype="multipart/form-data">
                    @csrf
                    <label>Name:<br/>
                    <input name="name" value="{{Auth::user()->name}}" placeholder="Enter your name"><br/>
                    </label>
                    <label>Surname:
                    <input name="surname" value="{{Auth::user()->surname}}" placeholder="Enter your surname"><br/>
                    </label>
                    <label>Last name:
                    <input name="last_name" value="{{Auth::user()->last_name}}" placeholder="Enter your last name"><br/>
                    </label>
                    <label>Email:<br/>
                    <input name="email" value="{{Auth::user()->email}}" readonly style="background-color: rgba(0,9,73,0.37);"><br/>
                    </label>
                    <label>Phone:
                    <input name="phone" value="{{Auth::user()->phone}}" readonly style="background-color: rgba(0,9,73,0.37);"><br/>
                    </label>
                    <label>Logo:
                        <input type="file" name="logo">
                    </label>
                    <input type="submit" value="Сохранить">
                </form>
            </div>
        </div>
    </div>
@endsection
