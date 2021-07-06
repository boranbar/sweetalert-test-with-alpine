<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12">
                        <input wire:model.debounce.500ms="search" class="form-control" type="text"
                               placeholder="Enter name,surname or email...">
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr x-data="component()">
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$user->email}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->surname}}</td>
                            <td>
                                <button type="button" class="btn btn-secondary">Edit</button>
                            </td>
                            <td>
                                <button wire:key="{{ $user->id }}" x-on:click.prevent="areYouSure({{$user->id}})" type="button" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td align="center" colspan="10" class="text-danger">User not found!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center mt-2">
                        {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    function component() {
        return {
            userID : '',
            areYouSure(id) {
                this.userID = id;
                //console.log(this.userID);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                        )
                        this.$wire.deleteUser(this.userID);
                        this.userID = '';
                    }
                    this.userID = '';
                });
            }
        }
    }
</script>
@endpush
