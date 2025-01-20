@foreach($admins as $admin)
<div id="deleteAdminModal-{{ $admin->id }}" class="modal-overlay hidden">
    <div class="modal-container">

        <div class="modal-body">
            <p class="text-gray-800 font-semibold mb-4">Are you sure you want to delete this admin?</p>
        </div>
        <div class="flex justify-center space-x-4">
            <form action="{{ route('admin.manage.admin.destroy', $admin->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-red-600">Delete</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('deleteAdminModal-{{ $admin->id }}').classList.add('hidden')">Cancel</button>
            </form>

        </div>
    </div>
</div>
@endforeach
