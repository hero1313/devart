@extends('admin.index')
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">

        <div class="card">
            <h5 class="card-header">კონტაქტები</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>გამომგზავნი</th>
                            <th>გამომგზავნის ნომერი</th>
                            <th>გამომგზავნის ელფოსტა</th>
                            <th>თემა</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($contacts as $contact)
                            <tr class="apartment-tr">
                                <td><strong>{{ $contact->name }}</strong></td>
                                <td>{{ $contact->number }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->subject }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
