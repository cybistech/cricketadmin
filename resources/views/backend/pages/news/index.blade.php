@extends('backend.pages.layouts.main')
@section('main.container')
<section class="content-wrapper mt-4">
    <div class="container-fluid">
        <div>
            <div class="mb-2">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="col mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="header-wrap d-flex justify-content-between">
                        <h4 class="header-title">{{ __('Show News') }}</h4>
                        <a href="{{route('admin.news.new')}}" class="btn btn-primary">{{__('Register New News')}}</a>
                    </div>
                    <div class="p-3 tab-content margin-top-80" id="myTabContent">
                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>News Category</th>
                                    <th>Tags</th>
                                    <th>Image</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Slug</th>
                                    <th>Excerpt</th>
                                    <th>Meta Tags</th>
                                    <th>Meta description</th>
                                    <th class="text-center">Actions</th>
                                </thead>
                                 <tbody>
                                    @foreach($all_news as $news)
                                    <td>{{$news->id}}</td>
                                    <td>{{$news->title}}</td>
                                    <td>
                                        @if(!empty($news->news_categories_id))
                                                {{get_news_category_by_id($news->news_categories_id)}}
                                        @endif
                                        </td>
                                    <td>{{$news->tags}}</td>
                                    <td>
                                        <img src="{{$news->image}}" width="70" height="70" class="img img-responsive"/>
                                    </td>
                                    <td>{{$news->author}}</td>
                                    <td>{{$news->status}}</td>
                                    <td>{{$news->slug}}</td>
                                    <td>{{$news->excerpt}}</td>
                                    <td>{{$news->meta_tags}}</td>
                                    <td>{{$news->meta_description}}</td>
                                    <td class="col-2 text-center">
                                        <a href="{{route('admin.news.delete',['id'=>$news->id])}}">
                                        <button class="btn btn-danger btn-sm delete">Delete</button>
                                        </a>
                                      <a href="{{route('admin.news.edit',['id'=>$news->id])}}">
                                      <button class="btn btn-sm btn-success">Edit</button>
                                      </a>
                                     </td>
                                    </tr>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
