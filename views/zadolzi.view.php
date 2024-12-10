<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<script type="text/javascript">
function getStates(value){
    let zborce =  document.getElementById('search_text').value;
  $.post("controllers/povrzi.php?baraj=imeKniga&tabla=knigi&kade=imeKniga&zbor="+zborce, {partialState:value}, function(data){
    $("#results").html(data);
  });
}
</script>


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

           

                <form method="POST" enctype="multipart/form-data">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                        
                        
                        
                        <input type='hidden' name='ucenikIme' value='<?= $note['ucenikIme'] ?>'>
                        <input type='hidden' name='ucenik_id' value='<?= $note['id'] ?>'>
                        <?= htmlspecialchars($note['ucenikIme']) ?> <?= htmlspecialchars($note['ucenikPrezime']) ?><br>

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
                            <b>Книга: </b>
                                <input type="text" id="search_text" onkeyup="getStates(this.value)">
                                <br>
                                <div id="results"></div>
                            </div>

                        </div>

                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button
                                type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                Задолжи
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>



<?php require('partials/footer.php') ?>
