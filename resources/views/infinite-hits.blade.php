<div {{ $attributes }}>

    <template x-for="(hit, index) in hits" :key="hit.objectID">
        {{ $slot }}
    </template>

    @if($autoLoadMore)
        <span x-data="{
                observe () {
                    if (isFirstRender) {
                        const observer = new IntersectionObserver(entries => {
                            entries.forEach(entry => {
                                if (entry.isIntersecting) {
                                    if (entry.isIntersecting && !isLastPage) {
                                        if (typeof showMore === 'function') {
                                            showMore();
                                        }
                                    }
                                }
                            });
                        });

                        observer.observe(this.$el);
                    }
                }
            }"
             x-init="observe"
        ></span>
    @endif

    <button x-text="'Show more'"
            @click="showMore"
            :disabled="!isFirstRender && isLastPage"
            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700">
    </button>
</div>
