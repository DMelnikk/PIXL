<div class="mt-10 border border-pixl-light/10 p-4">
    <h2 class="text-sm text-pixl-light/60">Artists to follow</h2>
    <ol class="flex flex-col gap-4 mt-4">
        @foreach($profiles as $profile)
            <li class="flex items-center justify-between gap-4">
                <div class="flex gap-2.5 items-center">
                    <img src="{{$profile->avatar_url}}"
                         alt="Avatar of {{$profile->display_name}}"
                         class="size-8 object-cover">
                    <p class="text-sm truncate">{{$profile->handle}}</p>

                </div>
                <button class="bg-pixl-dark/50 hover:bg-pixl-dark/60 border active:bg-pixl-dark/75 border-pixl/50 hover:border-pixl/60 active:border-pixl/75  px-2 py-1 text-pixl text-sm">
                    Follow
                </button>
            </li>
        @endforeach
    </ol>
    <a href="#" class="text-pixl-light/60 text-sm inline-block mt-4">Show more</a>
</div>
