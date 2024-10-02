@extends('layouts.admin')

@section('content')

<div class="wg-box">
    @if (session('category'))
    <div class="alert alert-success">{{ session('category') }}</div>

    @endif
    <form class="form-new-product form-style-1" action="{{ route('category.store') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <fieldset class="name">
            <div class="body-title">Category Name <span class="tf-color-1">*</span>
            </div>
            <input class="flex-grow" type="text" placeholder="Category name" name="category_name"
                tabindex="0" value="" aria-required="true" required="">
        </fieldset>
        <fieldset class="name">
            <div class="body-title">Category Slug <span class="tf-color-1">*</span>
            </div>
            <input class="flex-grow" type="text" placeholder="Category Slug" name="category_slug"
                tabindex="0" value="" aria-required="true" required="">
        </fieldset>
        <fieldset>
            <div class="body-title">Upload images <span class="tf-color-1">*</span>
            </div>
            <div class="upload-image flex-grow">
                <div class="item" id="imgpreview" style="display:none">
                    <img src="upload-1.html" class="effect8" alt="">
                </div>
                <div id="upload-file" class="item up-load">
                    <label class="uploadfile" for="myFile">
                        <span class="icon">
                            <i class="icon-upload-cloud"></i>
                        </span>
                        <span class="body-text">Drop your images here or select <span
                                class="tf-color">click
                                to browse</span></span>
                        <input type="file" id="myFile" name="image" accept="image/*"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <img id="blah" alt="your image" width="100%" height="100%" />
                    </label>
                </div>
            </div>
        </fieldset>
        <div class="bot">
            <div></div>
            <button class="tf-button w208" type="submit">Save</button>
        </div>
    </form>
</div>
</div>
</div>

@endsection
