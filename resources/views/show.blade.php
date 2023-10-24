@extends('layout')
@section('nav')
<h2>Your list of exploration</h2>

<a href="/"><i class="fa-brands fa-space-awesome fa-2xl"> Home</i></a>
@endsection
@section('table-section')
<table class="table">
    <thead>
        <tr>
            <th>Location</th>
            <th>Name of adventurer</th>
            <th>Mineral type</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Dangerous level</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($zones as $zone)
        <tr>
            <td>{{ $zone->location }}</td>
            <td>{{ $zone->name }}</td>
            <td>{{ $zone->mineral_type }}</td>
            <td>{{ $zone->latitude }}</td>
            <td>{{ $zone->longitude }}</td>
            <td>{{ $zone->dangerous_level }}</td>
            <td>{{ $zone->date }}</td>
            <td><a href="{{ route('zone.delete', $zone->id) }}" onclick="event.preventDefault(); if(confirm('Do you really want to remove this zone?')) document.getElementById('zone-delete-{{ $zone->id }}').submit();">
            <i class="fa-solid fa-trash-can">
            </a></td>
            <form id="zone-delete-{{ $zone->id }}" action="{{ route('zone.delete', $zone->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
        </tr>
        @endforeach
    </tbody>
</table>
@endsection