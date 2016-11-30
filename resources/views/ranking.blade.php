@extends('layouts.app')

@section('content')

    <div class="col s6">
        <div class="card-panel quest">
            <h1>Ranking</h1>

            <table class="highlight responsive-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Level</th>
                    <th>Glory points</th>
                </tr>
                </thead>

                <tbody>

                @foreach($ranking as $place => $player)
                    <tr>
                        <td>{{ $place + 1 }}</td>
                        <td>{{ $player -> character -> name }}</td>
                        <td>{{ $player -> character -> level }}</td>
                        <td>{{ $player -> glory_points }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div class="col s6">
        <div class="card-panel quest">
            <h1>Player preview</h1>

            <p>wygląd</p>
            <p>nazwa</p>
            <p>statystyki</p>
            <p>opis</p>
        </div>
    </div>


@endsection