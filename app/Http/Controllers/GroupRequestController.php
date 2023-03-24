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
        $groupRequests = GroupRequest::where('user_id', auth()->user()->id)->get();
        return view('group_requests.index', compact('groupRequests'));
    }

    public function create()
    {
        $groups = Group::all();
        return view('group_requests.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'group_id' => 'required|exists:groups,id',
        ]);

        GroupRequest::create([
            'user_id' => auth()->user()->id,
            'group_id' => $validatedData['group_id'],
            'status' => 'pending',
        ]);

        return redirect()->route('group_requests.index')->with('success', 'Group request sent successfully');
    }

    public function approve(GroupRequest $groupRequest)
    {
        $groupRequest->update(['status' => 'approved']);
        return redirect()->route('group_requests.index')->with('success', 'Group request approved successfully');
    }

    public function reject(GroupRequest $groupRequest)
    {
        $groupRequest->update(['status' => 'rejected']);
        return redirect()->route('group_requests.index')->with('success', 'Group request rejected successfully');
    }
}