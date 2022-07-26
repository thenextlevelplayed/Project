<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class NewsController extends Controller
{

    function news()
    {
        //最新消息
        $news = News::all();


        return view('main.news', compact('news'));
    }
    function newsEdit($newsId)
    {
        //最新消息編輯

        $newsEdit = News::all()
            ->find($newsId);

        return view('news.newsEdit', compact('newsEdit'));
    }


    public function newsUpdate(Request $request, $newsId)
    {

        $newsEdit = News::all()
            ->find($newsId);
        $newsEdit->title = $request->title;
        $newsEdit->content = $request->content;

        $image = $request->file('mainImg');
        

        if ($image) {

            // **** 有圖片檔案 ****

            $fileName = $request->file('mainImg')->getClientOriginalName();
            //圖片存在裡面 public newsImg
            $temp = file_get_contents($image);

            $image->move(public_path('/newsImg'), $fileName);
            
            $blob = base64_encode($temp);
            $newsEdit->img = $fileName;
            $newsEdit->imgfile = $blob;


            
        }

        //存資料
        $newsEdit->save();
        // $path = base_path('public/newsImg');
        // File::delete($path . "/" . $fileName);

        return redirect('/main/news');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('news.newsCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image = $request->file('mainImg');
        $fileName = $request->file('mainImg')->getClientOriginalName();
        $temp = file_get_contents($image);
        $blob = base64_encode($temp);

        
        $newsid = News::all();
        foreach( $newsid as $key => $id){
            $id = $id->newsid;
        }

        //資料寫新增至資料庫
        News::insert([
            'newsid' => $id +1,
            'title' => $request->title,
            'content' => $request->content,
            'img' => $fileName,
            'imgfile'=> $blob
        ]);

        //圖片存在裡面 public newsImg
        $image->move(public_path('/newsImg'), $fileName);
        $path = base_path('public/newsImg');
        return redirect('/main/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $News
     * @return \Illuminate\Http\Response
     */
    public function show(News $News)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $News
     * @return \Illuminate\Http\Response
     */
    public function edit(News $News)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $News
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $News)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $News
     * @return \Illuminate\Http\Response
     */
    public function destroy($newsId)
    {
        //
        News::find($newsId)->delete();

        return redirect('/main/news');
    }
}
