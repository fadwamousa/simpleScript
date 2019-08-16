@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">



            <div class="form-inline">



                <form class="form-inline" method="GET" action="{{route('alljobs')}}">
                    @csrf


                    <div class="form-group">

                        <label for="email">Keyword:  &nbsp;&nbsp;</label>
                        <input type="text" name="title" class="form-control">
                        &nbsp;&nbsp;&nbsp;

                    </div>

                    <div class="form-group">

                        <label for="email">Employment Type:  &nbsp;&nbsp;</label>
                        <select name="type" class="form-control">

                                <option value="fulltime">fullTime</option>
                                <option value="parttime">partTime</option>
                                <option value="remote">remote</option>

                        </select>
                        &nbsp;&nbsp;&nbsp;

                    </div>

                    <div class="form-group">

                        <label for="email">Category:  &nbsp;&nbsp;</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">

                        <label for="email">Address:  &nbsp;&nbsp;</label>
                        <input type="text" name="address" class="form-control">

                    </div>
                    &nbsp;&nbsp;

                    <button type="submit" class="btn btn-outline-primary">Search</button>
                </form>


            </div>


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

    {{$jobs->render()}}

    </div>


@endsection
<style>
    .fa{
        color: #4183D7;
    }
</style>
