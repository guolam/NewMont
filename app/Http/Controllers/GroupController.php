<?php

// GroupController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupMembershipRequest;
use App\Models\Group;

class GroupController extends Controller
{
    public function create(Group $group)
    {
        return view('groupmembership.create', compact('group'));
    }

    public function store(Request $request, Group $group)
    {
        // フォームデータのバリデーション
        $validatedData = $request->validate([
            'message' => 'nullable|string|max:255',
        ]);

        // GroupMembershipRequest モデルを作成し、データベースに保存
        $request = new GroupMembershipRequest;
        $request->user_id = auth()->id();
        $request->group_id = $group->id;
        $request->message = $validatedData['message'];
        $request->save();

        // 成功メッセージをフラッシュデータに保存し、グループの詳細ページにリダイレクト
        return redirect()->route('groups.show', $group)->with('success', '申請が送信されました。');
    }
}
