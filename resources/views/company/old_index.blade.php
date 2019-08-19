@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="company-profile">
                @if(empty(Auth::user()->company->cover_photo))
                    <img src="{{asset('cover/tumblr-image-sizes-banner.png')}}" width="100" style="width: 100%;">
                @else
                    <img src="{{asset('uploads/coverphoto')}}/{{Auth::user()->company->cover_photo}}" width="700" >

                @endif

                <div class="company-desc">
                    @if(empty(Auth::user()->company->logo))
                        <img src="{{asset('avatar/serwman1.jpg')}}" width="80" >
                    @else
                        <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="80" >

                    @endif
                    <p>{{$company->Description}}</p>
                    <h1>Company Name</h1>
                    <p>Slogan-{{$company->slogan}}&nbsp;Address-{{$company->address}}&nbsp; Phone-{{$company->phone}}&nbsp; Website-{{$company->website}}</p>
                </div>
            </div>
            <table class="table">



                @foreach($company->jobs as $job)

                    <tbody>
                    <tr>
                        <td>
                            <img src="{{ asset('avatar/serwman1.jpg') }}" alt="man photo" width="80">
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
                    </tr>
                    </tbody>

                @endforeach
            </table>

        </div>
    </div>
@endsection
