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
                    <form action="{{ route('users.json.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group p-3">
                            <x-form.input type="file" class="form-control-file" id="exampleInputFile" name="file"
                                id="exampleInputFile" label='true' labelName='Json File' aria-describedby="fileHelp"
                                required />
                        </div>
                        <x-form.footer label="save" route="{{ route('users.index') }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-component>
