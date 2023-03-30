<!--groupcontent/show.blade.php-->

<div>
@foreach ($group_contents as $group_content)
    <div>
        <h3>{{ $group_content->date }}</h3>
        <h3>
            <a href="{{ route('groupcontent.showdetail', $group_content->id) }}">
                {{ $group_content->tweet }}
            </a>
        </h3>
    </div>
@endforeach

<a href="{{ url()->previous() }}">
    <x-secondary-button class="ml-3">
        {{ __('戻る') }}
    </x-primary-button>
</a>
</div>

        
