@extends('dashboard')
@section('content')

<div id="carouselExampleIndicators" class="carousel slide" dataride="carousel" style="width: 100%; height: 86vh;">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slideto="1"></li>
            <li data-target="#carouselExampleIndicators" data-slideto="2"></li>
        </ol>
        <div class="carousel-inner" style="width: 100%; height: 86vh;">
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://img.freepik.com/free-photo/abstract-blur-defocused-bookshelf-library_1203-9640.jpg?w=900&t=st=1698697077~exp=1698697677~hmac=1a12d710da0136a68f348da615842a1d1f70266855cd129d10e3e012bf782d16" alt="First slide">
                <div class="carousel-caption">
                    <h1><span class="text-black">Selamat datang <b>{{Auth::user()->username }}</b></span></h1>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://img.freepik.com/free-photo/abstract-blur-defocused-bookshelf-library_1203-9639.jpg?w=900&t=st=1698697351~exp=1698697951~hmac=6d779c3e84460af609e92bf69eb2650f1c3ceee769b184938f8435ac54f841e5" alt="Second slide">
                <div class="carousel-caption">
                    <h1><span class="text-black">Selamat datang <b>{{Auth::user()->username }}</b></span></h1>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://img.freepik.com/free-photo/abstract-blur-defocused-bookshelf-library_1203-9642.jpg?w=900&t=st=1698697349~exp=1698697949~hmac=7088a9d4c117b844da9ad374e974e0e3a867a138cc5d3e6109560a2ee19040e3" alt="Third slide">
                <div class="carousel-caption">
                    <h1><span class="text-black">Selamat datang <b>{{Auth::user()->username }}</b></span></h1>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" ariahidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" ariahidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

@endsection