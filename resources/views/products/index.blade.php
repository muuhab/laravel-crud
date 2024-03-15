@extends('layout.index')
@section('content')
    <section>
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">

            @unless (count($products) == 0)
                <ul class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($products as $product)
                        <li>
                            <a href={{ route('products.show', $product->id) }} class="group block overflow-hidden">
                                <img src={{ asset('storage/' . $product->image) }} alt=""
                                    class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]" />

                                <div class="relative bg-white pt-3">
                                    <h3 class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4">
                                        {{ $product->name }}
                                    </h3>

                                    <p class="mt-2">
                                        <span class="sr-only"> Regular Price </span>

                                        <span class="tracking-wider text-gray-900"> £{{ $product->price }} </span>
                                    </p>
                                </div>
                            </a>
                        </li>
                    @endforeach

                </ul>
            @else
                <p>No listings found</p>
            @endunless

            <div class="mt-8">
                {{ $products->links() }}
            </div>
        </div>
    </section>
@endsection
