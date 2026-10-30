@extends('layouts.master')
@section('page_title', 'Institutional Governance & Statutory Committees')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline bg-dark text-white">
        <h5 class="card-title"><i class="icon-tree6 mr-2"></i> Prabodhan Education Society - Institutional Ecosystem</h5>
        {!! Qs::getPanelOptions() !!}
    </div>
    <div class="card-body">
        <p class="mb-3">
            Established over three decades ago, <strong>Prabodhan Education Society</strong> administers an educational ecosystem spanning 11 institutions across Parvari, Pomburpha, and Salvador-Do-Mundo in Goa. Every institutional activity is structured to foster national pride, inculcate patriotism, and preserve <em>Bharatiya</em> cultural identity.
        </p>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-body border-top-primary">
                    <h6 class="font-weight-semibold text-primary"><i class="icon-office mr-2"></i> Institutional Motto & Vision</h6>
                    <blockquote class="blockquote blockquote-bordered py-2 pl-3 mb-0">
                        <p class="mb-1 text-bold">विद्या विनयेन शोभते (Knowledge shines with humility)</p>
                        <p class="mb-1 text-bold">विद्या सर्वस्य भूषणम् (Knowledge is the supreme ornament)</p>
                        <footer class="blockquote-footer font-italic">Tagline: "Excellence Everywhere Everytime" & "College to Village and Campus to Community"</footer>
                    </blockquote>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-body border-top-success">
                    <h6 class="font-weight-semibold text-success"><i class="icon-certificate mr-2"></i> Statutory Approvals & Accreditations</h6>
                    <ul class="list-unstyled mb-0">
                        <li><i class="icon-checkmark4 text-success mr-2"></i> <strong>NAAC Accreditation:</strong> Grade 'A+' with 3.42 CGPA (Cycle 2, 2024)</li>
                        <li><i class="icon-checkmark4 text-success mr-2"></i> <strong>NIRF Ranking:</strong> Rank Band: 201–300 (NIRF 2024)</li>
                        <li><i class="icon-checkmark4 text-success mr-2"></i> <strong>University Affiliation:</strong> Goa University under Sec 24(1) of Goa University Act 1984</li>
                        <li><i class="icon-checkmark4 text-success mr-2"></i> <strong>National Regulators:</strong> Approved by NCTE; Recognised by UGC u/s 2(f) & 12(B)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Committees Tables --}}
@foreach($committees as $boardName => $members)
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title font-weight-bold text-indigo"><i class="icon-users4 mr-2"></i> {{ $boardName }}</h5>
        {!! Qs::getPanelOptions() !!}
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr class="bg-light">
                    <th>#</th>
                    <th>Member Name</th>
                    <th>Designation in Committee</th>
                    <th>Institutional / Professional Affiliation</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $index => $m)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td class="font-weight-semibold">{{ $m->member_name }}</td>
                    <td><span class="badge badge-{{ $m->designation == 'Chairman' || $m->designation == 'Principal / Chairman' ? 'primary' : ($m->designation == 'Secretary' ? 'info' : ($m->designation == 'Treasurer' ? 'success' : 'secondary')) }}">{{ $m->designation }}</span></td>
                    <td>{{ $m->affiliation }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endforeach

@endsection
