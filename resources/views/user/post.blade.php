@extends('news')

@section('title')
    Create
    @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Post</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                            <div class="form-group">
                                @csrf
                                <label class="label">Post Title: </label>
                                <input type="text" name="title" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label class="label">Sub Title: </label>
                                <input type="text" name="sub_title" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label class="label">Description: </label>
                                <textarea name="description" rows="10" cols="30" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="label">Image: </label>
                                <input type="file" name="avatar" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
