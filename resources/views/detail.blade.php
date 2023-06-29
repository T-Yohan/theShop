@extends('layouts.theshop')

@section('main')
    <div class="py-6">
        <!-- Breadcrumbs -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center space-x-2 text-gray-400 text-sm">
                <a href="{{ route('accueil') }}" class="hover:underline hover:text-gray-600">Accueil</a>
                <span>
                    <svg class="h-5 w-5 leading-none text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
                <a href="{{ route('category', $product->category_id) }}"
                    class="hover:underline hover:text-gray-600">{{ $product->category->name }}</a>
                <span>
                    <svg class="h-5 w-5 leading-none text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
                <span>{{ $product->name }}</span>
            </div>
        </div>
        <!-- ./ Breadcrumbs -->

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
            <div class="flex flex-col md:flex-row -mx-4">
                {{-- carousel --}}
                <x-carousel-detail :images="$product->carouselImage" />
                <div class="md:flex-1 px-4">
                    <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">
                        {{ $product->name }}
                    </h2>
                    <p class="text-gray-500 text-sm">By <a href="#" class="text-indigo-600 hover:underline"> </a></p>

                    <div class="flex items-center space-x-4 my-4">
                        <div>
                            <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                                <span class="font-bold text-indigo-600 text-3xl"> {{ $product->prix }} </span>
                                <span class="text-indigo-400 mr-1 mt-1">€</span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="text-green-500 text-xl font-semibold">Save 12%</p>
                            <p class="text-gray-400 text-sm">Inclusive of all Taxes.</p>
                        </div>
                    </div>

                    <p class="text-gray-500">Lorem ipsum, dolor sit, amet consectetur adipisicing elit. Vitae exercitationem
                        porro saepe ea harum corrupti vero id laudantium enim, libero blanditiis expedita cupiditate a est.
                    </p>

                    {{-- cart --}}
                    <livewire:add-cart :product='$product'/>
                </div>
            </div>
        </div>
    </div>


    <script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js'></script>
@endsection