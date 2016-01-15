@extends('layout-test')
@section('title')Notre équipe @endsection
@section('head')
    <style>
        .chef{ color:red }
        body {
            background-color: #222222;
            color: white;
        }
        .member{
            background-color: #444444;
            padding: 1em;
            margin: 1em;
        }
        ul {
            list-style: none;
        }
        div {
            text-align: center;
        }
    </style>
@endsection

@section('body')
<h1>Notre équipe</h1>
<p>Notre équipe comporte {{count($equipe)}} membres</p>
<div>
    @foreach($equipe as $membre)
        <div class="member">
            <img src="{{asset($membre['image'])}}" alt="portrait de {{$membre['firstname']}} {{$membre['lastname']}}">
            <ul @if($membre['chef'])class="chef"@endif>
                <li><h3>{{$membre['firstname']}} {{$membre['lastname']}}</h3></li>
                <li>{{$membre['description']}}</li>
                <li>{{strtoupper($membre['statut'])}}</li>
            </ul>
        </div>
    @endforeach
</div>
</div>
@endsection