@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$job->title}}</div>

                    <div class="card-body">

                        <p>
                            <h5>Detail :: </h5>
                            {{$job->description}}
                        </p>
                        <p>
                            <h5>Role :: </h5>
                            {{$job->roles}}
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <div class="card">
                    <div class="card-header">Short Info</div>

                    <div class="card-body">

                        <p> Company ::
                            <a href="{{route('company.index',
                              [$job->company->id , $job->company->slug])}}">
                                {{ $job->company->name }}
                            </a>
                        </p>
                        <p>Address :: {{$job->address}}</p>
                        <p>Employment Type :: {{ $job->type}}</p>
                        <p>Position :: {{ $job->position }}</p>
                        <p>Date :: {{ $job->created_at->diffForHumans() }}</p>



                    </div>
                </div>
                <br>

                @if(Auth::check() && Auth::user()->user_type == 'seeker')

                    @if(!$job->checkApplication())

                        <apply-component :jobid="{{$job->id}}"></apply-component>


                     @endif
                        <br>

                        <favorite-component :jobid="{{$job->id}}" :favorited="{{$job->checkSaved()?'true':'false'}}"></favorite-component>

                @endif
            </div>

        </div>
    </div>
@endsection
