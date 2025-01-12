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

<style>
    .tooltip {
  position: relative;
  display: inline-block;
  cursor: default;
}

.tooltip .tooltiptext {
  visibility: hidden;
  padding: 0.25em 0.5em;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 0.25em;
  white-space: nowrap;

  
  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  top: 100%;
  left: 100%;
  transition-property: visibility;
  transition-delay: 0s;

}

.tooltip:hover .tooltiptext {

  visibility: visible;
  transition-delay: 0.3s;
  min-width:500px; /* I have changed here */
    max-width:500px;
}

.zoom {
  transition: transform .2s; /* Animation */
}

.zoom:hover {
  transform: scale(5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
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
                   <h3 class="text-lg font-semibold text-slate-800">Листа на ученици</h3>
                   <p class="text-slate-500">Сите ученици внесени во базата</p>
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


               <a href="<?= realUrl('korisnik/nov') ?>"
               class="flex select-none items-center gap-2 rounded bg-slate-800 py-2.5 px-4 text-xs font-semibold text-white shadow-md shadow-slate-900/10 transition-all hover:shadow-lg hover:shadow-slate-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
               type="button">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                   stroke-width="2" class="w-4 h-4">
                   <path
                   d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                   </path>
               </svg>
               Додади ученик
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
                           class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100" onclick="parent.location='?podredi=bid&sort=<?= $sort ?>&strana=<?= $_GET['strana']?>&prikazi=<?=$per_page?>'">
                       <p
                               class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-slate-500">
                           Сопствено ID
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                               <path stroke-linecap="round" stroke-linejoin="round"
                                     d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                           </svg>
                       </p>
                   </th>
               <th
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100" onclick="parent.location='?podredi=ucenikIme&sort=<?= $sort ?>&strana=<?= $_GET['strana']?>&prikazi=<?=$per_page?>'">
                   <p
                   class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-slate-500">
                   Име
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                       stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                       <path stroke-linecap="round" stroke-linejoin="round"
                       d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                   </svg>
                   </p>
               </th>
               <th
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100" onclick="parent.location='?podredi=ucenikPrezime&sort=<?= $sort ?>&strana=<?= $_GET['strana']?>&prikazi=<?=$per_page?>'">
                   <p
                   class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                   Презиме
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                       stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                       <path stroke-linecap="round" stroke-linejoin="round"
                       d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                   </svg>
                   </p>
               </th>
               <th
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100" onclick="parent.location='?podredi=ucenikEmail&sort=<?= $sort ?>&strana=<?= $_GET['strana']?>&prikazi=<?=$per_page?>'">
                   <p
                   class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                   Е-маил
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                       stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                       <path stroke-linecap="round" stroke-linejoin="round"
                       d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                   </svg>
                   </p>
               </th>
               <th
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100" onclick="parent.location='?podredi=odd_id&sort=<?= $sort ?>&strana=<?= $_GET['strana']?>&prikazi=<?=$per_page?>'">
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
                   class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100" onclick="parent.location='?podredi=klasen&sort=<?= $sort ?>&strana=<?= $_GET['strana']?>&prikazi=<?=$per_page?>'">
                   <p
                   class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                   Класен раководител
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

if($brkorisnici > 0){
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
                       echo  $note['id'];
                   }
                   ?>
                   </p>
                   </div>
               </td>
                   <td class="p-4 border-b border-slate-200">
                       <div class="flex flex-col">
                           <!-- <p class="text-sm font-semibold text-slate-700">
                               Manager
                           </p> -->
                           <p
                                   class="text-sm text-slate-500">
                               <?php
                               if(isset($_POST['baranje']) && !empty($_POST['baranje'])) {
                                   echo  strong_words($note['bid'],[$_POST['baranje']]);
                               }else{
                                   echo '<input type="text" size="5" style="width: 80px;" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" onclick="this.select(); document.execCommand(\'Copy\');" value="' . htmlspecialchars($note['bid']) . '">';
                               }
                               ?>
                           </p>
                       </div>
                   </td>
               <td class="p-4 border-b border-slate-200">
                   <div class="flex flex-col">
                   <!-- <p class="text-sm font-semibold text-slate-700">
                       Manager
                   </p> -->
                   <p
                       class="text-sm text-slate-500">
                       <?php
                       if(isset($_POST['baranje']) && !empty($_POST['baranje'])) {
                           echo strong_words($note['ucenikIme'],[$_POST['baranje']]);
                       }else{
                          echo  htmlspecialchars($note['ucenikIme']);
                       }
                       ?>
                   </p>
                   </div>
               </td>
               <td class="p-4 border-b border-slate-200">
                   <div class="flex flex-col">
                   <!-- <p class="text-sm font-semibold text-slate-700">
                       Manager
                   </p> -->
                   <p
                       class="text-sm text-slate-500">
                       <?php
                       if(isset($_POST['baranje']) && !empty($_POST['baranje'])) {
                           echo strong_words($note['ucenikPrezime'],[$_POST['baranje']]);
                       }else{
                           echo  htmlspecialchars($note['ucenikPrezime']);
                       }
                       ?>
                   </p>
                   </div>
               </td>
               <td class="p-4 border-b border-slate-200">
                   <p class="text-sm text-slate-500">
                   <?= htmlspecialchars($note['ucenikEmail']) ?>
                   </p>
               </td>
               <td class="p-4 border-b border-slate-200">
                   <p class="text-sm text-slate-500">
                   <?= htmlspecialchars($note['odd_id']) ?> одд.
                   </p>
               </td>
               <td class="p-4 border-b border-slate-200">
                   <p class="text-sm text-slate-500">
                   <?= htmlspecialchars($note['klasen']) ?>
                   </p>
               </td>
               <td class="p-4 border-b border-slate-200">
                   <div class="w-max">
                   <?php if ($note['stat'] === 0) : ?>
                   <div
                       class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-green-500/20">
                       <span class="">Активен</span>
                   </div>
                   <?php elseif ($note['stat'] === 1) : ?>
                    <div
                       class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-yellow-500/20">
                       <span class="">Неактивен</span>
                   </div>
                    <!-- <div
                       class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-orange-500/20">
                       <span class="">Критично</span>
                   </div> -->
                   <?php elseif ($note['stat'] === 2) : ?>
                    <div
                       class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-red-500/20">
                       <span class="">Баниран</span>
                   </div>
                    <?php endif;?>
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
                       <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-15 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-0 z-20">
                           <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                               <a href="./korisnik?id=<?= $note['id'] ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                   <svg class="w-6 h-6 text-gray-800 light:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                       <path fill-rule="evenodd" d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z" clip-rule="evenodd"/>
                                   </svg>
                               </a>
                               <a href="./razdolzi?id=<?= $note['id'] ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                   <svg class="w-6 h-6 text-gray-800 light:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                       <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"/>
                                   </svg>
                               </a>
                               <a href="./zadolzi?id=<?= $note['id'] ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                   <svg class="w-6 h-6 text-gray-800 light:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                       <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v6.41A7.5 7.5 0 1 0 10.5 22H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                                       <path fill-rule="evenodd" d="M9 16a6 6 0 1 1 12 0 6 6 0 0 1-12 0Zm6-3a1 1 0 0 1 1 1v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 1 1 0-2h1v-1a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
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
      ?>
           </tbody>
           </table>



       </div>


       <div class="flex items-center justify-between p-3">
           <p class="block text-sm text-slate-500">
           <?php
                $strana = isset($_GET['strana'])?$_GET['strana']:0;
                echo "Страна ".$strana. " од ".$number_of_pages ;
            ?>

           </p>
           <div class="flex gap-1">
           <?php


           $total_pages = ceil($brkorisnici / $per_page);

           if($brkorisnici > $per_page){

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
                        onclick="location.href='?podredi=<?=$order?>&sort=<?=$sort?>&strana=<?=((int)($p))?>&prikazi=<?=$per_page?>'">
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


        ?>

           </div>
       </div>




       </div>
</div>


</main>

<?php require('partials/footer.php') ?>
