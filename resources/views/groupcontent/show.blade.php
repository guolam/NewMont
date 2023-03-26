<!--groupcontent/show.blade.php-->

<div>
@foreach ($group_contents as $group_content)

<a href="{{ route('groupcontent.showdetail',$group_content->id) }}">
<h3>{{ $group_content->date}}</h3>
<h3>{{ $group_content->tweet }}</h3>
</a>
@endforeach

<a href="{{ url()->previous() }}">
<x-secondary-button class="ml-3">
{{ __('戻る') }}
</x-primary-button>
</a>
</div>
        
