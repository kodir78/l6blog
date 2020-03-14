@extends('layouts.global')
@section("title") Edit Profile @endsection
@section('content')
<!-- Main Content 2 -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Edit Profile</div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Hi, {{$user->name}}!</h2>
      <p class="section-lead">
        Change information about yourself on this page.
      </p>
      
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
          <div class="card profile-widget">
            <div class="profile-widget-header">  
              @if($user->avatar)
              <img class="rounded-circle profile-widget-picture" src="{{asset('storage/'.$user->avatar)}}" width="120px" />
              <br><br>
              @else
              <img alt="image" src="/stisla/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture" width="120px">
              @endif                   
              <div class="profile-widget-items">
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Posts</div>
                  <div class="profile-widget-item-value">187</div>
                </div>
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Followers</div>
                  <div class="profile-widget-item-value">6,8K</div>
                </div>
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Following</div>
                  <div class="profile-widget-item-value">2,1K</div>
                </div>
              </div>
            </div>
            <div class="profile-widget-description">
              {{-- <div class="profile-widget-name"></div> --}}
              {{-- menampilkan isi field tanpa tag html --}}
              {!! $user->bio !!}
            </div>
            <div class="card-footer text-center">
              <div class="font-weight-bold mb-2">Follow Ujang On</div>
              <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="btn btn-social-icon btn-github mr-1">
                <i class="fab fa-github"></i>
              </a>
              <a href="#" class="btn btn-social-icon btn-instagram">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
          </div>
        </div>
        
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <div class="card-header">
              <h4>Edit Profile</h4>
            </div>
            <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('users.update', [$user->id])}}" method="POST">
              @csrf
              <input type="hidden" value="PUT" name="_method">
              <div class="card-body">
                <div class="row">                               
                  <div class="form-group col-md-6 col-12">
                    <label>Full Name</label>
                    <input value="{{old('name') ? old('name') : $user->name}}" class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" placeholder="Full Name" type="text" name="name" id="name"/>
                    <div class="invalid-feedback">
                      {{$errors->first('name')}}
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>User Name</label>
                    <input value="{{old('username') ? old('username') : $user->username}}" class="form-control {{$errors->first('username') ? "is-invalid": ""}}" placeholder="user Name" type="text" name="username" id="username" disabled/>
                    <div class="invalid-feedback">
                      {{$errors->first('username')}}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-7 col-12">
                    <label>Email</label>
                    <input value="{{old('email') ? old('email') : $user->email}}" class="form-control {{$errors->first('email') ? "is-invalid": ""}}" placeholder="user Name" type="text" name="email" id="email" disabled/>
                    <div class="invalid-feedback">
                      {{$errors->first('email')}}
                    </div>
                  </div>
                  <div class="form-group col-md-5 col-12">
                    <label>Phone</label>
                    <input value="{{old('phone') ? old('phone') : $user->phone}}" class="form-control {{$errors->first('phone') ? "is-invalid": ""}}" placeholder="Phone" type="text" name="phone" id="phone"/>
                    <div class="invalid-feedback">
                      {{$errors->first('phone')}}
                    </div>
                  </div>
                  <div class="form-group col-md-5 col-12">
                    <label for="address">Address</label>
                    <input value="{{old('address') ? old('address') : $user->address}}" class="form-control {{$errors->first('address') ? "is-invalid": ""}}" placeholder="Address" type="text" name="address" id="address"/>
                    <div class="invalid-feedback">
                      {{$errors->first('address')}}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="d-block" for="roles">Roles</label>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" {{in_array("ADMIN", json_decode($user->roles)) ?"checked" : ""}} name="roles[]" class="form-check-input" id="ADMIN" value="ADMIN">
                    <label class="form-check-label" for="ADMIN">Administrator</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" {{in_array("STAFF", json_decode($user->roles)) ?"checked" : ""}} name="roles[]" class="form-check-input" id="STAFF" value="STAFF">
                    <label class="form-check-label" for="STAFF">Staff</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" {{in_array("CUSTOMER", json_decode($user->roles)) ?"checked" : ""}} name="roles[]" class="form-check-input" id="CUSTOMER" value="CUSTOMER">
                    <label class="form-check-label" for="CUSTOMER">Customer</label>
                  </div>
                  <div class="invalid-feedback">
                    {{$errors->first('roles')}}
                  </div>
                </div>
                <div class="form-group">
                  <label class="d-block" for="roles">Status</label>
                  <div class="form-check form-check-inline">
                    <input {{$user->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE" type="radio" class="form-check-input" id="active" name="status">
                    <label class="form-check-label" for="active">Active</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input {{$user->status == "INACTIVE" ? "checked" : ""}} value="INACTIVE" type="radio" class="form-check-input" id="inactive" name="status">
                    <label class="form-check-label" for="inactive">Inactive</label>
                  </div>
                  <div class="invalid-feedback">
                    {{$errors->first('roles')}}
                  </div>
                </div>
                <div class="form-group">
                  <label for="avatar">Avatar image</label>
                  <input id="avatar" name="avatar" type="file" class="form-control {{$errors->first('avatar') ? "is-invalid" : ""}}">
                  <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>
                </div>
                <div class="row">
                  <div class="form-group col-12">
                    <label>Bio</label>
                    <textarea  class="form-control summernote-simple" name="bio" id="bio" class="form-control {{$errors->first('bio') ? "is-invalid" : "" }}">{{old('bio') ? old('bio') : $user->bio}}</textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group mb-0 col-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                      <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                      <div class="text-muted form-text">
                        You will get new information about products, offers and promotions
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit" value="save">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Main Content 2-->
@endsection
