<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    {{-- Local Style CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <!-- Pranešimas sėkmingai išsiuntus formą -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        <form method="post" action="{{ route('contact.store') }}">

             {{-- Errors Old --}}
             {{-- @if ($errors->has('name'))
                <div class="error">
                    {{ $errors->first('name') }}
                </div>
            @endif --}}

            @csrf
            <div class="form-group py-2">
                {{-- Error --}}
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label><i class="fa-solid fa-user"></i>&nbsp; Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group py-2">
                {{-- Error --}}
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label><i class="fa-solid fa-envelope"></i>&nbsp; Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group py-2">
                 {{-- Error --}}
                @error('phone')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label><i class="fa-sharp fa-solid fa-phone"></i>&nbsp; Phone</label>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="form-group py-2">
                 {{-- Error --}}
                @error('subject')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label><i class="fa-solid fa-check"></i>&nbsp; Subject</label>
                <input type="text" class="form-control" name="subject">
            </div>
            <div class="form-group py-2">
                 {{-- Error --}}
                @error('message')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label><i class="fa-solid fa-message"></i>&nbsp; Message</label>
                <textarea class="form-control" name="message" rows="4"></textarea>
            
            </div> <br>
            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </form>
    </div>
</body>
</html>