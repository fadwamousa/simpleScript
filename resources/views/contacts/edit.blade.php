@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Contacts</div>

                    <div class="card-body">

                        @if(count($errors->any()) > 0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif

                        @if(Session::has('message'))

                            <div class="alert alert-dark">
                                {{ Session::get('message') }}
                                {{ Session::forget('message') }}
                            </div>

                        @endif

                        <form action="{{ route('contacts.update',$contact->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{$contact->name}}" placeholder="Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" value="{{$contact->address}}" placeholder="Address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" value="{{$contact->phone}}" placeholder="Phone" class="form-control">
                            </div>
                            <div class="form-group">

                                <button class="btn btn-warning" type="submit">Update</button>
                            </div>


                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
