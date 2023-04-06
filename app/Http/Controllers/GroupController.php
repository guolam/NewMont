<?php

// GroupController.php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
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
    
        public function show(Group $group)
    {
        $group_contents = $group->groupContents;
        $related_users = $group->users; // 関連するユーザーを取得
        return view('group.show', compact('group', 'group_contents', 'related_users'));
    }


    public function edit($id)
    {
        $group = Group::findOrFail($id);

        return view('group.edit', [
            'group' => $group
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'group_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('groups')->ignore($id),
            ],
            'description' => 'nullable|string|max:1000',
        ]);

        $group = Group::findOrFail($id);
        $group->group_name = $request->input('group_name');
        $group->description = $request->input('description');
        $group->save();

        return redirect()->route('group.show', $id)->with('success', 'グループ情報が更新されました');
    }
 
         
}