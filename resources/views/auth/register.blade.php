<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkUp — Create your account</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body class="bg-[#f4f2ee] text-[rgba(0,0,0,0.9)] font-sans antialiased">

    <div class="min-h-screen flex flex-col items-center px-4 py-10">

        <!-- Brand mark -->
        <a href="{{ route('feed') }}" class="flex items-center gap-2 mb-8">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none">
                <circle cx="6" cy="15" r="3.5" fill="#0a66c2" />
                <circle cx="24" cy="6" r="3.5" fill="#0a66c2" />
                <circle cx="24" cy="24" r="3.5" fill="#0a66c2" />
                <line x1="6" y1="15" x2="24" y2="6" stroke="#0a66c2" stroke-width="1.5" />
                <line x1="6" y1="15" x2="24" y2="24" stroke="#0a66c2" stroke-width="1.5" />
            </svg>
            <span class="text-2xl font-bold tracking-tight text-[#0a66c2]">LinkUp</span>
        </a>

        <div class="w-full max-w-[420px] bg-white border border-[rgba(0,0,0,0.08)] rounded-lg shadow-sm p-8">

            <h1 class="text-2xl font-semibold tracking-tight text-center">Create your account</h1>
            <p class="mt-1.5 text-sm text-[rgba(0,0,0,0.6)] text-center">Free to join. Takes less than a minute.</p>

            <form class="mt-6 space-y-4" action="{{ route('register') }}" method="POST">
                @csrf

                <div>
                    <label for="name" class="block text-xs font-semibold text-[rgba(0,0,0,0.6)] mb-1.5">Name</label>
                    <input type="text" id="name" name="name" placeholder="Bilal" value="{{ old('name') }}"
                        class="w-full rounded-md border border-[rgba(0,0,0,0.6)] bg-white px-3.5 py-2.5 text-sm placeholder:text-[rgba(0,0,0,0.4)] focus:outline-none focus:ring-2 focus:ring-[#0a66c2]/30 focus:border-[#0a66c2] transition">
                </div>

                <div>
                    <label for="email" class="block text-xs font-semibold text-[rgba(0,0,0,0.6)] mb-1.5">Email
                        address</label>
                    <input type="text" id="email" name="email" placeholder="you@company.com"
                        value="{{ old('email') }}"
                        class="w-full rounded-md border border-[rgba(0,0,0,0.6)] bg-white px-3.5 py-2.5 text-sm placeholder:text-[rgba(0,0,0,0.4)] focus:outline-none focus:ring-2 focus:ring-[#0a66c2]/30 focus:border-[#0a66c2] transition">
                </div>

                <div>
                    <label for="password"
                        class="block text-xs font-semibold text-[rgba(0,0,0,0.6)] mb-1.5">Password</label>
                    <input type="password" id="password" name="password" placeholder="At least 8 characters"
                        class="w-full rounded-md border border-[rgba(0,0,0,0.6)] bg-white px-3.5 py-2.5 text-sm placeholder:text-[rgba(0,0,0,0.4)] focus:outline-none focus:ring-2 focus:ring-[#0a66c2]/30 focus:border-[#0a66c2] transition">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-xs font-semibold text-[rgba(0,0,0,0.6)] mb-1.5">Confirm
                        password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm your password"
                        class="w-full rounded-md border border-[rgba(0,0,0,0.6)] bg-white px-3.5 py-2.5 text-sm placeholder:text-[rgba(0,0,0,0.4)] focus:outline-none focus:ring-2 focus:ring-[#0a66c2]/30 focus:border-[#0a66c2] transition">
                </div>

                <label class="flex items-start gap-2.5 pt-1">
                    <input type="checkbox"
                        class="mt-0.5 w-4 h-4 rounded border-[rgba(0,0,0,0.4)] text-[#0a66c2] focus:ring-[#0a66c2]/30">
                    <span class="text-xs text-[rgba(0,0,0,0.6)] leading-relaxed">
                        I agree to LinkUp's
                        <a href="#" class="text-[#0a66c2] underline hover:text-[#004182]">Terms of Service</a>
                        and
                        <a href="#" class="text-[#0a66c2] underline hover:text-[#004182]">Privacy Policy</a>.
                    </span>
                </label>

                <button type="submit"
                    class="w-full bg-[#0a66c2] text-white font-semibold text-sm rounded-full py-2.5 mt-2 hover:bg-[#004182] active:scale-[0.99] transition shadow-sm">
                    Create account
                </button>

                @if ($errors->any())
                    <ul class="px-4 py-2 bg-red-50 border border-red-200 rounded-lg">
                        @foreach ($errors->all() as $error)
                            <li class="my-1 text-xs text-red-600">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>

            <div class="flex items-center gap-3 my-6">
                <div class="h-px bg-[rgba(0,0,0,0.08)] flex-1"></div>
                <span class="text-xs text-[rgba(0,0,0,0.6)]">or continue with</span>
                <div class="h-px bg-[rgba(0,0,0,0.08)] flex-1"></div>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <button
                    class="flex items-center justify-center gap-2 border border-[rgba(0,0,0,0.6)] rounded-full py-2.5 text-sm font-semibold text-[rgba(0,0,0,0.6)] hover:bg-[rgba(0,0,0,0.05)] transition">
                    <svg width="16" height="16" viewBox="0 0 24 24">
                        <path fill="#4285F4"
                            d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                        <path fill="#34A853"
                            d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                        <path fill="#FBBC05"
                            d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                        <path fill="#EA4335"
                            d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                    </svg>
                    Google
                </button>
                <button
                    class="flex items-center justify-center gap-2 border border-[rgba(0,0,0,0.6)] rounded-full py-2.5 text-sm font-semibold text-[rgba(0,0,0,0.6)] hover:bg-[rgba(0,0,0,0.05)] transition">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="#1877F2">
                        <path
                            d="M24 12.07C24 5.4 18.63 0 12 0S0 5.4 0 12.07C0 18.1 4.39 23.1 10.13 24v-8.44H7.08v-3.49h3.05V9.41c0-3.02 1.79-4.69 4.53-4.69 1.31 0 2.69.24 2.69.24v2.96h-1.51c-1.49 0-1.96.93-1.96 1.89v2.26h3.33l-.53 3.49h-2.8V24C19.61 23.1 24 18.1 24 12.07z" />
                    </svg>
                    Facebook
                </button>
            </div>

            <p class="mt-8 text-center text-sm text-[rgba(0,0,0,0.6)]">
                Already on LinkUp?
                <a href="{{ route('show.login') }}" class="text-[#0a66c2] font-semibold hover:text-[#004182] transition">Sign
                    in</a>
            </p>
        </div>

        <p class="mt-8 text-xs text-[rgba(0,0,0,0.4)]">© 2026 LinkUp. Built for the people behind the work.</p>
    </div>

</body>

</html>