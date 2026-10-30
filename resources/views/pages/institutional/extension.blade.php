@extends('layouts.master')
@section('page_title', 'National Service Scheme (NSS) & Community Extension Logs')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-body bg-slate-700 text-white">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-lifebuoy icon-3x"></i>
                </div>
                <div class="media-body">
                    <h5 class="media-title font-weight-semibold">National Service Scheme (NSS) — 3 Units | 300 Volunteers</h5>
                    <p class="mb-0 opacity-75">
                        Represented by the Konark Sun Temple chariot wheel embossed on the badge. Over 41.6% of VPCCECM students actively engage in social upliftment, disaster relief, health camps, voter awareness, and environmental stewardship.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title font-weight-bold"><i class="icon-list3 mr-2"></i> Documented Annual Extension & Community Outreach Activities</h5>
        {!! Qs::getPanelOptions() !!}
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="bg-light">
                <tr>
                    <th style="width: 50px;">#</th>
                    <th>Activity Title & Theme</th>
                    <th>Category</th>
                    <th>Resource Person / Dignitary</th>
                    <th>Collaborating Venue / Organization</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activities as $index => $act)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td class="font-weight-semibold text-slate-800">{{ $act->activity_title }}</td>
                    <td><span class="badge badge-info">{{ $act->category }}</span></td>
                    <td>{{ $act->resource_person ?: 'N/A' }}</td>
                    <td><i class="icon-location4 mr-1 text-danger font-size-xs"></i>{{ $act->venue ?: 'College Campus' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
