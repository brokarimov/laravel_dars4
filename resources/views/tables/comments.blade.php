@extends('./admin/main')


@section('title', 'Comments')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Comments</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Comments</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session('danger'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{session('danger')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <a href="/comment-create" class="btn btn-primary">Create</a>

                    <div class="card mt-2">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Comment</th>
                                        <th>Post_id</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $comment)
                                        <tr>
                                            <td>{{$comment['id']}}</td>
                                            <td class="truncate-cell">{{$comment['text']}}</td>

                                            <td>
                                                @foreach ($posts as $post)
                                                    @if ($post->id == $comment->post_id)
                                                        {{$post->title}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="/comment-show/{{$comment->id}}" class="btn btn-primary">Show</a>

                                                <form action="/comment/{{$comment->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>


@endsection