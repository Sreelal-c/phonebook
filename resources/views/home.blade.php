@extends('layouts.app')

@section('content')

            <section>
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col">
                            <div class="media align-items-center">
                                <a href="#" class="mr-4">
                                    {{-- <img alt="Image" src="{{ asset('img/graphic-product-paydar-thumb.jpg') }}" class="avatar avatar-lg avatar-square" /> --}}
                                </a>
                                <div class="media-body">
                                    <div class="mb-3">
                                        <h1 class="h2 mb-2">{{ __('home.allcontacts') }}</h1>
                                        <span></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--end of col-->

                        <!--end of col-->
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <!--end of section-->
            <section class="flush-with-above">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <table class="table table-hover align-items-center table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('home.name') }}</th>
                                        <th scope="col">{{ __('home.phone') }}</th>
                                        <th scope="col">{{ __('home.address') }}</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($contact) >0)
                                    @foreach ($contact as $row)
                                    <tr class="bg-white">
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                @if(Storage::disk('local')->has($row->name.'-'.$row->id.'.jpg'))
                                                    <img class="avatar" src="{{ route('contact.image',['filename' => $row->name.'-'.$row->id.'.jpg' ]) }}" alt="Card image cap" >
                                                @else
                                                    <img class="avatar" src="{{ asset('img/avatar-male-1.jpg') }}" alt="Card image cap" >
                                                @endif

                                                <div class="media-body">
                                                    <span class="h6 mb-0">{{$row->name}}
                                                        @if($row->is_friend == 1)<span class="badge badge-secondary">Firend</span> @endif
                                                    </span>
                                                    <span class="text-muted">{{$row->email}}</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td> @foreach ($row->phone as $p)
                                                {{$p->phone}} &nbsp &nbsp
                                            @endforeach
                                        </td>
                                        <td>{{$row->address}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle dropdown-toggle-no-arrow" type="button" id="dropdownMenuButton-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="icon-dots-three-horizontal"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-sm" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="view-contact/{{ $row->id }}">View</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="{{url('/edit-contact')}}/{{ $row->id }}">Edit</a>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="table-divider"></tr>
                                    @endforeach
                                   @endif
                                </tbody>
                            </table>

                            <div class="box-footer clearfix">
                                {{ $contact->links() }}
                            </div>

                        </div>
                        <!--end of col-->
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>



@endsection
