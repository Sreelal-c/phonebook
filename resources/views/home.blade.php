@extends('layouts.app')

@section('content')

<div class="container">
<br>
<a href="{{ url('/add-contact') }}" class="btn btn-success add-btn"><i class="ion-person-add"></i> Add Contact</a>
<hr>
    <div class="box-header">
        <h3 class="box-title"><i class="ion-android-call"></i> All Contacts</h3>
     </div>
<hr>
    <div class="row all-contacts">
     <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        <thead>
    @php ($i = 1)
    @foreach ($contact as $row)
    <tr>
        <td>{{$i}}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->phone}}</td>
        <td>{{$row->email}}</td>
        <td>{{$row->address}}</td>
        <td><a href="/view-contact/{{ $row->id }}" class="btn btn-sm btn-primary tooltips"  data-toggle="tooltip" title="" data-original-title="Edit">
                    <i class="ion-eye"></i>
                	</a>
                	&nbsp;
                    <a href="/edit-contact/{{ $row->id }}" class="btn btn-sm btn-warning tooltips"  data-toggle="tooltip" title="" data-original-title="Edit">
                    <i class="ion-edit"></i>
                	</a>
                	&nbsp;
                	<a href="#" class="btn btn-sm btn-danger tooltips"  data-toggle="tooltip" title="" data-original-title="Delete">
                    <i class="ion-trash-a"></i>
                	</a>
        </td>
        </tr>
    @php($i++)
    @endforeach
   
      <!--  <div class="card col-sm-3" style="width: 18rem; margin:5px;">
        @if(Storage::disk('local')->has($row->name.'-'.$row->id.'.jpg'))
            <img class="card-img-top" style="width:250px; height:200px;" src="{{ route('contact.image',['filename' => $row->name.'-'.$row->id.'.jpg' ]) }}" alt="Card image cap">
        @else
            <img class="card-img-top" style="width:250px; height:200px;" src="{{ asset('img/eggshell.png') }}" alt="Card image cap">
        @endif
            
            <div class="card-body">
                <h5 class="card-title"><i class="ion-person"></i> {{ $row->name }}</h5>
                <p class="card-text"><i class="ion-android-call"></i> {{ $row->phone }} &nbsp</p>
                <p class="card-text"><i class="ion-email"></i> {{ $row->email }} &nbsp</p>
                <p class="card-text"><i class="ion-location"></i> {{ $row->address }} &nbsp</p>
                <a href="/view-contact/{{ $row->id }}" class="btn btn-sm btn-primary tooltips"  data-toggle="tooltip" title="" data-original-title="Edit">
                    <i class="ion-eye"></i>
                	</a>
                	&nbsp;
                    <a href="/edit-contact/{{ $row->id }}" class="btn btn-sm btn-warning tooltips"  data-toggle="tooltip" title="" data-original-title="Edit">
                    <i class="ion-edit"></i>
                	</a>
                	&nbsp;
                	<a href="#" class="btn btn-sm btn-danger tooltips"  data-toggle="tooltip" title="" data-original-title="Delete">
                    <i class="ion-trash-a"></i>
                	</a>
            </div>
        </div> 
    

    -->
    
    </div><!-- /.all-contacts -->

    <div class="box-footer clearfix">

       {{ $contact->links() }}


<!-- <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav> -->
</div>
</div>
<!-- /.box -->

@endsection
