@extends('layouts.navao')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Historique</h1>
        </div>

        <!-- Historique Table -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="historiqueTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Action</th>
                                <th>Détails</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $historique = \App\Models\Historique::all();
                            @endphp

                            @foreach($historique as $activity)
                            <tr>
                                <td>{{ $activity->created_at }}</td>
                                <td>{{ $activity->action }}</td>
                                <td>{{ $activity->details }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
