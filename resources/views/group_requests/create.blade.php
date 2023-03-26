<form action="{{ route('group_requests.store') }}" method="POST">
    @csrf
    <input type="hidden" name="group_id" value="{{ $group->id }}">
    <button type="submit" class="btn btn-primary flex"><svg id="Layer_1" data-name="Layer 1"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" width="24" height="24"
            color="#000000">
            <defs>
                <style>
                    .cls-6374f8d9b67f094e4896c60d-1 {
                        fill: none;
                        stroke: currentColor;
                        stroke-miterlimit: 10;
                    }
                </style>
            </defs>
            <circle class="cls-6374f8d9b67f094e4896c60d-1" cx="9.61" cy="5.8" r="4.3"></circle>
            <path class="cls-6374f8d9b67f094e4896c60d-1"
                d="M1.5,19.64l.7-3.47a7.56,7.56,0,0,1,7.41-6.08,7.43,7.43,0,0,1,4.59,1.57">
            </path>
            <circle class="cls-6374f8d9b67f094e4896c60d-1" cx="16.77" cy="16.77" r="5.73">
            </circle>
            <line class="cls-6374f8d9b67f094e4896c60d-1" x1="13.91" y1="16.77" x2="19.64" y2="16.77"></line>
            <line class="cls-6374f8d9b67f094e4896c60d-1" x1="16.77" y1="13.91" x2="16.77" y2="19.64"></line>
        </svg>グループに参加</button>
</form>