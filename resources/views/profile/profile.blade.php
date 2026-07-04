@extends('layout')

@section('content')
    <!-- Left column intentionally empty on profile page (keeps 3-col grid consistent) -->
    <aside class="hidden lg:block"></aside>

    <!-- Center: profile -->
    <main class="space-y-2 min-w-0 font-sans text-ink">

        <!-- Cover + identity card -->
        <div class="bg-white border border-[rgba(0,0,0,0.08)] rounded-lg overflow-hidden shadow-sm">
            <!-- Cover banner -->
            <div class="relative h-36 bg-gradient-to-r from-[#0a66c2] to-[#57a5e0]">
                @if (Auth::user()->cover_url ?? false)
                    <img src="{{ Auth::user()->cover_url }}" alt="" class="w-full h-full object-cover">
                @endif
            </div>

            <div class="px-4 sm:px-6 pb-5">
                <div class="flex items-end justify-between -mt-12">
                    <!-- Avatar -->
                    <div
                        class="w-28 h-28 rounded-full bg-[#0a66c2] border-4 border-white text-white font-semibold text-3xl flex items-center justify-center shadow overflow-hidden">
                        @if (Auth::user()->image_url ?? false)
                            <img src="{{ Auth::user()->image_url }}" alt="" class="w-full h-full object-cover">
                        @else
                            {{ Str::upper(Str::substr(Auth::user()->name, 0, 1)) }}{{ Str::upper(Str::substr(Str::afterLast(Auth::user()->name, ' '), 0, 1)) }}
                        @endif
                    </div>

                    <!-- Edit profile button -->
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
                </div>

                <div class="mt-3">
                    <h1 class="text-xl font-semibold leading-tight">{{ Auth::user()->name }}</h1>
                    <p class="text-sm text-[rgba(0,0,0,0.9)] mt-1">{{ Auth::user()->headline ?? 'No headline yet' }}</p>
                    <p class="text-xs text-[rgba(0,0,0,0.6)] mt-1">
                        {{ Auth::user()->location ?? 'Location not set' }}
                        <span class="mx-1">&middot;</span>
                        <a href="#" class="text-[#0a66c2] font-semibold hover:underline">342 connections</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- About -->
        <div class="bg-white border border-[rgba(0,0,0,0.08)] rounded-lg p-4 sm:p-6 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <h2 class="text-base font-semibold">About</h2>
                <a href="#"
                    class="text-[rgba(0,0,0,0.6)] hover:bg-[rgba(0,0,0,0.08)] rounded-full p-1.5 transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                    </svg>
                </a>
            </div>
            <p class="text-sm leading-relaxed whitespace-pre-line text-[rgba(0,0,0,0.9)]">
                {{ Auth::user()->bio ?? 'This user hasn\'t written a bio yet.' }}
            </p>
        </div>

        <!-- Experience -->
        <div class="bg-white border border-[rgba(0,0,0,0.08)] rounded-lg p-4 sm:p-6 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-base font-semibold">Experience</h2>
                <a href="#"
                    class="text-[rgba(0,0,0,0.6)] hover:bg-[rgba(0,0,0,0.08)] rounded-full p-1.5 transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                </a>
            </div>

            @forelse (Auth::user()->experiences ?? [] as $experience)
                <div class="flex items-start gap-3 py-3 {{ !$loop->last ? 'border-b border-[rgba(0,0,0,0.08)]' : '' }}">
                    <div class="w-10 h-10 rounded bg-[rgba(0,0,0,0.08)] shrink-0"></div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold leading-tight">{{ $experience->title }}</p>
                        <p class="text-xs text-[rgba(0,0,0,0.6)] leading-tight mt-0.5">{{ $experience->company }}</p>
                        <p class="text-xs text-[rgba(0,0,0,0.6)] leading-tight mt-0.5">
                            {{ $experience->start_date }} &mdash; {{ $experience->end_date ?? 'Present' }}
                        </p>
                    </div>
                </div>
            @empty
                <p class="text-sm text-[rgba(0,0,0,0.6)]">No experience added yet.</p>
            @endforelse
        </div>

        <!-- Skills -->
        <div class="bg-white border border-[rgba(0,0,0,0.08)] rounded-lg p-4 sm:p-6 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-base font-semibold">Skills</h2>
                <a href="#"
                    class="text-[rgba(0,0,0,0.6)] hover:bg-[rgba(0,0,0,0.08)] rounded-full p-1.5 transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                </a>
            </div>

            @forelse (Auth::user()->skills ?? [] as $skill)
                <div class="py-2.5 {{ !$loop->last ? 'border-b border-[rgba(0,0,0,0.08)]' : '' }}">
                    <p class="text-sm font-medium">{{ $skill->name }}</p>
                </div>
            @empty
                <p class="text-sm text-[rgba(0,0,0,0.6)]">No skills added yet.</p>
            @endforelse
        </div>

        <!-- User's posts -->
        @if (isset($posts) && $posts->count())
            <div class="bg-white border border-[rgba(0,0,0,0.08)] rounded-lg p-4 sm:p-6 shadow-sm">
                <h2 class="text-base font-semibold mb-3">Posts</h2>
                @foreach ($posts as $post)
                    <div class="py-3 {{ !$loop->last ? 'border-b border-[rgba(0,0,0,0.08)]' : '' }}">
                        <p class="text-xs text-[rgba(0,0,0,0.6)] mb-1">{{ $post->created_at->diffForHumans() }}</p>
                        <p class="text-sm whitespace-pre-line">{{ $post->content }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </main>

    <!-- Right column intentionally empty on profile page (keeps 3-col grid consistent) -->
    <aside class="hidden lg:block"></aside>
@endsection