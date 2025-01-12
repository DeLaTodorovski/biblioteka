<?php
require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<script type="text/javascript">
function getStates(value){
    let zborce =  document.getElementById('search_text').value;
  $.post("controllers/povrziZadolzi.php?baraj=kniga_id&tabla=knigi&kade=imeKniga&zbor="+zborce, {partialState:value}, function(data){
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
                            <label for="dase_vrati">Датум за враќање:</label>
                            <input type="date" id="dase_vrati" name="dase_vrati" value="<?= date('Y-m-d', strtotime('+30 days')) ?>">
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


                                <b>Книга: </b>
                                    <input type="text" id="search_text" onkeyup="getStates(this.value)">
                                <div class="p-0">
                                        <table class="w-full mt-4 text-left table-auto ">
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
                                                            class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">Опции
                                                    </p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="results">
                                        <?php if (isset($errors['greska'])) : ?>
                                        <tr><td> <p class="text-red-500 text-xs mt-2"><?= $errors['greska'] ?></p><td></tr>
                                        <?php endif; ?>
                                        <?php if (isset($errors['imaKniga'])) : ?>
                                            <tr><td> <p class="text-red-500 text-xs mt-2"><?= $errors['imaKniga'] ?></p><td></tr>
                                        <?php endif; ?>

                                        </tbody>
                                    </table>
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
