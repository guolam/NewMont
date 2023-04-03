<?php

namespace App\Http\Controllers;
use App\Models\Tweet;
use App\Models\User;
use App\Models\GroupContent;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $keyword = trim($request->keyword);
      $users  = User::where('name', 'like', "%{$keyword}%")->pluck('id')->all();
      $tweets = Tweet::query()
  ->where(function($query) use ($keyword) {
      $query->where('tweet', 'like', "%{$keyword}%")
            ->orWhere('description', 'like', "%{$keyword}%")
            ->orWhere('perfecture', 'like', "%{$keyword}%");
  })
  ->orWhereIn('user_id', $users)
  ->get();
      return response()->view('dashboard', compact('tweets'));
    }


// public function index(Request $request)
// {
//     $keyword = $request->input('perfecture');

//     $tweets = Tweet::query()
//         ->where('perfecture', 'like', "%{$keyword}%")
//         ->get();

//     return response()->view('dashboard', compact('tweets'));
// }

    // public function search(Request $request)
    // {
    //     $query = $request->input('query');
        
    //     //TweetsとGroupContentsのテーブルから検索
    //     $tweets = Tweet::query()
    //         ->where('tweet', 'like', "%{$query}%")
    //         ->orWhere('description', 'like', "%{$query}%")
    //         ->orWhere('perfecture', 'like', "%{$keyword}%")
    //         ->get();
    
    //     $groupContents = GroupContent::query()
    //         ->where('tweet', 'like', "%{$query}%")
    //         ->orWhere('description', 'like', "%{$query}%")
    //         ->orWhere('perfecture', 'like', "%{$keyword}%")
    //         ->get();
    
    //     return view('search_results', [
    //         'tweets' => $tweets,
    //         'groupContents' => $groupContents
    //     ]);
    // }

// public function search(Request $request)
// {
//     $query = $request->input('query');
//     $keyword = $request->input('perfecture');
        
//     //TweetsとGroupContentsのテーブルから検索
//     $tweets = Tweet::query()
//         ->where('tweet', 'like', "%{$query}%")
//         ->orWhere('description', 'like', "%{$query}%")
//         ->orWhere('perfecture', 'like', "%{$keyword}%")
//         ->get();

//     $groupContents = GroupContent::query()
//         ->where('tweet', 'like', "%{$query}%")
//         ->orWhere('description', 'like', "%{$query}%")
//         ->orWhere('perfecture', 'like', "%{$keyword}%")
//         ->get();

//     return view('search_results', [
//         'tweets' => $tweets,
//         'groupContents' => $groupContents
//     ]);
// }


public function search(Request $request)
{
    $query = $request->input('keyword');
    $prefecture = $request->input('prefecture');
        
    //TweetsとGroupContentsのテーブルから検索
    $tweets = Tweet::query()
        ->where('tweet', 'like', "%{$query}%")
        ->orWhere('description', 'like', "%{$query}%")
        ->where('perfecture', $prefecture)
        ->get();
        
    dd($tweets);

    $groupContents = GroupContent::query()
        ->where('tweet', 'like', "%{$query}%")
        ->orWhere('description', 'like', "%{$query}%")
        ->where('perfecture', $prefecture)
        ->get();
        
    return view('search_results', [
        'tweets' => $tweets,
        'groupContents' => $groupContents
    ]);
}

// public function search(Request $request)
// {
//     // インプットの時
//     $query = $request->input('query');
//     // 
//     $prefecture = $request->input('prefecture');
    
//     //TweetsとGroupContentsのテーブルから検索
//     $tweets = Tweet::query()
//         ->where(function($q) use ($query, $prefecture) {
//             $q->when($prefecture, function($query, $prefecture) {
//                 return $query->where('perfecture', $prefecture);
//             })
//             ->when($query, function($query, $keyword) {
//                 return $query->where(function($q) use ($keyword) {
//                     $q->where('tweet', 'like', "%{$keyword}%")
//                       ->orWhere('description', 'like', "%{$keyword}%");
//                 });
//             });
//         })
//         ->get();

//     $groupContents = GroupContent::query()
//         ->where(function($q) use ($query, $prefecture) {
//             $q->when($prefecture, function($query, $prefecture) {
//                 return $query->where('perfecture', $prefecture);
//             })
//             ->when($query, function($query, $keyword) {
//                 return $query->where(function($q) use ($keyword) {
//                     $q->where('tweet', 'like', "%{$keyword}%")
//                       ->orWhere('description', 'like', "%{$keyword}%");
//                 });
//             });
//         })
//         ->get();

//     return view('search_results', [
//         'tweets' => $tweets,
//         'groupContents' => $groupContents
//     ]);
// }


    public function show($id)
    {
        $result = SearchResult::find($id);
        return view('search_result_detail', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return response()->view('search.input');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
