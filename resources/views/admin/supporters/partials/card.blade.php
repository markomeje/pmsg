<div class="p-3 bg-white icon-raduis shadow-sm d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center">
        <div class="mr-3">
            <div class="text-center text-main-dark border rounded-circle" style="height: 35px; width: 35px; line-height: 35px; background-color: {{ randomrgba() }};">
                {{ substr($supporter->firstname, 0, 1) }}
            </div>
        </div> 
        <div class="">
            <a href="{{ route('admin.supporter.profile', ['id' => $supporter->id]) }}">
                <small class="text-main-dark d-block">
                    {{ \Str::limit(ucwords($supporter->title.' '.$supporter->firstname.' '.$supporter->lastname), 12) }}
                </small>
            </a> 
            <small class="text-muted">
                {{ ucwords($supporter->created_at->diffForHumans()) }}
            </small>
        </div>
    </div> 
    <div class="rounded-circle bg-success text-center" style="height: 20px; width: 20px; line-height: 15px;">
        <small class="text-white tiny-font">
            <i class="icofont-tick-mark"></i>
        </small>
    </div>
</div>