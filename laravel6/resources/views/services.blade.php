
@extends("app")

@section("pageTitle", "Services")

@section("body")

    <h1>Services</h1>

    <ul>
        @forelse($services AS $service)
            <li>{{ $service->name }}</li>
        @empty
            <li>No services available</li>
        @endforelse
    </ul>

@endsection
