@extends('admin.layouts.app')
@section('content')

    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Add banner</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add banner</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>There were some problems with your input:</strong>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif


                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Banner</h4>
                    </div>
                </div>
                <form action="{{ route('admin.addbanner') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Banner Title">
                    </div>

                    <div class="mb-30">
                        <h4 class="h4 text-blue">Banner content</h4>
                        <textarea class="textarea_editor form-control border-radius-0" name="content"
                            placeholder="Enter text ..."></textarea>
                    </div>
                    <div class="mb-3">
                        <h4 class="h4 text-blue">Banner Image</h4>
                        <div id="dropzone-area" class="dropzone border rounded p-4 text-center">
                            <div class="dz-message">
                                <strong>Drop banner image here or click to upload</strong><br>
                                (Only one image allowed)
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <img id="preview" src="#" alt="Banner Preview" class="img-fluid border d-none"
                            style="max-height: 400px;">
                    </div>

                    <input type="hidden" name="image" id="bannerImage"> <!-- will be filled manually -->
                    <div class="mb-30">
                        <h4 class="h4 text-blue">Active status</h4>
                        <input type="checkbox" name="status" value="active" {{ old('status', 'active') === 'active' ? 'checked' : '' }} class="switch-btn" data-color="#41ccba">
                    </div>

                    <button type="submit" class="btn btn-primary">Create Banner</button>
                </form>

            </div>

        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            &copy; {{ date('Y') }} All rights reserved to <a href="https://github.com/dropways" target="_blank"> Wolfcore
                technologies</a>
        </div>
    </div>

    @section('dropzone_script')
        <script src="{{ asset('src/plugins/dropzone/src/dropzone.js') }}"></script>
        <script>
            Dropzone.autoDiscover = false;

            const dropzone = new Dropzone("#dropzone-area", {
                url: "/admin/upload-temp-image",
                autoProcessQueue: true,
                method: 'POST',
                params: { folder: 'banners' },
                maxFiles: 1,
                acceptedFiles: "image/*",
                addRemoveLinks: false,
                dictDefaultMessage: "Drop image here or click",

                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },

                success: function (file, response) {
                    console.log(response)
                    document.getElementById('bannerImage').value = response.paths;
                },

                error: function (file, response) {
                    console.error("Upload failed:", response);
                },

                init: function () {
                    this.on("addedfile", function (file) {
                        if (this.files.length > 1) {
                            this.removeFile(this.files[0]); // Keep only one file
                        }

                        // Preview image
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const preview = document.getElementById('preview');
                            preview.src = e.target.result;
                            preview.classList.remove('d-none');
                        };
                        reader.readAsDataURL(file);
                    });
                }
            });

        </script>

    @endsection


@endsection
