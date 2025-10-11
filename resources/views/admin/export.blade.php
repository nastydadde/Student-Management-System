@extends('layouts.app')

@section('content')
<div class="mt-6 p-6 bg-white rounded-lg shadow border border-gray-500">
    <h2 class="text-xl font-bold text-black mb-4">Export All Student Data</h2>
    <form method="GET" action="{{ route('admin.export.download') }}">
        <button type="submit" class="bg-[#ca2125] text-white px-4 py-2 rounded-lg hover:bg-[#ff0000] transition-colors">
            Download CSV
        </button>
    </form>
</div>
@endsection