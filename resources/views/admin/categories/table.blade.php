@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0">
                <h4>Categories Table</h4>
            </div>
            <div>
                <a class="btn btn-primary m-3" href='{{ route('admin.categories.create') }}' type="button">
                    Add New Category
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
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <span class="badge bg-{{ $category->products_count > 0 ? 'warning' : 'success' }}">
                                        {{ $category->products_count }} products
                                    </span>
                                </td>
                                <td>{{ $category->created_at->format('d/m/Y') }}</td>
                                <td>{{ $category->updated_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" 
                                          class="d-inline" id="delete-form-{{ $category->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger delete-category-btn" 
                                                data-category-id="{{ $category->id }}"
                                                data-category-name="{{ $category->name }}"
                                                data-products-count="{{ $category->products_count }}">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- Modal de confirmación --}}
    <div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Category Deletion</h5>
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
            const deleteButtons = document.querySelectorAll('.delete-category-btn');
            const modal = new bootstrap.Modal(document.getElementById('deleteCategoryModal'));
            const modalMessage = document.getElementById('modal-message');
            const confirmDeleteBtn = document.getElementById('confirm-delete-btn');
            
            let currentForm = null;

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const categoryId = this.getAttribute('data-category-id');
                    const categoryName = this.getAttribute('data-category-name');
                    const productsCount = parseInt(this.getAttribute('data-products-count'));
                    
                    currentForm = document.getElementById('delete-form-' + categoryId);
                    
                    if (productsCount > 0) {
                        // Si hay productos, mostrar advertencia detallada
                        modalMessage.innerHTML = `
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> The category "<strong>${categoryName}</strong>" has <strong>${productsCount} products</strong> associated with it.
                            </div>
                            <p>If you delete this category, all associated products will lose their category assignment.</p>
                            <p><strong>Are you sure you want to continue?</strong></p>
                        `;
                    } else {
                        // Si no hay productos, confirmación normal
                        modalMessage.innerHTML = `
                            <p>Are you sure you want to delete the category "<strong>${categoryName}</strong>"?</p>
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