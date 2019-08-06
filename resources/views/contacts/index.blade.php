@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Contacts</div>

                    <div class="card-body">

                        @if(Session::has('message'))

                            <div class="alert alert-dark">
                                {{ Session::get('message') }}
                                {{ Session::forget('message') }}
                            </div>

                        @endif


                        <table class="table table-striped">
                            <thead>
                             <th>Name</th>
                             <th>Address</th>
                             <th>Phone</th>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                              <tr>
                                  <td>{{$contact->name}}</td>
                                  <td>{{$contact->address}}</td>
                                  <td>{{$contact->phone}}</td>
                                  <td>
                                      <a href="{{url('contacts/'.$contact->id.'/edit')}}" class="btn btn-primary">Edit</a>
                                  </td>
                                  <td>
                                      <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <input type="submit" class="btn btn-block" value="Delete">
                                      </form>
                                  </td>
                              </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
