<x-app-layout>
    <div class="posts-container space-y-6 my-6">
        <div class="post-container bg-white rounded-xl flex hover:shadow-card transition duration-150 easy-in cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">Likes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-gray-200 border-gray-200 hover:border-gray-400 font-bold text-xxs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">Like</button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-23.png" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam sed ratione, aperiam id ullam laudantium officia quod distinctio sapiente numquam veniam asperiores nobis maiores beatae nemo nihil, soluta harum accusamus, nulla quas ut dignissimos? Sit voluptatum veniam fugit quis quasi saepe qui, molestiae beatae sunt animi tempora cumque dolore nemo quam dignissimos esse exercitationem, dicta omnis atque voluptatem hic corporis tenetur porro. Harum alias aliquam magnam nam suscipit quia sit at dolorem fugit praesentium, distinctio ullam maiores iure similique vel eos eaque, illum tenetur consectetur repellendus animi debitis? Minima velit doloribus, distinctio commodi assumenda odit optio quas atque tempora et.
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-gray-400 text-xs font-semibold space-x-2">
                            <div>10 hours ago </div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>
                        <div class="flex items-center spcae-x-2 py-2 px-4">
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 easy-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            <ul class="absolute w-44 text-left font-semibol bg-white shadow-dialog rounded-xl py-3 ml-8">
                                <li>
                                    <a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">
                                        Mark as Spam
                                    </a>
                                </li>    
                                <li>
                                    <a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">
                                        Delete Post
                                    </a>
                                </li>  
                            </ul>        
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>