@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0">
                <h4>Brands Table</h4>
            </div>
            <div>
                <a class="btn btn-primary m-3" href='{{ route('admin.brands.create') }}' type="button">
                    Add New Brand
                </a>
            </div>
            
            {{-- Mostrar mensajes --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('warning'))
                <div class="alert alert-warning alert-dismissible fade show m-3" role="alert">
                    {{ session('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Products Count</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>
                                    <span class="badge bg-{{ $brand->products_count > 0 ? 'warning' : 'success' }}">
                                        {{ $brand->products_count }} products
                                    </span>
                                </td>
                                <td>{{ $brand->created_at->format('d/m/Y') }}</td>
                                <td>{{ $brand->updated_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST" 
                                          class="d-inline" id="delete-form-{{ $brand->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger delete-brand-btn" 
                                                data-brand-id="{{ $brand->id }}"
                                                data-brand-name="{{ $brand->name }}"
                                                data-products-count="{{ $brand->products_count }}">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $brands->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- Modal de confirmación --}}
    <div class="modal fade" id="deleteBrandModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Brand Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modal-message"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirm-delete-btn">Delete Anyway</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-brand-btn');
            const modal = new bootstrap.Modal(document.getElementById('deleteBrandModal'));
            const modalMessage = document.getElementById('modal-message');
            const confirmDeleteBtn = document.getElementById('confirm-delete-btn');
            
            let currentForm = null;

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const brandId = this.getAttribute('data-brand-id');
                    const brandName = this.getAttribute('data-brand-name');
                    const productsCount = parseInt(this.getAttribute('data-brand-count'));
                    
                    currentForm = document.getElementById('delete-form-' + brandId);
                    
                    if (productsCount > 0) {
                        // Si hay productos, mostrar advertencia detallada
                        modalMessage.innerHTML = `
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> The brand "<strong>${brandName}</strong>" has <strong>${productsCount} products</strong> associated with it.
                            </div>
                            <p>If you delete this brand, all associated products will lose their brand assignment.</p>
                            <p><strong>Are you sure you want to continue?</strong></p>
                        `;
                    } else {
                        // Si no hay productos, confirmación normal
                        modalMessage.innerHTML = `
                            <p>Are you sure you want to delete the brand "<strong>${brandName}</strong>"?</p>
                        `;
                    }
                    
                    modal.show();
                });
            });

            confirmDeleteBtn.addEventListener('click', function() {
                if (currentForm) {
                    currentForm.submit();
                }
                modal.hide();
            });
        });
    </script>
@endsection