<x-admin>
    <x-slot name="title">Edit Taksasi</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="{{ route('taksasi.index') }}">Taksasi</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </x-slot>

    <form action="{{ route('taksasi.update', $taksasi->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('admin.Taksasi._form', ['taksasi' => $taksasi])

        <button class="btn btn-warning mt-3"><i class="ti-save"></i> Update</button>
    </form>
</x-admin>
