@extends('web::layouts.grids.8-4')

@section('title', trans('buyback::global.character_contract_browser_title'))
@section('page_header', trans('buyback::global.character_contract_page_title'))

@push('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/buyback.css') }}"/>
@endpush

@section('left')
    <h5>Open Contracts</h5>
    @if($openContracts->isEmpty())
        <p>No open contracts found</p>
    @endif
    <div id="accordion-open">
        @foreach($openContracts as $contract)
            <div class="card">
                <div class="card-header border-secondary" data-toggle="collapse" data-target="#collapse_{{ $contract->contractId }}"
                     aria-expanded="true" aria-controls="collapse_{{ $contract->contractId }} id="heading_{{ $contract->contractId }}">
                    <h5 class="mb-0">
                        <div class="row">
                            <div class="col-md-10 align-left">
                                <button class="btn">
                                    <h3 class="card-title"><b>{{ $contract->contractId }}</b>
                                        | {{ date("d.m.Y", $contract->created_at->timestamp) }}
                                        ( {{ count(json_decode($contract->contractData, true)["parsed"]) }} Items )</h3>
                                </button>
                            </div>
                            <div class="ml-auto align-centered mt-1">
                                <i class="nav-icon fas fa-plus-square"></i>
                            </div>
                        </div>
                    </h5>
                </div>
                <div id="collapse_{{ $contract->contractId }}" class="collapse" aria-labelledby="heading_{{ $contract->contractId }}" data-parent="#accordion-open">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                            @foreach(json_decode($contract->contractData)->parsed as $item )
                                <tr>
                                    <td><img src="https://images.evetech.net/types/{{ $item->typeId }}/icon?size=32"/>
                                        <b>{{ number_format($item->typeQuantity,0,',', '.') }} x {{ $item->typeName }}</b>
                                        ( {!! $item->marketConfig->marketOperationType == 0 ? '-' : '+' !!}{{$item->marketConfig->percentage }}% )
                                    </td>
                                    <td class="isk-td"><span class="isk-info">{{ number_format($item->typeSum,0,',', '.') }}</span> ISK</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="align-centered"><b>Summary</b></td>
                                <td class="align-centered isk-td"><b><span class="isk-info">+
                                            {{ number_format(WipeOutInc\Seat\SeatBuyback\Helpers\PriceCalculationHelper::calculateFinalPrice(
                                                json_decode($contract->contractData, true)["parsed"]),0,',', '.') }}</span> ISK</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <h5>Closed Contracts</h5>
    @if($closedContracts->isEmpty())
        <p>No closed contracts found</p>
    @endif
    <div id="accordion-closed">
        @foreach($closedContracts as $contract)
            <div class="card">
                <div class="card-header border-secondary bg-success" data-toggle="collapse" data-target="#collapse_{{ $contract->contractId }}"
                     aria-expanded="true" aria-controls="collapse_{{ $contract->contractId }} id="heading_{{ $contract->contractId }}">
                    <h5 class="mb-0">
                        <div class="row">
                            <div class="col-md-10 align-left">
                                <button class="btn">
                                    <h3 class="card-title"><del><b>{{ $contract->contractId }}</b>
                                        | {{ date("d.m.Y", $contract->created_at->timestamp) }}
                                            ( {{ count(json_decode($contract->contractData, true)["parsed"]) }} Items )</del>
                                        - <b> Finished: {{ date("d.m.Y", $contract->updated_at->timestamp) }}</b></h3>
                                </button>
                            </div>
                            <div class="ml-auto align-centered mt-1">
                                <i class="nav-icon fas fa-plus-square"></i>
                            </div>
                        </div>
                    </h5>
                </div>
                <div id="collapse_{{ $contract->contractId }}" class="collapse" aria-labelledby="heading_{{ $contract->contractId }}" data-parent="#accordion-closed">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                            @foreach(json_decode($contract->contractData)->parsed as $item )
                                <tr>
                                    <td><img src="https://images.evetech.net/types/{{ $item->typeId }}/icon?size=32"/>
                                        <b>{{ number_format($item->typeQuantity,0,',', '.') }} x {{ $item->typeName }}</b>
                                        ( {!! $item->marketConfig->marketOperationType == 0 ? '-' : '+' !!}{{$item->marketConfig->percentage }}% )
                                    </td>
                                    <td class="isk-td"><span class="isk-info">{{ number_format($item->typeSum,0,',', '.') }}</span> ISK</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="align-centered"><b>Summary</b></td>
                                <td class="align-centered isk-td"><b><span class="isk-info">+
                                            {{ number_format(WipeOutInc\Seat\SeatBuyback\Helpers\PriceCalculationHelper::calculateFinalPrice(
                                                json_decode($contract->contractData, true)["parsed"]),0,',', '.') }}</span> ISK</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop