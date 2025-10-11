@extends('layouts.app')

@section('content')

<div class="max-w-lg mx-auto mt-16 p-8 bg-white shadow-lg rounded-xl border border-gray-500">
    <h2 class="text-2xl font-bold text-black mb-6 text-center">🔒 Reset Your Password</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 border border-green-300 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 text-red-800 border border-red-300 px-4 py-3 rounded mb-4">
            @foreach($errors->all() as $error)
                <div>• {{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('admin.password.update') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="current_password" class="block text-sm font-medium text-[#777777] mb-1">Current Password</label>
            <input type="password" name="current_password" required
                class="w-full border border-gray-500 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#ca2125]/50 focus:border-[#ca2125] transition-colors">
        </div>

        <div>
            <label for="new_password" class="block text-sm font-medium text-[#777777] mb-1">New Password</label>
            <input type="password" name="new_password" required
                class="w-full border border-gray-500 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#ca2125]/50 focus:border-[#ca2125] transition-colors">
        </div>

        <div>
            <label for="new_password_confirmation" class="block text-sm font-medium text-[#777777] mb-1">Confirm New Password</label>
            <input type="password" name="new_password_confirmation" required
                class="w-full border border-gray-500 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#ca2125]/50 focus:border-[#ca2125] transition-colors">
        </div>

        <button type="submit"
            class="w-full bg-[#ca2125] hover:bg-[#ff0000] text-white font-medium py-2.5 rounded-lg shadow-sm transition-colors">
            Update Password
        </button>
    </form>
</div>

@endsection