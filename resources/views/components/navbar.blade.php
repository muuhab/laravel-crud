<div class="flex items-center bg-gray-800 text-white top-0 py-3 flex-wrap justify-around bg-silver">
    <h1 class="text-lg font-semibold cursor-pointer">BakerDev App</h1>
    <x-search-form />
    <ul class="flex gap-[40px] text-m [&>li]:cursor-pointer">
        <li class="size-fit">
            <a href={{ route('products.index') }} class=" block">Products</a>
        </li>
        <li class="size-fit">
            <a href={{ route('products.create') }} class=" block">Create Product</a>
        </li>
    </ul>
</div>
