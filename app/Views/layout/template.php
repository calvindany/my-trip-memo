<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="global.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
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
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              poppins: ["Poppins", "sans-serif"],
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
        <a class="navbar-brand" href="#">Logo</a>
        <div class="navbar-nav flex justify-end gap-7">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
          <a class="nav-link" href="#">Features</a>
          <a class="nav-link" href="#">Pricing</a>
          <a class="nav-link">Disabled</a>
        </div>
      </div>
    </nav>

    <?= $this->renderSection('content') ?>

  </body>
</html>
