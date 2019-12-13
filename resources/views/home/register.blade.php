<section class="checkout_area section_gap">
    <div class="mt-3 mb-3 p-3 container  bg-white shadow rounded">
        <h3 class="text-center mb-3">Registrasi <hr></h3>
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form class="row contact_form" action="{{ route('proses-registrasi') }}" method="post" novalidate="novalidate">
            @csrf
            <div class="col-md-12 form-group p_star">
                <label for="">Nama Lengkap</label>
                <input type="text" class="form-control" id="first" name="customer_name" required>
                <p class="text-danger">{{ $errors->first('customer_name') }}</p>
            </div>
            <div class="col-md-12 form-group p_star">
                <label for="">Password</label>
                <input type="text" class="form-control" id="first" name="customer_pass" required>
                <p class="text-danger">{{ $errors->first('customer_name') }}</p>
            </div>
            <div class="col-md-6 form-group p_star">
                <label for="">No Telp</label>
                <input type="text" class="form-control" id="number" name="customer_phone" required>
                <p class="text-danger">{{ $errors->first('customer_phone') }}</p>
            </div>
            <div class="col-md-6 form-group p_star">
                <label for="">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <p class="text-danger">{{ $errors->first('email') }}</p>
            </div>
            <div class="col-md-12 form-group p_star">
                <label for="">Alamat Lengkap</label>
                <input type="text" class="form-control" id="add1" name="customer_address" required>
                <p class="text-danger">{{ $errors->first('customer_address') }}</p>
            </div>
            <div class="col-md-12 form-group p_star">
                <label for="">Propinsi</label>
                <select class="form-control" name="province_id" id="province_id" required>
                    <option value="">Pilih Propinsi</option>
                    @foreach ($provinces as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
                <p class="text-danger">{{ $errors->first('province_id') }}</p>
            </div>
            <div class="col-md-12 form-group p_star">
                <label for="">Kabupaten / Kota</label>
                <select class="form-control" name="city_id" id="city_id" required>
                    <option value="">Pilih Kabupaten/Kota</option>
                    @foreach ($cities as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
                <p class="text-danger">{{ $errors->first('city_id') }}</p>
            </div>
            <div class="col-md-12 form-group p_star">
                <label for="">Kecamatan</label>
                <select class="form-control" name="district_id" id="district_id" required>
                    <option value="">Pilih Kecamatan</option>
                    @foreach ($districts as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
                <p class="text-danger">{{ $errors->first('district_id') }}</p>
            </div>
            <button class="ml-3 btn btn-primary">Register</button>
        </form>
    </div>
</section>