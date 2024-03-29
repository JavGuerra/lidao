<div>
    <div x-data="{ showBanner: @entangle('bannerClicked') }"
        x-show="!showBanner"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform"
        x-transition:leave-end="opacity-0 transform"
        class="fixed bottom-0 inset-x-0 pb-2 sm:pb-5">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="p-2 rounded-lg bg-indigo-600 shadow-lg sm:p-3">
                <div class="flex items-center justify-between flex-wrap">
                    <div class="w-0 flex-1 flex items-center">
                        <span class="flex p-2 rounded-lg bg-indigo-800">
                            <svg lass="h-6 w-6 text-white" width="24" height="24" viewBox="0 0 6.35 6.35" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" aria-hidden="true">
                                <g transform="translate(-29.816 35.362)">
                                    <path d="m32.699-29.025c-0.47849-0.04561-0.95717-0.20506-1.3638-0.4543-0.40886-0.2506-0.80273-0.64437-1.0534-1.0531-0.57122-0.93151-0.62075-2.0958-0.13077-3.0744 0.25779-0.51485 0.69152-0.98693 1.1842-1.2889 0.62818-0.38502 1.3876-0.54058 2.1106-0.43236 0.2253 0.03373 0.2834 0.07805 0.2834 0.21623 0 0.09385-0.02225 0.12912-0.11597 0.18379-0.08624 0.05031-0.1428 0.10783-0.18483 0.18796-0.02926 0.05578-0.03395 0.07932-0.03395 0.1702 0 0.08999 0.0048 0.11457 0.03272 0.16751 0.04792 0.09086 0.11552 0.15177 0.22801 0.20544 0.08317 0.03968 0.10456 0.05618 0.12886 0.0994 0.02669 0.04748 0.02821 0.05922 0.01818 0.14027-6e-3 0.04865-0.01042 0.14429-0.0098 0.21253 0.0019 0.20392 0.07568 0.37358 0.22896 0.52682 0.15328 0.15324 0.32298 0.22696 0.52695 0.2289 0.06826 6.5e-4 0.16393-0.0037 0.21259-0.0098 0.08107-0.01004 0.09281-0.0085 0.1403 0.01818 0.04322 0.02429 0.05973 0.04567 0.09942 0.12882 0.05368 0.11246 0.1146 0.18004 0.20549 0.22795 0.05295 0.02791 0.07754 0.03272 0.16755 0.03272 0.0909 0 0.11445-0.0047 0.17024-0.03395 0.08015-0.04202 0.13768-0.09857 0.188-0.18479 0.05469-0.09369 0.08997-0.11594 0.18384-0.11594 0.13822 0 0.18256 0.05808 0.21629 0.28332 0.10825 0.72283-0.04735 1.482-0.43247 2.11-0.25066 0.40876-0.64453 0.80253-1.0534 1.0531-0.57673 0.35349-1.281 0.5178-1.9471 0.4543zm0.55409-0.3958c0.53761-0.0533 1.0422-0.2569 1.468-0.59236 0.11301-0.08903 0.35543-0.33139 0.44448-0.44437 0.38697-0.49095 0.60525-1.1091 0.60525-1.7141 0-0.13398 0.01082-0.12731-0.11858-0.07312-0.20693 0.08666-0.46462 0.06694-0.66683-0.05104-0.08931-0.05211-0.21856-0.17139-0.26488-0.24444l-0.03202-0.05051-0.13837-0.0011c-0.31198-0.0024-0.62586-0.14194-0.8401-0.37334-0.2009-0.21699-0.31265-0.49426-0.3149-0.78138l-0.0011-0.13833-0.05053-0.03202c-0.07307-0.0463-0.19238-0.17552-0.24451-0.26481-0.11801-0.20216-0.13774-0.45979-0.05106-0.66667 0.05421-0.12936 0.06087-0.11854-0.07313-0.11854-0.60512 0-1.2235 0.21823-1.7145 0.6051-0.11301 0.08903-0.35544 0.33139-0.44448 0.44437-0.15476 0.19634-0.29441 0.43258-0.38889 0.65788-0.39136 0.93318-0.2433 2 0.38889 2.802 0.08905 0.11298 0.33148 0.35534 0.44448 0.44437 0.56812 0.44757 1.2897 0.66207 1.9928 0.59236zm0.04456-0.79416c-0.07061-0.01773-0.13988-0.05674-0.19036-0.10722-0.1482-0.14816-0.14741-0.40677 0.0017-0.55584 0.14991-0.14988 0.40777-0.14988 0.55768 0 0.14991 0.14988 0.14991 0.40766 0 0.55754-0.08869 0.08867-0.25113 0.13512-0.36902 0.10552zm-1.3845-0.40445c-0.13311-0.06785-0.14974-0.24549-0.03143-0.3357 0.11859-0.09043 0.29449-0.01303 0.31141 0.13705 0.01668 0.14798-0.14889 0.26547-0.27997 0.19866zm2.7801-0.39706c-0.13311-0.06785-0.14974-0.24549-0.03143-0.3357 0.11859-0.09043 0.29449-0.01303 0.31141 0.13704 0.01668 0.14799-0.14889 0.26547-0.27998 0.19866zm-3.3814-0.78674c-0.07061-0.01773-0.13988-0.05674-0.19036-0.10722-0.1482-0.14816-0.14741-0.40677 0.0017-0.55584 0.14991-0.14988 0.40777-0.14988 0.55768 0 0.14991 0.14988 0.14991 0.40766 0 0.55754-0.08869 0.08867-0.25113 0.13512-0.36902 0.10552zm1.7928-0.0074c-0.13311-0.06785-0.14974-0.24549-0.03143-0.3357 0.11859-0.09043 0.29449-0.01302 0.31141 0.13704 0.01668 0.14799-0.14889 0.26547-0.27997 0.19866zm-0.99843-1.5809c-0.07061-0.01773-0.13988-0.05674-0.19036-0.10722-0.1482-0.14816-0.14741-0.40677 0.0017-0.55584 0.14991-0.14988 0.40777-0.14988 0.55768 0 0.14991 0.14988 0.14991 0.40766 0 0.55754-0.08869 0.08867-0.25113 0.13512-0.36902 0.10552z" fill="#fff" stroke-width=".01241" />
                                </g>
                            </svg>
                        </span>
                        <p class="ml-3 font-medium text-white truncate">
                            <span class="md:hidden">
                            {{__('This website uses cookies.')}}
                            </span>
                            <span class="hidden md:inline">
                                {{__('This website uses cookies. Learn more about our privacy policy.')}}
                            </span>
                        </p>
                    </div>
                    <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                        <a href="{{route('policy.show')}}" target="_blank" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-bold text-indigo-600 bg-white hover:bg-indigo-50">
                            {{__('Learn more')}}
                        </a>
                    </div>
                    <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-2">
                        <button wire:click="bannerClicked" type="button" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white">
                            <span class="sr-only">{{__('Dismiss')}}</span>
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>