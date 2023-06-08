@extends ('layout')

@section('content')
@include ('projects._header')

<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    @if ($projects->count())
    <x-posts-grid :projects="$projects" />

    {{$projects->links()}}

    @else
    <p class="text-center">Nothing yet. Please check again later.</p>

    @endif

</main>


<!-- @foreach ($projects as $project)
<div>
    <h1>
        <a href="/projects/{{$project->slug}}">
            {!!$project->title!!}
        </a>
    </h1>
    <p>
        By <a href="/projectmembers/{{$project->projectmember->username}}">{{$project->projectmember->name}}</a> in <a href=" /categories/{{$project->category->slug}}">{{$project->category->name}}</a>
    </p>
    <div>
        {{$project->excerpt}}
    </div>
</div>
@endforeach -->
@endsection