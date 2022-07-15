<div {{ $attributes }}>
    <div x-data="{
        capitalize(value) {
          if (!value) return '';
          return (
            value
              .toString()
              .charAt(0)
              .toLocaleUpperCase() + value.toString().slice(1)
          );
        },
        createItemKey({ attribute, value, type, operator }) {
          return [attribute, type, value, operator].join(':');
        }
    }">
        <template x-for="(item, index) in items" :key="`${item.indexName}-${item.attribute}-${index}`">
            <span class="text-sm">
                <span class="font-medium text-gray-800" x-text="capitalize(item.label) + ': '"></span>
                <template x-for="refinement in item.refinements" :key="createItemKey(refinement)">
                    <span class="space-x-2">
                        <span class="inline-flex items-center py-0.5 pl-2 pr-0.5 rounded-full text-xs font-medium bg-primary-100 text-primary-700">
                            <span x-text="refinement.label"></span>
                            <button @click="item.refine(refinement)" type="button" class="flex-shrink-0 ml-0.5 h-4 w-4 rounded-full inline-flex items-center justify-center text-primary-400 hover:bg-primary-200 hover:text-primary-500 focus:outline-none focus:bg-primary-500 focus:text-white">
                                <span class="sr-only">Remove filter</span>
                                <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                    <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                                </svg>
                            </button>
                        </span>
                    </span>
                </template>
            </span>
        </template>
    </div>
</div>
