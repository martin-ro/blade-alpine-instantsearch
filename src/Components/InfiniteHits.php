<?php

namespace MartinRo\BladeInstantSearch\Components;

class InfiniteHits extends Widget
{
    public bool $autoLoadMore;

    public function __construct(
        ?bool $escapeHTML = null,
        ?bool $autoLoadMore = false,
    ) {
        $this->autoLoadMore = $autoLoadMore;

        $this->setWidgetData(array_filter(compact(
            'escapeHTML',
            'autoLoadMore',
        )));
    }

    public function render()
    {
        return view('instantsearch::infinite-hits');
    }

    protected function widgetDefaults() : string
    {
        return '{ hits: [], results: {}, isFirstPage: true, isLastPage: false, sendEvent: null, widgetParams: null }';
    }
}
