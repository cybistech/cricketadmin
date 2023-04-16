<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function index(){
        $all_news = News::all();
        return view('backend.pages.news.index')->with([
            'all_news' => $all_news
        ]);
    }
    public function new_news(Request $request){
        $all_category=NewsCategory::all();
        return view('backend.pages.news.new')->with([
            'all_category'=>$all_category
        ]);
    }

    public function store_new_news(Request $request){
        $this->validate($request,[
           'category' => 'required',
           'blog_content' => 'required',
           'tags' => 'required',
           'excerpt' => 'required',
           'title' => 'required',
           'status' => 'required',
           'author' => 'required',
           'slug' => 'nullable',
           'meta_tags' => 'nullable|string',
           'meta_description' => 'nullable|string',
        ]);

        $file = $request->file('image');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time().'.'.$extenstion;
        $file->move('images/', $filename);
        $image_path = asset('images/'.$filename);

        News::create([
            'news_categories_id' => $request->category,
            'slug' => $request->slug ,
            'content'=>$request->blog_content,
            'tags' => $request->tags,
            'title' => $request->title,
            'status' => $request->status,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'excerpt' => $request->excerpt,
            'image' =>$image_path,
            'user_id' => Auth::user()->id,
            'author' => $request->author,
        ]);
        return redirect()->back()->with([
            'msg' => __('New News Post Added...'),
            'type' => 'success'
        ]);
    }

    public function edit_news($id){
        $news_post = News::find($id);
        $all_category=NewsCategory::all();
        return view('backend.pages.news.edit')->with([
            'news_post' => $news_post,
            'all_category'=>$all_category
        ]);
    }

    public function update_news(Request $request,$id){
        $this->validate($request,[
            'category' => 'required',
            'blog_content' => 'required',
            'tags' => 'required',
            'excerpt' => 'required',
            'title' => 'required',
            // 'lang' => 'required',
            'status' => 'required',
            'author' => 'required',
            'slug' => 'nullable',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'image' => 'nullable|string|max:191',
        ]);
        News::where('id',$id)->update([
            'news_categories_id' => $request->category,
            'slug' => $request->slug,
            'content' => $request->blog_content,
            'tags' => $request->tags,
            'title' => $request->title,
            'status' => $request->status,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'excerpt' => $request->excerpt,
            // 'lang' => $request->lang,
            'image' => $request->image,
            'user_id' => Auth::user()->id,
            'author' => $request->author,
        ]);

        return redirect()->back()->with([
            'msg' => __('News Post updated...'),
            'type' => 'success'
        ]);
    }

    public function delete_news(Request $request,$id){
        News::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('News Post Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function category(Request $request){

        $all_category = NewsCategory::all();
        return view('backend.pages.news.category')->with([
            'all_category' => $all_category,
        ]);
    }

    public function new_category(Request $request){
        // dd($request->all());exit;
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:news_categories',
            'status' => 'required|string|max:191'
        ]);
        NewsCategory::create([
            'name' => $request->name,
            'status' =>$request->status]);

        return redirect()->back()->with([
            'msg' => __('New Category Added...'),
            'type' => 'success'
        ]);
    }

    public function update_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'status' => 'required|string|max:191'
        ]);

        NewsCategory::find($request->id)->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->back()->with([
            'msg' => __('Category Update Success...'),
            'type' => 'success'
        ]);
    }

    public function delete_category(Request $request,$id){
            if (News::where('news_categories_id',$id)->first()){
                return redirect()->back()->with([
                    'msg' => __('You Can Not Delete This Category, It Already Associated With A Post...'),
                    'type' => 'danger'
                ]);
            }
            NewsCategory::find($id)->delete();

        return redirect()->back()->with([
            'msg' => __('Category Delete Success...'),
            'type' => 'danger'
        ]);
    }

}
