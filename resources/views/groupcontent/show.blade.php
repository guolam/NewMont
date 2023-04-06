<!--groupcontent/show.blade.php-->
<!--ここはgroupのコンテンツをグループごとに表示する画面です。-->

<div>
    @foreach ($group_contents as $group_content)
    
         <a href="{{ route('groupcontent.showdetail', $group_content->id) }}">
        <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="flex justify-between mt-4">
        <div class="w-24 text-sm px-3 bg-teal-300 text-teal-800 rounded-full flex items-center justify-center">
            <p class="text-left text-gray-800">{{$group_content->perfecture}}</p>
        </div>
        <h3>{{ $group_content->user->name }}作成</h3>
        </div>
        
        <h3>
            {{ $group_content->date }}
        </h3>
      
        <h3 class="mt-4">
            {{ $group_content->tweet }}
        </h3>
        
        <img src="{{ asset('storage/image/'.$group_content->image)}}" 
        class="mt-8 mb-8 mx-auto" style="height:300px; object-fit: cover; display:block" />
        </a>
    @endforeach

    
    </a>
</div>