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
            <?php if($formtype == 'edit' || session('formtype') == 'edit') { ?>Edit New Trip<?php } else { ?>Add New Trip<?php } ?>
          </h1>
          <hr class="text-black" />
        </div>
        <form action="<?php if($formtype == 'edit' || session('formtype') == 'edit') { ?>/admin/update/<?= $data['pk_blog_id'] ?? '' ?><?php } else { ?>/admin/create<?php } ?>" enctype="multipart/form-data" method="post" class="w-full flex flex-col gap-5">
          <div class="form-control">
            <label for="title" class="text-lg">Title</label>
            <input type="text" name="title" class="p-4 text-sm rounded" value="<?= $data['title'] ?? (session('input.title') ?? '') ?>"/>
            <?php if(isset(session('errors')['title'])) { ?>
              <p class="text-sm font-poppins text-redblood"><?= session('errors')['title'] ?></p>
            <?php } ?>
          </div>
          <div class="form-control">
            <label for="title" class="text-lg">Address</label>
            <input type="text" name="address" class="p-4 text-sm rounded" value="<?=  $data['address'] ?? (session('input.address') ?? '') ?>" />
            <?php if(isset(session('errors')['address'])) { ?>
              <p class="text-sm font-poppins text-redblood"><?= session('errors')['address'] ?></p>
            <?php } ?>
          </div>
          <div class="form-control">
            <label for="title" class="text-lg">Date</label>
            <input type="date" name="created_at" class="p-4 text-sm rounded" value="<?= $data['created_at'] ?? (session('input.created_at') ?? '') ?>" />
            <?php if(isset(session('errors')['created_at'])) { ?>
              <p class="text-sm font-poppins text-redblood"><?= session('errors')['created_at'] ?></p>
            <?php } ?>
          </div>
          <div class="form-control">
            <div class="flex gap-x-4 items-end">
              <label for="thumbnail" class="text-lg">Thumnail Image</label>
              <?php if(isset($data['thumbnail'])) { ?><a class="text-sm text-sky-500 hover:underline hover:decoration-1" target="_blank" href="<?= base_url($data['thumbnail']) ?>">Saved Image</a><?php } ?>
            </div>
            <input
              type="file"
              accept="image/*"
              name="thumbnail"
              class="p-4 text-sm rounded bg-white"
            />
          </div>
          <div class="form-control">
            <label for="summernote" class="text-lg">Content</label>
            <textarea id="summernote" name="description"><?= $data['description'] ?? (session('input.description') ?? '') ?></textarea>
            <?php if(isset(session('errors')['description'])) { ?>
              <p class="text-sm font-poppins text-redblood"><?= session('errors')['description'] ?></p>
            <?php } ?>
          </div>
          <?php if(isset(session('errors')['message'])) { ?>
            <p class="text-sm font-poppins text-redblood"><?= session('errors')['message'] ?></p>
          <?php } ?>
          <button type="submit">Submit</button>
        </form>
      </div>
    </div>
<?= $this->endSection(); ?>