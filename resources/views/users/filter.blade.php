<x-app-component pageTitle="Users">
    <x-includes.breadcrumb pageTitle="Users">
        <li class="breadcrumb-item"><a href="#">filter</a></li>
    </x-includes.breadcrumb>

    <div class="col-md-12">

        <div class="tile">
            <h3 class="tile-title">filter</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <form class="row" action="{{ route('filter.index') }}" method="POST">
                            @csrf
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="statusCode">status</label>
                                    <select class="form-control" name="statusCode" id="statusCode">
                                        <option value="" selected>----------------</option>
                                        <option value="1" @selected($statusCode == 1)>authorized</option>
                                        <option value="2" @selected($statusCode == 2)>decline</option>
                                        <option value="3" @selected($statusCode == 3)>refunded</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="currency">currency</label>
                                    <select class="form-control" name="currency" id="currency">
                                        <option value="" selected>----------------</option>
                                        <option value="SAR" @selected($currency == 'SAR')>SAR</option>
                                        <option value="AED" @selected($currency == 'AED')>AED</option>
                                        <option value="EUR" @selected($currency == 'EUR')>EUR</option>
                                        <option value="USD" @selected($currency == 'USD')>USD</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 shadow-sm p-3 mb-5 bg-white rounded ">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for=""> From price</label>
                                            <input type="number" name="price_from" id="price_from"
                                                value="{{ $price_from }}" class="form-control">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="">to price</label>
                                            <input type="number" name="price_to" id="price_to"
                                                value="{{ $price_to }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="">Date From</label>
                                            <input type="date" name="date_from" id="from-date" class="form-control"
                                                value="{{ $date_from }}">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="">Date From</label>
                                            <input type="date" name="date_to" id="to-date" class="form-control"
                                                value="{{ $date_to }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <button class="btn btn-primary" type="submit">save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <x-layouts.alert type="danger" />
            <x-layouts.alert type="success" />
            {{-- <hr class="mt-5"> --}}
            <div class="table-responsive mt-5">
                <table class="table data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>balance</th>
                            <th>currency</th>
                            <th>Email</th>
                            <th>created_at</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push('style')
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    @endpush



    @push('script')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

        <script type="text/javascript">
            $(function() {
                var csrfToken = "{{ csrf_token() }}";
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('filter.index') }}",
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        data: function(d) {
                            d.date_from = $('#from-date').val();
                            d.date_to = $('#to-date').val();
                            d.price_from = $('#price_from').val();
                            d.price_to = $('#price_to').val();
                            d.statusCode = $('#statusCode').val();
                            d.currency = $('#currency').val();

                        }
                    },

                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'balance',
                            name: 'balance'
                        },
                        {
                            data: 'currency',
                            name: 'currency'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });

            });
        </script>
    @endpush
</x-app-component>
