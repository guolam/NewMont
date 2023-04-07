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
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


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
        $group = Group::findOrFail($group_id);
         return view('groupcontent.create', compact('group'));
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
      
      $group_content->spring = request()->has('spring') ? request()->spring : null;
      $group_content->food = request()->has('food') ? request()->food : null;
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

    // group.showに戻る
    return redirect()->route('group.show', ['group' => $group_content->group_id]);
}


// コンテンツのタイトルと内容を表示する画面
    public function show($id, $group_id)
    {
        $group_content = GroupContent::where('id', $id)
                                      ->where('group_id', $group_id)
                                      ->firstOrFail();
    
        return view('groupcontent.show', compact('group_content'));
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


    public function edit($group_id, $id)
    {
       $group_content = GroupContent::where('group_id', $group_id)
                                      ->where('id', $id)
                                      ->firstOrFail();
       return response()->view('groupcontent.edit', compact('group_content'));
    }



    public function update(Request $request, $group_id, $id)
    {
        
        // Find the record to update using id and group_id
        $group_content = GroupContent::where('id', $id)
                                      ->where('group_id', $group_id)
                                      ->first(); 
                                      
         // バリデーション
            $validator = Validator::make($request->all(), [
                'tweet' => 'required | max:255',
                'perfecture' => 'required',
                'description' => 'required',
                'parking' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
          
            // // バリデーション:エラー
            if ($validator->fails()) {
                return redirect()
                    ->route('groupcontent.edit', $id)
                    ->withInput()
                    ->withErrors($validator);
            }
        
            // Get the updated values from the request object
            $group_content->date = $request->input('date');
            $group_content->tweet = $request->input('tweet');
            $group_content->is_public = $request->input('is_public');
            $group_content->perfecture = $request->input('perfecture');
            $group_content->mont = $request->input('mont');
            $group_content->parking = $request->input('parking');
            $group_content->spring = $request->input('spring');
            $group_content->food = $request->input('food');
            $group_content->description = $request->input('description');
    
            $group_content->fill([
            'date' => $request->input('date'),
            'tweet' => $request->input('tweet'),
            'is_public' => $request->input('is_public'),
            'perfecture' => $request->input('perfecture'),
            'mont' => $request->input('mont'),
            'parking' => $request->input('parking'),
            'spring' => $request->input('spring'),
            'food' => $request->input('food'),
            'description' => $request->input('description'),
    ]);
        // Save the updated record
        $group_content->save();
    
        // Redirect to the updated record's page
        return redirect()->route('group.show', ['group' => $group_content->group_id]);
    }

    /*destroy=削除*/
    // public function destroy($id)
    // {
    //   $result = GroupContent::find($id)->delete();
    //   return redirect()->route('groupcontent.index');
    // }
    
//     public function destroy($id)
// {
//     $groupContent = GroupContent::find($id);

//     if ($groupContent) {
//         $groupContent->delete();
//     }

//     return redirect()->route('group.index');
// }

public function destroy($group_id, $id)
{
   
    $groupContents = GroupContent::where('id', $id)->get();

    foreach ($groupContents as $groupContent) {
        $groupContent->delete();
    }

    return redirect()->route('group.show', $group_id);
}
}