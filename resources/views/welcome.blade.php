@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <search-component></search-component>
            </div>

            <br>
            <br>

            <h2>Recent Jobs</h2>

            <table class="table">



                @foreach($jobs as $job)

                <tbody>
                  <tr>
                      <td>
                          <img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" alt="" width="80">
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

        <div>
            <a href="{{route('alljobs')}}">
                <button class="btn btn-outline-success btn-lg ">Browse All My Jobs</button>
            </a>
        </div>
        <br> <br>
        <h2>Featured Jobs</h2>
    </div>

    <div class="container">
        <div class="row">

            @foreach($companies as  $company)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">



                    <div class="card-body">
                        <img src="{{asset('uploads/logo')}}/{{$company->logo}}" alt="" width="80">

                        <h5 class="card-title">{{$company->name}}</h5>
                        <p class="card-text">{{str_limit($company->description,20)}}</p>
                        <a href="{{route('company.index',[$company->id,$company->slug])}}"
                           class="btn btn-outline-primary">Visit Company
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
<style>
    .fa{
        color: #4183D7;
    }
</style>
