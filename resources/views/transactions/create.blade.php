<x-app-component pageTitle="create new transaction">
    <x-includes.breadcrumb pageTitle="Transactions">
        <x-slot:links>
            <li class="breadcrumb-item"><a href="#">new transaction</a></li>
        </x-slot:links>
    </x-includes.breadcrumb>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">create new transaction</h3>
                <div class="tile-body">
                    <form action="{{ route('transactions.store') }}" method="POST">
                        @csrf

                        @include('transactions.__form')
                        <x-form.footer label="save" route="{{route('transactions.index')}}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-component>
