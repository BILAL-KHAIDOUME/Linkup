@extends('layout')

@section('content')
    <aside class="hidden lg:block"></aside>

    <main class="space-y-2 min-w-0 font-sans text-ink">

        <!-- Cover + identity card -->
        <div class="bg-white border border-[rgba(0,0,0,0.08)] rounded-lg overflow-hidden shadow-sm">
            <div class="relative h-36 bg-gradient-to-r from-[#0a66c2] to-[#57a5e0]">
                @if ($profileUser->cover_url ?? false)
                    <img src="{{ $profileUser->cover_url }}" alt="" class="w-full h-full object-cover">
                @endif
            </div>

            <div class="px-4 sm:px-6 pb-5">
                <div class="flex items-end justify-between">
                    <!-- Avatar -->
                    <div
                        class="w-28 h-28 -mt-12 rounded-full bg-[#0a66c2] border-4 border-white text-white font-semibold text-3xl flex items-center justify-center shadow overflow-hidden relative z-10">
                        @if ($profileUser->image_url ?? false)
                            <img src="{{ $profileUser->image_url }}" alt="" class="w-full h-full object-cover">
                        @else
                            {{ Str::upper(Str::substr($profileUser->name, 0, 1)) }}{{ Str::upper(Str::substr(Str::afterLast($profileUser->name, ' '), 0, 1)) }}
                        @endif
                    </div>

                    <!-- No "Edit profile" here: this is a public/read-only view -->
                    @if ($profileUser->id === auth()->id())
                        <a href="{{ route('profileEdit') }}"
                            class="mb-1 flex items-center gap-1.5 text-sm font-semibold text-[#0a66c2] border border-[#0a66c2] rounded-full px-4 py-1.5 hover:bg-[rgba(10,102,194,0.08)] transition">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                            </svg>
                            Edit profile
                        </a>
                    @endif
                </div>

                <div class="mt-3">
                    <h1 class="text-xl font-semibold leading-tight">{{ $profileUser->name }}</h1>
                    <p class="text-sm text-[rgba(0,0,0,0.9)] mt-1">
                        {{ $profileUser->headline ?? 'No headline yet' }}
                    </p>
                    @if ($profileUser->company ?? false)
                        <p class="text-sm text-[rgba(0,0,0,0.6)] mt-0.5">{{ $profileUser->company }}</p>
                    @endif
                    <p class="text-xs text-[rgba(0,0,0,0.6)] mt-1">
                        {{ $profileUser->location ?? 'Location not set' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- About -->
        <div class="bg-white border border-[rgba(0,0,0,0.08)] rounded-lg p-4 sm:p-6 shadow-sm">
            <h2 class="text-base font-semibold mb-2">About</h2>
            <p class="text-sm leading-relaxed whitespace-pre-line text-[rgba(0,0,0,0.9)]">
                {{ $profileUser->bio ?? 'This user hasn\'t written a bio yet.' }}
            </p>
        </div>

        <!-- Posts history (exclusive to this user) -->
        <div class="bg-white border border-[rgba(0,0,0,0.08)] rounded-lg p-4 sm:p-6 shadow-sm">
            <h2 class="text-base font-semibold mb-3">Posts</h2>

            @forelse ($posts as $post)
                <div class="py-3 {{ !$loop->last ? 'border-b border-[rgba(0,0,0,0.08)]' : '' }}">
                    <p class="text-xs text-[rgba(0,0,0,0.6)] mb-1">{{ $post->created_at->diffForHumans() }}</p>
                    <p class="text-sm whitespace-pre-line">{{ $post->content }}</p>
                </div>
            @empty
                <p class="text-sm text-[rgba(0,0,0,0.6)]">No posts yet.</p>
            @endforelse
        </div>
    </main>

    <aside class="hidden lg:block"></aside>
@endsection