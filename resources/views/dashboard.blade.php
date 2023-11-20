@extends('layouts.app')

@section('content')
    @include('partials.breadcrumbs', ['title' => 'Dashboard'])

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            {{-- Alert Messages --}}
            @include('partials.alert')

            <!--begin::Row-->
            <div class="row g-5 g-xl-10 mb-xl-10">
                <!--begin::Col-->
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget 4-->
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Currency-->
                                    <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span>
                                    <!--end::Currency-->
                                    <!--begin::Amount-->
                                    <span
                                        class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ currency_format($data['properties_total_price']) }}</span>
                                    <!--end::Amount-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-semibold fs-6">{{ __('Property Total') }}</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-2 pb-4 d-flex align-items-center">
                            <!--begin::Chart-->
                            {{-- <div class="d-flex flex-center me-5 pt-2">
                                <div id="kt_card_widget_4_chart" style="min-width: 70px; min-height: 70px" data-kt-size="70"
                                    data-kt-line="11"></div>
                            </div> --}}
                            <!--end::Chart-->
                            <!--begin::Labels-->
                            <div class="d-flex flex-column content-justify-center w-100">
                                @foreach ($data['property_status'] as $status)
                                    <!--begin::Label-->
                                    <div class="d-flex fs-6 fw-semibold align-items-center">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-6px rounded-2 me-3 {{ $status['bg'] }}"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Label-->
                                        <div class="text-gray-500 flex-grow-1 me-4">{{ $status['name'] }}</div>
                                        <!--end::Label-->
                                        <!--begin::Stats-->
                                        <div class="fw-bolder text-gray-700 text-xxl-end">
                                            ${{ currency_format($status['total']) }}</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Label-->
                                @endforeach
                            </div>
                            <!--end::Labels-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 4-->
                    <!--begin::Card widget 5-->
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <span
                                        class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ currency_format($data['selling_requests']) }}</span>
                                </div>
                                <!--end::Info-->
                                <!--begin::Subtitle-->
                                <span
                                    class="text-gray-400 pt-1 fw-semibold fs-6">{{ __('Selling Request This Week') }}</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end px-0 pb-0">
                            <!--begin::Chart-->
                            <div id="kt_card_widget_selling_requests" class="w-100" style="height: 80px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 5-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget 6-->
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Amount-->
                                    <span
                                        class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ currency_format($data['weekly_investors']) }}</span>
                                    <!--end::Amount-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-semibold fs-6">{{ __('Weekly Investors') }}</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end px-0 pb-0">
                            <!--begin::Chart-->
                            <div id="kt_card_widget_6_chart" class="w-100" style="height: 80px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 6-->
                    <!--begin::Card widget 7-->
                    <div class="card card-flush h-md-50 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span
                                    class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ currency_format($data['weekly_customers']) }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span
                                    class="text-gray-400 pt-1 fw-semibold fs-6">{{ __('New Customers This Week') }}</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex flex-column justify-content-end pe-0">
                            <!--begin::Title-->
                            <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">{{ __('Weekly New Customers') }}</span>
                            <!--end::Title-->
                            <!--begin::Users group-->
                            <div class="symbol-group symbol-hover flex-nowrap">
                                @foreach ($data['first_five_customers'] as $user)
                                    @php
                                        $colour = random_colour();
                                    @endphp
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                        title="{{ $user->name }}">
                                        <span
                                            class="symbol-label bg-{{ $colour }} text-inverse-{{ $colour }} fw-bold">{{ name_alphabetic($user->name) }}</span>
                                    </div>
                                @endforeach

                                @if ($data['customers_after_five'] > 0)
                                    <a href="{{ route('users.index') }}" class="symbol symbol-35px symbol-circle">
                                        <span class="symbol-label bg-light text-gray-400 fs-8 fw-bold">+42</span>
                                    </a>
                                @endif

                            </div>
                            <!--end::Users group-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 7-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
                    <!--begin::Chart widget 3-->
                    <div class="card card-flush overflow-hidden h-md-100">
                        <!--begin::Header-->
                        <div class="card-header py-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">{{ __('Investment This Weel') }}</span>
                                {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span> --}}
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                            <!--begin::Statistics-->
                            <div class="px-9 mb-5">
                                <!--begin::Statistics-->
                                <div class="d-flex mb-2">
                                    <span class="fs-4 fw-semibold text-gray-400 me-1">$</span>
                                    <span
                                        class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ currency_format($data['investment_this_week']) }}</span>
                                </div>
                                <!--end::Statistics-->
                                <!--begin::Description-->
                                {{-- <span class="fs-6 fw-semibold text-gray-400">Another $48,346 to Goal</span> --}}
                                <!--end::Description-->
                            </div>
                            <!--end::Statistics-->
                            <!--begin::Chart-->
                            <div id="kt_charts_widget_3" class="min-h-auto ps-4 pe-6" style="height: 300px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Chart widget 3-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-12 mb-5 mb-xl-10">
                    <!--begin::Table Widget 4-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Card header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">{{ __('Latest 10 Transactions') }}</span>
                                {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Avg. 57 orders per day</span> --}}
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-2">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_4_table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-100px">{{ __('Type') }}</th>
                                        <th class="min-w-100px">{{ __('Gateway') }}</th>
                                        <th class="min-w-125px">{{ __('User') }}</th>
                                        <th class="min-w-100px">{{ __('Date') }}</th>
                                        <th class="min-w-100px">{{ __('Amount') }}</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">
                                    @forelse ($data['latest_transaction'] as $transaction)
                                        <tr>
                                            <td class="text-capitalize">{{ $transaction->type }}</td>
                                            <td class="text-capitalize">{{ $transaction->gateway }}</td>
                                            <td class="text-capitalize">{{ $transaction->user->name }}</td>
                                            <td class="">{{ $transaction->created_at->format('M, d Y h:i:s A') }}
                                            </td>
                                            <td class="text-capitalize">
                                                ${{ currency_format($transaction->amount) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">{{ __('No transaction yet') }}</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Table Widget 4-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
    </div>
@endsection
@push('scripts')
    @include('partials.dashboard-js')
@endpush
