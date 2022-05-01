<div>
    @include('content-header', ['headerTitle' => 'Users'])
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-sm table-striped dataTable dtr-inline table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Credit</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($data->count())
                                @foreach ($data as $item)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->credit }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ \App\Models\User::roleList()[$item->is_admin] }}</td>
                                        <td class="text-center text-sm">
                                            <button class="btn btn-dark btn-sm" wire:click="updateShowModal({{ $item->id }})">
                                                Update
                                            </button>
                                            <button class="btn btn-danger text-white btn-sm" wire:click="deleteShowModal({{ $item->id }})">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="10">No Results Found</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <!-- Create & Update Modal -->
        <x-jet-dialog-modal wire:model="modalFormVisible">
            <x-slot name="title">
                {{ __('User') }}
            </x-slot>

            <x-slot name="content">
                <div class="mb-3">
                    <x-jet-label for="username" value="{{ __('Username') }}" />
                    <x-jet-input id="username" type="text" class="{{ $errors->has('username') ? 'is-invalid' : '' }}"
                                 wire:model="username" autofocus />
                    <x-jet-input-error for="username" />
                </div>
                <div class="mb-3">
                    <x-jet-label for="credit" value="{{ __('Credit') }}" />
                    <x-jet-input id="credit" type="text" class="{{ $errors->has('credit') ? 'is-invalid' : '' }}"
                                 wire:model="credit" autofocus />
                    <x-jet-input-error for="credit" />
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label>Status</label>
                        <select wire:model="status" class="form-control">
                            <option>-- Select a Status --</option>
                            @foreach(App\Models\User::statusList() as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        @error('status') <span class="error" style="color: red"">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label>Role</label>
                        <select wire:model="is_admin" class="form-control">
                            <option>-- Select a Role --</option>
                            @foreach(App\Models\User::roleList() as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        @error('is_admin') <span class="error" style="color: red"">{{ $message }}</span> @enderror
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                @if ($modelId)
                    <x-jet-button class="ms-2" wire:click="update" wire:loading.attr="disabled">
                        {{ __('Update') }}
                    </x-jet-button>
                @else
                    <x-jet-button class="ms-2" wire:click="create" wire:loading.attr="disabled">
                        {{ __('Save') }}
                    </x-jet-button>
                @endif
            </x-slot>
        </x-jet-dialog-modal>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
            <x-slot name="title">
                {{ __('Delete User') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete this User? Once the User is deleted, all of its resources and data will be permanently deleted.') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')"
                                        wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="delete" wire:loading.attr="disabled">
                    <div wire:loading wire:target="delete" class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>

                    {{ __('Delete Account') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
