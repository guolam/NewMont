<?php

// GroupController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupMembershipRequest;
use App\Models\Group;

class GroupController extends Controller
{
 
    public function index()
    {
        $groups = Group::all();
        return view('group.index', compact('groups'));
    }

    public function create()
    {
        return view('group.create');
    }

     public function store(Request $request, Group $group)
    {
        // フォームデータのバリデーション
        $validatedData = $request->validate([
            'message' => 'nullable|string|max:255',
        ]);

        // GroupMembershipRequest モデルを作成し、データベースに保存
        $groups = new group();
        $groups->user_id = auth()->id();
        $groups->group_name = request() -> group_name;
        $groups->description = request() -> description;
        $groups->save();

        // 保存したらindexに戻る
        return redirect()->route('group.index', $group);
    }

    //     public function show(Group $group)
    // {
    //     // グループに所属するユーザーを取得
    //     $related_users = $group->users;
    
    // $groupContentController = new GroupContentController();
    // $group_content = $groupContentController->index();

    // return view('group.show', compact('group', 'related_users', 'group_content'));
    
    
    //     // return view('group.show', compact('group', 'related_users'));
      
    // }
    
        public function show(Group $group)
    {
        $group_contents = $group->groupContents;
        $related_users = $group->users; // 関連するユーザーを取得
        return view('group.show', compact('group', 'group_contents', 'related_users'));
    }
    
    
    
}