@extends('group.index')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ $group->name }} に参加申請する
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('groupmembership.store', $group) }}">
                @csrf
                <div class="form-group">
                    <label for="message">メッセージ（任意）</label>
                    <textarea id="message" name="message" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">申請する</button>
            </form>
        </div>
    </div>
@endsection