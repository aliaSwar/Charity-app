<x-layouts.app>

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
                <div class="col-14">
                    <div class="card mb-4">
                        <h5 class="card-header">{{ $sponsor->user->name }}</h5>
                        <div class="card-body">
                            <br>
                            <p class="card-text">
                                الكفيل, {{ $sponsor->user->name }}❤️
                            </p>

                            <a class="btn btn-success" href="{{ route('sponsors.show', $sponsor) }}">عرض</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xxl flex-grow-1 container-p-y">

            {{-- to send entry id to store person in database --}}
            <form action="{{ route('paids.store', $sponsor) }}" method="POST" class="row g-3 needs-validation"
                enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class=" row-cols-md-2 ">
                    <label for="validationCustom04" class="form-label ">المبلغ
                    </label>
                    <input type="text" name="amount"
                        class="form-control is-valid @error('amount') is-invalid @enderror" >
                    <span>ادخال الدفعة المالية</span>
                    @error('amount')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="row-cols-md-2">
                    <label for="validationServer02" class="form-label">صورة العقد</label>
                    <input type="file" name="image"
                        class="form-control is-valid @error('image') is-invalid @enderror" >
                    <span>التأكد من الصورة انها تحمل دفعة المال مع توقيع الاستلام</span>
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row-cols-1">
                    <label for="validationServer02" class="form-label">تاريخ الاستلام</label>
                    <input type="date" name="date_paid"
                        class="form-control is-valid @error('date_paid') is-invalid @enderror" >

                    @error('date_paid')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="btn-group-lg">
                    <div class="row mt-3">
                        <div class="d-grid gap-2 col-lg-6 mx-auto">
                            <input type="submit" class="btn btn-success" value="اختيار">
                        </div>
                    </div>
            </form>
        </div>

    </div>
</x-layouts.app>
