@extends('layouts.app')
@section('title', 'Occasion')

@section('content')
    <livewire:occasion-board :occasion="$occasion" />
@endsection
