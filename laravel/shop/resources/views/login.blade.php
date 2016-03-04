@extends('master');

@include('component.loading')

@section('title','登录')

@section('content')
    <p> THIS IS LOGIN PAGE</p>
@endsection

@section('my-js')
    <script type="text/javascript">
        alert('LOGIN')
    </script>
@endsection
