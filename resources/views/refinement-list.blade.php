@props([
    'legend' => null,
])

<div {{ $attributes }}>
    <fieldset>
        @if($legend)
            <legend class="block text-sm font-medium text-gray-900">
                {{ $legend }}
            </legend>
        @endif

        @if($searchable)
            <div class="mt-4">
                <input type="search"
                       name="email"
                       id="email"
                       x-model="searchForFacetValues"
                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full px-2 py-1 text-sm border-gray-300 rounded-md"
                       placeholder="{{ $searchable_placeholder }}"
                >
            </div>
        @endif

        <div class="pt-3 space-y-3">
            <template x-for="item in items" :key="item.value">
                <div class="relative flex items-start">
                    <div class="min-w-0 flex-1 text-sm flex items-center">
                        <input
                            :key="item.value"
                            :id="'{{ $id }}' + '_' + item.value"
                            x-model="item.isRefined"
                            :value="item.value"
                            type="checkbox"
                            :checked="item.isRefined"
                            @change="refine($event.target.value)"
                            class="h-4 w-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500"
                        >
                        <label :for="'{{ $id }}' + '_' + item.value" x-text="item.label" class="ml-3 text-sm text-gray-600"></label>
                    </div>
                    <div class="ml-3 flex items-center h-5">
                        <span x-text="item.count"
                              class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                        </span>
                    </div>
                </div>
            </template>
        </div>
    </fieldset>

    @if($show_more)
        <button type="button"
                class="w-full pt-4 flex items-center justify-between group text-gray-500"
                aria-controls="filter-section-0"
                @click.prevent="toggleShowMore()"
                aria-expanded="false"
                x-bind:aria-expanded="isShowingMore.toString()"
        >
            <span x-text="isShowingMore ? 'Show Less' : 'Show More'" class="text-sm font-medium text-gray-500 group-hover:text-primary-500"></span>
            <span class="ml-6 h-7 flex items-center group-hover:text-primary-500">
                <svg class="rotate-0 h-5 w-5 transform" :class="{ '-rotate-180': isShowingMore, 'rotate-0': !(isShowingMore) }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </span>
        </button>
    @endif
</div>
