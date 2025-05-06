
<div class="p-3">
    <h6 class="fw-bold">Suggested for you</h6>

    @for ($i = 1; $i <= 5; $i++)
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="d-flex align-items-center">
            <img src="https://i.pinimg.com/170x/f1/fd/49/f1fd4947a8a4511492953bac0cb7c05b.jpg" class="rounded-circle me-2" width="40px" height="40px" alt="user">
            <div>
                <div class="fw-bold" style="font-size: 14px;">User{{ $i }}</div>
                <div class="text-muted" style="font-size: 12px;">Suggested</div>
            </div>
        </div>
        <a href="#" class="btn btn-sm btn-primary">Follow</a>
    </div>
    @endfor

    <a href="#" style="font-size: 13px;">See All</a>
</div>

