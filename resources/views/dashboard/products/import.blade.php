@extends('layouts.master')

@section('title', 'import')

@section('content')
    <h1>Import Products from Excel</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('dashboard.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit">Import</button>
    </form>
@endsection
