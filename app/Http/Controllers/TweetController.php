<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Tweet;
use App\Models\User;
use Auth;
use Symfony\Componet\HttpKernel\Exception\AccessDeniedHttpException;




class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tweets = Tweet::getAllOrderByUpdated_at();
        return response()->view('tweet.index',compact('tweets'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('tweet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
       
       //新しい変数を定義する
      $tweet = new tweet();
       //tweetの変数がrequestで受け取った
       //tweet
      //user_id
      $tweet -> user_id = Auth::user() -> id;
      //perfecture
      $tweet -> perfecture = request() -> perfecture;
      //mont
      $tweet -> mont = request() -> mont;
      //yama
      $tweet -> tweet = request() -> tweet;
       //description
      $tweet -> description = request() -> description;
      //parking
      $tweet -> parking = request() -> parking;
      
      $tweet -> food = request() -> food;
     
      
      // imageの保存処理
      if(request('image')){
        $original=request()->file("image")->getClientOriginalName();
        //ファイル名を定義する
        $name=date("Ymd_His")."_".$original;
        //画像を格納する。
        request()->file("image")->move("storage/image",$name);
        $tweet -> image = $name;
      }
      
      //全部一括で保存するおまじない
      $tweet -> save(); 
       
        // バリデーション
        $validator = Validator::make($request->all(), [
          'tweet' => 'required | max:300',
          'description' => 'required',
          'image' => 'required',
        ]);
        
        // バリデーション:エラー
        if ($validator->fails()) {
          return redirect()
            ->route('tweet.index')
            ->withInput()
            ->withErrors($validator);
        }
        
 
        // フォームから送信されてきたデータとユーザIDをマージし，DBにinsertする
   
    //   $data = $request->merge(['user_id' => Auth::user()->id])->all();
    // $result = Tweet::create($data);
        
        //create.bladeから送ってきたものを、全て、送信？？
        // $result = Tweet::create($request->all());
    
        // tweet.indexにリクエスト送信（一覧ページに移動）
        return redirect()->route('tweet.index', $tweet);
     }
     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $tweet = Tweet::find($id);
      return response()->view('tweet.show', compact('tweet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tweet = Tweet::find($id);
      return response()->view('tweet.edit', compact('tweet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //バリデーション
      $validator = Validator::make($request->all(), [
        'tweet' => 'required | max:191',
        'description' => 'required',
        'parking' => 'required',
      ]);
      
      //バリデーション:エラー
      if ($validator->fails()) {
        return redirect()
          ->route('tweet.edit', $id)
          ->withInput()
          ->withErrors($validator);
      }
      
      //データ更新処理
      $result = Tweet::find($id)->update($request->all());
      return redirect()->route('tweet.create');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $result = Tweet::find($id)->delete();
      return redirect()->route('tweet.index');
    }
    
    public function mydata()
      {
        // Userモデルに定義したリレーションを使用してデータを取得する．
        $tweets = User::query()
          ->find(Auth::user()->id)
          ->userTweets()
          ->orderBy('created_at','desc')
          ->get();
        return response()->view('tweet.index', compact('tweets'));
      }
      
     public function timeline()
    {
      // フォローしているユーザを取得する
      $followings = User::find(Auth::id())->followings->pluck('id')->all();
      // 自分とフォローしている人が投稿したツイートを取得する
      $tweets = Tweet::query()
        ->where('user_id', Auth::id())
        ->orWhereIn('user_id', $followings)
        ->orderBy('updated_at', 'desc')
        ->get();
      return response()->view('tweet.index', compact('tweets'));
    }
    
   
}

