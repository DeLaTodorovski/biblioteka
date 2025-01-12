<?php
if (empty($_GET['strana']) || !(int)$_GET['strana'])
{
  header('Location: ?strana=1');
  exit; 
} 
?>
<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>
<?php
$strana = isset($_GET['strana'])?$_GET['strana']:0;
$total_pages = ceil($brknigi / $per_page);
?>

<main>
    <!-- <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
       
    </div> -->

    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    
    <!-- <div class="block mb-4 mx-auto border-b border-slate-300 pb-2 max-w-[360px]">
       <a target='_blank' href='https://www.material-tailwind.com/docs/html/table' class='block w-full px-4 py-2 text-center text-slate-700 transition-all '>
               More components on <b>Material Tailwind</b>.
           </a>
   </div> -->
   <?php if (isset($message['success'])) : ?> 
                <div class="flex justify-center items-center m-1 font-medium py-1 px-2 mb-6 rounded-md text-green-100 bg-green-700 border border-green-700 ">
            <div slot="avatar">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <div class="text-xl font-normal  max-w-full flex-initial">
                <div class="py-2">Success!
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

   <div class="relative flex flex-col w-full h-full text-slate-700 bg-white shadow-md rounded-xl bg-clip-border">
       <div class="relative mx-4 mt-4 overflow-hidden text-slate-700 bg-white rounded-none bg-clip-border">
           <div class="flex items-center justify-between ">
               <div>
                   <h3 class="text-lg font-semibold text-slate-800">Листа на книги</h3>
                   <p class="text-slate-500">Сите книги внесени во базата</p>
               </div>
           <div class="flex flex-col gap-2 shrink-0 sm:flex-row">
               <label
                       for="odd_id"
                       class="block text-sm font-medium text-gray-700"
               >Прикажи:</label>
               <select id="prikazi"
                       name="prikazi"
                       class="mt-1 block rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                       onchange="if (this.value) window.location.href=this.value">
                   <option value="?podredi=<?=$order?>&sort=<?= $sort ?>&strana=<?= $_GET['strana']?>&prikazi=5" <?= $per_page == 5 ? 'selected' : '' ?>>5</option>
                   <option value="?podredi=<?=$order?>&sort=<?= $sort ?>&strana=<?= $_GET['strana']?>&prikazi=10" <?= $per_page == 10 ? 'selected' : '' ?>>10</option>
                   <option value="?podredi=<?=$order?>&sort=<?= $sort ?>&strana=<?= $_GET['strana']?>&prikazi=25" <?= $per_page == 25 ? 'selected' : '' ?>>25</option>
                   <option value="?podredi=<?=$order?>&sort=<?= $sort ?>&strana=<?= $_GET['strana']?>&prikazi=50" <?= $per_page == 50 ? 'selected' : '' ?>>50</option>
                   <option value="?podredi=<?=$order?>&sort=<?= $sort ?>&strana=<?= $_GET['strana']?>&prikazi=100" <?= $per_page == 100 ? 'selected' : '' ?>>100</option>
               </select>
               <form method="post"  enctype="multipart/form-data">
                   <input type="search" name="baranje" id="baranje" >
                   <button
                           class="rounded border border-slate-300 py-2.5 px-3 text-center text-xs font-semibold text-slate-600 transition-all hover:opacity-75 focus:ring focus:ring-slate-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                           type="submit">
                       Барај
                   </button>
               </form>
               <a href="<?= realUrl('kniga/nova') ?>"
               class="flex select-none items-center gap-2 rounded bg-slate-800 py-2.5 px-4 text-xs font-semibold text-white shadow-md shadow-slate-900/10 transition-all hover:shadow-lg hover:shadow-slate-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
               type="button">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                   stroke-width="2" class="w-4 h-4">
                   <path
                   d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                   </path>
               </svg>
               Додади книга
                </a>
           </div>
           </div>
       
       </div>
       <div class="p-0">
           <table class="w-full mt-4 text-left table-auto min-w-max">
           <thead>
               <tr>
               <th
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100" onclick="parent.location='?podredi=id&sort=<?= $sort ?>&strana=<?= $_GET['strana']?>&prikazi=<?=$per_page?>'">
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
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100"
                   onclick="parent.location='?podredi=imeKniga&sort=<?= $sort ?>&strana=<?= $_GET['strana']?>&prikazi=<?=$per_page?>'">
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
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100"
                   onclick="parent.location='?podredi=avtori&sort=<?= $sort ?>&strana=<?= $_GET['strana']?>&prikazi=<?=$per_page?>'">
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
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100" onclick="parent.location='?podredi=kategorija&sort=<?= $sort ?>&strana=<?= $_GET['strana']?>&prikazi=<?=$per_page?>'">
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
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100" onclick="parent.location='?podredi=godina&sort=<?= $sort ?>&strana=<?= $_GET['strana']?>&prikazi=<?=$per_page?>'">
                   <p
                   class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500" >
                   Година
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                       stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                       <path stroke-linecap="round" stroke-linejoin="round"
                       d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                   </svg>
                   </p>
               </th>

               <th
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100" onclick="parent.location='?podredi=oddelenie&sort=<?= $sort ?>&strana=<?= $_GET['strana']?>&prikazi=<?=$per_page?>'">
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
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100" onclick="parent.location='?podredi=stat&sort=<?= $sort ?>&strana=<?= $_GET['strana']?>&prikazi=<?=$per_page?>'">
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
                   class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">Опции
                   </p>
               </th>
               </tr>
           </thead>
           <tbody>
<?php

$page = isset($_GET['strana'])?intval($_GET['strana']-1):0;
$number_of_pages = intval(count($notes)/$per_page)+1;

         if($brknigi > 0){

             if(isset($_POST['baranje']) && !empty($_POST['baranje'])) {
                 $looping =  $notes;
             }else{
                 $looping =  array_slice($notes, $page*$per_page, $per_page);
             }

         foreach ( $looping  as $note) : ?>


               <tr>
               <td class="p-4 border-b border-slate-200">
                   <div class="flex flex-col">
                   <p class="text-sm font-semibold text-slate-700">
                       <?php
                       if(isset($_POST['baranje']) && !empty($_POST['baranje'])) {
                           echo strong_words($note['id'],[$_POST['baranje']]);
                       }else{
                           echo '<input type="text" size="5" style="width: 50px;" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" onclick="this.select(); document.execCommand(\'Copy\');" value="' . htmlspecialchars($note['id']) . '">';
                       }
                       ?>
                   </p>
                   </div>
               </td>
               <td class="p-4 border-b border-slate-200">
                   <div class="flex items-center gap-3">


                   <div class="zoom">  <img src="<?= htmlspecialchars($note['slika'])  ?>"
                   class="relative inline-block h-10 w-8  object-cover object-center" />
                  </div>

                   <div class="flex flex-col">
                       <!-- <p
                       class="text-sm text-slate-500"> 
                       </p> -->
                       <p class="text-sm font-semibold text-slate-700">
                          
                          <a href="./kniga?id=<?= $note['id'] ?>"  class="text-blue-500 hover:underline">

                          <?php
                          if(isset($_POST['baranje']) && !empty($_POST['baranje'])) {
                              echo strong_words($note['imeKniga'],[$_POST['baranje']]);
                          }else{
                              echo  htmlspecialchars($note['imeKniga']);
                          }
                          ?>

                          </a>
                        </p>

                   </div>
                   <div class="tooltip">                       
                        &#9432;
                             <span class="tooltiptext"><?= htmlspecialchars($note['objasnuvanje']) ?></span>
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
                       <?= htmlspecialchars($note['avtori']) ?>
                   </p>
                   </div>
               </td>
               <td class="p-4 border-b border-slate-200">
                   <p class="text-sm text-slate-500">
                    <?= $note['kategorija'] === 0 ? 'Учебници' : '' ?>
                    <?= $note['kategorija'] === 1 ? 'Лектири' : '' ?>
                    <?= $note['kategorija'] === 2 ? 'Стручна литература' : '' ?>
                    <?= $note['kategorija'] === 3 ? 'Списанија' : '' ?>
                   </p>
               </td>
               <td class="p-4 border-b border-slate-200">
                   <p class="text-sm text-slate-500">
                   <?= htmlspecialchars($note['godina']) ?>
                   </p>
               </td>
               <td class="p-4 border-b border-slate-200">
                   <p class="text-sm text-slate-500">
                   <?= htmlspecialchars($note['oddelenie']) ?> одд.
                   </p>
               </td>
               <td class="p-4 border-b border-slate-200">
                   <div class="w-max">
                   <?= statusKniga($note['stat']) ?>
                   </div>
               </td>

               <td class="p-4 border-b border-slate-200">

                   <!-- Dropdown Component -->
                   <div class="relative" x-data="{ open: false }">
                       <button @click="open = !open" class="rounded bg-white px-4 py-2 text-gray-700 shadow-md" >
                           <!--                           <svg class="w-6 h-6 text-gray-800 light:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">-->
                           <!--                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z"/>-->
                           <!--                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>-->
                           <!--                           </svg>-->
                           <svg class="w-6 h-6 text-gray-800 light:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                               <path fill-rule="evenodd" d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z" clip-rule="evenodd"/>
                           </svg>
                       </button>
                       <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-15 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-0 z-10">
                           <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                               <a href="./kniga?id=<?= $note['id'] ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                   <svg class="w-6 h-6 text-gray-800 light:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                       <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                                       <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                                   </svg>
                               </a>
                               <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                   <form method="POST" enctype="multipart/form-data">
                                       <input type="hidden" name="pid" id="pid" value="<?= $note['id'] ?>" >
                                       <button type="submit" name="izbrisi">
                                           <svg onclick="return confirm('Дали сте сигурни?');"   class="w-6 h-6 text-gray-800 light:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                               <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                           </svg>
                                       </button>
                                   </form>
                               </a>
                           </div>
                       </div>
                   </div>
               </td>
               </tr>
             
        <?php endforeach; ?>

      <?php
        }else{
             echo "<tr><td class='p-4 border-b border-slate-200'>Нема резултат</td></tr>";
         }

if($strana > $total_pages){
    echo "<tr><td class='p-4 border-b border-slate-200'>Нема резултат</td></tr>";
}
      ?>
           </tbody>
           </table>



       </div>
       <div class="flex items-center justify-between p-3">
           <p class="block text-sm text-slate-500">
           <?php
                echo "Страна ".$strana. " од ".$number_of_pages ;
            ?>
          
           </p>
           <div class="flex gap-1">    
           <?php    
                
           

            
                if($brknigi > $per_page){

                    if($strana > $total_pages){
                        echo "";
                    }else{

                    if((int)($strana) == 1){
                        echo "";
                            }else{
                                ?>
                            <button
                    class="rounded border border-slate-300 py-2.5 px-3 text-center text-xs font-semibold text-slate-600 transition-all hover:opacity-75 focus:ring focus:ring-slate-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button" onclick="location.href='?podredi=<?=$order?>&sort=<?=$sort?>&strana=1&prikazi=<?=$per_page?>'">
                    Прва
                </button>
                        <button
                            class="rounded border border-slate-300 py-2.5 px-3 text-center text-xs font-semibold text-slate-600 transition-all hover:opacity-75 focus:ring focus:ring-slate-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button" onclick="location.href='?podredi=<?=$order?>&sort=<?=$sort?>&strana=<?=((int)($strana-1))?>&prikazi=<?=$per_page?>'">
                            <
                        </button>
                        <?php
                            }
        
            
                    // Superset range of pages
                    $superset_range = range(1, $total_pages);
            
                    // subset range of pages to display
                    $subset_range = range($strana - 1, $strana + 1);
            
                    // adjust the range(if required)
                    foreach($subset_range as $p){
                        if($p < 1){
                            array_shift($subset_range);
                            if(in_array($subset_range[count($subset_range) - 1] + 1, $superset_range)){
                                $subset_range[] = $subset_range[count($subset_range) - 1] + 1;
                            }
                        }elseif($p > $total_pages){
                            array_pop($subset_range);
                            if(in_array($subset_range[0] - 1, $superset_range)){
                                array_unshift($subset_range, $subset_range[0] - 1);
                            }
                        }
                    }
            
                    // display intermediate pagination links
                    if($subset_range[0] > $superset_range[0]){
                        echo " ...&nbsp;";
                    }
                    foreach($subset_range as $p){
                        ?>
                        <button
                        class="rounded border border-slate-300 py-2.5 px-3 text-center text-xs font-semibold text-slate-600 transition-all hover:opacity-75 focus:ring focus:ring-slate-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button"
                        onclick="location.href='?podredi=<?=$order?>&strana=<?=((int)($p))?>&prikazi=<?=$per_page?>'">
                            <?php
                            if ($p == $strana) {
                                echo "<b>".$p."</b>";
                                
                            } else {
                                echo $p;
                            }
                            ?>
                       </button>
                       <?php
            
                    }
                    if($subset_range[count($subset_range) - 1] < $superset_range[count($superset_range) - 1]){
                        echo "&nbsp;... ";
                    }

                    if(($strana) == $number_of_pages){
                        echo "";
                            }else{
                                ?>
                           <button
                               class="rounded border border-slate-300 py-2.5 px-3 text-center text-xs font-semibold text-slate-600 transition-all hover:opacity-75 focus:ring focus:ring-slate-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                               type="button" onclick="location.href='?podredi=<?=$order?>&sort=<?=$sort?>&strana=<?=((int)($strana+1))?>&prikazi=<?=$per_page?>'">
                               >
                           </button>
                           <button
                               class="rounded border border-slate-300 py-2.5 px-3 text-center text-xs font-semibold text-slate-600 transition-all hover:opacity-75 focus:ring focus:ring-slate-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                               type="button" onclick="location.href='?podredi=<?=$order?>&sort=<?=$sort?>&strana=<?=$total_pages?>&prikazi=<?=$per_page?>'">
                               Последна
                           </button>
                           <?php
                            }
                            ?>

                           <?php
                }
            }

        ?>

           </div>
       </div>
       </div>
</div>


</main>

<?php require('partials/footer.php') ?>
