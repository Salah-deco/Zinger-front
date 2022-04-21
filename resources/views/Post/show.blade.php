
<x-app-layout>
<main class="container mx-auto max-w-custom flex">
            <div class="w-70 mr-5" >
            
            <div class="mt-8">
           
            <div class="border-r border-gray-100 px-5 py-8" style="float: left; ">
            <div class="w-175" style=" width: 100%">
                        <nav class="flex items-center justify-between text-xs" style=" width: 100%">
                        
                    <div class="border-r border-gray-100 px-5 py-8" style="background-color: #ffffff; width: 100%;border-style: inset;border-width: 3px; border-color: #4F9EF2;border-radius: 20px;">
                        <div class="mx-4">
                        <form action="{{ route('post.index') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <h4 class="text-xl font-semibold" style="text-align:centre">
                                <a href="#" class="hover:underline">Add A Post :</a>
                            </h4>
                            <div>
                            <x-input id="name" class="block mt-1 w-full" type="text" name="body" :value="old('body')" />
                            </div>
                            
                            <div>
                                <br>
                                <input type="file" name="file" id="file" style="width:100%">
                                <div class="mt-8">
                                <x-button class="ml-4">
                                    {{ __('Save') }}
                                </x-button>
                            </div> 
                            <div>
                        </form>
                        </div>
                    </div>
                </div>
            </nav>
            </div>
            </div>
        
            </div>
            </div>
            <div class="w-175">
                <nav class="flex items-center justify-between text-xs">
                    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                        <li><a href="#" class="border-b-4 pb-3 border-blue">All Posts(+99)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Images(89)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Videos(56)</a></li>
                    </ul>
                    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                        <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Documents(18)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Links(9)</a></li>              
                    </ul>
                </nav>

                <div class="mt-8">

 <div class="posts-container space-y-6 my-6">
        <div class="post-container bg-white rounded-xl flex hover:shadow-card transition duration-150 easy-in cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">{{count($collection['reactions'])}}</div>
                    <div class="text-gray-500">Likes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-gray-200 border-gray-200 hover:border-gray-400 font-bold text-xxs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">Like</button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="{{ asset('uploads/'.$user['photos']) }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">{{ $user['first_name']}} {{ $user['last_name']}}</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                    {{ $collection['body'] }}
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-gray-400 text-xs font-semibold space-x-2">
                            <div>10 hours ago </div>
                            <div>&bull;</div>
                            <div class="text-gray-900">{{count($collection['comments'])}} commentaires</div>
                        </div>
                        <div class="flex items-center spcae-x-2 py-2 px-4">
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 easy-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                 
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- les commentaire  -->           


      @foreach($comments as $a)
       <div class="posts-container space-y-6 my-6"style=" margin-left: 100px;">
                        <div class="post-container bg-white rounded-xl flex hover:shadow-card transition duration-150 easy-in cursor-pointer">
                            <div class="border-r border-gray-100 px-5 py-8">
                                <div class="mt-8">
                                <h4 class="text-xl font-semibold">
                                        <a href="#" class="w-20 bg-gray-200 border-gray-200 hover:border-gray-400 font-bold text-xxs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">Report</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="flex px-2 py-6">
                                <a href="#" class="flex-none">
                                    <img src="{{ asset('uploads/'.$a['photos']) }}" alt="avatar" class="w-14 h-14 rounded-xl">
                                </a>
                                <div class="mx-4">
                                    <h4 class="text-xl font-semibold">
                                        <a href="#" class="hover:underline">  {{ $a['first_name'] }} {{ $a['last_name'] }}</a>
                                    </h4>
                                    <div class="text-gray-600 mt-3 line-clamp-3">
                                    date de creation : {{ $a['createdAt'] }}
                                    </div>
                                    <div class="text-gray-600 mt-3 line-clamp-3">
                                    {{ $a['body'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


    
        @endforeach
</div>


    </div>
            </div>
        </main>
</x-app-layout>
