@extends('layouts.app')
@section('content')
<span style="padding:10px;"></span>
<div class="container">

<div class="card">
  <div class="card-header">
    Contact Details
  </div>
  <div class="row" style="padding:10px;">
  <div class="col-sm-4">
        <div class="card">
        @if(Storage::disk('local')->has($contact->name.'-'.$contact->id.'.jpg'))
            <img class="card-img-top" src="{{ route('contact.image',['filename' => $contact->name.'-'.$contact->id.'.jpg' ]) }}" alt="Card image cap">
        @else
            <img class="card-img-top" src="{{ asset('img/eggshell.png') }}" alt="Card image cap">
        @endif
            <div class="card-body">
                <h5 class="card-title">{{ $contact->name }}</h5>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Change Image
                </button>
            </div>
        </div>
  </div>
  <div class="col-sm-5">
  <div class="card-body">
    <h5 class="card-title">{{ $contact->name }}</h5>
     <p class="card-text">{{$contact->job}}</p>
     <p class="card-text">{{$contact->email}}</p>
     <p class="card-text">{{$contact->phone}}</p>
     <p class="card-text">{{$contact->alt_phone}}</p>
     <p class="card-text"><a href="https://{{$contact->facebook}}">Facebook</a></p>
     <p class="card-text">{{$contact->address}}</p>
     <p class="card-text">{{$contact->comments}}</p>
    <a href="/edit-contact/{{ $contact->id }}" class="btn btn-primary">Edit Contact</a>
  </div>
  </div>
  </div>
</div>

</div>
<!-- !.container -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Contact Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/upload" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
          <input type="hidden" name="id" value="{{$contact->id}}">
            <div class="custom-file">
                <input type="file" name="image" accept=".jpg,.jpeg" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection