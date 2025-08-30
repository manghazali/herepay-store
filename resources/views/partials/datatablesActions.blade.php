{{-- View is always available --}}

@can($viewGate)
<a class="btn btn-xs btn-primary" href="{{ route('admin.' . $crudRoutePart . '.show', $row->id) }}" title="View" style="transition: background 0.2s;" onmouseover="this.style.background='#286090'" onmouseout="this.style.background=''">
    <i class="fa fa-eye"></i>
</a>
@endcan

@can($editGate)
<a class="btn btn-xs btn-info" href="{{ route('admin.' . $crudRoutePart . '.edit', $row->id) }}" title="Edit" style="transition: background 0.2s;" onmouseover="this.style.background='#1b6d85'" onmouseout="this.style.background=''">
    <i class="fa fa-edit"></i>
</a>
@endcan
@if(isset($cancelGate) && !empty($cancelGate))
@can($cancelGate)
<!-- Cancel Button triggers modal -->
<button type="button" class="btn btn-xs btn-warning" title="Cancel" style="transition: background 0.2s;" onmouseover="this.style.background='#ec971f'" onmouseout="this.style.background=''" data-toggle="modal" data-target="#cancelModal-{{ $row->id }}">
    <i class="fa fa-ban"></i>
</button>
<!-- Cancel Modal (same as before) -->
<div class="modal fade" id="cancelModal-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel-{{ $row->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.' . $crudRoutePart . '.cancel') }}?id={{ $row->id }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
            @csrf
            <input type="hidden" name="_method" value="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelModalLabel-{{ $row->id }}">Cancel Reason</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cancel_reason_{{ $row->id }}">Reason for cancellation</label>
                        <textarea name="cancel_reason" id="cancel_reason_{{ $row->id }}" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning btn-sm">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endcan
@endif

@if(isset($cancelGate) && !empty($cancelGate))
@can($cancelGate)
<!-- Cancel Button triggers modal -->
<button type="button" class="btn btn-xs btn-warning" title="Cancel" style="transition: background 0.2s;" onmouseover="this.style.background='#ec971f'" onmouseout="this.style.background=''" data-toggle="modal" data-target="#cancelModal-{{ $row->id }}">
    <i class="fa fa-ban"></i>
</button>
<!-- Cancel Modal (same as before) -->
<div class="modal fade" id="cancelModal-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel-{{ $row->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.' . $crudRoutePart . '.cancel') }}?id={{ $row->id }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
            @csrf
            <input type="hidden" name="_method" value="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelModalLabel-{{ $row->id }}">Cancel Reason</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cancel_reason_{{ $row->id }}">Reason for cancellation</label>
                        <textarea name="cancel_reason" id="cancel_reason_{{ $row->id }}" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning btn-sm">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endcan
@endif

{{-- No actions for rejected except view --}}