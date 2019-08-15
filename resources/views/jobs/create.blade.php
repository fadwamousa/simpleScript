@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif


                <div class="card">

                    <div class="card-header">Create Job Now</div>
                    <div class="card-body">

                        <form action="{{route('jobs.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                                <span class="text-danger">
                                    @if($errors->any() > 0)
                                        @if($errors->has('title'))
                                            {{$errors->first('title')}}
                                        @endif
                                    @endif
                                </span>

                            </div>
                            <div class="form-group">
                                <label for="description">description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror"></textarea>
                                <span class="text-danger">
                                    @if($errors->any() > 0)
                                        @if($errors->has('description'))
                                            {{$errors->first('description')}}
                                        @endif
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <textarea name="roles" id="" cols="30" rows="10" class="form-control @error('roles') is-invalid @enderror"></textarea>
                                <span class="text-danger">
                                    @if($errors->any() > 0)
                                        @if($errors->has('roles'))
                                            {{$errors->first('roles')}}
                                        @endif
                                    @endif
                                </span>

                            </div>
                            <div class="form-group">
                                <label for="role">Slug</label>
                                <textarea name="slug" id="" cols="30" rows="10" class="form-control @error('slug') is-invalid @enderror"></textarea>
                                <span class="text-danger">
                                    @if($errors->any() > 0)
                                        @if($errors->has('slug'))
                                            {{$errors->first('slug')}}
                                        @endif
                                    @endif
                                </span>

                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="position">position</label>
                                <input type="text" class="form-control @error('position') is-invalid @enderror" name="position">
                                <span class="text-danger">
                                    @if($errors->any() > 0)
                                        @if($errors->has('position'))
                                            {{$errors->first('position')}}
                                        @endif
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="address">address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address">
                                <span class="text-danger">
                                    @if($errors->any() > 0)
                                        @if($errors->has('address'))
                                            {{$errors->first('address')}}
                                        @endif
                                    @endif
                                </span>

                            </div>
                            <div class="form-group">
                                <label for="type">type</label>
                                <select name="type" id="" class="form-control">
                                    <option value="fulltime">fullTime</option>
                                    <option value="parttime">partTime</option>
                                    <option value="remote">remote</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="1">live</option>
                                    <option value="0">draft</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lastDate">Last_Date</label>
                                <input type="text" name="last_date" class="form-control @error('last_date') is-invalid @enderror">
                                <span class="text-danger">
                                    @if($errors->any() > 0)
                                        @if($errors->has('last_date'))
                                            {{$errors->first('last_date')}}
                                        @endif
                                    @endif
                                </span>

                            </div>
                            <div class="form-group">

                                <input type="submit"  class="btn btn-outline-primary">

                            </div>
                        </form>


                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
