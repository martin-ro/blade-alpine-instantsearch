<button {{ $attributes }}
        type="button"
        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700"
        @click="refine"
>
    {{ $slot }}
</button>
