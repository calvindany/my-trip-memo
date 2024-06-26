<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="/css/global.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    
    <!-- Google Font Poppins -->
    <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:wght@400;500;600&display=swap"
    rel="stylesheet"
    />

    <!-- Google Font Pacifico -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">


     <!-- Font Awesome -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
      html {
        scroll-behavior: smooth;
      }

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

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              poppins: ["Poppins", "sans-serif"],
              pasifico: ["Pacifico", "sans-serif"],
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
      class="nav custom-container fixed top-0 z-[100] w-full min-h-[70px] bg-transparent"
    >
      <div class="custom-content flex justify-between items-center">
        <a class="navbar-brand font-pasifico text-3xl" href="/">My Trip Memo</a>
      </div>
    </nav>

    <?= $this->renderSection('content') ?>

  </body>
</html>
