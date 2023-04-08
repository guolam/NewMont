<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupMembershipRequest;
use App\Models\User;
use App\Models\Group;
use App\Models\GroupRequest;
use Auth;
use Symfony\Componet\HttpKernel\Exception\AccessDeniedHttpException;


class GroupRequestController extends Controller
{
    
    public function index()
{
    $pending_requests = GroupRequest::where('status', 'pending')->get();
    $pending_requests_count = GroupRequest::where('status', 'pending')->count();
    $groups = Group::all();
    $hasApplicants = false;

    foreach ($groups as $group) {
        if (Auth::user()->id === $group->user_id) {
            foreach ($pending_requests as $request) {
                if ($request->group_id === $group->id) {
                    $hasApplicants = true;
                    break 2;
                }
            }
        }
    }

    return view('group_requests.index', [
        'pending_requests' => $pending_requests,
        'pending_requests_count' => $pending_requests_count,
        'groups' => $groups,
        'hasApplicants' => $hasApplicants,
    ]);
}


    public function create()
    {
        $groups = Group::all();
        return view('group_requests.create', compact('groups'));
    }

    public function store(Request $request)
{
    $request->validate([
        'group_id' => 'required|integer',
    ]);

    $group_id = $request->input('group_id');
    $user_id = Auth::id();

    $existing_request = GroupRequest::where('group_id', $group_id)
                                    ->where('user_id', $user_id)
                                    ->whereIn('status', ['pending', 'approved'])
                                    ->first();

    if ($existing_request) {
        return redirect()->back()->with('error', 'すでにリクエストが存在します。');
    }

    $group_request = new GroupRequest;
    $group_request->group_id = $group_id;
    $group_request->user_id = $user_id;
    $group_request->status = 'pending';
    $group_request->save();

    return redirect()->back()->with('success', 'グループ参加リクエストを送信しました。');
}



   public function approve(Request $request, $id)
    {
        $group_request = GroupRequest::findOrFail($id);


    if ($group_request->status === 'approved') {
        return redirect()->back()->with('error', 'このリクエストはすでに承認されています。');
    }

        // 申請のステータスを更新
        $group_request->status = 'approved';
        $group_request->save();

        // グループにユーザーを追加
        $group_request->group->users()->attach($group_request->user_id);

        // 成功メッセージを表示
        $request->session()->flash('status', 'Group request approved.');

        return redirect()->route('group_requests.index')->with('success', 'リクエストを承認しました。');
    }

    public function reject(Request $request, $id)
    {
        $group_request = GroupRequest::findOrFail($id);

        // 申請のステータスを更新
        $group_request->status = 'rejected';
        $group_request->save();

        // 成功メッセージを表示
        $request->session()->flash('status', 'Group request rejected.');

        return redirect()->route('group_requests.index');
        
    }

   public function user()
    {
        return $this->belongsTo(User::class);
    }
}