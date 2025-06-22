@extends('admin.layouts.app')
@section('content')

    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Add Product</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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

                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="h4 text-blue">Product Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Product Name">
                    </div>

                    <div class="mb-3">
                        <label class="h4 text-blue">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Slug">
                    </div>

                    <div class="mb-3">
                        <label class="h4 text-blue">Short Description</label>
                        <textarea name="small_description" class="form-control textarea_editor"
                            placeholder="Short Description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="h4 text-blue">Main Product Sizes</label>
                        <div id="main-size-container">
                            <!-- JS will add size-stock inputs here -->
                        </div>
                        <button type="button" class="btn btn-primary mt-2" onclick="addMainSize()">+ Add Size</button>
                    </div>


                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label class="h4 text-blue">Price</label>
                            <input type="number" step="0.01" name="price" class="form-control" placeholder="Price">
                        </div>
                        <div class="col-md-6">
                            <label class="h4 text-blue">Discount Price</label>
                            <input type="number" step="0.01" name="discount_price" class="form-control"
                                placeholder="Discount Price">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="h4 text-blue">Full Description</label>
                        <textarea name="description" class="form-control textarea_editor"
                            placeholder="Full Description"></textarea>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-4">
                            <input type="text" name="size_category" class="form-control" placeholder="Size Category">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="color_category" class="form-control" placeholder="Color Category">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="variation_category" class="form-control"
                                placeholder="Variation Category">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="h4 text-blue">Stock</label>
                        <input type="number" name="stock" class="form-control" placeholder="Stock">
                    </div>

                    <div class="mb-3">
                        <h4 class="h4 text-blue">Main Product Image</h4>
                        <div id="dropzone-main" class="dropzone border rounded p-4 text-center">
                            <div class="dz-message">
                                <strong>Drop product image here or click to upload</strong><br>
                                (Only one image allowed)
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <img id="preview" src="#" alt="Image Preview" class="img-fluid border d-none"
                            style="max-height: 400px;">
                    </div>

                    <input type="hidden" name="image" id="imageInput"> <!-- Filled via Dropzone -->
                    <input type="hidden" name="uploaded_images" id="additionalImagesInput">
                    <div class="mb-3">
                        <label class="h4 text-blue">Upload Additional Images</label>
                        <div id="dropzone-multiple" class="dropzone border rounded p-4 text-center">
                            <div class="dz-message">
                                <strong>Drop product image here or click to upload</strong><br>
                                (Only one image allowed)
                            </div>
                        </div>
                    </div>
                    <div id="color-container">
                        <!-- JavaScript will add color sections here -->
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" onclick="addColor()">+ Add Color</button>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>

            </div>
        </div>

        <div class="footer-wrap pd-20 mb-20 card-box">
            &copy; {{ date('Y') }} All rights reserved to <a href="https://wolfcoretechnologies.com"
                target="_blank">Wolfcore Technologies</a>
        </div>
    </div>

    <template id="color-template">
        <div class="color-block border p-3 my-3">
            <input type="text" name="colors[][name]" placeholder="Color Name" class="form-control mb-2">
            <input type="hidden" name="colors[][image]" class="color-image-path">

            <div class="dropzone text-center border p-3 mb-2">Upload Color Image</div>
            <input type="hidden" class="color-gallery-input" name="colors[][gallery]">

            <div class="dropzone color-gallery-dropzone text-center border p-3 mb-2">
                <div class="dz-message">
                    <strong>Drop additional color images here or click to upload</strong><br>
                    (Multiple images allowed)
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-6">
                    <input type="number" step="0.01" name="colors[][price]" placeholder="Price" class="form-control">
                </div>
                <div class="col-md-6">
                    <input type="number" step="0.01" name="colors[][discount_price]" placeholder="Discount Price"
                        class="form-control">
                </div>
            </div>

            <div class="mb-2">
                <textarea name="colors[][description]" class="form-control textarea_editor"
                    placeholder="Full Description"></textarea>
            </div>

            <div class="size-container">
                <!-- Size rows will go here -->
            </div>
            <div class="mb-3">
                <button type="button" class="btn btn-primary" onclick="addSize(this)">+ Add Size</button>
            </div>
            <hr>
        </div>
    </template>

    <template id="size-template">
        <div class="size-row d-flex gap-2 mb-2">
            <div class="col-md-6">
                <input type="text" name="size" placeholder="Size (e.g. M)" class="form-control">
            </div>
            <div class="col-md-6">
                <input type="number" name="stock" placeholder="Stock" class="form-control">
            </div>
        </div>
    </template>

    <template id="main-size-template">
        <div class="size-row d-flex gap-2 mb-2">
            <div class="col-md-4">
                <input type="text" name="sizes[][size]" placeholder="Size (e.g. M)" class="form-control">
            </div>
            <div class="col-md-4">
                <input type="number" name="sizes[][stock]" placeholder="Stock" class="form-control">
            </div>
            <div class="col-md-4">
                <input type="number" step="0.01" name="sizes[][price]" placeholder="Price" class="form-control">
            </div>
        </div>
    </template>



    @section('dropzone_script')
        <script src="{{ asset('src/plugins/dropzone/src/dropzone.js') }}"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.textarea_editor').summernote({
                    height: 200
                });
            });
        </script>

        <script>

            let mainSizeIndex = 0;

            function addMainSize() {
                const container = document.getElementById('main-size-container');

                const row = document.createElement('div');
                row.classList.add('size-row', 'd-flex', 'gap-2', 'mb-2');

                row.innerHTML = `
                                                                                <div class="col-md-4">
                                                                                    <input type="text" name="sizes[${mainSizeIndex}][size]" placeholder="Size (e.g. M)" class="form-control" required>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <input type="number" name="sizes[${mainSizeIndex}][stock]" placeholder="Stock" class="form-control" required>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <input type="number" step="0.01" name="sizes[${mainSizeIndex}][price]" placeholder="Price" class="form-control" required>
                                                                                </div>
                                                                            `;

                container.appendChild(row);
                mainSizeIndex++;
            }


            Dropzone.autoDiscover = false;

            // 1. MAIN PRODUCT IMAGE (single)
            const mainDropzone = new Dropzone("#dropzone-main", {
                url: "/admin/upload-temp-image",
                method: 'POST',
                params: { folder: 'products' },
                autoProcessQueue: true,
                maxFiles: 1,
                acceptedFiles: "image/*",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                success: function (file, response) {
                    document.getElementById('imageInput').value = response.paths[0]; // for single
                },
                error: function (file, response) {
                    console.error("Upload failed:", response);
                },
                init: function () {
                    this.on("addedfile", function (file) {
                        if (this.files.length > 1) {
                            this.removeFile(this.files[0]); // Keep only one
                        }

                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const preview = document.getElementById('mainPreview');
                            preview.src = e.target.result;
                            preview.classList.remove('d-none');
                        };
                        reader.readAsDataURL(file);
                    });
                }
            });

            // 2. MULTIPLE PRODUCT IMAGES
            const multipleDropzone = new Dropzone("#dropzone-multiple", {
                url: "/admin/upload-temp-image",
                method: 'POST',
                params: { folder: 'products' },
                autoProcessQueue: true,
                uploadMultiple: false,
                maxFiles: 10,
                acceptedFiles: "image/*",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                success: function (file, response) {
                    // Append each image path to hidden input field (comma-separated)
                    let imageListInput = document.getElementById('additionalImagesInput');
                    let existing = imageListInput.value ? JSON.parse(imageListInput.value) : [];
                    existing.push(response.paths[0]);
                    imageListInput.value = JSON.stringify(existing);
                },
                error: function (file, response) {
                    console.error("Upload failed:", response);
                }
            });

            let colorIndex = 0;

            function addColor() {
                const template = document.getElementById('color-template').content.cloneNode(true);
                const colorBlock = template.querySelector('.color-block');

                // Elements for main color image
                const dropzoneDiv = colorBlock.querySelector('.dropzone');
                const hiddenInput = colorBlock.querySelector('.color-image-path');
                const colorNameInput = colorBlock.querySelector('input[placeholder="Color Name"]');

                // Elements for gallery images
                const galleryDropzoneDiv = colorBlock.querySelector('.color-gallery-dropzone');
                const galleryInput = colorBlock.querySelector('.color-gallery-input');

                // Update input names with correct color index
                colorNameInput.name = `colors[${colorIndex}][name]`;
                hiddenInput.name = `colors[${colorIndex}][image]`;
                galleryInput.name = `colors[${colorIndex}][gallery]`;

                // Update extra fields (price, discount, description)
                colorBlock.querySelector('input[placeholder="Price"]').name = `colors[${colorIndex}][price]`;
                colorBlock.querySelector('input[placeholder="Discount Price"]').name = `colors[${colorIndex}][discount_price]`;
                colorBlock.querySelector('textarea[placeholder="Full Description"]').name = `colors[${colorIndex}][description]`;
                colorBlock.querySelector('textarea[placeholder="Full Description"]').classList = `textarea_editor`;
                // Assign unique Dropzone IDs
                dropzoneDiv.id = `dropzone-${colorIndex}`;
                galleryDropzoneDiv.id = `gallery-dropzone-${colorIndex}`;

                // Init main image Dropzone
                setTimeout(() => {
                    new Dropzone(`#${dropzoneDiv.id}`, {
                        url: "/admin/upload-temp-image",
                        maxFiles: 1,
                        params: { folder: 'products' },
                        acceptedFiles: "image/*",
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        success: function (file, response) {
                            hiddenInput.value = response.paths[0];
                        }
                    });
                }, 10);

                // Init gallery Dropzone (multiple)
                setTimeout(() => {
                    new Dropzone(`#${galleryDropzoneDiv.id}`, {
                        url: "/admin/upload-temp-image",
                        method: 'POST',
                        params: { folder: 'products' },
                        uploadMultiple: false,
                        acceptedFiles: "image/*",
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        success: function (file, response) {
                            let existing = galleryInput.value ? JSON.parse(galleryInput.value) : [];
                            existing.push(response.paths[0]);
                            galleryInput.value = JSON.stringify(existing);
                        },
                        error: function (file, response) {
                            console.error("Color gallery upload failed:", response);
                        }
                    });
                }, 10);

                // Add color block to container
                document.getElementById('color-container').appendChild(colorBlock);
                colorIndex++;
            }



            function addSize(button) {
                const sizeTemplate = document.getElementById('size-template').content.cloneNode(true);
                const colorBlock = button.closest('.color-block');
                const container = colorBlock.querySelector('.size-container');
                const index = [...document.getElementById('color-container').children].indexOf(colorBlock);

                // Create new inputs with indexed names
                sizeTemplate.querySelector('input[placeholder="Size (e.g. M)"]').name = `colors[${index}][sizes][][size]`;
                sizeTemplate.querySelector('input[placeholder="Stock"]').name = `colors[${index}][sizes][][stock]`;

                container.appendChild(sizeTemplate);
            }


        </script>
    @endsection

@endsection
