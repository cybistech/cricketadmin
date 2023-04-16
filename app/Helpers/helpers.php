<?php

function get_news_category_by_id($id,$type = ''){
    $return_val = __('uncategorized');
    $blog_cat = \App\Models\NewsCategory::find($id);
    if (!empty($blog_cat)){
        $return_val = $blog_cat->name;
        if ($type == 'link' ){
            $return_val = '<a href="'.route('frontend.blog.category',['id' => $blog_cat->id,'any' => Str::slug($blog_cat->name) ]).'">'.$blog_cat->name.'</a>';
        }
    }

    return $return_val;
}

