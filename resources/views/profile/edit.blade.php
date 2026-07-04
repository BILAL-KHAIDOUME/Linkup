@extends('layout')

@section('content')
    <!-- Left column: Profile Card Preview -->
    <aside class="hidden lg:block space-y-2 font-sans text-ink">
        <div class="bg-white border border-[rgba(0,0,0,0.08)] rounded-lg overflow-hidden shadow-sm sticky top-20">
            <div class="h-14 bg-gradient-to-r from-[#0a66c2] to-[#57a5e0]"></div>
            <div class="px-4 pb-4 text-center -mt-8">
                <a href="{{ route('profile') }}">

                    <div class="w-16 h-16 mx-auto rounded-full bg-[#0a66c2] border-2 border-white text-white font-semibold text-lg flex items-center justify-center shadow">
                        BE
                    </div>
                    <p class="mt-2 font-semibold text-base leading-tight">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-[rgba(0,0,0,0.6)] leading-snug mt-1 px-2">{{ Auth::user()->headline ?? 'No headline set' }}</p>

                </a>
            </div>
            <div class="h-px bg-[rgba(0,0,0,0.08)]"></div>
            <div class="p-3 text-center">
                <span class="text-xs font-semibold text-[rgba(0,0,0,0.5)] uppercase tracking-wider">Live Preview</span>
            </div>
        </div>
    </aside>

    <!-- Center Column: The Edit Form -->
    <main class="space-y-4 min-w-0 font-sans text-ink">
        <div class="bg-white border border-[rgba(0,0,0,0.08)] rounded-lg p-6 shadow-sm">
            <div class="mb-6 pb-4 border-b border-[rgba(0,0,0,0.08)]">
                <h1 class="text-xl font-bold tracking-tight">Edit Intro</h1>
                <p class="text-xs text-[rgba(0,0,0,0.6)] mt-0.5">Keep your professional profile fresh and updated.</p>
            </div>

            <!-- Error Notification -->
            @if ($errors->any())
                <div class="mb-5 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <p class="text-sm font-semibold text-red-800 mb-1">Please review the errors below:</p>
                    <ul class="list-disc pl-5 space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li class="text-xs text-red-600">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Update Form -->
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Name Fields -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-xs font-semibold text-[rgba(0,0,0,0.6)] mb-1.5">Full Name *</label>
                        <input type="text" name="name" id="name" 
                            value="{{ old('name', Auth::user()->name) }}" 
                            class="w-full text-sm text-[rgba(0,0,0,0.9)] bg-white border border-[rgba(0,0,0,0.6)] rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0a66c2]/30 focus:border-[#0a66c2] transition">
                    </div>

                    <div>
                        <label for="company" class="block text-xs font-semibold text-[rgba(0,0,0,0.6)] mb-1.5">company</label>
                        <input type="text" name="company" id="company" 
                            value="{{ old('company', Auth::user()->company) }}" 
                            class="w-full text-sm text-[rgba(0,0,0,0.9)] bg-white border border-[rgba(0,0,0,0.6)] rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0a66c2]/30 focus:border-[#0a66c2] transition">
                    </div>
                </div>

                <!-- Headline Input -->
                <div>
                    <label for="headline" class="block text-xs font-semibold text-[rgba(0,0,0,0.6)] mb-1.5">Headline *</label>
                    <input type="text" name="headline" id="headline" 
                        value="{{ old('headline', Auth::user()->headline) }}" 
                        placeholder="e.g., Senior Laravel Developer | Open to Remote Opportunities"
                        class="w-full text-sm text-[rgba(0,0,0,0.9)] bg-white border border-[rgba(0,0,0,0.6)] rounded-md px-3 py-2 placeholder:text-[rgba(0,0,0,0.4)] focus:outline-none focus:ring-2 focus:ring-[#0a66c2]/30 focus:border-[#0a66c2] transition">
                    <p class="text-[11px] text-[rgba(0,0,0,0.5)] mt-1">Provide a brief catchphrase describing your current professional role or expertise.</p>
                </div>

                <!-- Profile Photo Upload -->
                <div>
                    <label class="block text-xs font-semibold text-[rgba(0,0,0,0.6)] mb-1.5">Profile Photo</label>
                    <div class="flex items-center gap-4 p-3 border border-dashed border-[rgba(0,0,0,0.2)] rounded-lg bg-[rgba(0,0,0,0.01)]">
                        <img src="{{ Auth::user()->image_url ?? 'https://via.placeholder.com/80' }}" alt="Avatar Preview" 
                            class="w-14 h-14 rounded-full object-cover shrink-0 bg-[#0a66c2]">
                        <div class="flex-1">
                            <input type="file" name="profile_photo" id="profile_photo" class="text-xs text-[rgba(0,0,0,0.6)] file:mr-3 file:py-1.5 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-[rgba(10,102,194,0.08)] file:text-[#0a66c2] hover:file:bg-[rgba(10,102,194,0.15)] file:cursor-pointer transition">
                            <p class="text-[10px] text-[rgba(0,0,0,0.4)] mt-1">Supports PNG, JPG, or GIF up to 2MB.</p>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end gap-2 pt-4 border-t border-[rgba(0,0,0,0.08)]">
                    <a href="{{ url()->previous() }}" 
                        class="text-sm font-semibold text-[rgba(0,0,0,0.6)] bg-white border border-[rgba(0,0,0,0.6)] px-4 py-1.5 rounded-full hover:bg-[rgba(0,0,0,0.04)] hover:text-[rgba(0,0,0,0.8)] transition">
                        Cancel
                    </a>
                    <button type="submit" 
                        class="text-sm font-semibold text-white bg-[#0a66c2] px-5 py-1.5 rounded-full hover:bg-[#004182] transition shadow-sm">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- Right Sidebar: Tips/Guidelines -->
    <aside class="hidden lg:block space-y-2 font-sans text-ink">
        <div class="bg-white border border-[rgba(0,0,0,0.08)] rounded-lg p-4 shadow-sm">
            <p class="text-sm font-semibold mb-2 flex items-center gap-1.5">
                <svg class="w-4 h-4 text-[#e7a33e]" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a1 1 0 011 1v1.323l.395.15c.508.193.971.485 1.374.86l.933-.933a1 1 0 011.414 1.414l-.933.933c.375.403.667.866.86 1.374l.15.395H17a1 1 0 110 2h-1.323l-.15.395a4.004 4.004 0 01-.86 1.374l.933.933a1 1 0 11-1.414 1.414l-.933-.933a4.003 4.003 0 01-1.374.86l-.395.15V17a1 1 0 11-2 0v-1.323l-.395-.15a4.003 4.003 0 01-1.374-.86l-.933.933a1 1 0 11-1.414-1.414l.933-.933a4.003 4.003 0 01-.86-1.374l-.15-.395H3a1 1 0 110-2h1.323l.15-.395c.193-.508.485-.971.86-1.374l-.933-.933a1 1 0 111.414-1.414l.933.933c.403-.375.866-.667 1.374-.86l.395-.15V3a1 1 0 011-1z" />
                </svg>
                Optimization Tip
            </p>
            <p class="text-xs text-[rgba(0,0,0,0.6)] leading-relaxed">
                Members with clear, descriptive headlines get up to 4x more profile views from discovery channels. Include your top programming languages or specialized workflows!
            </p>
        </div>
    </aside>
@endsection