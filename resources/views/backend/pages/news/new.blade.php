@extends('backend.pages.layouts.main')
@section('main.container')
<section class="content-wrapper mt-4">
<div class="col-lg-12 col-ml-12 padding-bottom-30">
    <div class="row">
        <div class="col-lg-12">
            <div class="margin-top-40"></div>
            <x-flash-msg/>
            <x-error-msg/>
        </div>
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="header-wrap d-flex justify-content-between">
                        <h4 class="header-title">{{__('Add New News Post')}}</h4>
                        <a href="{{route('admin.news')}}" class="btn btn-primary">{{__('All News')}}</a>
                    </div>

                    <form action="{{ route('admin.news.new')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="title">{{__('Title')}}</label>
                                    <input type="text" class="form-control"  value="{{old('title')}}" name="title" placeholder="{{__('Title')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Content')}}</label>
                                    <input type="text" class="form-control" id="content" name="blog_content" >
                                    <div class="summernote">{{old('blog_content')}}</div>
                                </div>
                                <div class="form-group">
                                    <label for="meta_tags">{{__('Meta Tags')}}</label>
                                    <input type="text" name="meta_tags"  class="form-control" value="{{old('meta_tags')}}" data-role="tagsinput" id="meta_tags">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">{{__('Meta Description')}}</label>
                                    <textarea name="meta_description"  class="form-control" rows="5" id="meta_description">{{old('meta_description')}}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="title">{{__('Slug')}}</label>
                                    <input type="text" class="form-control"  id="slug"  value="{{old('slug')}}"  name="slug" placeholder="{{__('Slug')}}">
                                </div>
                                <div class="form-group">
                                    <label for="title">{{__('Excerpt')}}</label>
                                    <textarea name="excerpt" id="excerpt" class="form-control max-height-150" cols="30" rows="10">{{old('excerpt')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category">{{__('Category')}}</label>
                                    <select name="category" class="form-control" id="category" data-oldid="{{ Request::old()?Request::old('category'):'' }}">
                                        <option value="99">{{__("Select Category")}}</option>
                                        @foreach($all_category as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">{{__('Tags')}}</label>
                                    <input type="text" class="form-control" name="tags" value="{{old('tags')}}" data-role="tagsinput">
                                </div>
                                <div class="form-group">
                                    <label for="author">{{__('Author Name')}}</label>
                                    <input type="text" class="form-control" name="author" id="author" value="{{old('author')}}">
                                </div>
                                <div class="form-group">
                                    <label for="status">{{__('Status')}}</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="publish" {{old('status' == "publish" ? 'selected' : '')}}>{{__('Publish')}}</option>
                                        <option value="draft"   {{old('status' == "draft" ? 'selected' : '')}}>{{__('Draft')}}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">{{__('Upload Image')}}</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New Post')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
 @endsection

