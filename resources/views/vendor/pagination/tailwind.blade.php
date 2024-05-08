{{-- tailwind paso a ser bootstrap y css propio --}}

{{-- Primero revisa si hay paginas generadas --}}
@if ($paginator->hasPages())
    <div class="container d-flex justify-content-center mb-3">
        <nav class="navPaginacion" style="margin-top: 2px;" role="navigation" aria-label="{{ __('Pagination Navigation') }}">

            <ul class="navPaginacion bg-light w-100">
                {{-- "Anterior" Boton --}}
                @if ($paginator->onFirstPage())
                    <span class="page-item">&lt;</span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-item"
                        aria-label="{{ __('pagination.previous') }}">
                        &lt;
                    </a>
                @endif

                <div class="d-flex ">
                    {{-- Lista de botones (Paginas) --}}

                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span class="page-item-activo" aria-disabled="true">
                                {{ $element }}
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span class="page-item-activo text-light"
                                        aria-current="page">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="page-item"
                                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>

                {{-- "Siguiente" boton --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-item"
                        aria-label="{{ __('pagination.next') }}">
                        &gt;
                    </a>
                @else
                    <span class="page-item" aria-disabled="true" aria-label="{{ __('pagination.next') }}">&gt;</span>
                @endif
            </ul>

            {{-- <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700 leading-5 dark:text-gray-400">
                        {!! __('Showing') !!}
                        @if ($paginator->firstItem())
                            <span class="font-medium">{{ $paginator->firstItem() }}</span>
                            {!! __('to') !!}
                            <span class="font-medium">{{ $paginator->lastItem() }}</span>
                        @else
                            {{ $paginator->count() }}
                        @endif
                        {!! __('of') !!}
                        <span class="font-medium">{{ $paginator->total() }}</span>
                        {!! __('results') !!}
                    </p>
                </div>
            </div> --}}
        </nav>
    </div>
@endif
