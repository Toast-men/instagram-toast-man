<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="category-delete-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content  border-2 border-danger">
      <div class="modal-header border-2 border-danger">
        <h5 class="modal-title text-danger" id="modalTitleId">
          <i class="fa-solid fa-trash-can"></i> Delete Category
        </h5>
      </div>
      <div class="modal-body">Are you sure you want to delete <span class="fw-bold">{{$category->name}}</span> category?
      <br>
      This action will affect all the posts under this category. Posts without category will fall under Uncategorized.</div>
      <div class="modal-footer border-0">
        <a href="{{route('admin.categories.index')}}" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</a>
        <form action="{{route('admin.categories.destroy', $category->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        
      </div>
    </div>
  </div>
</div>

<!-- Optional: Place to the bottom of scripts -->
<script>
  const myModal = new bootstrap.Modal(
    document.getElementById("modalId"),
    options,
  );
</script>