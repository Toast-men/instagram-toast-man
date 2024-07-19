<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="category-edit-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content  border-2 border-warning">
      <div class="modal-header border-2 border-warning">
        <h5 class="modal-title text-warning" id="modalTitleId">
          <i class="fa-regular fa-pen-to-square"></i> Edit Category
        </h5>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.categories.update', $category->id)}}" method="post">
          @csrf
          @method('PATCH')
          <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control">
        
      </div>
      <div class="modal-footer border-0">
        <a href="{{route('admin.categories.index')}}" class="btn btn-outline-warning" data-bs-dismiss="modal">Cancel</a>
        <button type="submit" class="btn btn-warning" data-bs-dismiss="modal">Update</button>
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