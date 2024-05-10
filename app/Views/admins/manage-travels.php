<?= $this->extend('layout/admintemplate'); ?>

<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto py-8 px-4 mt-[70px] mb-8">
  <div class="bg-redblood text-white rounded-t-lg py-4 px-6 my-6">
    <h1 class="text-2xl font-bold">Manage Travels</h1>
  </div>

  <section class="mb-8 px-4">
    <div class="flex justify-between items-center mb-5">
      <h2 class="text-xl font-semibold">Your Travel Posts</h2>
      <a href="<?= base_url('admin/create') ?>" class="bg-redblood text-white font-medium px-4 py-[6px] rounded-md">New Travel</a>
    </div>

    <!-- Travel List -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <!-- Travel Post Cards -->
      <?php foreach ($posts as $post) : ?>
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <!-- Travel Post Image -->
          <img src="<?= base_url($post['thumbnail']) ?>" alt="Travel Post Image" class="w-full h-48 object-cover">
          <!-- Travel Post Image -->
          <!-- Travel Post Details -->
          <div class="p-4">
            <h3 class="text-lg font-semibold pb-1 overflow-hidden whitespace-nowrap overflow-ellipsis"><?= $post['title'] ?></h3>
            <div class="flex items-center text-redblood mb-6">
              <i class="far fa-calendar mr-3"></i>
              <p><?= date('F d, Y', strtotime($post['created_at'])) ?></p>
            </div>
            <!-- Action Buttons -->
            <div class="flex items-center">
              <a href="<?= base_url('admin/update/' . $post['pk_blog_id']) ?>" class="bg-redblood font-medium text-white px-4 py-[6px] rounded-md mr-2">Edit</a>
              <a href="<?= base_url('admin/delete/' . $post['pk_blog_id']) ?>" class="bg-gray-300 font-medium text-gray-700 px-4 py-[6px] rounded-md">Delete</a>
            </div>
            <!-- Action Buttons -->
          </div>
          <!-- Travel Post Details -->
        </div>
      <?php endforeach; ?>
      <!-- Travel Post Cards -->
    </div>
    <!-- Travel List -->
  </section>
</div>

<?= $this->endSection(); ?>