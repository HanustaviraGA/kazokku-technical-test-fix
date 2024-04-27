<!--begin::Row 1-->
<div class="row g-5 g-xl-8">
    @php
        foreach($latest as $value){
            echo '<div class="col-xl-4">
            <!--begin::Statistics Widget 1-->
            <div class="card bgi-no-repeat card-xl-stretch mb-xl-8" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-2.svg)">
                <!--begin::Body-->
                <div class="card-body">
                    <a href="#" class="card-title fw-bolder text-muted text-hover-primary fs-4">'.$value->currency_name.'</a>
                    <div class="fw-bolder text-primary my-6">'.$value->created_at.'</div>
                    <p class="text-dark-75 fw-bold fs-5 m-0">Base : '.$value->base.'</p>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Statistics Widget 1-->
        </div>';
        }
    @endphp
    {{-- <div class="col-xl-4">
        <!--begin::Statistics Widget 1-->
        <div class="card bgi-no-repeat card-xl-stretch mb-xl-8" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-2.svg)">
            <!--begin::Body-->
            <div class="card-body">
                <a href="#" class="card-title fw-bolder text-muted text-hover-primary fs-4">Meeting Schedule</a>
                <div class="fw-bolder text-primary my-6">03 May 2020</div>
                <p class="text-dark-75 fw-bold fs-5 m-0">Great blog posts don't just happen Even the best bloggers need it</p>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Statistics Widget 1-->
    </div> --}}
</div>
<!--end::Row 1-->