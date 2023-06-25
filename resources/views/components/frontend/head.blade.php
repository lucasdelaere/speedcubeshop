<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:title" content="SpeedCubeShop">
    <meta property="og:description" content="Speed cubing's most trusted retailer since 2009. Free shipping and easy returns available. Based in the USA.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://syntrawestcloud.be/fullstack/lucas/speedcubeshop/">
    <meta property="og:site_name" content="SpeedCubeShop">
    <meta property="og:image" content="{{asset('images/index/SCS-logo.png')}}">
    <title> {{ $title ? 'SpeedCubeShop | ' . $title :  '' }}</title>
    <link rel="icon" href="{{asset('images/index/scs-2020-favicon_32x32.png')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick/slick-theme.css')}}">
    <link rel="stylesheet" href=
        "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/header-footer.css')}}">
    <!-- page specific links -->
    {{ $slot }}
    @livewireStyles
</head>
