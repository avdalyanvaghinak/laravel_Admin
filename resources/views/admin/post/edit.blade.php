@extends('layouts.master')


@section('title')
    Posts Edit
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Posts Edit</h4>

                    <form action="{{url('post-update/'.$posts->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Title:</label>
                                <input type="text" name="title" class="form-control" value="{{$posts->title}}">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Sub-Title:</label>
                                <input type="text" name="sub_title" class="form-control" value="{{$posts->sub_title}}">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Description:</label>
                                <textarea name="description" class="form-control" rows="6" cols="5">{{$posts->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Image:</label>
                                <input type="file" name="avatar" class="form-control" value="{{$posts->avatar}}">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <a href="{{url('/posts')}}" class="btn btn-secondary"> Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection

