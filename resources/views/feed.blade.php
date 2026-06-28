@extends('layout')

@section('content')
 


<!-- Body layout -->


  <!-- Left sidebar: profile -->
  <aside class="hidden lg:block space-y-4">
    <div class="bg-white border border-line rounded-xl overflow-hidden">
      <div class="h-14 bg-ink"></div>
      <div class="px-4 pb-4 -mt-6">
        <div class="w-14 h-14 rounded-full bg-ember border-4 border-white text-white font-display font-semibold text-lg flex items-center justify-center">BE</div>
        <p class="mt-2 font-semibold text-sm">Bilal El Amrani</p>
        <p class="text-xs text-slate leading-snug mt-0.5">PHP Developer · Building things with vanilla MVC</p>
        <div class="h-px bg-line my-3"></div>
        <div class="flex justify-between text-xs text-slate">
          <span>Profile views</span>
          <span class="text-ember font-medium">128</span>
        </div>
        <div class="flex justify-between text-xs text-slate mt-1.5">
          <span>Connections</span>
          <span class="text-ember font-medium">342</span>
        </div>
      </div>
    </div>

    <div class="bg-white border border-line rounded-xl p-4">
      <p class="text-xs font-medium text-slate uppercase tracking-wide mb-2">Quick links</p>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="hover:text-ember transition">Saved posts</a></li>
        <li><a href="#" class="hover:text-ember transition">Groups</a></li>
        <li><a href="#" class="hover:text-ember transition">Events</a></li>
      </ul>
    </div>
  </aside>

  <!-- Center: feed -->
  <main class="space-y-4 min-w-0">

    <!-- Composer -->
    <div class="bg-white border border-line rounded-xl p-4">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-full bg-ink text-paper font-semibold text-sm flex items-center justify-center shrink-0">BE</div>
        <button class="flex-1 text-left text-sm text-slate bg-paper border border-line rounded-full px-4 py-2.5 hover:bg-line/30 transition">
          Start a post…
        </button>
      </div>
      <div class="flex items-center justify-between mt-3 pt-3 border-t border-line">
        <button class="flex items-center gap-2 text-sm text-slate hover:text-ember transition px-2 py-1.5 rounded-lg">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
          Photo
        </button>
        <button class="flex items-center gap-2 text-sm text-slate hover:text-ember transition px-2 py-1.5 rounded-lg">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M23 7l-7 5 7 5V7z"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>
          Video
        </button>
        <button class="flex items-center gap-2 text-sm text-slate hover:text-ember transition px-2 py-1.5 rounded-lg">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><path d="M14 2v6h6"/></svg>
          Article
        </button>
      </div>
    </div>

    @foreach ($posts as $post )
      
    
    <!-- Feed placeholder notice -->
    <div class="border border-dashed border-line rounded-xl p-6 text-center">
      <article class="bg-white border border-line rounded-xl p-4">
      <div class="flex items-start gap-3">
        <div class="w-10 h-10 rounded-full bg-ember/90 text-white font-semibold text-sm flex items-center justify-center shrink-0">
        <img src="{{ $post->user->image_url ?? 'https://via.placeholder.com/80' }}" alt="">
        </div>
        <div class="flex-1 min-w-0">
          <p class="font-semibold text-sm">{{ $post->user->name }}</p>
          <p class="text-xs text-slate">{{ $post->user->headline }}</p>
        </div>
        <button class="text-slate hover:text-ink">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="5" r="1"/><circle cx="12" cy="12" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
      </div>
      <p class="text-sm mt-3 leading-relaxed">
       {{ $post->content }}
      </p>
      <div class="flex items-center justify-between mt-4 pt-3 border-t border-line text-sm text-slate">
        <button class="flex items-center gap-1.5 hover:text-ember transition">
          <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M14 9V5a3 3 0 00-3-3l-4 9v11h11.28a2 2 0 002-1.7l1.38-9a2 2 0 00-2-2.3H14z"/></svg>
          24
        </button>
        <button class="flex items-center gap-1.5 hover:text-ember transition">
          <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"/></svg>
          6 comments
        </button>
        <button class="flex items-center gap-1.5 hover:text-ember transition">
          <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M4 12v8a2 2 0 002 2h12a2 2 0 002-2v-8M16 6l-4-4-4 4M12 2v13"/></svg>
          Share
        </button>
        <small>{{ $post->created_at->diffForHumans() }}</small>

      </div>
    </article>

    </div>
@endforeach
    <!-- Example post card (static, for reference) -->
    
  </main>

  <!-- Right sidebar: suggestions -->
  <aside class="hidden lg:block space-y-4">
    <div class="bg-white border border-line rounded-xl p-4">
      <p class="text-sm font-semibold mb-3">People you may know</p>
      <ul class="space-y-3">
        <li class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-full bg-line shrink-0"></div>
          <div class="flex-1 min-w-0">
            <p class="text-sm font-medium truncate">Youssef Amine</p>
            <p class="text-xs text-slate truncate">Laravel Developer</p>
          </div>
          <button class="text-xs font-medium text-ember border border-ember/40 rounded-full px-3 py-1 hover:bg-ember/10 transition">Connect</button>
        </li>
        <li class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-full bg-line shrink-0"></div>
          <div class="flex-1 min-w-0">
            <p class="text-sm font-medium truncate">Nadia Rahmouni</p>
            <p class="text-xs text-slate truncate">UI/UX Designer</p>
          </div>
          <button class="text-xs font-medium text-ember border border-ember/40 rounded-full px-3 py-1 hover:bg-ember/10 transition">Connect</button>
        </li>
        <li class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-full bg-line shrink-0"></div>
          <div class="flex-1 min-w-0">
            <p class="text-sm font-medium truncate">Omar Ziani</p>
            <p class="text-xs text-slate truncate">Bootcamp Mentor, ENAA</p>
          </div>
          <button class="text-xs font-medium text-ember border border-ember/40 rounded-full px-3 py-1 hover:bg-ember/10 transition">Connect</button>
        </li>
      </ul>
    </div>

    <div class="bg-white border border-line rounded-xl p-4">
      <p class="text-sm font-semibold mb-3">Trending today</p>
      <ul class="space-y-2.5 text-sm">
        <li><a href="#" class="hover:text-ember transition">#PHP</a> <span class="text-xs text-slate">3,204 posts</span></li>
        <li><a href="#" class="hover:text-ember transition">#LaravelTips</a> <span class="text-xs text-slate">1,847 posts</span></li>
        <li><a href="#" class="hover:text-ember transition">#OpenToWork</a> <span class="text-xs text-slate">982 posts</span></li>
      </ul>
    </div>
  </aside>
  
@endsection








