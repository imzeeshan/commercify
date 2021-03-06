@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Media Manager : Upload a new Media asset. </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header"><h4>{{ __('Upload ') }}</h4></div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-8">
                                    <form role="form" method="POST" action="{{ route('media.update',$media->id) }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PUT">

                                        <div class="form-group row">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File </label>
                                            <div class="col-sm-12 col-md-8">
                                                <input type="file" name="file_upload" id="file_upload" class="form-control" onchange="preview_image(this);">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" id='title' name="title" class="form-control" value="{{ $media->title }}">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alt Text</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" id='alt_text' name="alt_text" class="form-control" value="{{ $media->alt_text }}">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select id="type" name="type" class="form-control" required="required">
                                                    <option value="">Select</option>
                                                    @if($media->type==0)
                                                        <option value="0" selected="selected">Image</option>
                                                        <option value="1">Video</option>
                                                    @else
                                                        <option value="0">Image</option>
                                                        <option value="1" selected="selected">Video</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description
                                            </label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea class="summernote" id='description' name="description">{{ $media->description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button class="btn btn-primary">{{ __('Update') }}</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                                <div class="col-md-4">
                                    <div class="container">
                                        <div class="row">
                                                 @if($media->type==0)
                                                 <img class="img-thumbnail"  style="max-width: 600px; max-height: 400px;" name="upload_preview" id="upload_preview" src="{{ asset($media->url) ?: asset("img/news/img13.jpg") }}">
                                                 @else
                                                 <video width="400px;" class="media" height="200px;" controls>
                                                    <source src="{{ $media->url }}" type="video/mp4">
                                                    Your browser does not support HTML video.
                                                 </video>
                                                 @endif
                                        </div>
                                    </div>
                                </div>



                            </div>



                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('modules/summernote/summernote-bs4.js')}}"></script>
    <script>
        function preview_image(input) {
            if (input.files && input.files[0] && input.files[0].type!='video/mp4') {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#upload_preview')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('modules/summernote/summernote-bs4.css')}}">
@endsection


