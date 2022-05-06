<x-Admin-layout>



<main class="container mx-auto max-w-custom flex px-8 ">



<div class= "border-r border-gray-100 " style="float: right; flex: 1; width: 100%;">          

                <div class="posts-container space-y-6 my-6">
                        <div class="post-container bg-white rounded-xl flex hover:shadow-card transition duration-150 easy-in cursor-pointer" style>
                            <div class="border-r border-gray-100 px-5 py-8">
                                <div class="text-center">
                                    <div class="font-semibold text-2xl"> {{count($repo)}} </div>
                                    <div class="text-gray-500">Number of reports</div>

                                </div>

                                <div class="mt-8">
                                <h4 class="text-xl font-semibold">
                                        <a href="#" class="w-20 bg-gray-200 border-gray-200 hover:border-gray-400 font-bold text-xxs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">Post</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="flex px-2 py-6">
                                <a href="#" class="flex-none">
                                    <img src="" alt="avatar" class="w-14 h-14 rounded-xl">
                                </a>
                                <div class="mx-4">
                                    <h4 class="text-xl font-semibold">
                                      <a href="#" class="hover:underline">  {{ $user['last_name']}} {{ $user['last_name']}} </a>
                                      </h4>
                                    <div class="text-gray-600 mt-3 line-clamp-3">
                                    Type :{{ $collection['type'] }} <br>
                                    date de creation : {{ $collection['createdAt'] }}
                                    </div>
                                    <div class="text-gray-600 mt-3 line-clamp-3">
                                    @if($collection['type'] =='image')     
                                            <a href="#" class="flex-none">
                                            <img src="" width=400 height=200 alt="avatar" class="w-14 h-14 rounded-xl">
                                            </a>       
                                            @elseif($collection['type'] =='video')  
                                            <video width="400" controls>
                                            <source src="" type="video/mp4">
                                            </video>
                                            @elseif($collection['type'] =='document')  
                                            <embed src="" width=400 height=200 type='application/pdf'/>
                                            @elseif($collection['type'] =='url')  
                                            <a href="{{ $collection['body']}} "> {{ $collection['body']}} </a>
                                            @elseif($collection['type'] =='text')  
                                                    {{ $collection['body']}}
                                            @endif
                                    </div>

                                    <div class="flex items-center justify-between mt-6">
                                        <div class="flex items-center text-gray-400 text-xs font-semibold space-x-2">
                                            <div>10 hours ago </div>
                                            <div>&bull;</div>
                                            <div class="text-gray-900"> {{ count($collection['comments'])}} commentaire </div>
                                        </div>
                                        <div class="flex items-center spcae-x-2 py-2 px-4" id="TestsDiv" >
  
                                                <svg fill="currentColor" width="24" height="6"></svg>
                                            
                                                                                        
                                                

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


       <!-- les commentaire  -->           


       @foreach($repo as $a)
       <div class="posts-container space-y-6 my-6"style=" margin-left: 100px;">
                        <div class="post-container bg-white rounded-xl flex hover:shadow-card transition duration-150 easy-in cursor-pointer">
                            <div class="border-r border-gray-100 px-5 py-8">
                                <div class="mt-8">
                                <h4 class="text-xl font-semibold">
                                        <a href="#" class="w-20 bg-gray-200 border-gray-200 hover:border-gray-400 font-bold text-xxs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">Reported By</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="flex px-2 py-6">
                                <a href="#" class="flex-none">
                                    <img src="" alt="avatar" class="w-14 h-14 rounded-xl">
                                </a>
                                <div class="mx-4">
                                    <h4 class="text-xl font-semibold">
                                        <a href="#" class="hover:underline">  {{ $a['first_name'] }} {{ $a['last_name'] }}</a>
                                    </h4>
                                    <div class="text-gray-600 mt-3 line-clamp-3">
                                    date de repot : {{ $a['reportAt'] }}
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




</x-Admin-layout>