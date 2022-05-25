@extends('layouts.app')

@section('title')
    <title>sharing</title>
@endsection


@section('custom_css')

@endsection

@section('custom_js')
    <script src="{{asset('vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('apps/sharing/add/add.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/hs0hspk14k2y30j7kqjieanll961v60zcy71z7m80zwbcnd4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'Create', 'key'=>'Post'])
        <div class="row justify-content-center">
            <div class="col-md-9 rounded">
                @if(session('success'))
                    <div class="alert alert-success response_message ">
                        {{session('success')}}
                    </div>

                @elseif(session('failure'))
                    <div class="alert alert-danger response_message ">
                        {{session('failure')}}
                    </div>
                @endif
            </div>
        </div>
        <form action="{{route('sharing.store')}}" method="post" enctype="multipart/form-data">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-9 rounded bg-white px-3 mb-3">
                            @csrf

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text"
                                       class="form-control @error('title') is-invalid @enderror"
                                       placeholder="Enter title"
                                       name="title"
                                       value="{{old('title')}}"
                                >
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Main image</label>
                                <input type="file"
                                       class="form-control-file"
                                       placeholder="Chooses a file"
                                       name="main_image"
                                >
                            </div>

                            <div class="form-group">
                                <label>Detail image </label>
                                <input type="file"
                                       multiple
                                       class="form-control-file"
                                       placeholder="Chooses a file"
                                       name="detail_images[]"
                                >
                            </div>
                            <div>
                                <div class="form-group ">
                                    <label>Content</label>
                                    <textarea id="tinymce-editor" name="postcontent"
                                              class="form-control @error('postcontent') is-invalid @enderror"
                                              rows="3">{{old('postcontent')}}</textarea>
                                    @error('postcontent')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </div>


                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </form>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


