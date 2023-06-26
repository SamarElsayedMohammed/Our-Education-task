<x-app-component pageTitle="create new user">
    <x-includes.breadcrumb pageTitle="Users">
        <x-slot:links>
            <li class="breadcrumb-item"><a href="#">Edit</a></li>
        </x-slot:links>
    </x-includes.breadcrumb>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Edit user</h3>
                <div class="tile-body">
                    <form action="{{ route('users.update', $user->uuid) }}" method="POST">
                        @csrf
                        <input type="hidden" name="uuid" value="{{ $user->uuid }}">
                        @include('users.__form')
                        <x-form.footer label="save" route="{{route('users.index')}}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-component>
