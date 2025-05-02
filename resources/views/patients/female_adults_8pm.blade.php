@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Female Adults with 8pm Medications</h1>
        
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
                    {{-- Check if patient is a female adult --}}
                    @if($patient->gender == 'female' && $patient->age_group == 'adult')
                        {{-- Loop through medicines and filter by 8pm intake time --}}
                        @foreach($patient->medicines as $medicine)
                            {{-- Check if intake_time is 8pm --}}
                            @if(in_array('8pm', json_decode($medicine->pivot->intake_time)))
                                <tr>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ ucfirst($patient->age_group) }}</td>
                                    <td>{{ $medicine->name }}</td>
                                    <td>{{ implode(', ', json_decode($medicine->pivot->intake_time)) }}</td> {{-- Access intake_time array --}}
                                    <td>{{ $medicine->pivot->dosage }}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
