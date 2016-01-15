@extends('layout')

@section('title')
    contactez-nous
@stop

@section('javascript')
    @parent
@stop

@section('content')
    <div class="container">
        <div class="main">
            <div class="contact">
                <div class="contact_info">
                    <h2>get in touch</h2>
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d424396.3176723366!2d150.92243255000002!3d-33.7969235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b129838f39a743f%3A0x3017d681632a850!2sSydney+NSW%2C+Australia!5e0!3m2!1sen!2sin!4v1430912648478" width="100%" height="250" frameborder="0" style="border:0"></iframe>
                    </div>
                </div>
                @if (session('successContact'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <i class="fa fa-times"></i> {{ session('successContact') }}
                    </div>
                @endif
                @if(count($errors->all()))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="contact-form"  action="{{ route('contact') }}">
                    <h2>Contact Us</h2>
                    <form method="post" >
                        {{ csrf_field() }}
                        <div>
                            {-- S'il y a une erreur sur userName, on l'affiche ici --}
                            {!! $errors->first('userName', '<small class="help-block">:message</small>') !!}
                            <span><label>Name</label></span>
                            <span><input name="userName" type="text" class="textbox"  value="{{ Request::old('userName') }}"></span>
                        </div>
                        <div>
                            <span><label>E-mail</label></span>
                            <span><input name="userEmail" type="text" class="textbox @if ($errors->has('userEmail'))has-error @endif" value="{{ Request::old('userEmail') }}"></span>
                        </div>
                        <div>
                            <span><label>Mobile</label></span>
                            <span><input name="userPhone" type="text" class="textbox" value="{{ Request::old('userPhone') }}"></span>
                        </div>
                        <div>
                            <span><label>Subject</label></span>
                            <span><textarea name="userMsg" value="{{ Request::old('userMsg') }}"> </textarea></span>
                        </div>
                        <div>
                            <span><input type="submit" class="" value="Submit us"></span>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@stop