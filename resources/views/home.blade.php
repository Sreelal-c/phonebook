@extends('layouts.app')

@section('content')

<div class="container">
<br>
<a href="{{ url('/add-contact') }}" class="btn btn-success add-btn"><i class="ion-person-add"></i> {{ __('home.addcontact') }}</a>
<hr>
    <div class="box-header">
        <h4 class="box-title"><i class="ion-android-call"></i> {{ __('home.allcontacts') }}</h4>
     </div>
<hr>
    <div class="row all-contacts">
     <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('home.name') }}</th>
                <th>{{ __('home.phone') }}</th>
                <th>{{ __('home.email') }}</th>
                <th>{{ __('home.address') }}</th>
                <th>{{ __('home.action') }}</th>
            </tr>
        <thead>
    @php ($i = 1)
    @if(count($contact) >0)
    @foreach ($contact as $row)
    <tr>
        <td>{{$i}}</td>
        <td>{{$row->name}}</td>
        <td><p>
            @foreach ($row->phone as $p)     
                {{$p->phone}} &nbsp &nbsp 
            @endforeach 
            </p>
        </td>
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
    @endif
   
      
    
    </div><!-- /.all-contacts -->

    <div class="box-footer clearfix">

       {{ $contact->links() }}


</div>
</div>
<!-- /.box -->

@endsection
