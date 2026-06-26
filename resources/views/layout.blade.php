<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LinkUp — Feed</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          ink: '#14171F',
          paper: '#F6F4EF',
          ember: '#FF6B35',
          slate: '#5B6472',
          line: '#DCD8CE',
        },
        fontFamily: {
          display: ['Fraunces', 'serif'],
          sans: ['Inter', 'sans-serif'],
        }
      }
    }
  }
</script>
<style>
  body { font-family: 'Inter', sans-serif; }
  .font-display { font-family: 'Fraunces', serif; }
  ::-webkit-scrollbar { width: 6px; }
  ::-webkit-scrollbar-thumb { background: #DCD8CE; border-radius: 3px; }
</style>
</head>
<body class="bg-paper text-ink antialiased">

<!-- Top navbar -->
<header class="sticky top-0 z-30 bg-white border-b border-line">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 h-16 flex items-center gap-4">

    <a href="feed.html" class="flex items-center gap-2 shrink-0">
      <svg width="26" height="26" viewBox="0 0 30 30" fill="none">
        <circle cx="6" cy="15" r="3.5" fill="#FF6B35"/>
        <circle cx="24" cy="6" r="3.5" fill="#14171F"/>
        <circle cx="24" cy="24" r="3.5" fill="#14171F"/>
        <line x1="6" y1="15" x2="24" y2="6" stroke="#5B6472" stroke-width="1.5"/>
        <line x1="6" y1="15" x2="24" y2="24" stroke="#5B6472" stroke-width="1.5"/>
      </svg>
      <span class="font-display text-xl font-semibold hidden sm:inline">LinkUp</span>
    </a>

    <!-- Search -->
    <div class="flex-1 max-w-md hidden md:block">
      <div class="relative">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/>
        </svg>
        <input type="text" placeholder="Search people, posts, skills…"
          class="w-full bg-paper border border-line rounded-full pl-9 pr-4 py-2 text-sm placeholder:text-slate/60 focus:outline-none focus:ring-2 focus:ring-ember/30 focus:border-ember transition">
      </div>
    </div>

    <!-- Nav icons -->
    <nav class="flex items-center gap-1 ml-auto">
      <a href="#" class="flex flex-col items-center gap-0.5 px-3 py-2 rounded-lg text-ink border-b-2 border-ember">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        <span class="text-[11px] hidden sm:inline">Home</span>
      </a>
      <a href="#" class="flex flex-col items-center gap-0.5 px-3 py-2 rounded-lg text-slate hover:text-ink transition">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m5-2a4 4 0 100-8 4 4 0 000 8zm6 1a3 3 0 100-6 3 3 0 000 6z"/></svg>
        <span class="text-[11px] hidden sm:inline">Network</span>
      </a>
      <a href="#" class="flex flex-col items-center gap-0.5 px-3 py-2 rounded-lg text-slate hover:text-ink transition relative">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
        <span class="absolute top-1 right-2 w-2 h-2 bg-ember rounded-full"></span>
        <span class="text-[11px] hidden sm:inline">Alerts</span>
      </a>
      <a href="#" class="flex flex-col items-center gap-0.5 px-3 py-2 rounded-lg text-slate hover:text-ink transition">
        <div class="w-6 h-6 rounded-full bg-ink text-paper text-[10px] font-semibold flex items-center justify-center">BE</div>
        <span class="text-[11px] hidden sm:inline">Me</span>
      </a>
    </nav>
  </div>
</header>

<!-- Body layout -->
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 grid grid-cols-1 lg:grid-cols-[260px_1fr_280px] gap-6">

  @yield('content')

</div>

</body>
</html>
