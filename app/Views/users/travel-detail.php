<?= $this->extend('layout/template'); ?>

<?= $this->section('content') ?>
<!-- Detail Container -->
<div class="bg-lightgrey min-h-screen mt-[86px] mb-8 mx-5 flex justify-center font-poppins">
    <div class="max-w-3xl w-full">
        <!-- Back Button -->
        <div class="pt-2 pb-6">
            <a href="<?= site_url('/') ?>" class="flex items-center text-redblood">
                <i class="fas fa-arrow-left mr-3"></i>
                <p class="font-medium">Back to Home</p>
            </a>
        </div>
        <!-- Back Button -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-redblood px-6 py-4">
                <h1 class="text-white text-2xl font-bold">Travel Details</h1>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <!-- Memo title -->
                    <h2 class="text-xl font-semibold mb-2"><?= $travelDetail['title'] ?></h2>
                    <!-- Memo title -->
                    <!-- Date & User Row -->
                    <div class="flex flex-col md:flex-row items-start md:items-center mb-2">
                        <div class="flex items-center mr-8 mb-2 md:mb-0">
                            <i class="far fa-calendar text-redblood text-lg mr-3"></i>
                            <p class="text-redblood font-medium"><?= date('F j, Y', strtotime($travelDetail['created_at'])) ?></p>
                        </div>
                        <div class="flex items-center">
                            <i class="far fa-user text-redblood text-lg mr-3"></i>
                            <p class="text-redblood font-medium"><?= $travelDetail['username'] ?></p>
                        </div>
                    </div>
                    <!-- Date & User Row -->
                </div>
                <!-- Memo Image & Location -->
                <div class="mb-8 relative">
                    <img src="<?= base_url($travelDetail['thumbnail']) ?>" alt="Destination Image" class="w-full rounded-lg">
                    <div class="absolute bottom-0 right-0 bg-darkgrey text-white px-2 py-1 bg-opacity-50 rounded-br-lg">
                        <p class="text-xs md:text-sm lg:text-base">Taken at: <?= $travelDetail['address'] ?></p>
                    </div>
                </div>
                <!-- Memo Image & Location -->
                <!-- Memo Description -->
                <div>
                    <h3 class="text-lg font-semibold mb-2">Description</h3>
                    <p class="text-gray-700"><?= $travelDetail['description'] ?></p>
                </div>
                <!-- Memo Description -->
            </div>
        </div>
    </div>
</div>
<!-- Detail Container -->

<?= $this->endSection(); ?>