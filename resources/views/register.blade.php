<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LinkUp — Create your account</title>
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
  .dotted-line {
    background-image: radial-gradient(circle, #DCD8CE 1.5px, transparent 1.5px);
    background-size: 14px 14px;
  }
  .node-glow {
    box-shadow: 0 0 0 4px rgba(255,107,53,0.12);
  }
</style>
</head>
<body class="bg-paper text-ink antialiased">

<div class="min-h-screen grid lg:grid-cols-[1.1fr_1fr]">

  <!-- Left: Brand panel -->
  <div class="hidden lg:flex relative flex-col justify-between bg-ink text-paper px-14 py-12 overflow-hidden">
    <div class="absolute inset-0 dotted-line opacity-[0.06]"></div>

    <div class="relative z-10">
      <a href="feed.html" class="inline-flex items-center gap-2">
        <svg width="30" height="30" viewBox="0 0 30 30" fill="none">
          <circle cx="6" cy="15" r="3.5" fill="#FF6B35"/>
          <circle cx="24" cy="6" r="3.5" fill="#F6F4EF"/>
          <circle cx="24" cy="24" r="3.5" fill="#F6F4EF"/>
          <line x1="6" y1="15" x2="24" y2="6" stroke="#5B6472" stroke-width="1.5"/>
          <line x1="6" y1="15" x2="24" y2="24" stroke="#5B6472" stroke-width="1.5"/>
        </svg>
        <span class="font-display text-2xl font-semibold tracking-tight">LinkUp</span>
      </a>
    </div>

    <div class="relative z-10 max-w-md">
      <p class="font-display text-[2.6rem] leading-[1.15] font-medium">
        Every introduction starts<br/>with one connection.
      </p>
      <p class="mt-5 text-paper/60 text-base leading-relaxed">
        Build your professional circle, share what you're working on, and find the people worth knowing.
      </p>

      <div class="mt-10 flex items-center gap-4">
        <div class="flex -space-x-2">
          <div class="w-9 h-9 rounded-full bg-ember/80 border-2 border-ink"></div>
          <div class="w-9 h-9 rounded-full bg-paper/30 border-2 border-ink"></div>
          <div class="w-9 h-9 rounded-full bg-paper/50 border-2 border-ink"></div>
        </div>
        <span class="text-sm text-paper/50">Joined by 40,000+ professionals this month</span>
      </div>
    </div>

    <div class="relative z-10 text-xs text-paper/40">
      © 2026 LinkUp. Built for the people behind the work.
    </div>
  </div>

  <!-- Right: Form panel -->
  <div class="flex flex-col items-center justify-center px-6 sm:px-10 py-14">
    <div class="w-full max-w-sm">

      <!-- Mobile-only brand mark -->
      <div class="lg:hidden flex items-center gap-2 mb-10 justify-center">
        <svg width="26" height="26" viewBox="0 0 30 30" fill="none">
          <circle cx="6" cy="15" r="3.5" fill="#FF6B35"/>
          <circle cx="24" cy="6" r="3.5" fill="#14171F"/>
          <circle cx="24" cy="24" r="3.5" fill="#14171F"/>
          <line x1="6" y1="15" x2="24" y2="6" stroke="#5B6472" stroke-width="1.5"/>
          <line x1="6" y1="15" x2="24" y2="24" stroke="#5B6472" stroke-width="1.5"/>
        </svg>
        <span class="font-display text-xl font-semibold">LinkUp</span>
      </div>

      <h1 class="font-display text-3xl font-semibold tracking-tight">Create your account</h1>
      <p class="mt-2 text-slate text-sm">Free to join. Takes less than a minute.</p>

      <form class="mt-8 space-y-4" action="#" method="POST">
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label for="first_name" class="block text-sm font-medium text-ink mb-1.5">First name</label>
            <input type="text" id="first_name" name="first_name" placeholder="Bilal"
              class="w-full rounded-lg border border-line bg-white px-3.5 py-2.5 text-sm placeholder:text-slate/50 focus:outline-none focus:ring-2 focus:ring-ember/40 focus:border-ember transition">
          </div>
          <div>
            <label for="last_name" class="block text-sm font-medium text-ink mb-1.5">Last name</label>
            <input type="text" id="last_name" name="last_name" placeholder="El Amrani"
              class="w-full rounded-lg border border-line bg-white px-3.5 py-2.5 text-sm placeholder:text-slate/50 focus:outline-none focus:ring-2 focus:ring-ember/40 focus:border-ember transition">
          </div>
        </div>

        <div>
          <label for="email" class="block text-sm font-medium text-ink mb-1.5">Email address</label>
          <input type="email" id="email" name="email" placeholder="you@company.com"
            class="w-full rounded-lg border border-line bg-white px-3.5 py-2.5 text-sm placeholder:text-slate/50 focus:outline-none focus:ring-2 focus:ring-ember/40 focus:border-ember transition">
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-ink mb-1.5">Password</label>
          <input type="password" id="password" name="password" placeholder="At least 8 characters"
            class="w-full rounded-lg border border-line bg-white px-3.5 py-2.5 text-sm placeholder:text-slate/50 focus:outline-none focus:ring-2 focus:ring-ember/40 focus:border-ember transition">
        </div>

        <div>
          <label for="password_confirmation" class="block text-sm font-medium text-ink mb-1.5">Confirm password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Re-enter your password"
            class="w-full rounded-lg border border-line bg-white px-3.5 py-2.5 text-sm placeholder:text-slate/50 focus:outline-none focus:ring-2 focus:ring-ember/40 focus:border-ember transition">
        </div>

        <label class="flex items-start gap-2.5 pt-1">
          <input type="checkbox" class="mt-0.5 w-4 h-4 rounded border-line text-ember focus:ring-ember/40">
          <span class="text-xs text-slate leading-relaxed">I agree to LinkUp's <a href="#" class="text-ink underline hover:text-ember">Terms of Service</a> and <a href="#" class="text-ink underline hover:text-ember">Privacy Policy</a>.</span>
        </label>

        <button type="submit"
          class="w-full bg-ember text-white font-medium text-sm rounded-lg py-2.75 py-[10px] mt-2 hover:bg-ember/90 active:scale-[0.99] transition shadow-sm">
          Create account
        </button>
      </form>

      <div class="flex items-center gap-3 my-6">
        <div class="h-px bg-line flex-1"></div>
        <span class="text-xs text-slate">or continue with</span>
        <div class="h-px bg-line flex-1"></div>
      </div>

      <div class="grid grid-cols-2 gap-3">
        <button class="flex items-center justify-center gap-2 border border-line rounded-lg py-2.5 text-sm font-medium hover:bg-ink/[0.03] transition">
          <svg width="16" height="16" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
          Google
        </button>
        <button class="flex items-center justify-center gap-2 border border-line rounded-lg py-2.5 text-sm font-medium hover:bg-ink/[0.03] transition">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="#1877F2"><path d="M24 12.07C24 5.4 18.63 0 12 0S0 5.4 0 12.07C0 18.1 4.39 23.1 10.13 24v-8.44H7.08v-3.49h3.05V9.41c0-3.02 1.79-4.69 4.53-4.69 1.31 0 2.69.24 2.69.24v2.96h-1.51c-1.49 0-1.96.93-1.96 1.89v2.26h3.33l-.53 3.49h-2.8V24C19.61 23.1 24 18.1 24 12.07z"/></svg>
          Facebook
        </button>
      </div>

      <p class="mt-8 text-center text-sm text-slate">
        Already on LinkUp? <a href="login.html" class="text-ink font-medium hover:text-ember transition">Sign in</a>
      </p>
    </div>
  </div>

</div>
</body>
</html>
