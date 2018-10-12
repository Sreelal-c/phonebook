@extends('layouts.app')
@section('content')
<br>
<a href="{{url('/home')}}" class="btn btn-success add-btn"><i class="ion-android-call"></i> All Contacts</a>
<hr>
@if(count($errors))
  <div class="form-group">
      <div class="alert alert-danger">
          <ul>
              @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
              @endforeach
          </ul>
      </div>
  </div>
 @endif

<form method="post" action="{{url('/edit-contact')}}">
{{ csrf_field() }}
<div class="row  add-page">
    <div class="col-sm-5">
                <input value="{{$contact->id}}" name="id" type="hidden">
                <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" value="{{$contact->name}}" class="form-control" id="name" value="{{ old('name') }}"  name="name" aria-describedby="nameHelp" placeholder="Enter Full Name">
                        <small id="nameHelp" class="form-text text-muted">Enter the full name</small>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" value="{{$contact->email}}" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">Enter Complete Email address</small>
                </div>
                <div class="form-group">
                  <label for="facebook">Facebook Profile</label>
                  <input type="facebook" value="{{$contact->facebook}}" name="facebook" class="form-control" value="{{ old('facebook') }}" id="facebook" placeholder="Facebook Profile">
                </div>
    </div>
    <div class="col-sm-5">
            <div class="form-group">
                        <label for="exampleInputEmail1">Nick Name</label>
                        <input value="{{$contact->nickname}}" type="text" class="form-control" value="{{ old('name') }}" id="nickname" name="nickname" aria-describedby="nicknameHelp" placeholder="Enter Nick Name">
                        <small id="nicknameHelp" class="form-text text-muted">Enter the Nick name</small>
            </div>

        @foreach($contact->phone as $row)
           <div class="form-group multiple-form-group">
                      <label>Phone:</label>
                        <div class="form-inline">
                          <input class="form-control" id="features" type="text" value="{{$row->phone}}" name="phoneno[]" required>
                          <span class="input-group-btn"><button type="button" class="btn btn-danger btn-remove">-</button></span>
                        </div>

            </div>
          @endforeach
            <div class="form-group multiple-form-group">
                      <label>Phone:</label>
                        <div class="form-inline ">
                          <input class="form-control" id="features" type="text"  name="phoneno[]" >
                          <span class="input-group-btn"><button type="button" class="btn btn-success btn-add">+</button></span>
                        </div>
          </div>
            <div class="form-group">
              <label for="job">Job/ Designation</label>
              <input type="text" value="{{$contact->job}}" class="form-control" value="{{ old('job') }}" id="job" name="job" aria-describedby="jobHelp" placeholder="Enter Job/Designation">
              <small id="jobHelp" class="form-text text-muted">Job/ Designation</small>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <textarea name="address" class="form-control" value="{{ old('address') }}" id="address" placeholder="Address">{{$contact->address}}</textarea>
            </div>
    </div>

    <div class="form-group  col-sm-2">
              <div class="form-group form-check">
                  <input type="checkbox" value="1" name="known" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Add as Friend</label>
              </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
  </div>
</div>
<div class="row">
<div class="col-sm-5">
                <div class="form-group">
                      <label for="comments">Comments</label>
                      <textarea  name="comments" class="form-control" id="comments" placeholder="Comments">{{$contact->comments}}</textarea>
                </div>
</div>

</div>

</form>
@endsection
