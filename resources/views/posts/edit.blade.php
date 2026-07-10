@extends('layout')

@section('content')
    <div class="max-w-2xl mx-auto col-span-full">
        <div class="bg-white border border-[rgba(0,0,0,0.08)] rounded-lg p-4 shadow-sm">
            <h1 class="text-lg font-semibold mb-4">Modifier le post</h1>

            <form action="{{ route('posts.update', $post) }}" method="POST" class="space-y-3">
                @csrf
                @method('PUT')

                <div class="flex items-center gap-2">
                    <div class="w-12 h-12 rounded-full bg-[#0a66c2] text-white font-semibold text-sm flex items-center justify-center shrink-0">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                    <textarea name="content" rows="4"
                        class="flex-1 resize-none text-sm text-[rgba(0,0,0,0.9)] bg-white border border-[rgba(0,0,0,0.6)] rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#0a66c2]/30 focus:border-[#0a66c2] transition">{{ old('content', $post->content) }}</textarea>
                </div>

                @if ($errors->any())
                    <ul class="px-4 py-2 bg-red-50 border border-red-200 rounded-lg">
                        @foreach ($errors->all() as $error)
                            <li class="my-1 text-xs text-red-600">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="flex items-center justify-end gap-2 pt-1">
                    <a href="{{ route('feed') }}"
                        class="text-sm font-semibold text-[rgba(0,0,0,0.6)] px-5 py-1.5 rounded-full border border-[rgba(0,0,0,0.6)] hover:bg-[rgba(0,0,0,0.08)] transition">
                        Annuler
                    </a>
                    <button type="submit"
                        class="text-sm font-semibold text-white bg-[#0a66c2] px-5 py-1.5 rounded-full hover:bg-[#004182] transition">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
