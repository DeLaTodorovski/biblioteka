<?php
require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">


            <div class="mt-5 md:col-span-5 md:mt-0">
            <p class="mb-2">
            <a href="<?= realUrl('korisnici') ?>" class="text-blue-500 underline"><< назад...</a>
        </p>

            <?php if (isset($message['success'])) : ?> 
                <div class="flex justify-center items-center m-1 font-medium py-1 px-2 mb-6 rounded-md text-green-100 bg-green-700 border border-green-700 ">
            <div slot="avatar">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <div class="text-xl font-normal  max-w-full flex-initial">
                <div class="py-2">Успешно!
                    <div class="text-sm font-base"><?= $message['success'] ?></div>
                </div>
            </div>
            <div class="flex flex-auto flex-row-reverse">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-green-400 rounded-full w-5 h-5 ml-2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
            </div>
        </div>
            <?php endif; ?>

           

                <form method="POST" enctype="multipart/form-data">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                        

                        <div>
                                <label
                                    for="imeKniga"
                                    class="block text-sm font-medium text-gray-700"
                                >Име и презиме:</label>
                                <div class="mt-1">
                                <?= htmlspecialchars($note['ucenikIme']) ?> <?= htmlspecialchars($note['ucenikPrezime']) ?>
                                <input type='hidden' name='ucenikIme' value='<?= $note['ucenikIme'] ?>'>
                                <input type='hidden' name='ucenik_id' value='<?= $note['id'] ?>'>
                                </div>
                            </div>
                            <div>
                                <label
                                    for="imeKniga"
                                    class="block text-sm font-medium text-gray-700"
                                >Одделение:</label>
                                <div class="mt-1">
                                <?= htmlspecialchars($note['odd_id']) ?> одд.
                                </div>
                            </div>
                            <div>
                                <label
                                    for="imeKniga"
                                    class="block text-sm font-medium text-gray-700"
                                >Класен раководител:</label>
                                <div class="mt-1">
                                <?= htmlspecialchars($note['klasen']) ?>
                                </div>
                            </div>
                         
                            <div class="w-max">
                                <b>Статус: </b>
                                <?php
                                    if($note['stat'] === 0){
                                        echo "<div
                                        class='relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-green-500/20'>
                                        <span class=''>Активен</span>
                                        </div>";
                                    }else if($note['stat'] === 1){
                                        echo "<div
                                        class='relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-yellow-500/20'>
                                        <span class=''>Неактивен</span>
                                        </div>";
                                    }else if($note['stat'] === 2){
                                        echo "<div
                                        class='relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-red-500/20'>
                                        <span class=''>Баниран</span>
                                        </div>";
                                    }
                                ?>
                            </div>

                            <div class="w-max">

                            <div class="flex items-center justify-between ">
               <div>
               <h3 class="text-lg font-semibold text-slate-800">Задолжени книги: </h3>
               <p class="text-slate-500">Сите книги задолжени од овој ученик</p>
               </div>
           </div>
       
       </div>
       <div class="p-0">
        <table class="w-full mt-4 text-left table-auto">
           <thead>
               <tr>
               <th
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                   <p
                   class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-slate-500">
                   ID
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                       stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                       <path stroke-linecap="round" stroke-linejoin="round"
                       d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                   </svg>
                   </p>
               </th>
               <th
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                   <p
                   class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-slate-500">
                   Наслов
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                       stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                       <path stroke-linecap="round" stroke-linejoin="round"
                       d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                   </svg>
                   </p>
               </th>
               <th
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                   <p
                   class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                   Автори
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                       stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                       <path stroke-linecap="round" stroke-linejoin="round"
                       d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                   </svg>
                   </p>
               </th>
               <th
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                   <p
                   class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                   Категорија
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                       stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                       <path stroke-linecap="round" stroke-linejoin="round"
                       d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                   </svg>
                   </p>
               </th>
               <th
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                   <p
                   class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                   Година
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                       stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                       <path stroke-linecap="round" stroke-linejoin="round"
                       d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                   </svg>
                   </p>
               </th>
               <th
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                   <p
                   class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                   Одделение
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                       stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                       <path stroke-linecap="round" stroke-linejoin="round"
                       d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                   </svg>
                   </p>
               </th>
               <th
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                   <p
                   class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                   Статус
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                       stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                       <path stroke-linecap="round" stroke-linejoin="round"
                       d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                   </svg>
                   </p>
               </th>
                   <th
                           class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                       <p
                               class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                          Задолжена на
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                               <path stroke-linecap="round" stroke-linejoin="round"
                                     d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                           </svg>
                       </p>
                   </th>
                   <th
                           class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                       <p
                               class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                           Да се врати
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                               <path stroke-linecap="round" stroke-linejoin="round"
                                     d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                           </svg>
                       </p>
                   </th>
               <th
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                   <p
                   class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">Опции
                   </p>
               </th>
               </tr>
           </thead>
      <?php     $page = isset($_GET['strana'])?intval($_GET['strana']-1):0;
$number_of_pages = intval(count($knigi)/$per_page)+1;
?>
           <tbody>
         <?php foreach (array_slice($knigi, $page*$per_page, $per_page) as $kniga) : ?>
               <tr>
               <td class="p-4 border-b border-slate-200">
                   <div class="flex flex-col">
                   <p class="text-sm font-semibold text-slate-700">
                   <?= $kniga['id'] ?>
                       <input type="hidden" name="b_id" value="<?= $kniga['id'] ?>">
                   </p>
                   </div>
               </td>
               <td class="p-4 border-b border-slate-200">
                   <div class="flex items-center gap-3">


                   <div class="zoom">  <img src="<?= htmlspecialchars($kniga['slika'])  ?>"
                   class="relative inline-block h-10 w-8  object-cover object-center" />
                  </div>

                   <div class="flex flex-col">
                       <!-- <p
                       class="text-sm text-slate-500"> 
                       </p> -->
                       <p class="text-sm font-semibold text-slate-700">
                          
                          <a href="./kniga?id=<?= $kniga['id'] ?>"  class="text-blue-500 hover:underline">
                          <?= htmlspecialchars($kniga['imeKniga']) ?> </a>
                        </p>

                   </div>
                   </div>
               </td>
               <td class="p-4 border-b border-slate-200" style="width:150px">
                   <div class="flex flex-col">
                   <!-- <p class="text-sm font-semibold text-slate-700">
                       Manager
                   </p> -->
                   <p
                       class="text-sm text-slate-500">
                       <?= htmlspecialchars($kniga['avtori']) ?>
                   </p>
                   </div>
               </td>
               <td class="p-4 border-b border-slate-200">
                   <p class="text-sm text-slate-500">
                    <?= $kniga['kategorija'] === 0 ? 'Учебници' : '' ?>
                    <?= $kniga['kategorija'] === 1 ? 'Лектири' : '' ?>
                    <?= $kniga['kategorija'] === 2 ? 'Стручна литература' : '' ?>
                    <?= $kniga['kategorija'] === 3 ? 'Списанија' : '' ?>
                   </p>
               </td>
               <td class="p-4 border-b border-slate-200">
                   <p class="text-sm text-slate-500">
                   <?= htmlspecialchars($kniga['godina']) ?>
                   </p>
               </td>
               <td class="p-4 border-b border-slate-200">
                   <p class="text-sm text-slate-500">
                   <?= htmlspecialchars($kniga['oddelenie']) ?> одд.
                   </p>
               </td>
               <td class="p-4 border-b border-slate-200">
                   <div class="w-max">
                   <?php if ($kniga['stat'] === 0) : ?>
                   <div
                       class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-green-500/20">
                       <span class="">нова</span>
                   </div>
                   <?php elseif ($kniga['stat'] === 1) : ?>
                    <div
                       class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-yellow-500/20">
                       <span class="">зачувана</span>
                   </div>
                   <?php elseif ($kniga['stat'] === 2) : ?>
                    <div
                       class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-orange-500/20">
                       <span class="">стара</span>
                   </div>
                   <?php elseif ($kniga['stat'] === 3) : ?>
                    <div
                       class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-red-500/20">
                       <span class="">оштетена</span>
                   </div>
                    <?php endif;?>
                   </div>
               </td>
                   <td class="p-4 border-b border-slate-200">
                       <p class="text-sm text-slate-500">
                           <?= $zadolzena['zemena'] ?>
                       </p>
                   </td>
                   <td class="p-4 border-b border-slate-200">
                       <p class="text-sm text-slate-500">
                           <?php
                            echo dateDiffInDays(date("Y-m-d"), $zadolzena['dase_vrati']);
                           ?>
                       </p>
                   </td>

               <td class="p-4 border-b border-slate-200">
                   <button onclick="return confirm('Дали сте сигурни?');" id="razdolzi" type="submit" >
                       <svg class="w-6 h-6 text-gray-800 light:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                           <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm5.757-1a1 1 0 1 0 0 2h8.486a1 1 0 1 0 0-2H7.757Z" clip-rule="evenodd"/>
                       </svg>
                   </button>
               </td>
               </tr>
             
        <?php endforeach; ?>
           </tbody>
           </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>



<?php require('partials/footer.php') ?>
