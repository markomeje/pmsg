<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- COMPULSORY META TAGS -->
        <meta charset="utf-8">
        <meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
        <meta http-equiv='pragma' content='no-cache'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="keywords" content="{{ config('app.name') }}" />
        <meta name="image" content="/images/assets/logo.png" />

        <meta name="og:site_name" content="{{ config('app.name') }}" />
        <meta name="og:locale" content="en_US" />
        <meta name="article:section" content="Peter Mbah Support Group" />
        <meta name="description" content="{{ config('app.name') }}" />
        <!--Facebook Open Graph-->
        <meta name="framework" content="Redux 4.3.3">
        <meta name='robots' content='max-image-preview:large'>

        <!-- Facebook Open Graph -->
        <meta property="og:image" content="/images/assets/logo.png" />
        <meta property="og:url" content="{{ config('app.url') }}" />
        <meta property="og:type" content="{{ config('app.name') }}" />
        <meta property="og:title" content="{{ config('app.name') }}" />
        <meta property="og:description" content="Peter Mbah Support Group" />

        <!--Twitter Share-->
        <meta name="twitter:image:src" content="/images/assets/logo.png" />
        <meta property="twitter:image" content="/images/assets/logo.png" />
        <meta property="twitter:title" content="{{ config('app.name') }}" />
        <meta property="twitter:site" content="{{ config('app.url') }}" />
        <meta property="twitter:site_name" content="{{ config('app.name') }}"/>
        <meta property="twitter:description" content="{{ config('app.name') }}" />

        <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
        <link rel="manifest" href="/favicon/site.webmanifest">
        <!-- SITE TITLE -->
        <title>{{ config('app.name') }}</title>
        {{-- Google fonts --}}
        @if(env('APP_ENV') == 'production')
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
        @endif
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" type="text/css" href="/bootstrap/bootstrap.min.css">
        <!-- index CSS -->
        <link rel="stylesheet" type="text/css" href="/css/index.css">
        <!-- ico font css -->
        <link rel="stylesheet" type="text/css" href="/icofont/icofont.min.css">
    </head>
    <body>