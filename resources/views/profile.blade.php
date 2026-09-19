<x-layout title="PIXL - Profile">
<!-- Navigation -->
@include('partials.navigation',['showPostButton' => true])
<!-- Content -->
<main class="flex flex-col grow gap-4 overflow-y-auto py-4 px-4 -mx-4">
    <!-- Profile Header -->
    <nav class="overflow-x-auto sm:overflow-x-visible scrollbar:none">
        <ul class="flex min-w-max justify-end gap-8 text-sm">
            <li><a href="#">For you</a></li>
            <li><a class="text-pixl-light/60 hover:text-pixl-light/80" href="#">Idea streams</a></li>
            <li><a class="text-pixl-light/60 hover:text-pixl-light/80" href="#">Following</a></li>
        </ul>
    </nav>

    <a href="/feed" class="flex items-baseline gap-1.5 group">
        <svg
            class="size-3"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 12 12"
            fill="none"
        >
            <path
                fill="currentColor"
                d="M6.857 0v1.714H5.143V0zM5.143 1.715v1.714H3.429V1.715zM3.427 3.429v1.714H1.713V3.429zM1.715 5.143v1.714H0V5.143zm1.713 1.715v1.714H1.714V6.858zm1.714 1.714v1.714H3.428V8.572zm1.715 1.713V12H5.143v-1.714z"
            ></path>
            <path
                fill="currentColor"
                class="opacity-60 group-hover:opacity-100"
                d="M12 0v1.714h-1.714V0zm-1.714 1.714v1.714H8.572V1.714zM8.57 3.428v1.714H6.856V3.428zM6.857 5.143v1.714H5.143V5.143zM8.57 6.858v1.714H6.856V6.858zm1.715 1.714v1.714H8.571V8.572zM12 10.286V12h-1.714v-1.714z"
            ></path>
        </svg>
        <span class="group-hover:underline">back</span>
    </a>


    <header>
        <img src="/images/cover.png" alt="Cover">
        <div class="flex flex-wrap items-end gap-4 -mt-10 md:-mt-16 justify-between">
            <div class="flex gap-4 items-end">
                <img src="/images/adrian.png" alt="Avatar for Adrian" class="md:size-32 size-20 object-cover">
                <div class="flex flex-col md:gap-1">
                    <p class="md:text-xl text-lg">_adrian</p>
                    <p class="text-pixl-light/60 text-sm">@tudssss</p>
                </div>
            </div>
            <a href="#" class="bg-pixl-dark/50 hover:bg-pixl-dark/60 border active:bg-pixl-dark/75 border-pixl/50 hover:border-pixl/60 active:border-pixl/75  px-2 py-1 text-pixl text-sm">
                Edit Profile
            </a>

        </div>
        <div class="mt-8 [&_a]:text-pixl [&_a]:hover:underline">
            <p>I design <a href="#">@Laracasts </a>so hit me up whenever =]</p>
        </div>
        <dl class="mt-6 flex gap-6">
            <div class="flex gap-1.5">
                <dd>100</dd>
                <dt class="text-pixl-light/60">Following</dt>
            </div>
            <div class="flex gap-1.5">
                <dd>2190</dd>
                <dt class="text-pixl-light/60">Followers</dt>
            </div>
        </dl>
        <!-- Navigation/tabs -->
        <nav class="overflow-x-auto sm:overflow-x-visible scrollbar:none mt-6">
            <ul class="flex min-w-max justify-end gap-8 text-sm">
                <li><a href="#">Posts</a></li>
                <li><a class="text-pixl-light/60 hover:text-pixl-light/80" href="#">Replies</a></li>
                <li><a class="text-pixl-light/60 hover:text-pixl-light/80" href="#">Highlights</a></li> <li><a class="text-pixl-light/60 hover:text-pixl-light/80" href="#">Inspiration Streams</a></li>
            </ul>
        </nav>
    </header>

    <!-- Feed -->
    <ol class="pt-4 border-pixl-light/10 border-t">
        <!-- Feed item -->
        @foreach($feedItems as $item)
            <!-- Feed item -->
            @include('partials.feed-item',compact('item'))
        @endforeach


    </ol>

    <!-- Footer -->
    <footer class="mt-30 ml-14">
        <p class="text-center">That's all, Folks</p>
        <hr class="border-pixl-light/10 my-4">
        <!-- White noise image -->
        <div class="h-20 bg-[url(/images/white-noise.gif)]"></div>
    </footer>
</main>
<!-- Sidebar -->
@include('partials.aside')
</x-layout>
