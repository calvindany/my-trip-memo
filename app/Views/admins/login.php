<?= $this->extend('layout/admintemplate'); ?>

<?= $this->section('content'); ?>
    <div class="custom-container min-h-[100vh]">
      <div
        class="custom-content flex flex-col items-start justify-center h-full"
      >
        <div class="card bg-white w-full max-h-[600px] p-40">
          <div class="w-full text-left mb-8">
            <h1 class="font-poppins font-medium text-2xl text-darkgrey mb-2">
              Login
            </h1>
            <hr class="text-black" />
          </div>
          <form action="/admin/login" method="post" class="w-full flex flex-col gap-5">
            <div class="form-control">
              <label for="username">Username</label>
              <input
                type="text"
                placeholder="Input your username"
                class="p-4 border rounded"
                name="username"
                value="<?= session('input.username') ?? '' ?>"
              />
              <?php if(isset(session('errors')['username'])) { ?>
                <p class="text-sm font-poppins text-redblood"><?= session('errors')['username'] ?></p>
              <?php } ?>
            </div>
            <div class="form-control">
              <label for="username">Password</label>
              <input
                type="password"
                placeholder="Input your password"
                class="p-4 border rounded"
                name="password"
                value="<?= session('input.password') ?? '' ?>"
              />
              <?php if(isset(session('errors')['password'])) { ?>
                <p class="text-sm font-poppins text-redblood"><?= session('errors')['password'] ?></p>
              <?php } ?>
            </div>
            <?php if(isset(session('errors')['message'])) { ?>
              <p class="text-sm font-poppins text-redblood"><?= session('errors')['message'] ?></p>
            <?php } ?>
            <div class="flex justify-end">
              <button type="submit" class="bg-redblood px-10 py-3 rounded">
                Login
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
<?= $this->endSection(); ?>