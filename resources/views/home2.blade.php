<x-app-component>
    <x-includes.breadcrumb pageTitle="Home">

    </x-includes.breadcrumb>
    <div class="row">
        <div class="col-md-12 col-lg-4">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Users</h4>
                    <p><b>{{ App\Models\User::count() }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Transactions</h4>
                    <p><b>{{ App\Models\Transaction::count() }}</b></p>
                </div>
            </div>
        </div>

    </div>


</x-app-component>
