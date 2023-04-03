<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Tweet;
use App\Models\User;
use App\Models\GroupContent;
use App\Models\Group;
use Auth;
use Symfony\Componet\HttpKernel\Exception\AccessDeniedHttpException;


class GroupContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    $group_contents= GroupContent::with('user')->get();
    return response()->view('groupcontent.index',compact('group_contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($group_id)
    
    {
        //
        $group = Group::findOrFail($group_id);
         return view('groupcontent.create', compact('group'));
        // return view('groupcontent.create');
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
      $group_content = new GroupContent();
      //tweetの変数がrequestで受け取った
      //tweet
      //user_id
      $group_content -> user_id = Auth::user() -> id;
      //今入っているグループのidをこのまま入れたい
      $group_content->group_id = $request->input('group_id');
      //perfecture
      $group_content -> perfecture = request() -> perfecture;
      //mont
      $group_content -> date = request() -> date;
      
      $group_content -> mont = request() -> mont;
      //yama
      $group_content -> tweet = request() -> tweet;
      //description
      $group_content -> description = request() -> description;
      //parking
      $group_content -> parking = request() -> parking;
      
      $group_content -> spring = request() -> spring;
      
      $group_content -> food = request() -> food;
      
      $is_public = $request->input('is_public');
      $group_content->is_public = $is_public !== null ? $is_public : 0; // NULL値の場合、0に設定する
    

    // imageの保存処理
      if(request('image')){
      $original=request()->file("image")->getClientOriginalName();
      //ファイル名を定義する
      $name=date("Ymd_His")."_".$original;
      //画像を格納する。
      request()->file("image")->move("storage/image",$name);
      $group_content -> image = $name;
    }
    
    //全部一括で保存するおまじない
    $group_content -> save();
    
    // バリデーション
    $validator = Validator::make($request->all(), [
    'is_public' => 'required|boolean',
    'tweet' => 'required | max:300',//山
    'description' => 'required',
    'image' => 'required',
    ]);
    
    // バリデーション:エラー
    if ($validator->fails()) {
        return redirect()
            ->route('group.show', $request->input('group_id'))
            ->withInput()
            ->withErrors($validator);
    }

    // 新しい変数を定義する
    $group_content = new GroupContent();
    // （以下のコードはそのままです。）

    // 一番下のリダイレクトを以下のように修正してください。
    return redirect()->route('group.show', ['group' => $group_content->group_id]);
     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}

// コンテンツのタイトルと内容を表示する画面
public function show($group_id)
{
    $group_contents = GroupContent::where('group_id', $group_id)->get();
    return view('groupcontent.show', compact('group_contents'));
    
}

// コンテンツの詳細を出す画面


public function showdetail($id)
{
    $group_content = GroupContent::find($id);

    if ($group_content) {
        // 公開コンテンツか、ログイン済みであれば表示
        if ($group_content->is_public || Auth::check()) {
            return view('groupcontent.showdetail', compact('group_content'));
        } else {
            // 非公開コンテンツで未ログインの場合、ログインページへリダイレクト
        return redirect()->route('login');
        }
        } else {
        // 存在しないIDの場合のリダイレクト先
        return redirect()->route('some.error.page');
        }
    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $group_content = GroupContent::find($id);
      return response()->view('groupcontent.edit', compact('group_content'));
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
        'tweet' => 'required | max:255',
        'perfecture' => 'required',
        'description' => 'required',
        'parking' => 'required',
      ]);
      
      //バリデーション:エラー
      if ($validator->fails()) {
        return redirect()
          ->route('groupContent.edit', $id)
          ->withInput()
          ->withErrors($validator);
      }
      
      //データ更新処理
      $result = Tweet::find($id)->update($request->all());
      return redirect()->route('group.show',['group' => $request->group_id]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $result = group_create::find($id)->delete();
      return redirect()->route('groupcontent.index');
    }
    
  
}

