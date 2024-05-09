<?= $this->extend('layout/template'); ?>


<?= $this->section('content') ?>
<div class="hero relative mt-[70px]">
    <img class="hidden md:block w-full h-full" src="/images/pexels-pixabay-248195.jpg"alt=""/>
    
    <img class="block md:hidden w-full h-full" src="/images/mtfujifeatured.jpg" alt=""/>

    <!-- Overlay Background -->
    <div class="absolute top-0 left-0 w-full h-full bg-black opacity-50"></div>

    <!-- Text Overlay -->
    <div class="absolute top-0 w-full h-full flex flex-col justify-center items-center gap-5">
        <div class="text-center">
            <h1 class="text-2xl lg:text-6xl font-poppins font-medium text-lightgrey mb-1 lg:mb-4">
                My Trip My Advanture
            </h1>
            <p class="text-sm lg:text-base font-poppins text-lightgrey">
                Personal Blog By Kelompok Sistem Multimedia
            </p>
        </div>

        <a 
            href="#main-content"
            class="text-sm lg:text-base px-5 py-2 lg:px-8 lg:py-3 rounded-md bg-redblood text-xs lg:text-base lg:font-medium text-lightgrey"
        >
            Go To My Journey
        </a>
    </div>
</div>

<!-- Card List -->
<div class="custom-container py-16" id="main-content">
    <div class="custom-content">
        <div class="mb-8">
            <h1 class="font-poppins uppercase font-medium text-2xl text-darkgrey mb-2">
                Journey Memo
            </h1>
            <hr class="border text-black" />
        </div>
        <div class="card-list-container">
            <?php foreach ($posts as $post) : ?>
                <div class="max-w-[380px] rounded overflow-hidden shadow-lg bg-white col-span-12 md:col-span-6 lg:col-span-4">
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
                        <div class="line-clamp-4 mb-6">
                            <?= $post['description'] ?>
                        </div>
                        <!-- Action Buttons -->
                        <div class="flex items-center">
                            <a href="<?= base_url('detail/' . $post['pk_blog_id']) ?>" class="bg-redblood font-medium text-white px-4 py-[6px] rounded-md mr-2">Learn More</a>
                        </div>
                        <!-- Action Buttons -->
                    </div>
                    <!-- Travel Post Details -->
                </div>
            <?php endforeach; ?>
    </div>
</div>
<!-- !Card List -->

<?= $this->endSection(); ?>

