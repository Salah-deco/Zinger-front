<div>
{{--    {{ var_dump(session("first_name"))  }}--}}
    <div class="post-container bg-white rounded-xl flex hover:shadow-card transition duration-150 easy-in cursor-pointer">
        <div class="border-r border-gray-100 px-5 py-8">
            <div class="text-center">
                <div class="font-semibold text-2xl @if ($hasLiked) text-blue @endif">{{ $post->numberLikes }}</div>
                <div class="text-gray-500">Likes</div>
            </div>

            <div class="mt-8">
                <input type="hidden" value="{{$hasLiked}}">
                @if ($hasLiked)
                    <button wire:click.prevent="like" class="w-20 bg-blue text-white border border-blue hover:bg-blue-hover font-bold text-xxs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">Liked</button>
                @else
                    <button wire:click.prevent="like" class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 font-bold text-xxs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">Like</button>
                @endif
{{--                <button class="w-20 bg-gray-200 border-gray-200 hover:border-gray-400 font-bold text-xxs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">Like</button>--}}
            </div>
        </div>

        <div class="flex px-2 py-6">
            <a href="/profile" class="flex-none">
{{--                <img src="{{ $post->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">--}}
                @if(session("userId") != $post->userId )
                    <img src="https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-{{rand(0, 25)}}.png" alt="avatar" class="w-14 h-14 rounded-xl">
                @else
                    <img src={{ "/img/users/" . session("image") }} alt="avatar" class="w-14 h-14 rounded-xl">
                @endif
            </a>
            <div class="mx-4">
                <h4 class="text-xl font-semibold">
{{--                    <a href="#" class="hover:underline">A random title can go here</a>--}}
                    <a href="#" class="text-xs post-link hover:underline">{{ $post->firstName . " " . $post->lastName }}</a>
                </h4>

                @if($post->type == "text")
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        {{ $post->body }}
    {{--                    @admin--}}
    {{--                        @if (count($post->reports) > 0)--}}
    {{--                        <div class="text-red mb-2">Spam Reports: {{ count($post->reports) }}</div>--}}
    {{--                        @endif--}}
    {{--                    @endadmin--}}
    {{--                    {{ $post->body }}--}}
                    </div>
                @elseif($post->type == "image")
                    <div class="text-gray-600 mt-3 max-h-12">
                        <img src="{{ asset("/img/".$post->url) }}" alt="image"/>
                    </div>
                @elseif($post->type == "file")
                    <div class="text-gray-600 mt-3">
                        file
                    </div>
                @elseif($post->type == "video")
                    <div class="text-gray-600 mt-3 min-h-4">
                        video
                    </div>
                @endif

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center text-gray-400 text-xs font-semibold space-x-2">
                        <div>{{ $post->createdAt }}</div>
                        <div>&bull;</div>
                        <div wire:ignore class="text-gray-900">{{ $post->numberComments }} comments</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
