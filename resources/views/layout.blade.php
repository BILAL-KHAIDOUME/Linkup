<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LinkUp — Feed</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          brand: '#0a66c2',
          brandDark: '#004182',
          canvas: '#f4f2ee',
          ink: 'rgba(0,0,0,0.9)',
          slate: 'rgba(0,0,0,0.6)',
          line: 'rgba(0,0,0,0.08)',
        },
        fontFamily: {
          sans: ['Inter', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Helvetica', 'Arial', 'sans-serif'],
        }
      }
    }
  }
</script>
<style>
  body { font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif; }
  ::-webkit-scrollbar { width: 6px; }
  ::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.15); border-radius: 3px; }
</style>
</head>
<body class="bg-canvas text-ink antialiased">

<!-- Top navbar -->
<header class="sticky top-0 z-30 bg-white border-b border-line">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 h-14 flex items-center gap-2">

    <a href="feed.html" class="flex items-center shrink-0">
      <div class="w-9 h-9 rounded bg-brand text-white font-black text-xl flex items-center justify-center leading-none">in</div>
    </a>

    <!-- Search -->
    <div class="flex-1 max-w-xs hidden md:block">
      <div class="relative">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/>
        </svg>
        <input type="text" placeholder="Search"
          class="w-full bg-canvas border-none rounded-md pl-9 pr-4 py-2 text-sm placeholder:text-slate focus:outline-none focus:ring-2 focus:ring-brand/40 transition">
      </div>
    </div>

    <!-- Nav icons -->
    <nav class="flex items-center ml-auto">
      <a href="#" class="flex flex-col items-center gap-0.5 px-4 py-1.5 rounded text-ink border-b-2 border-ink">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        <span class="text-[11px] hidden sm:inline">Home</span>
      </a>
      <a href="#" class="flex flex-col items-center gap-0.5 px-4 py-1.5 rounded text-slate hover:text-ink transition">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m5-2a4 4 0 100-8 4 4 0 000 8zm6 1a3 3 0 100-6 3 3 0 000 6z"/></svg>
        <span class="text-[11px] hidden sm:inline">My Network</span>
      </a>
      <a href="#" class="flex flex-col items-center gap-0.5 px-4 py-1.5 rounded text-slate hover:text-ink transition">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><rect x="3" y="7" width="18" height="13" rx="1"/><path d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2M3 12h18"/></svg>
        <span class="text-[11px] hidden sm:inline">Jobs</span>
      </a>
      <a href="#" class="flex flex-col items-center gap-0.5 px-4 py-1.5 rounded text-slate hover:text-ink transition">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2v10z"/></svg>
        <span class="text-[11px] hidden sm:inline">Messaging</span>
      </a>
      <a href="#" class="flex flex-col items-center gap-0.5 px-4 py-1.5 rounded text-slate hover:text-ink transition relative">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
        <span class="absolute top-0.5 right-3 w-2 h-2 bg-red-600 rounded-full ring-2 ring-white"></span>
        <span class="text-[11px] hidden sm:inline">Notifications</span>
      </a>
      <a href="#" class="flex flex-col items-center gap-0.5 px-3 py-1.5 rounded text-slate hover:text-ink transition">
        <div class="w-7 h-7 rounded-full bg-brand text-white text-[11px] font-semibold flex items-center justify-center">BE</div>
        <span class="text-[11px] hidden sm:inline flex items-center gap-0.5">Me
          <svg class="w-2.5 h-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path d="M6 9l6 6 6-6"/></svg>
        </span>
      </a>
    </nav>
  </div>
</header>

<!-- Body layout -->
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 grid grid-cols-1 lg:grid-cols-[225px_1fr_300px] gap-6">

  @yield('content')

</div>

</body>
</html>