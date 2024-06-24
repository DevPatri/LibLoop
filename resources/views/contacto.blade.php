@extends('layouts.landing')

@section('title', 'LibLoop')

@section('content')
<main>
    <div class="contact-container">
        <div class="contact-image">
            <img src="{{ asset('assets/img/contacto.jpeg') }}" alt="Library">
        </div>

        <div class="contact-header">
            <h2>CONTACTA CON</h2>
            <h1>NOSOTROS</h1>
        </div>
        <div class="contact-info">
            <ul>
                <li><i class="fa fa-phone"></i> +34 666 555 999</li>
                <li><i class="fa fa-envelope"></i> hello@libloop.com</li>
                <li><i class="fa fa-map-marker"></i> 123 Carlos, Cartagena</li>
                <li><i class="fa fa-globe"></i> www.libloop.com</li>
            </ul>
            <div class="x-container">
                <span class="x">C</span>
                <span class="x">C</span>
                <span class="x">C</span>
                <span class="x">C</span>
            </div>
        </div>
        <div class="corner-image">
            <img src="{{ asset('assets/img/paper-plane.png') }}" alt="Paper Plane">
        </div>
    </div>
</main>
@endsection

<style>

    .x-container {
        position: absolute;
        right: -7px;                       /* X estén justo en el borde */
        top: 30px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: calc(100% - 60px);      /* Distribución X verticalmente */
    }

    .x {
        transform: rotate(270deg);
        font-size: 24px;
        color: #4A444D;
    }

    .contact-container {
        display: flex;
        flex-direction: row;
        align-items: center;
        height: 100vh;
        background-color: #87a28b;
        position: relative;
    }

    .contact-image img {
        height: 100%;
        border-top-right-radius: 180px;
        width: 70%;
    }

    .contact-info {
        background-color: rgba(249, 246, 237, 0.9);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 50%;
        width: 400px;
        position: absolute;
        top: 50%;
        left: 55%;
        transform: translate(-50%, -50%);
        z-index: 1;
    }


    .contact-header {
        position: absolute;
        top: 20px; 
        right: 50px; 
        text-align: right;
    }

    .contact-header h2, .contact-header h1 {
        margin: 0;
        padding: 0;
    }

    .contact-header h2 {
        font-size: 30px;
        color: #fff;
    }

    .contact-header h1 {
        font-size: 45px;
        color: #fff;
        border-radius: 20px;
        padding: 0px 15px;
        background-color: rgba(249, 246, 237, 0.3);
    }

    .contact-info ul {
        list-style-type: none;
        padding: 0;
    }

    .contact-info ul li {
        display: flex;
        align-items: center;
        font-size: 18px;
        color: #555;
        margin: 10px 0;
        position: relative;
        color: #88A28B;
    }

    .contact-info ul li i {
        margin-right: 10px;
        color: #4A444D;
        min-width: 20px; 
        text-align: center;
    }

    .corner-image {
        position: absolute;
        bottom: 10px;
        right: 20px;
        z-index: 0;
    }

    .corner-image img {
        max-width: 300px; 
        height: auto;
    }
</style>
