@extends('backend.pages.layouts.main')
@section('main.container')

<section class="content-wrapper mt-4">
<div class="col-lg-12 col-ml-12 padding-bottom-30">
    <div class="row">
        <div class="col-lg-12">
            <div class="margin-top-40"></div>
            @include('backend.pages.message')
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-lg-6 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">
                        {{__('All Categories')}}
                    </h4>
                        <div class="table-wrap table-responsive">
                                <table class="table table-default">
                                    <thead>
                                        <th>{{__('ID')}}</th>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </thead>
                                    <tbody>
                                        @foreach($all_category as $key => $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>
                                                @if('publish' == $category->status)
                                                <span class="btn btn-success btn-sm">Publish</span>
                                                @else
                                                <span class="btn btn-warning btn-sm">Draft</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('admin.news.category.delete',['id'=>$category->id])}}">
                                                    <button class="btn btn-danger btn-sm delete">Delete</button>
                                                </a>
                                                <a href="#"
                                                   data-toggle="modal"
                                                   data-target="#category_edit_modal"
                                                   data-id="{{$category->id}}"
                                                   data-name="{{$category->name}}"
                                                   data-lang="{{$category->lang}}"
                                                   data-status="{{$category->status}}"
                                                >
                                                <button class="btn btn-lg btn-primary btn-sm mr-1 category_edit_btn"><i class="ti-pencil"></i> Edit</button>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{__('Add New Category')}}</h4>
                    <form action="{{route('admin.news.category')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{__('Name')}}</label>
                            <input type="text" class="form-control"  id="name" name="name" value="{{old('name')}}" placeholder="{{__('Name')}}">
                        </div>
                        <div class="form-group">
                            <label for="status">{{__('Status')}}</label>
                            <select name="status" class="form-control" id="status">
                                <option value="publish" {{ old('status') == "publish" ? 'selected' : '' }}>{{__("Publish")}}</option>
                                <option value="draft"   {{ old('status') == "draft" ? 'selected' : '' }}>{{__("Draft")}}</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="category_edit_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('Update Category')}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <form action="{{route('admin.news.category.update')}}"  method="post">
                <input type="hidden" name="id" id="category_id">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="edit_name">{{__('Name')}}</label>
                        <input type="text" class="form-control"  id="edit_name" name="name" placeholder="{{__('Name')}}">
                    </div>
                    <div class="form-group">
                        <label for="edit_status">{{__('Status')}}</label>
                        <select name="status" class="form-control" id="edit_status">
                            <option value="draft">{{__("Draft")}}</option>
                            <option value="publish">{{__("Publish")}}</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{__('Save Change')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('scripts')

<script>
    $(document).ready(function () {
        $(document).on('click','.category_edit_btn',function(){
            var el = $(this);
            var id = el.data('id');
            var name = el.data('name');
            var status = el.data('status');
            var modal = $('#category_edit_modal');
            modal.find('#category_id').val(id);
            modal.find('#edit_status option[value="'+status+'"]').attr('selected',true);
            modal.find('#edit_name').val(name);
            modal.find('#edit_language option[value="'+el.data('lang')+'"]').attr('selected',true);
        });
    });
</script>
@endsection


