<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="/css/global.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
      /* width */
      ::-webkit-scrollbar {
        width: 5px;
        height: 5px;
      }

      /* Track */
      /* ::-webkit-scrollbar-track {
      } */

      /* Handle */
      ::-webkit-scrollbar-thumb {
        background: #cf3135;
        border-radius: 10px;
      }

      /* Handle on hover */
      ::-webkit-scrollbar-thumb {
        background: #cf3135;
      }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>

    <?= $this->renderSection('script') ?>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php
      // Sanitize the session data before using it
      $successMessage = isset(session('success')['message']) ? htmlspecialchars(session('success')['message']) : '';
    ?>

    <?php if(!empty($successMessage)) { ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Success',
                    text: '<?php echo $successMessage; ?>',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    <?php } ?>

    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              poppins: ["Poppins", "sans-serif"],
              pasifico: ["Pacifico", "sans-serif"]
            },
            colors: {
              redblood: "#CF3135",
              lightgrey: "#F5F5F5",
              darkgrey: "#333333",
            },
          },
        },
      };
    </script>
  </head>
  <body class="bg-lightgrey font-poppins">
    <nav
      class="nav custom-container fixed top-0 z-[100] w-full min-h-[70px] py-8 bg-transparent"
    >
      <div class="custom-content flex justify-between items-center">
        <a class="navbar-brand font-pasifico text-3xl" href="/admin">My Trip Memo</a>
        <div class="navbar-nav flex justify-end items-center gap-7">
          <a class="nav-link active" aria-current="page" href="/admin">Home</a>
          <form action="/admin/logout" method="post">
            <button type="submit" class="nav-link bg-redblood py-2 px-4 rounded text-white">Logout</button>
          </form>
        </div>
      </div>
    </nav>

    <?= $this->renderSection('content') ?>

  </body>
</html>
