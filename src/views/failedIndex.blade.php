@extends('QueueView::master')

@section('content')
    <table class="table table-bordered" id="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Queue</th>
                <th>Connection</th>
                <th>Payload</th>
                <th>Failed At</th>
                <th>Action</th> 
         	</tr>
        </thead>
    </table>
@stop

@push('scripts')
<script>
$(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        "pageLength":{{config('QueueView.perPage')}},
        ajax: '{!! route(config('QueueView.route').'.failed.get') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'queue', name: 'queue' },
            { data: 'connection', name: 'connection' },
            { data: 'payload', name: 'payload' },
            { data: 'failed_at', name: 'failed_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false},
           
        ]
    });
});
</script>
@endpush
