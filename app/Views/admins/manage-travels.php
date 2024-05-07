<?= $this->extend('layout/template'); ?>

<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto py-8 px-4">
  <div class="bg-redblood text-white rounded-t-lg py-4 px-6 my-6">
    <h1 class="text-2xl font-bold">Manage Travels</h1>
  </div>

  <section class="mb-8 px-4">
    <div class="flex justify-between items-center mb-5">
      <h2 class="text-xl font-semibold">Your Travel Posts</h2>
      <button class="bg-redblood text-white font-medium px-4 py-[6px] rounded-md">New Travel</button>
    </div>

    <!-- Travel List -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <!-- Travel Post Cards -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Travel Post Image -->
        <img src="https://via.placeholder.com/800x400" alt="Travel Post Image" class="w-full h-48 object-cover">
        <!-- Travel Post Image -->
        <!-- Travel Post Details -->
        <div class="p-4">
          <h3 class="text-lg font-semibold pb-1 overflow-hidden whitespace-nowrap overflow-ellipsis">Trip to
            Destination</h3>
          <div class="flex items-center text-redblood mb-6">
            <i class="far fa-calendar mr-3"></i>
            <p>July 1, 2024</p>
          </div>
          <!-- Action Buttons -->
          <div class="flex items-center">
            <button class="bg-redblood font-medium text-white px-4 py-[6px] rounded-md mr-2">Edit</button>
            <button class="bg-gray-300 font-medium text-gray-700 px-4 py-[6px] rounded-md">Delete</button>
          </div>
          <!-- Action Buttons -->
        </div>
        <!-- Travel Post Details -->
      </div>
      <!-- Travel Post Cards -->
    </div>
    <!-- Travel List -->
  </section>
</div>

<?= $this->endSection(); ?>