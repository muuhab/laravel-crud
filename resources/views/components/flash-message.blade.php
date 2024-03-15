@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
        class="fixed bottom-4 right-4 transform  bg-zinc-600 text-white px-48 py-3 rounded-lg">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif
