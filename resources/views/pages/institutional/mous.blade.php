@extends('layouts.master')
@section('page_title', 'Institutional Linkages & Memorandums of Understanding (MoUs)')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline bg-indigo text-white">
        <h5 class="card-title"><i class="icon-link mr-2"></i> Active Institutional Linkages & Industry Collaborations</h5>
        {!! Qs::getPanelOptions() !!}
    </div>
    <div class="card-body">
        <p class="text-muted">
            VPCCECM actively maintains 14 strategic partnerships with corporate industries, government archives, state biodiversity authorities, stock exchanges, and teacher-training high schools to enrich research, community service, and student employability.
        </p>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="bg-light">
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th style="width: 280px;">Partner Organization / Institution</th>
                        <th style="width: 140px;">Signing Date / Status</th>
                        <th>Scope of Cooperation & Key Deliverables</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mous as $idx => $mou)
                    <tr>
                        <td>{{ $idx + 1 }}</td>
                        <td class="font-weight-semibold text-primary">
                            {{ $mou->partner_name }}
                        </td>
                        <td>
                            <span class="badge badge-success">{{ $mou->validity }}</span>
                            @if($mou->date_signed)
                                <div class="font-size-xs text-muted mt-1"><i class="icon-calendar mr-1"></i>{{ $mou->date_signed }}</div>
                            @endif
                        </td>
                        <td>{{ $mou->scope }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
