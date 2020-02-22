@extends('layouts.master')


@section('title')
    Posts
@endsection


@section('content')

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Posts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <form action="/save-posts" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text" name="title" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Sub-Title:</label>
                            <input type="text" name="sub_title" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Description:</label>
                            <textarea name="description" class="form-control" id="message-text"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Image:</label>
                            <input type="file" name="avatar" class="form-control" id="recipient-name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Posts
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#exampleModal">ADD
                        </button>
                    </h4>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <style>
                    .w-10p {
                        width: 10%;
                    | important;
                    }
                </style>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th class="w-10p">ID</th>
                            <th class="w-10p">Title</th>
                            <th class="w-10p">Sub-Title</th>
                            <th class="w-10p">Description</th>
                            <th class="w-10p">Images</th>
                            <th class="w-10p">EDIT</th>
                            <th class="w-10p">DELETE</th>
                            </thead>
                            <tbody>
                            @foreach($posts as $date)
                                <tr>
                                    <td>{{$date->id}}</td>
                                    <td>{{$date->title}}</td>
                                    <td>{{$date->sub_title}}</td>
                                    <td>
                                        <div style="height: 80px; overflow: hidden">
                                            {{$date->description}}
                                        </div>
                                    </td>
                                    <td><img src="/images/{{$date->avatar}}" /></td>
                                    <td>
                                        <a href="{{url('post-edit/'.$date->id)}}" class="btn btn-success">EDIT</a>
                                    </td>
                                    <td>

                                        <form action="{{url('/post-delete/'.$date->id)}}" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
{{--    <script>--}}
{{--        $(document).ready( function () {--}}
{{--            $('#datatable').DataTable();--}}
{{--            $('#deletemodalpop').on('click')--}}
{{--        });--}}
{{--    </script>--}}
@endsection

