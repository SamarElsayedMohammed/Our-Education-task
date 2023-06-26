<x-app-component pageTitle="Transaction details">
    <x-includes.breadcrumb pageTitle="Transactions">
        <x-slot:links>
            <li class="breadcrumb-item"><a href="#">details</a></li>
        </x-slot:links>
    </x-includes.breadcrumb>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Transaction details</h3>
                <div class="tile-body">
                    <p> id : {{ $trans->parent_identification }}</p>
                    <hr>
                    <p> paid amount : {{ $trans->paid_amount }}</p>
                    <hr>
                    <p> status code : {{ $trans->status_code }}</p>
                    <hr>
                    <p> currency : {{ $trans->currency }}</p>
                    <hr>
                    <p> email : {{ $trans->parent_email }}</p>
                    <hr>
                    <p> payment date : {{ $trans->payment_date }}</p>
                    <table class="table data-table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>balance</th>
                                <th>currency</th>
                                <th>email</th>
                                <th>created at</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{ $trans->user->uuid }}</td>
                                <td>{{ $trans->user->balance }}</td>
                                <td>{{ $trans->user->currency }}</td>
                                <td>{{ $trans->user->email }}</td>
                                <td>{{ $trans->user->created_at }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-component>
