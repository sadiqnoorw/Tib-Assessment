@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Male Infants with 8am Medications</h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age Group</th>
                    <th>Medicine</th>
                    <th>Intake Time</th>
                    <th>Dosage</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                    {{-- Check if the patient has any related medicines with 8am intake --}}
                    @foreach($patient->medicines as $medicine)
                        {{-- Check if intake_time is 8am and usable_for_infants is true --}}
                        @if(in_array('8am', json_decode($medicine->pivot->intake_time)) && $medicine->pivot->usable_for_infants)
                            <tr>
                                <td>{{ $patient->name }}</td>
                                <td>{{ ucfirst($patient->age_group) }}</td>
                                <td>{{ $medicine->name }}</td>
                                <td>{{ implode(', ', json_decode($medicine->pivot->intake_time)) }}</td> {{-- Access intake_time array --}}
                                <td>{{ $medicine->pivot->dosage }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
