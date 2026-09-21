<header>
    <img src="{{$profile->cover_url}}" alt="Cover">
    <div class="flex flex-wrap items-end gap-4 -mt-10 md:-mt-16 justify-between">
        <div class="flex gap-4 items-end">
            <img src="{{$profile->avatar_url}}" alt="Avatar for {{$profile->display_name}}" class="md:size-32 size-20 object-cover">
            <div class="flex flex-col md:gap-1">
                <p class="md:text-xl text-lg">{{$profile->display_name}}</p>
                <p class="text-pixl-light/60 text-sm">{{ "@{$profile->handle}"}}</p>
            </div>
        </div>
        <a href="#" class="bg-pixl-dark/50 hover:bg-pixl-dark/60 border active:bg-pixl-dark/75 border-pixl/50 hover:border-pixl/60 active:border-pixl/75  px-2 py-1 text-pixl text-sm">
            Edit Profile
        </a>

    </div>
    <div class="mt-8 [&_a]:text-pixl [&_a]:hover:underline">
        <p>{{$profile->bio}}</p>
    </div>
    <dl class="mt-6 flex gap-6">
        <div class="flex gap-1.5">
            <dd>{{$profile->followings_count}}</dd>
            <dt class="text-pixl-light/60">Following</dt>
        </div>
        <div class="flex gap-1.5">
            <dd>{{$profile->followers_count}}</dd>
            <dt class="text-pixl-light/60">Followers</dt>
        </div>
    </dl>

</header>

<!-- Navigation/tabs -->
<nav class="overflow-x-auto sm:overflow-x-visible scrollbar:none mt-6">
    <ul class="flex min-w-max justify-end gap-8 text-sm">
        <li><a href="{{route('profile.show',$profile)}}">Posts</a></li>
        <li><a class="text-pixl-light/60 hover:text-pixl-light/80" href="{{route('profile.replies',$profile)}}">Replies</a></li>
        <li><a class="text-pixl-light/60 hover:text-pixl-light/80" href="#">Highlights</a></li> <li><a class="text-pixl-light/60 hover:text-pixl-light/80" href="#">Inspiration Streams</a></li>
    </ul>
</nav>
