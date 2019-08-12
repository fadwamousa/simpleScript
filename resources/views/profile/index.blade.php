@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="row">
            
            <div class="col-md-3">

                @if(empty(Auth::user()->profile->avatar))
                    <img src="{{ asset('avatar/serwman1.jpg') }}" width="100">
                @else
                    <img src="{{ asset('uploads/avatar/') }}/{{Auth::user()->profile->avatar}}" width="100">
                @endif


                <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="card">
                        <div class="card-header">
                            Update Avatar
                        </div>
                        <br>


                        <div class="card-body">
                            <input type="file" name="avatar" class="form-control">
                            <br>
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                    </div>

                </form>

                
                
            </div>
            
            <div class="col-md-5">

                <div class="card">
                    <div class="card-header">
                        Update Your Profile
                    </div>
                    <div class="card-body">
                    <form  method="POST"
                           action="{{route('profile.store')}}"
                           enctype="multipart/form-data">
                        @csrf

                            <div class="form-group">
                                <label for="adress">Address</label>
                                <input type="text" name="address"
                                       class="form-control"
                                       value="{{Auth::user()->profile->address}}">
                            </div>
                            <div class="form-group">
                                <label for="experience">Experience</label>
                                <textarea class="form-control" name="experience">
                                   {{Auth::user()->profile->experience}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea name="bio" class="form-control">
                                    {{Auth::user()->profile->bio}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn  btn-outline-primary btn-block"
                                        type="submit">Update</button>
                            </div>

                </form>
                </div>

            </div>

        </div>
                    @if(Session::has('message'))
                        <div class="alert alert-dark">
                            {{ Session::get('message') }}
                            </div>
                    @endif

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Your Information
                    </div>

                    <div class="card-body">
                        Name    :: {{ Auth::user()->name }}
                        <Br>
                        Email   :: {{ Auth::user()->email }}
                        <BR>
                        Address :: {{ Auth::user()->profile->address }}
                        <BR>
                        Gender  :: {{ Auth::user()->profile->gender }}
                        <BR>
                        experience  :: {{ Auth::user()->profile->experience }}
                        <BR>
                        Bio  :: {{ Auth::user()->profile->bio }}
                        <BR>
                        Member On  :: {{ date( 'F D Y' , strtotime(Auth::user()->created_at)) }}


                        <BR>
                        @if(!empty(Auth::user()->profile->cover_letter))
                            <p>
                                <a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">
                                    Cover Letter
                                </a>
                            </p>
                        @else
                            <p>Please Upload Cover Letter</p>
                        @endif
                    </div>

                </div>
                <form action="{{ route('profile.coverletter') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="card">
                        <div class="card-header">
                            Update CoverLetter
                        </div>
                        <br>

                        <div class="card-body">
                            <input type="file"
                                   name="cover_letter"
                                   class="form-control">
                            <br>
                            <button type="submit"
                                    class="btn btn-primary btn-block">Update</button>
                        </div>
                    </div>

                </form>

                <form action="{{ route('profile.resume') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                <div class="card">
                    <div class="card-header">
                        Update Resume
                    </div>
                    <br>


                    <div class="card-body">
                        <input type="file" name="resume" class="form-control">
                        <br>
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </div>
                </div>

                </form>



                </div>


@endsection
