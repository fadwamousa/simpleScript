@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action="{{route('store.jobs')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
