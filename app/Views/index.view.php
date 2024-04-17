<?php
require_once "../app/Views/Components/head.php";
require_once "../app/Views/Components/navbar.php";
?>
<div class="h-screen center-items bg-gradient-to-r from-blue-200 from-20% via-gray-100 via%60 to-blue-300 bg-cover bg-no-repeat backdrop-blur-2xl bckdrop-rounded-3xl" >

<div class="p-16">
<h1 class="text-left text-5xl font-bold mb-8">FancyToDo</h1>
<div>
<a href="/register">
  <button class="border border-blue-500 text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-300 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-700/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
    Get started
  </button>
</a>
</div>
</div>

 <div class="flex justify-center mt-[-px]">
  <div class="grid grid-cols- grid-rows-2">
    <a href="#" class="block max-w-sm rounded-lg border border-gray-200 bg-white p-6 shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Iepazīsti mūs:</h5>
      <p class="font-normal text-gray-700 dark:text-gray-400">Sveiki mēs esam grupas iPA22 studenti kas piedāvā unikālu iespēju ar "FancyToDo". šajā programmatūrā tu vari saglabāt savus dienas uzdevumus vai dalīties ar to, kopā ar citiem cilvēkiem un atvieglot savu dzīvi!</p>
    </a>
  </div>

  <div class="flex justify-center mt-[-px]">
  <div class="grid grid-cols- grid-rows-2">
    <a href="#" class="block max-w-sm rounded-lg border border-gray-200 bg-white p-6 shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Iepazīsti mūs:</h5>
      <p class="font-normal text-gray-700 dark:text-gray-400">Sveiki mēs esam grupas iPA22 studenti kas piedāvā unikālu iespēju ar "FancyToDo". šajā programmatūrā tu vari saglabāt savus dienas uzdevumus vai dalīties ar to, kopā ar citiem cilvēkiem un atvieglot savu dzīvi!</p>
    </a>
  </div>
</div>
</div>
</div>

<?php require_once "../app/Views/Components/footer.php"; ?>