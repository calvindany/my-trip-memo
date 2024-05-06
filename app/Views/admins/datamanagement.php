<?= $this->extend('layout/admintemplate'); ?>


<?= $this->section('script') ?>
  <!-- Added JQuery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- !Added JQuery CDN -->

  <!-- Added Summernote Plugins -->
  <link
    href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css"
    rel="stylesheet"
  />
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#summernote").summernote({
        height: 250,
      });
      $(".dropdown-toggle").dropdown();
    });
  </script>
  <!-- !Added Summernote Plugins -->
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
    <div class="custom-container mt-[70px]">
      <div
        class="custom-content flex flex-col items-start justify-center mt-[10vh] mb-10"
      >
        <div class="w-full text-left mb-8">
          <h1 class="font-poppins font-medium text-2xl text-darkgrey mb-2">
            Add New Trip
          </h1>
          <hr class="text-black" />
        </div>
        <form action="/admin/create" enctype="multipart/form-data" method="post" class="w-full flex flex-col gap-5">
          <div class="form-control">
            <label for="title" class="text-lg">Title</label>
            <input type="text" name="title" class="p-4 text-sm rounded" />
          </div>
          <div class="form-control">
            <label for="title" class="text-lg">Address</label>
            <input type="text" name="address" class="p-4 text-sm rounded" />
          </div>
          <div class="form-control">
            <label for="title" class="text-lg">Date</label>
            <input type="date" name="date" class="p-4 text-sm rounded" />
          </div>
          <div class="form-control">
            <label for="thumbnail" class="text-lg">Thumnail Image</label>
            <input
              type="file"
              accept="image/*"
              name="thumbnail"
              class="p-4 text-sm rounded bg-white"
            />
          </div>
          <div class="form-control">
            <label for="summernote">Content</label>
            <textarea id="summernote" name="description"></textarea>
          </div>
          <button type="submit">Submit</button>
        </form>
      </div>
    </div>
<?= $this->endSection(); ?>