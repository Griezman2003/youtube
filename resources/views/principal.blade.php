@extends('layouts.master')
@section('contenido')
<div class="container-fluid"  style="background-color: #0f0f0f;">
    <div class="row py-3 align-items-center">
        <div class="col-md-3 col-sm-12 col-4">
            <div id="mobile" class="row">
                <div class="d-flex align-items-center justify-content-start gap-2 ps-5">
                    <i class="fas fa-bars fs-4 text-white"></i>
                    <img src="{{asset('images/logo.png')}}" alt="" srcset="" height="85%">
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-8">
            <div class="row">
                <div class="d-flex align-items-center justify-content-center">
                    <input id="input" class="form-control bg-transparent w-75 text-white" style="border-bottom-left-radius: 100px; border-top-left-radius: 100px; border: 1px solid #676767;" type="text" placeholder="Buscar">
                    <button class="btn ps-0"><i class="fas fa-search fs-5 text-white py-2 px-3 " style="border-bottom-right-radius: 100px; border-top-right-radius: 100px;  border: 1px solid #676767;"></i></button>
                    <i class="fas fa-microphone text-white fs-4 px-2 py-1 rounded-circle" style="background-color: #3d3d3d; cursor:pointer"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-12">
            <div class="row">
                <div class="d-flex align-items-center justify-content-end gap-4 pe-5">
                    <i class="fas fa-arrow-up text-white fs-5 d-flex align-items-center justify-content-end" style="cursor:pointer"></i>
                    <i class="fas fa-bell text-white fs-5" style="cursor:pointer"></i>
                    <img src="{{asset('images/perfil.png')}}" alt="" height="80%">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid m-0" style="background-color: #0f0f0f; height:100dvh;">
    <div id="video-container"class="container-fluid d-flex align-items-center justify-content-center py-2">
        {{-- aqui el video --}}
    </div>
</div>
<div class="container-fluid py-3 ps-5" style="background-color: #0f0f0f;">
    <div class="row ps-5">
        <div id="video-titulo" class="col-md-12 col-12">
            {{-- Aqui se genera el titulo dinamicamente del video --}}
        </div>
    </div>
    <div class="row ps-5 mt-2">
        <div class="col-md-12 col-sm-12 col-12">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-5">
                    <div class="d-flex align-items-center justify-content-start gap-4">
                        <button class="btn bg-transparent"><i class="fas fa-user text-white fs-4"></i></button>
                        <h6 class="text-white">XBlurryFaceX | by Bootstrap <br>
                            <span class="text-white">20M suscriptores</span>
                        </h6>
                        <button class="btn bg-white text-black fw-medium" style="border-radius:100px">Suscribirse</button>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12 col-12">
                    <div class=" iconos d-flex align-items-center justify-content-start">
                        <button class="text-white py-2 px-4 btn " style=" border-top-left-radius: 100px;  border-bottom-left-radius: 100px; background-color: #3f3f3f;"><i class="fas fa-thumbs-up text-white pe-2"></i>419k
                            <button class="btn px-4 text-white py-2 border-start" style="background-color: #3f3f3f; border-top-right-radius: 100px;  border-bottom-right-radius: 100px;"><i class="fas fa-thumbs-down text-white me-1"></i>130k</button>
                        </button>
                        <button class="btn text-white py-2 px-3 ms-2" style="background-color: #3f3f3f; border-radius:100px"><i class="fas fa-share text-white me-2"></i>Compartir</button>
                        <button class="btn text-white py-2 px-3 ms-2" style="background-color: #3f3f3f; border-radius:100px"><i class="fas fa-arrow-down text-white me-2"></i>Descarga</button>
                        <button class="btn text-white py-2 px-3 ms-2" style="background-color: #3f3f3f; border-radius:100px"><i class="fas fa-cut text-white me-2"></i>Recortar</button>
                        <button class="btn text-white py-2 px-3 ms-2" style="background-color: #3f3f3f; border-radius:100px">...</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="container-fluid ps-5" style="background-color: #0f0f0f;">
    <div class="row py-2">
        <div class="col-md-9 py-4 ms-5 rounded" style="background-color: #3f3f3f;">
            <h6 class="text-white">22 M de vistas  hace 4 años  <span style="color: #3d9ef1; cursor:pointer;">#Mashup #8230 #HyperMashup</span></h6>
            <div class="row">
                <div>
                    <h6 class="text-white">A longer version of this mashup using May's original and the other version of NEON KID.</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    #input::placeholder {
        color: #676767;
    }
    #video-container iframe {
        width: 91vw;
        height: 100vh;
        border: none; 
    }
</style>