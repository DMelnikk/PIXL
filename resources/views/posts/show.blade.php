<x-layout title="PIXL - Feed">
    <!-- Navigation -->
    @include('partials.navigation')
    <!-- Content -->
    <main class="flex flex-col grow gap-4 overflow-y-auto py-4 px-4 -mx-4">
        <nav class="overflow-x-auto sm:overflow-x-visible scrollbar:none">
            <ul class="flex min-w-max justify-end gap-8 text-sm">
                <li><a href="#">For you</a></li>
                <li><a class="text-pixl-light/60 hover:text-pixl-light/80" href="#">Idea streams</a></li>
                <li><a class="text-pixl-light/60 hover:text-pixl-light/80" href="#">Following</a></li>
            </ul>
        </nav>


        <!-- Feed Item -->
        <x-post :post="$post" :show-replies="true"/>


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
