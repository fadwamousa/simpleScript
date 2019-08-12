@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <h2>Recent Jobs</h2>

            <table class="table">



                @foreach($jobs as $job)

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
            {{ $jobs->render() }}

        </div>
    </div>
@endsection
<style>
    .fa{
        color: #4183D7;
    }
</style>
