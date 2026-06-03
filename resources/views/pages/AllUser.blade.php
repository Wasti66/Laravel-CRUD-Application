@extends('layout.app')

@section('Content')
    @include('components.table')
@endsection

@push('scripts')
<script>
    let table;

    $(document).ready(function () {
        table = $('#userTable').DataTable({
            responsive: true,
            pageLength: 5,
            
        });

        loadUsers();
    });
    async function loadUsers() {
        try {
            let res = await axios.get("/AllUser");
            let users = res.data.data;

            table.clear();

            users.reverse().forEach(item => {
                table.row.add([
                    item.name,
                    item.email,
                    item.phone ?? 'N/A',
                    item.address ?? 'N/A',
                    `
                        <a style="color:green; margin-right:10px;" href="/UpdateUser/${item.id}">
                            Edit
                        </a>

                        <a style="color:red;" href="" onclick="deleteUser(${item.id})">
                            Delete 
                        </a>
                    `
                ]);
            });

            table.draw();

        } catch (error) {
            console.log(error);
        }
    }
    async function deleteUser(id) {
        try {
            await axios.delete(`/DeleteUser/${id}`);

            alert("User deleted");

            loadUsers();

        } catch (error) {
            console.log(error);
            alert("Delete failed");
        }
    }
    
</script>
@endpush