@extends('layouts.master')
@section('page_title', 'Institutional Achievements, University Rankers & Placements')

@section('content')
<div class="row">
    <div class="col-sm-6 col-xl-4">
        <div class="card card-body bg-warning-400 text-white">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">93%</h3>
                    <span class="text-uppercase font-size-xs font-weight-bold">Overall Student Passing Rate</span>
                </div>
                <div class="ml-3 align-self-center">
                    <i class="icon-trophy3 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-4">
        <div class="card card-body bg-teal-400 text-white">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">10</h3>
                    <span class="text-uppercase font-size-xs font-weight-bold">Goa University First-Rankers</span>
                </div>
                <div class="ml-3 align-self-center">
                    <i class="icon-medal-star icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-4">
        <div class="card card-body bg-indigo-400 text-white">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">1:19</h3>
                    <span class="text-uppercase font-size-xs font-weight-bold">Teacher-to-Student Ratio</span>
                </div>
                <div class="ml-3 align-self-center">
                    <i class="icon-users4 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Academic Rankers Table --}}
@if(isset($rankers['Academic Ranker']))
<div class="card">
    <div class="card-header header-elements-inline bg-light">
        <h5 class="card-title font-weight-bold text-primary"><i class="icon-medal mr-2"></i> Goa University Academic First Rankers (2018–2023)</h5>
        {!! Qs::getPanelOptions() !!}
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Programme / Class</th>
                    <th>Cohort / Academic Year</th>
                    <th>Result / Performance</th>
                    <th>Conferring Body</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rankers['Academic Ranker'] as $idx => $r)
                <tr>
                    <td>{{ $idx + 1 }}</td>
                    <td class="font-weight-semibold text-slate-800">{{ $r->name }}</td>
                    <td><span class="badge badge-light-primary text-primary">{{ $r->programme }}</span></td>
                    <td><i class="icon-calendar22 mr-1 text-muted"></i>{{ $r->year_cohort }}</td>
                    <td><span class="badge badge-success font-weight-bold">{{ $r->achievement }}</span></td>
                    <td>{{ $r->organization }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

{{-- Sports Laurels Table --}}
@if(isset($rankers['Sports Laurel']))
<div class="card">
    <div class="card-header header-elements-inline bg-light">
        <h5 class="card-title font-weight-bold text-danger"><i class="icon-trophy mr-2"></i> National & State Athletic Champions (Sports Laurels)</h5>
        {!! Qs::getPanelOptions() !!}
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sports Person</th>
                    <th>Sport / Discipline</th>
                    <th>Year / Session</th>
                    <th>Championship Achievement</th>
                    <th>Sanctioning Body</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rankers['Sports Laurel'] as $idx => $s)
                <tr>
                    <td>{{ $idx + 1 }}</td>
                    <td class="font-weight-semibold text-danger">{{ $s->name }}</td>
                    <td>{{ $s->programme }}</td>
                    <td>{{ $s->year_cohort }}</td>
                    <td>{{ $s->achievement }}</td>
                    <td>{{ $s->organization }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

{{-- Placements Table --}}
@if(isset($rankers['Placement']))
<div class="card">
    <div class="card-header header-elements-inline bg-light">
        <h5 class="card-title font-weight-bold text-success"><i class="icon-briefcase mr-2"></i> Campus Recruitment & Corporate Placements</h5>
        {!! Qs::getPanelOptions() !!}
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cohort / Batch</th>
                    <th>Programme</th>
                    <th>Recruiting Partner</th>
                    <th>Role & Scope</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rankers['Placement'] as $idx => $p)
                <tr>
                    <td>{{ $idx + 1 }}</td>
                    <td class="font-weight-semibold">{{ $p->name }}</td>
                    <td><span class="badge badge-info">{{ $p->programme }}</span></td>
                    <td class="text-success font-weight-bold"><i class="icon-office mr-1"></i>{{ $p->organization }}</td>
                    <td>{{ $p->achievement }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@endsection
