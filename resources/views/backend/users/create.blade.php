@extends('layouts.global')
@section("title") Create User @endsection
@section('content')
        <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('users.store')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input value="{{old('name')}}" class="form-control {{$errors->first('name') ? "is-invalid": ""}}" placeholder="Full Name" type="text" name="name" id="name"/>
                                        <div class="invalid-feedback">
                                            {{$errors->first('name')}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input value="{{old('username')}}" class="form-control {{$errors->first('username') ? "is-invalid": ""}}" placeholder="user Name" type="text" name="username" id="username"/>
                                        <div class="invalid-feedback">
                                            {{$errors->first('username')}}
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input value="{{old('email')}}" class="form-control {{$errors->first('email') ? "is-invalid": ""}}" placeholder="E-mail" type="text" name="email" id="email"/>
                                        <div class="invalid-feedback">
                                            {{$errors->first('email')}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block" for="roles">Roles</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input {{$errors->first('roles') ? "is-invalid" :"" }}"  type="checkbox" name="roles[]" id="ADMIN" value="ADMIN">
                                            <label class="form-check-label" for="ADMIN">Administrator</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input {{$errors->first('roles') ? "is-invalid" :"" }}" type="checkbox" name="roles[]" id="STAFF" value="STAFF">
                                            <label class="form-check-label" for="STAFF">Staff</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input {{$errors->first('roles') ? "is-invalid" :"" }}" type="checkbox" 	name="roles[]" id="CUSTOMER" value="CUSTOMER">
                                            <label class="form-check-label" for="CUSTOMER">Customer</label>
                                        </div>
                                        <div class="invalid-feedback">
                                            {{$errors->first('roles')}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input value="{{old('phone')}}" class="form-control {{$errors->first('phone') ? "is-invalid": ""}}" placeholder="Phone" type="text" name="phone" id="phone"/>
                                        <div class="invalid-feedback">
                                            {{$errors->first('phone')}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input value="{{old('address')}}" class="form-control {{$errors->first('address') ? "is-invalid": ""}}" placeholder="Address" type="text" name="address" id="address"/>
                                        <div class="invalid-feedback">
                                            {{$errors->first('address')}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input value="{{old('password')}}" class="form-control {{$errors->first('password') ? "is-invalid": ""}}" placeholder="Password" type="password" name="password" id="password"/>
                                        <div class="invalid-feedback">
                                            {{$errors->first('password')}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Password Confirmation</label>
                                        <input class="form-control" placeholder="password confirmation" type="password" name="password_confirmation" id="password_confirmation"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="avatar">Avatar image</label>
                                        <input id="avatar" name="avatar" type="file" class="form-control {{$errors->first('avatar') ? "is-invalid" : ""}}">
                                        <div class="invalid-feedback">
                                            {{$errors->first('avatar')}}
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary" type="submit" value="save">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
    @endsection
    