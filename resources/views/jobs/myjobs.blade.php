@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My All Jobs</div>

                    <div class="card-body">

                        <table class="table">



                            @foreach($jobs as $job)

                                <tbody>
                                <tr>
                                    <td>
                                        @if(empty(Auth::user()->company->logo))
                                            <img src="{{asset('avatar/serwman1.jpg')}}"  width="80">
                                        @else
                                            <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="80">

                                        @endif
                                    </td>
                                    <td>{{$job->position}}
                                        <br>
                                        <i class="fa fa-clock-o"aria-hidden="true"></i>&nbsp;{{$job->type}}
                                    </td>
                                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;{{$job->address}}</td>
                                    <td><i class="fa fa-globe"aria-hidden="true"></i>&nbsp;{{$job->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                                            <button class="btn btn-success btn-sm">Apply
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('jobs.edit',[$job->id])}}">
                                            <button class="btn btn-warning btn-sm">Edit
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>

                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
