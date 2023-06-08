@props(['projects'])

<x-post-featured-card :project="$projects[0]" />

@if ($projects->count() > 1)
<div class="lg:grid lg:grid-cols-6">
    @foreach ($projects->skip(1) as $project)
    <!-- Deze class werkt alleen als je $attributes oproept in post-card.blade.php -->
    <x-post-card :project="$project" class="{{$loop -> iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
    @endforeach
</div>
@endif