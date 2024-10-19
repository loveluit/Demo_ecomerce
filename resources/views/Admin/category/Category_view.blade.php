@extends('layouts.admin');

@section('content')



    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Categories</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="index.html">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Categories</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Search here..." class="" name="name"
                                    tabindex="2" value="" aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <a class="tf-button style-1 w208" href="{{ route('category') }}"><i
                            class="icon-plus"></i>Add new</a>
                </div>
                <div class="wg-table table-all-user">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category_show as $index=>$category )


                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td class="pname">
                                    {{-- <div class="image">
                                        <img src="1718066463.html" alt="" class="image">
                                    </div> --}}
                                    <div class="name">
                                        <a href="#" class="body-title-2">{{ $category->category_name }}</a>
                                    </div>
                                </td>
                                <td>{{ $category->category_slug }}</td>
                                {{-- <td><a href="#" target="_blank">2</a></td> --}}
                                <td>
                                        <div class="image">
                                        <img src="{{ asset('uploads/category') }}/{{  $category->image }}" alt="" class="image">
                                    </div>
                                </td>
                                <td>

                                    <div class="list-icon-function">
                                        <button type="button" href="#"  data-toggle="modal" data-target="#exampleModal1">
                                            <div class="item edit">
                                                <i class="icon-edit-3"></i>
                                            </div>
                                        </button>
                                        <a href="{{ route('category.delete',$category->id) }}">
                                            <div class="item text-danger delete">
                                                <i class="icon-trash-2"></i>
                                            </div>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

                </div>
            </div>
        </div>
    </div>


    <div class="bottom-page">
        <div class="body-text">Copyright © 2024 SurfsideMedia</div>
    </div>
</div>

</div>
</div>
</div>


{{-- Category Edite Model --}}

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Category Update</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">category_name</label>
                <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">categor_slug</label>
                <input type="text" class="form-control" name="category_slug" value="{{ $category->category_slug }}">
            </div>
            <div class="mb-3">
               <input type="file" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"  >
               <img src="{{ asset('uploads/category') }}/{{ $category->image }}" id="blah" alt="your image" width="200" height="200"/>
            </div>
           </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

@endsection
