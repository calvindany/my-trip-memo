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

        <button
            class="text-sm lg:text-base px-5 py-2 lg:px-8 lg:py-3 rounded-md bg-redblood text-xs lg:text-base lg:font-medium text-lightgrey"
        >
            Go To My Journey
        </button>
    </div>
</div>

<!-- Card List -->
<div class="custom-container py-16">
    <div class="custom-content">
        <div class="mb-8">
            <h1 class="font-poppins uppercase font-medium text-2xl text-darkgrey mb-2">
                Journey Memo
            </h1>
            <hr class="border text-black" />
        </div>
        <div class="card-list-container">
            <!-- Card 1 -->
            <div class="max-w-[380px] rounded overflow-hidden shadow-lg bg-white col-span-12 md:col-span-6 lg:col-span-4">
                <img
                    class="w-full h-[200px]"
                    src="https://via.placeholder.com/200"
                    alt="Sunset in the mountains"
                />
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Card Title</div>
                    <p class="text-gray-700 text-base">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Voluptatibus quia, nulla! Maiores et perferendis eaque,
                    exercitationem praesentium nihil.
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <button class="bg-redblood hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Learn More
                    </button>
                </div>
            </div>
            <!-- !Card 1 -->
            <!-- Card 2 -->
            <div class="max-w-[380px] rounded overflow-hidden shadow-lg bg-white col-span-12 md:col-span-6 lg:col-span-4">
                <img
                    class="w-full h-[200px]"
                    src="https://via.placeholder.com/200"
                    alt="Sunset in the mountains"
                />
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Card Title</div>
                    <p class="text-gray-700 text-base">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Voluptatibus quia, nulla! Maiores et perferendis eaque,
                    exercitationem praesentium nihil.
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <button class="bg-redblood hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Learn More
                    </button>
                </div>
            </div>
            <!-- !Card 2 -->
            <!-- Card 3 -->
            <div class="max-w-[380px] rounded overflow-hidden shadow-lg bg-white col-span-12 md:col-span-6 lg:col-span-4">
                <img
                    class="w-full h-[200px]"
                    src="https://via.placeholder.com/200"
                    alt="Sunset in the mountains"
                />
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Card Title</div>
                    <p class="text-gray-700 text-base">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Voluptatibus quia, nulla! Maiores et perferendis eaque,
                    exercitationem praesentium nihil.
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <button class="bg-redblood hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Learn More
                    </button>
                </div>
            </div>
            <!-- !Card 3 -->
        </div>
    </div>
</div>
<!-- !Card List -->

<?= $this->endSection(); ?>

