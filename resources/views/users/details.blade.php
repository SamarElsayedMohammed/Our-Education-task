<x-app-component pageTitle="create new user">
    <x-includes.breadcrumb pageTitle="Users">
        <x-slot:links>
            <li class="breadcrumb-item"><a href="#">details</a></li>
        </x-slot:links>
    </x-includes.breadcrumb>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">user details</h3>
                <div class="tile-body">
                    <p> uuuid : {{ $user->uuid }}</p>
                    <hr>
                    <p> balance : {{ $user->balance }}</p>
                    <hr>
                    <p> currency : {{ $user->currency }}</p>
                    <hr>
                    <p> email : {{ $user->email }}</p>
                    <hr>
                    <p> created_at : {{ $user->created_at }}</p>
                    <table class="table data-table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>paid amount</th>
                                <th>currency</th>
                                <th>parent email</th>
                                <th>status code</th>
                                <th>payment date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->transactions as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->paid_amount }}</td>
                                    <td>{{ $item->currency }}</td>
                                    <td>{{ $item->parent_email }}</td>
                                    <td>{{ $item->status_code }}</td>
                                    <td>{{ $item->payment_date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-component>
