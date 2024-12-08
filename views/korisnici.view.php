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
                   <h3 class="text-lg font-semibold text-slate-800">Листа на корисници</h3>
                   <p class="text-slate-500">Сите корисници (ученици/наставници) внесени во базата</p>
               </div>
           <div class="flex flex-col gap-2 shrink-0 sm:flex-row">
               <button
               class="rounded border border-slate-300 py-2.5 px-3 text-center text-xs font-semibold text-slate-600 transition-all hover:opacity-75 focus:ring focus:ring-slate-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
               type="button">
               Види ги сите
               </button>
               <a href="<?= realUrl('korisnik/nov') ?>"
               class="flex select-none items-center gap-2 rounded bg-slate-800 py-2.5 px-4 text-xs font-semibold text-white shadow-md shadow-slate-900/10 transition-all hover:shadow-lg hover:shadow-slate-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
               type="button">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                   stroke-width="2" class="w-4 h-4">
                   <path
                   d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                   </path>
               </svg>
               Додади корисник
                </a>
           </div>
           </div>
       
       </div>
       <div class="p-0 overflow-scroll">
           <table class="w-full mt-4 text-left table-auto min-w-max">
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
                   Име
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
                   Презиме
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
                   Е-маил
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
                   Класен раководител
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
                   class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">Опции
                   </p>
               </th>
               </tr>
           </thead>
<?php
$page = isset($_GET['strana'])?intval($_GET['strana']-1):0;
$number_of_pages = intval(count($notes)/$per_page)+1;
?>
           <tbody>
         <?php foreach (array_slice($notes, $page*$per_page, $per_page) as $note) : ?>
               <tr>
               <td class="p-4 border-b border-slate-200">
                   <div class="flex flex-col">
                   <p class="text-sm font-semibold text-slate-700">
                   <?= $note['id'] ?>
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
                       <?= htmlspecialchars($note['ucenikIme']) ?>
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
                       <?= htmlspecialchars($note['ucenikPrezime']) ?>
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
               <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="pid" id="pid" value="<?= $note['id'] ?>" >
                <button style="font-size:24px" type="submit"><i class="material-icons">delete</i></button>
               </form>

                   <a href="./korisnik?id=<?= $note['id'] ?>" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                   </a>
                 
               </td>
               </tr>
             
        <?php endforeach; ?>
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
   
                            }else{
                                ?>
                            <button
                    class="rounded border border-slate-300 py-2.5 px-3 text-center text-xs font-semibold text-slate-600 transition-all hover:opacity-75 focus:ring focus:ring-slate-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button" onclick="location.href='?strana=1'">
                    Прва
                </button>
                        <button
                            class="rounded border border-slate-300 py-2.5 px-3 text-center text-xs font-semibold text-slate-600 transition-all hover:opacity-75 focus:ring focus:ring-slate-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button" onclick="location.href='?strana=<?=((int)($strana-1))?>'">
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
                        onclick="location.href='?strana=<?=((int)($p))?>'">
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

                            }else{
                                ?>
                           <button
                               class="rounded border border-slate-300 py-2.5 px-3 text-center text-xs font-semibold text-slate-600 transition-all hover:opacity-75 focus:ring focus:ring-slate-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                               type="button" onclick="location.href='?strana=<?=((int)($strana+1))?>'">
                               >
                           </button>
                           <button
                               class="rounded border border-slate-300 py-2.5 px-3 text-center text-xs font-semibold text-slate-600 transition-all hover:opacity-75 focus:ring focus:ring-slate-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                               type="button" onclick="location.href='?strana=<?=$total_pages?>'">
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
