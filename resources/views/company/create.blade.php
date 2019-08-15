@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(empty(Auth::user()->company->logo))
                    <img src="{{asset('avatar/serwman1.jpg')}}" width="100" style="width: 100%;">
                @else
                    <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="100" style="width: 100%;">

                @endif
                <br><br>

                <form action="{{route('logo')}}" method="POST" enctype="multipart/form-data">@csrf

                    <div class="card">
                        <div class="card-header">Update Logo</div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="logo">
                            <br>
                            <button class="btn btn-success float-right" type="submit">Update</button>
                            @if($errors->has('logo'))
                                <div class="error" style="color: red;">{{$errors->first('logo')}}</div>
                            @endif

                        </div>
                    </div>
                </form>


            </div>

            <div class="col-md-5">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Update Your Profile</div>


                    <form action="{{route('company.store')}}" method="POST">@csrf


                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text"
                                       class="form-control"
                                       name="address"
                                       value="{{Auth::user()->company->address}}">
                                @if($errors->has('address'))
                                    <div class="error" style="color: red;">{{$errors->first('address')}}</div>
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text"
                                       class="form-control"
                                       name="phone"
                                       value="{{Auth::user()->company->phone}}">
                                @if($errors->has('phone'))
                                    <div class="error" style="color: red;">{{$errors->first('phone')}}</div>
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="">Website</label>
                                <input type="text"
                                       class="form-control"
                                       name="website"
                                       value="{{Auth::user()->company->website}}">
                                @if($errors->has('website'))
                                    <div class="error" style="color: red;">{{$errors->first('website')}}</div>
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="">Slogan</label>
                                <input type="text"
                                       class="form-control"
                                       name="slogan"
                                       value="{{Auth::user()->company->slogan}}">
                                @if($errors->has('slogan'))
                                    <div class="error" style="color: red;">{{$errors->first('slogan')}}</div>
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="Description"
                                          class="form-control">
                                    {{Auth::user()->company->Description}}
                                </textarea>
                                @if($errors->has('Description'))
                                    <div class="error" style="color: red;">{{$errors->first('Description')}}</div>
                                @endif

                            </div>



                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Update</button>
                            </div>

                        </div>
                </div>



            </div>


            </form>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">About your Company</div>
                    <div class="card-body">
                        <p>Company Name ::{{Auth::user()->company->name}}</p>
                        <p>Company Phone ::{{Auth::user()->company->phone}}</p>
                        <p>Company Website ::
                            <a href="">{{Auth::user()->company->website}}</a>
                        </p>


                        <p>Company Slogan ::{{Auth::user()->company->website}}</p>
                        <p>Company Page::<a href="{{Auth::user()->company->id}}/{{Auth::user()->company->slug}}">View</a></p>


                        <p>Company Detail ::{{Auth::user()->company->Description}}</p>
                    </div>
                </div>
                <br>
                <form action="{{route('cover.photo')}}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="card">
                        <div class="card-header">Update Cover Photo for company</div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="cover_photo"><br>
                            <button class="btn btn-success float-right" type="submit">Update</button>
                            @if($errors->has('cover_photo'))
                                <div class="error" style="color: red;">{{$errors->first('cover_photo')}}</div>
                            @endif
                        </div>
                    </div>
                </form>



            </div>

        </div>
    </div>
@endsection

