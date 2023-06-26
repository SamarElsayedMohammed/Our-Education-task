<x-app-component pageTitle="transaction">
    <x-includes.breadcrumb pageTitle="Transaction">

    </x-includes.breadcrumb>

    <div class="col-md-12">

        <div class="tile">
            <div class="bs-component float-right">
                <a href="{{ route('transactions.create') }}" class="btn btn-primary" type="button">new transaction</a>
            </div>
            <div class="bs-component float-right mr-3">
                <a href="{{ route('transactions.json.file') }}" class="btn btn-primary" type="button">upload json</a>
            </div>
            <h3 class="tile-title">Transictions Table</h3>
            <x-layouts.alert type="danger" />
            <x-layouts.alert type="success" />
            {{-- <hr class="mt-5"> --}}
            <div class="table-responsive mt-5">
                <table class="table data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>paidAmount</th>
                            <th>Currency</th>
                            <th>parentEmail</th>
                            <th>statusCode</th>
                            <th>paymentDate</th>
                            <th>parentIdentification</th>
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

                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('transactions.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'paid_amount',
                            name: 'paid_amount'
                        },
                        {
                            data: 'currency',
                            name: 'currency'
                        },
                        {
                            data: 'parent_email',
                            name: 'parent_email'
                        },
                        {
                            data: 'status_code',
                            name: 'status_code'
                        },
                        {
                            data: 'payment_date',
                            name: 'payment_date'
                        },
                        {
                            data: 'parent_identification',
                            name: 'parent_identification'
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
