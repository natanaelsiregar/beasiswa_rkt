@extends('layouts.app')
@section('title','Beasiswa Eksternal')
@section('background', 'bg-white')

<script src="{{ asset('js/tabs.js') }}">
    // Initialization for ES Users
    import {
        Carousel,
        initTE,
    } from "tw-elements";

    initTE({
        Carousel
    });
</script>


@section('content')
<h1 class="text-center font-bold text-3xl pt-1 text-white mt-10" style="color: #0D285F;">Jenis Beasiswa</h1>
<h1 class="text-center font-bold text-3xl pt-1 text-white mb-10 " style="color: #0D285F;">Eksternal</h1>

@php
$id = 1;
// split the description and store it in an array
foreach($sponsorship as $item){
$list = explode(";", $item->description);
$item->description = $list;
}
@endphp
@foreach($sponsorship as $item)
<div class="container w-3/4 m-auto px-10">
    <h1 class="text-3xl font-bold pb-5 ">{{$id}}. {{$item->title}}</h1>
    @if(
    $item->image == "-"
    )
    @else
    <img class="px-16" src="{{$item->image}}" alt="beasiswa">
    @endif
    <p class="px-10 py-3">
        @foreach($item->description as $desc)
    <p class="py-1 indent-8 px-10">{{$desc}}</p>
    @endforeach
    </p>
    <hr class="my-5">
</div>
@php
$id++;
@endphp
@endforeach

<div class="w-4/4 m-auto px-10 pb-20">
    @if($eksternalBeasiswa->isEmpty())

    <div class="">
        <div class="container">
            <img src="{{url(asset('assets/kosong.png'))}}" alt="Logo perusahaan" style="margin: 20px auto;">
            <h1 class="text-center font-bold text-1xl text-gray-400" style="margin: 20px auto;">
                Tidak ada pendaftaran beasiswa yang tersedia untuk saat ini!
            </h1>
        </div>

        @else
        <!-- CAROUSEL -->
        <div id="carouselExampleControls" class="relative" data-te-carousel-init data-te-carousel-slide>
            <!--Carousel items-->
            <div class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
                <!--First item-->
                <div class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none" data-te-carousel-item data-te-carousel-active>
                    <img src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp" class="block w-full" alt="Wild Landscape" />
                </div>
                <!--Second item-->
                <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none" data-te-carousel-item>
                    <img src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp" class="block w-full" alt="Camera" />
                </div>
                <!--Third item-->
                <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none" data-te-carousel-item>
                    <img src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp" class="block w-full" alt="Exotic Fruits" />
                </div>
            </div>

            <!--Carousel controls - prev item-->
            <button class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none" type="button" data-te-target="#carouselExampleControls" data-te-slide="prev">
                <span class="inline-block h-8 w-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </span>
                <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
            </button>
            <!--Carousel controls - next item-->
            <button class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none" type="button" data-te-target="#carouselExampleControls" data-te-slide="next">
                <span class="inline-block h-8 w-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </span>
                <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
            </button>
        </div>




        <div class="container w-3/4 m-auto px-10 pb-20">
            @foreach($eksternalBeasiswa as $key => $value)
            <section class="text-gray-600 body-font">
                <div class="container flex flex-wrap px-2 py-10 mx-auto items-center">
                    <div class="md:w-1/2 md:pr-12 md:py-8 md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-gray-200">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">
                            <a href="{{$value->registration_link}}">
                                {{$value->title}}
                            </a>
                        </h1>
                        <p class="leading-relaxed text-justify">
                            {{limit_text($value->caption, 20)}}
                        </p>
                    </div>
                    <div class="flex flex-col md:w-1/2 md:pl-12">
                        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                            <a href="{{$value->registration_link}}">
                                <img alt="team" class="flex-shrink-0 rounded-lg w-full h-59 object-cover object-center mb-4" src="https://avpn.asia/wp-content/uploads/2019/12/Tanoto-logo-green.png">
                            </a>
                        </div>
                        <form action="{{route('daftar-beasiswa')}}" method="GET" class="w-2/4 px-5 pt-4 pb-5">
                            <button class="inline-flex items-center text-white text-center font-semibold bg-blue-500 hover:bg-blue-700 px-4 py-1 rounded-md" type="submit" style="background-color: #F49D1A;">Daftar
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </section>
            @endforeach
        </div>
        <div>
            <div class="table-auto">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto rounded-lg">
                            <table class="min-w-full text-left text-sm font-medium">
                                <thead class="border-b font-medium dark:border-neutral-500" style="background-color: #F49D1A;">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">No</th>
                                        <th scope="col" class="px-6 py-4">Jenis Beasiswa</th>
                                        <th scope="col" class="px-6 py-4">Syarat Semester</th>
                                        <th scope="col" class="px-6 py-4">Kuota</th>
                                        <th scope="col" class="px-6 py-4">Syarat IP</th>
                                        <th scope="col" class="px-6 py-4">Besar Beasiswa</th>
                                        <th scope="col" class="px-6 py-4">Prioritas Berdasarkan Ekonomi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">1</td>
                                        <td class="whitespace-nowrap px-6 py-4">Bidikmisi</td>
                                        <td class="whitespace-nowrap px-6 py-4">Mahasiswa yang mendaftar sejak masih SMA (ditetapkan pemerintah)</td>
                                        <td class="whitespace-nowrap px-6 py-4">6</td>
                                        <td class="whitespace-nowrap px-6 py-4">2,75</td>
                                        <td class="whitespace-nowrap px-6 py-4">SPP: 2,4 Juta
                                            Uang saku: 3,9 Juta</td>
                                        <td class="whitespace-nowrap px-6 py-4">N/A</td>
                                    </tr>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">2</td>
                                        <td class="whitespace-nowrap px-6 py-4">BBP - Kopertis</td>
                                        <td class="whitespace-nowrap px-6 py-4">Minimal Semester 2</td>
                                        <td class="whitespace-nowrap px-6 py-4">10-15</td>
                                        <td class="whitespace-nowrap px-6 py-4">2,75</td>
                                        <td class="whitespace-nowrap px-6 py-4">Uang saku: 2,4 juta</td>
                                        <td class="whitespace-nowrap px-6 py-4">4</td>
                                    </tr>
                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">3</td>
                                        <td class="whitespace-nowrap px-6 py-4">Tanoto Foundation</td>
                                        <td class="whitespace-nowrap px-6 py-4">Mahasiswa Baru</td>
                                        <td class="whitespace-nowrap px-6 py-4">5 - 6</td>
                                        <td class="whitespace-nowrap px-6 py-4">2,75</td>
                                        <td class="whitespace-nowrap px-6 py-4">SPP: Full
                                            Uang saku: 3,6 juta</td>
                                        <td class="whitespace-nowrap px-6 py-4">2</td>
                                    </tr>
                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">4</td>
                                        <td class="whitespace-nowrap px-6 py-4">Rajawali Foundation</td>
                                        <td class="whitespace-nowrap px-6 py-4">Mahasiswa Baru</td>
                                        <td class="whitespace-nowrap px-6 py-4">5</td>
                                        <td class="whitespace-nowrap px-6 py-4">2,75</td>
                                        <td class="whitespace-nowrap px-6 py-4">SPP: Full</td>
                                        <td class="whitespace-nowrap px-6 py-4">3</td>
                                    </tr>
                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">5</td>
                                        <td class="whitespace-nowrap px-6 py-4">Inalum</td>
                                        <td class="whitespace-nowrap px-6 py-4">Minimal Semester Baru</td>
                                        <td class="whitespace-nowrap px-6 py-4">7</td>
                                        <td class="whitespace-nowrap px-6 py-4">3</td>
                                        <td class="whitespace-nowrap px-6 py-4">Uang makan, uang kuliah. uang asrama: Full</td>
                                        <td class="whitespace-nowrap px-6 py-4">1</td>
                                    </tr>
                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">6</td>
                                        <td class="whitespace-nowrap px-6 py-4">BNI</td>
                                        <td class="whitespace-nowrap px-6 py-4">Minimal Semester Baru</td>
                                        <td class="whitespace-nowrap px-6 py-4">10</td>
                                        <td class="whitespace-nowrap px-6 py-4">2,5</td>
                                        <td class="whitespace-nowrap px-6 py-4">Uang makan, uang kuliah. uang asrama: Full</td>
                                        <td class="whitespace-nowrap px-6 py-4">1</td>
                                    </tr>
                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">7</td>
                                        <td class="whitespace-nowrap px-6 py-4">Internal (Alumni)</td>
                                        <td class="whitespace-nowrap px-6 py-4">Minimal Semester Baru</td>
                                        <td class="whitespace-nowrap px-6 py-4">ALL</td>
                                        <td class="whitespace-nowrap px-6 py-4"></td>
                                        <td class="whitespace-nowrap px-6 py-4"></td>
                                        <td class="whitespace-nowrap px-6 py-4">Joker</td>
                                    </tr>
                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">8</td>
                                        <td class="whitespace-nowrap px-6 py-4">Pelido</td>
                                        <td class="whitespace-nowrap px-6 py-4">Minimal Semester Baru</td>
                                        <td class="whitespace-nowrap px-6 py-4">ALL</td>
                                        <td class="whitespace-nowrap px-6 py-4"></td>
                                        <td class="whitespace-nowrap px-6 py-4"></td>
                                        <td class="whitespace-nowrap px-6 py-4">Joker</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    @endsection