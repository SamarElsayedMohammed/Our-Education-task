<x-app-component pageTitle="create new user">
    <x-includes.breadcrumb pageTitle="Users">
        <x-slot:links>
            <li class="breadcrumb-item"><a href="#">new user</a></li>
        </x-slot:links>
    </x-includes.breadcrumb>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">create new user</h3>
                <div class="tile-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        @include('users.__form')
                        <x-form.footer label="save"  route="{{route('users.index')}}"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-component>
