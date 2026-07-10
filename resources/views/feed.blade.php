@extends('layout')

@section('content')
    <!-- Left sidebar: profile -->
    <aside class="hidden lg:block space-y-2 font-sans text-ink">
        <div class="bg-white border border-[rgba(0,0,0,0.08)] rounded-lg overflow-hidden shadow-sm">
            <div class="h-14 bg-gradient-to-r from-[#0a66c2] to-[#57a5e0]"></div>
            <div class="px-4 pb-3 text-center -mt-8">
                <a href="{{ route('profile.show', Auth::user()) }}">
                    <div class="w-16 h-16 mx-auto rounded-full border-2 border-white shadow overflow-hidden">
                        <img src="{{ Auth::user()->image_url }}" alt="{{ Auth::user()->name }}"
                            class="w-full h-full object-cover">
                    </div>
                    <p class="mt-2 font-semibold text-base leading-tight">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-[rgba(0,0,0,0.6)] leading-snug mt-1 px-2">{{ Auth::user()->headline }}</p>
                </a>
            </div>
            <div class="h-px bg-[rgba(0,0,0,0.08)]"></div>
            <div class="px-4 py-3 space-y-2">
                <div class="flex justify-between items-center text-xs">
                    <span class="text-[rgba(0,0,0,0.6)]">Profile viewers</span>
                    <span class="text-[#0a66c2] font-semibold">128</span>
                </div>
                <div class="flex justify-between items-center text-xs">
                    <span class="text-[rgba(0,0,0,0.6)]">Connections</span>
                    <span class="text-[#0a66c2] font-semibold">342</span>
                </div>
            </div>
            <div class="h-px bg-[rgba(0,0,0,0.08)]"></div>
            <div class="px-4 py-3">
                <a href="{{ route('saved-items.index') }}"
                    class="flex items-center gap-2 text-xs font-medium text-[rgba(0,0,0,0.6)] hover:text-[#0a66c2] transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l7-4 7 4z" />
                    </svg>
                    Saved items
                </a>
            </div>
        </div>

        <div class="bg-white border border-[rgba(0,0,0,0.08)] rounded-lg p-4 shadow-sm">
            <ul class="space-y-2.5 text-xs font-medium text-[rgba(0,0,0,0.6)]">
                <li><a href="#" class="hover:text-[#0a66c2] transition">Groups</a></li>
                <li><a href="#" class="hover:text-[#0a66c2] transition">Newsletters</a></li>
                <li><a href="#" class="hover:text-[#0a66c2] transition">Events</a></li>
            </ul>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center gap-2 px-4 py-2 text-xs font-semibold text-[rgba(0,0,0,0.6)] bg-white border border-[rgba(0,0,0,0.6)] rounded-full hover:bg-[rgba(0,0,0,0.08)] focus:outline-none transition-colors duration-150">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Sign out
            </button>
        </form>
    </aside>

    <!-- Center: feed -->
    <main class="space-y-2 min-w-0 font-sans text-ink">

        <!-- Composer / New post form -->
        <div class="bg-white border border-[rgba(0,0,0,0.08)] rounded-lg p-4 shadow-sm">
            <form action="{{ route('createpost') }}" method="POST" class="space-y-3">
                @csrf
                <div class="flex items-center gap-2">
                    <div
                        class="w-12 h-12 rounded-full bg-[#0a66c2] text-white font-semibold text-sm flex items-center justify-center shrink-0">
                        BE
                    </div>
                    <textarea name="content" rows="1" placeholder="Start a post"
                        class="flex-1 resize-none text-sm text-[rgba(0,0,0,0.9)] bg-white border border-[rgba(0,0,0,0.6)] rounded-3xl px-4 py-3 placeholder:font-semibold placeholder:text-[rgba(0,0,0,0.6)] focus:outline-none focus:ring-2 focus:ring-[#0a66c2]/30 focus:border-[#0a66c2] transition"></textarea>
                </div>
                <div class="flex items-center justify-between pt-1">
                    <div class="flex items-center gap-1">
                        <button type="button"
                            class="flex items-center gap-1.5 text-sm font-medium text-[rgba(0,0,0,0.6)] hover:bg-[rgba(0,0,0,0.08)] transition px-2 py-1.5 rounded-md">
                            <svg class="w-6 h-6 text-[#378fe9]" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" />
                                <circle cx="8.5" cy="8.5" r="1.5" />
                                <path d="M21 15l-5-5L5 21" />
                            </svg>
                            <span class="hidden sm:inline">Photo</span>
                        </button>
                        <button type="button"
                            class="flex items-center gap-1.5 text-sm font-medium text-[rgba(0,0,0,0.6)] hover:bg-[rgba(0,0,0,0.08)] transition px-2 py-1.5 rounded-md">
                            <svg class="w-6 h-6 text-[#5f9b41]" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path d="M23 7l-7 5 7 5V7z" />
                                <rect x="1" y="5" width="15" height="14" rx="2" />
                            </svg>
                            <span class="hidden sm:inline">Video</span>
                        </button>
                        <button type="button"
                            class="flex items-center gap-1.5 text-sm font-medium text-[rgba(0,0,0,0.6)] hover:bg-[rgba(0,0,0,0.08)] transition px-2 py-1.5 rounded-md">
                            <svg class="w-6 h-6 text-[#e7a33e]" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z" />
                                <path d="M14 2v6h6" />
                            </svg>
                            <span class="hidden sm:inline">Article</span>
                        </button>
                    </div>
                    <button type="submit"
                        class="text-sm font-semibold text-white bg-[#0a66c2] px-5 py-1.5 rounded-full hover:bg-[#004182] transition disabled:opacity-50">
                        Post
                    </button>
                </div>

                @if ($errors->any())
                    <ul class="px-4 py-2 bg-red-50 border border-red-200 rounded-lg">
                        @foreach ($errors->all() as $error)
                            <li class="my-1 text-xs text-red-600">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>

        </div>

        @foreach ($posts as $post)
            <!-- Post card -->

            <article
                class="bg-white border border-[rgba(0,0,0,0.08)] rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
                @php
                    $originalForRepost = $post->isRepost() ? $post->originalPost : $post;
                    $alreadyReposted = $originalForRepost->hasBeenRepostedBy(auth()->user());
                @endphp
                @if ($post->isRepost())
                    <div
                        class="flex items-center gap-2 text-[rgba(0,0,0,0.5)] text-xs mb-3 pb-2 border-b border-[rgba(0,0,0,0.08)]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        <span>{{ $post->user->name }} a partagé ceci</span>
                    </div>
                @endif

                <!-- Header: author + post menu -->
                <div class="flex items-start justify-between gap-2">
                    <a href="{{ route('profile.show', $post->user) }}"
                        class="flex items-center gap-3 group flex-1 min-w-0">
                        <img src="{{ $post->user->image_url ?? 'https://via.placeholder.com/80' }}" alt=""
                            class="w-12 h-12 rounded-full object-cover shrink-0 bg-[#0a66c2]">
                        <div class="flex-1 min-w-0">
                            <p
                                class="font-semibold text-sm leading-tight truncate group-hover:underline group-hover:text-[#0a66c2] transition">
                                {{ $post->user_id ? $post->user->name : 'user' }}
                            </p>

                            <p class="text-xs text-[rgba(0,0,0,0.6)] leading-tight truncate">
                                {{ $post->user_id ? $post->user->headline : 'no headline' }}
                            </p>
                            <p class="text-xs text-[rgba(0,0,0,0.6)] flex items-center gap-1 mt-0.5">
                                <span>{{ $post->created_at->diffForHumans() }}</span>
                                <span>&middot;</span>
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M2 12h20M12 2a15 15 0 010 20 15 15 0 010-20z" />
                                </svg>
                            </p>
                        </div>

                    </a>
                    @if ($post->user->is_open_to_work == true)
                        <span
                            class="inline-flex items-center gap-1 bg-[#107a3e] text-white text-xs font-semibold px-2.5 py-1 rounded">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 6L9 17l-5-5" />
                            </svg>
                            #OPENTOWORK
                        </span>
                    @endif
                    {{-- <form action="">

                        <button type="button"
                            class="text-xs font-semibold text-[#0a66c2] border border-[#0a66c2] rounded-full px-3 py-1 hover:bg-[rgba(10,102,194,0.08)] transition shrink-0">
                            + Follow
                        </button>

                    </form> --}}

                    @if (auth()->id() !== $post->user->id)
                        @if (auth()->user()->isFollowing($post->user))
                            <form action="{{ route('follow.destroy', $post->user) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-1.5 text-sm font-semibold rounded-full border border-gray-300
                       text-gray-700 bg-white hover:bg-gray-100 transition">
                                    Following
                                </button>
                            </form>
                        @else
                            <form action="{{ route('follow.store', $post->user) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                    class="px-4 py-1.5 text-sm font-semibold rounded-full border border-blue-600
                       text-blue-600 bg-white hover:bg-blue-50 transition">
                                    + Follow
                                </button>
                            </form>
                        @endif
                    @endif

                    @can('update', $post)
                        <div class="relative post-menu shrink-0">
                            <button type="button" onclick="togglePostMenu(this)"
                                class="text-[rgba(0,0,0,0.6)] hover:bg-[rgba(0,0,0,0.08)] rounded-full p-1.5 transition">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <circle cx="12" cy="5" r="1" />
                                    <circle cx="12" cy="12" r="1" />
                                    <circle cx="12" cy="19" r="1" />
                                </svg>
                            </button>

                            <div
                                class="post-menu-dropdown hidden absolute right-0 mt-1 w-36 bg-white border border-[rgba(0,0,0,0.08)] rounded-lg shadow-lg z-10 py-1">
                                <a href="{{ route('posts.edit', $post) }}"
                                    class="block px-4 py-2 text-sm text-[rgba(0,0,0,0.8)] hover:bg-[rgba(0,0,0,0.05)]">
                                    Modifier
                                </a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                    onsubmit="return confirm('Supprimer ce post ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endcan
                </div>

                <!-- Content -->
                <p class="text-sm mt-3 leading-relaxed whitespace-pre-line">
                    {{ $post->content }}
                </p>

                <!-- Like / comment counts -->
                <div class="flex items-center justify-between mt-3 pt-1 text-xs text-[rgba(0,0,0,0.6)]">
                    <span class="flex items-center gap-1">
                        <span class="flex -space-x-1">
                            <span
                                class="w-4 h-4 rounded-full bg-[#0a66c2] flex items-center justify-center text-white text-[9px]">👍</span>
                            <span
                                class="w-4 h-4 rounded-full bg-[#e7a33e] flex items-center justify-center text-white text-[9px]">❤</span>
                        </span>
                        {{ count($post->likes) }}
                    </span>
                    <span>{{ count($post->comments) }} Comments</span>
                    <span>{{ $originalForRepost->shares_count }} partages</span>
                </div>

                <!-- Action buttons -->
                <div
                    class="grid grid-cols-4 mt-1 pt-1 border-t border-[rgba(0,0,0,0.08)] text-sm font-medium text-[rgba(0,0,0,0.6)]">
                    <form action="{{ route('like', $post) }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="w-full">
                            @if ($post->likes->contains('user_id', auth()->id()))
                                <div
                                    class="flex items-center justify-center bg-blue-200 gap-1.5 py-2 rounded-md hover:bg-[rgba(11,32,224,0.08)] transition">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path
                                            d="M14 9V5a3 3 0 00-3-3l-4 9v11h11.28a2 2 0 002-1.7l1.38-9a2 2 0 00-2-2.3H14z" />
                                    </svg>
                                    <span class="hidden sm:inline">Like</span>
                                </div>
                            @else
                                <div
                                    class="flex items-center justify-center gap-1.5 py-2 rounded-md hover:bg-[rgba(0,0,0,0.08)] transition">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path
                                            d="M14 9V5a3 3 0 00-3-3l-4 9v11h11.28a2 2 0 002-1.7l1.38-9a2 2 0 00-2-2.3H14z" />
                                    </svg>
                                    <span class="hidden sm:inline">Like</span>
                                </div>
                            @endif
                        </button>
                    </form>

                    <button type="button" onclick="toggleComments({{ $post->id }})"
                        class="flex items-center justify-center gap-1.5 py-2 rounded-md hover:bg-[rgba(0,0,0,0.08)] transition">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path
                                d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z" />
                        </svg>
                        <span class="hidden sm:inline">Comment</span>
                    </button>

                    @php
                        $originalForRepost = $post->isRepost() ? $post->originalPost : $post;
                        $alreadyReposted = $originalForRepost->hasBeenRepostedBy(auth()->user());
                    @endphp

                    @if (auth()->id() === $originalForRepost->user_id)
                        {{-- On ne peut pas reposter son propre post : bouton désactivé visuellement --}}
                        <div
                            class="flex items-center justify-center gap-1.5 py-2 text-[rgba(0,0,0,0.3)] cursor-not-allowed">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path d="M17 1l4 4-4 4M3 11V9a4 4 0 014-4h14M7 23l-4-4 4-4M21 13v2a4 4 0 01-4 4H3" />
                            </svg>
                            <span class="hidden sm:inline">Repost</span>
                        </div>
                    @elseif ($alreadyReposted)
                        @php
                            $myRepost = $post->isRepost()
                                ? $post
                                : $originalForRepost
                                    ->reposts()
                                    ->where('user_id', auth()->id())
                                    ->first();
                        @endphp
                        <form action="{{ route('repost.destroy', $myRepost) }}" method="POST" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full flex items-center justify-center gap-1.5 py-2 rounded-md text-green-600 hover:bg-[rgba(0,0,0,0.08)] transition">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M17 1l4 4-4 4M3 11V9a4 4 0 014-4h14M7 23l-4-4 4-4M21 13v2a4 4 0 01-4 4H3" />
                                </svg>
                                <span class="hidden sm:inline">Reposted</span>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('repost.store', $originalForRepost) }}" method="POST" class="w-full">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center justify-center gap-1.5 py-2 rounded-md hover:bg-[rgba(0,0,0,0.08)] transition">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M17 1l4 4-4 4M3 11V9a4 4 0 014-4h14M7 23l-4-4 4-4M21 13v2a4 4 0 01-4 4H3" />
                                </svg>
                                <span class="hidden sm:inline">Repost</span>
                            </button>
                        </form>
                    @endif

                    @if (auth()->user()->hasSaved($post))
                        <form action="{{ route('saved-posts.destroy', $post) }}" method="POST" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full flex items-center justify-center gap-1.5 py-2 rounded-md text-[#0a66c2] hover:bg-[rgba(0,0,0,0.08)] transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-4-7 4V5z" />
                                </svg>
                                <span class="hidden sm:inline">Saved</span>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('saved-posts.store', $post) }}" method="POST" class="w-full">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center justify-center gap-1.5 py-2 rounded-md hover:bg-[rgba(0,0,0,0.08)] transition">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-4-7 4V5z" />
                                </svg>
                                <span class="hidden sm:inline">Save</span>
                            </button>
                        </form>
                    @endif
                </div>

                <!-- Comments list (now a proper sibling, full width) -->
                <div class="mt-3 space-y-2">
                    @foreach ($post->comments as $comment)
                        <div class="flex items-start gap-2">
                            <img src="{{ $comment->user->image_url ?? 'https://via.placeholder.com/80' }}" alt=""
                                class="w-8 h-8 rounded-full object-cover shrink-0 bg-[#0a66c2]">
                            <div
                                class="bg-[rgba(0,0,0,0.05)] rounded-2xl px-3 py-2 text-sm flex flex-1 justify-between gap-2">
                                <div class="min-w-0">
                                    <p class="font-bold text-black text-xs">{{ $comment->user->name }}</p>
                                    <p class="break-words">{{ $comment->content }}</p>
                                </div>

                                @can('delete', $comment)
                                    <div class="relative comment-menu shrink-0">
                                        <button type="button" onclick="toggleCommentMenu(this)"
                                            class="text-[rgba(0,0,0,0.6)] hover:bg-[rgba(0,0,0,0.08)] rounded-full p-1.5 transition">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <circle cx="12" cy="5" r="1" />
                                                <circle cx="12" cy="12" r="1" />
                                                <circle cx="12" cy="19" r="1" />
                                            </svg>
                                        </button>

                                        <div
                                            class="comment-menu-dropdown hidden absolute right-0 mt-1 w-36 bg-white border border-[rgba(0,0,0,0.08)] rounded-lg shadow-lg z-10 py-1">
                                            <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                                                onsubmit="return confirm('Supprimer ce commentaire ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Comment composer -->
                <div id="comment-box-{{ $post->id }}" class="hidden mt-3 pt-3 border-t border-[rgba(0,0,0,0.08)]">
                    <form action="{{ route('AddComment', $post) }}" method="POST" class="flex items-start gap-2">
                        @csrf
                        <img src="{{ auth()->user()->image_url ?? 'https://via.placeholder.com/80' }}" alt=""
                            class="w-8 h-8 rounded-full object-cover shrink-0 bg-[#0a66c2]">
                        <div class="flex-1">
                            <textarea name="content" rows="1" placeholder="Add a comment..."
                                class="w-full text-sm border border-[rgba(0,0,0,0.15)] rounded-full px-3 py-1.5 resize-none focus:outline-none focus:ring-1 focus:ring-[#0a66c2]"
                                oninput="this.style.height='auto'; this.style.height=this.scrollHeight+'px';"></textarea>
                        </div>
                        <button type="submit"
                            class="text-sm font-semibold text-[#0a66c2] hover:bg-[rgba(10,102,194,0.1)] px-3 py-1.5 rounded-full transition">
                            Post
                        </button>
                    </form>
                </div>

            </article>
        @endforeach
    </main>


    <!-- Right sidebar: suggestions -->
    <aside class="hidden lg:block space-y-2 font-sans text-ink">
        <div class="bg-white border border-[rgba(0,0,0,0.08)] rounded-lg p-4 shadow-sm">
            <p class="text-base font-semibold mb-3">People you may know</p>
            <ul class="space-y-3">
                <li class="flex items-start gap-2">
                    <div class="w-12 h-12 rounded-full bg-[rgba(0,0,0,0.08)] shrink-0"></div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold truncate leading-tight">Youssef Amine</p>
                        <p class="text-xs text-[rgba(0,0,0,0.6)] truncate leading-tight mt-0.5">Laravel Developer</p>
                        <button
                            class="mt-2 text-xs font-semibold text-[rgba(0,0,0,0.6)] border border-[rgba(0,0,0,0.6)] rounded-full px-3 py-1 hover:bg-[rgba(10,102,194,0.08)] hover:text-[#0a66c2] hover:border-[#0a66c2] transition flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M12 4v16m8-8H4" />
                            </svg>
                            Connect
                        </button>
                    </div>
                </li>
                <li class="flex items-start gap-2">
                    <div class="w-12 h-12 rounded-full bg-[rgba(0,0,0,0.08)] shrink-0"></div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold truncate leading-tight">Nadia Rahmouni</p>
                        <p class="text-xs text-[rgba(0,0,0,0.6)] truncate leading-tight mt-0.5">UI/UX Designer</p>
                        <button
                            class="mt-2 text-xs font-semibold text-[rgba(0,0,0,0.6)] border border-[rgba(0,0,0,0.6)] rounded-full px-3 py-1 hover:bg-[rgba(10,102,194,0.08)] hover:text-[#0a66c2] hover:border-[#0a66c2] transition flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M12 4v16m8-8H4" />
                            </svg>
                            Connect
                        </button>
                    </div>
                </li>
                <li class="flex items-start gap-2">
                    <div class="w-12 h-12 rounded-full bg-[rgba(0,0,0,0.08)] shrink-0"></div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold truncate leading-tight">Omar Ziani</p>
                        <p class="text-xs text-[rgba(0,0,0,0.6)] truncate leading-tight mt-0.5">Bootcamp Mentor, ENAA</p>
                        <button
                            class="mt-2 text-xs font-semibold text-[rgba(0,0,0,0.6)] border border-[rgba(0,0,0,0.6)] rounded-full px-3 py-1 hover:bg-[rgba(10,102,194,0.08)] hover:text-[#0a66c2] hover:border-[#0a66c2] transition flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M12 4v16m8-8H4" />
                            </svg>
                            Connect
                        </button>
                    </div>
                </li>
            </ul>
            <a href="#"
                class="block text-center text-xs font-semibold text-[rgba(0,0,0,0.6)] mt-3 pt-3 border-t border-[rgba(0,0,0,0.08)] hover:bg-[rgba(0,0,0,0.08)] -mx-4 -mb-4 px-4 pb-4 rounded-b-lg transition">Show
                more</a>
        </div>

        <div class="bg-white border border-[rgba(0,0,0,0.08)] rounded-lg p-4 shadow-sm">
            <p class="text-base font-semibold mb-1">LinkedIn News</p>
            <p class="text-xs text-[rgba(0,0,0,0.6)] mb-3">Top stories</p>
            <ul class="space-y-3 text-sm">
                <li class="flex items-start gap-2">
                    <span class="w-1 h-1 rounded-full bg-[rgba(0,0,0,0.6)] mt-1.5 shrink-0"></span>
                    <a href="#" class="flex-1 hover:text-[#0a66c2] transition">
                        <span class="font-semibold block leading-snug">#PHP trending in dev community</span>
                        <span class="text-xs text-[rgba(0,0,0,0.6)]">3,204 readers</span>
                    </a>
                </li>
                <li class="flex items-start gap-2">
                    <span class="w-1 h-1 rounded-full bg-[rgba(0,0,0,0.6)] mt-1.5 shrink-0"></span>
                    <a href="#" class="flex-1 hover:text-[#0a66c2] transition">
                        <span class="font-semibold block leading-snug">#LaravelTips gaining traction</span>
                        <span class="text-xs text-[rgba(0,0,0,0.6)]">1,847 readers</span>
                    </a>
                </li>
                <li class="flex items-start gap-2">
                    <span class="w-1 h-1 rounded-full bg-[rgba(0,0,0,0.6)] mt-1.5 shrink-0"></span>
                    <a href="#" class="flex-1 hover:text-[#0a66c2] transition">
                        <span class="font-semibold block leading-snug">#OpenToWork tag on the rise</span>
                        <span class="text-xs text-[rgba(0,0,0,0.6)]">982 readers</span>
                    </a>
                </li>
            </ul>
            <a href="#"
                class="block text-xs font-semibold text-[rgba(0,0,0,0.6)] mt-3 pt-3 border-t border-[rgba(0,0,0,0.08)] hover:bg-[rgba(0,0,0,0.08)] -mx-4 -mb-4 px-4 pb-4 rounded-b-lg transition">Show
                more</a>
        </div>
    </aside>



    <script>
        function togglePostMenu(button) {
            const dropdown = button.nextElementSibling;
            const isOpen = !dropdown.classList.contains('hidden');

            document.querySelectorAll('.post-menu-dropdown').forEach(el => el.classList.add('hidden'));

            if (!isOpen) {
                dropdown.classList.remove('hidden');
            }
        }

        document.addEventListener('click', function(event) {
            if (!event.target.closest('.post-menu')) {
                document.querySelectorAll('.post-menu-dropdown').forEach(el => el.classList.add('hidden'));
            }
        });

        function toggleComments(postId) {
            const box = document.getElementById(`comment-box-${postId}`);
            box.classList.toggle('hidden');
        }

        function toggleCommentMenu(button) {
            const dropdown = button.nextElementSibling;
            const isOpen = !dropdown.classList.contains('hidden');

            document.querySelectorAll('.comment-menu-dropdown').forEach(el => el.classList.add('hidden'));

            if (!isOpen) {
                dropdown.classList.remove('hidden');
            }
        }

        document.addEventListener('click', function(event) {
            if (!event.target.closest('.comment-menu')) {
                document.querySelectorAll('.comment-menu-dropdown').forEach(el => el.classList.add('hidden'));
            }
        });
    </script>
@endsection

