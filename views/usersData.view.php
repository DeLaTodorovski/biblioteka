<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:col-span-5 md:mt-0">
                <p class="mb-2">
                    <a href="<?= realUrl('') ?>" class="text-blue-500 underline"><< назад...</a>
                </p>

                <form method="post" enctype="multipart/form-data">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div class="-mb-5">
                                Податоци за приказ во табела:
                            </div>
                            <div class="mr-1">
                                <label for="id">ID:</label>
                                        <input name="id" id="id" type="checkbox" class="mr-5">
                                <label for="bid">Сопствено ID:</label>
                                        <input name="bid" id="bid" type="checkbox" class="mr-5">
                                <label for="ucenikIme">Име:</label>
                                        <input name="ucenikIme" id="ucenikIme" type="checkbox" class="mr-5">
                                <label for="ucenikPrezime">Презиме:</label>
                                        <input name="ucenikPrezime" id="ucenikPrezime" type="checkbox" class="mr-5">
                                <label for="ucenikEmail">E-mail:</label>
                                        <input name="ucenikEmail" id="ucenikEmail" type="checkbox" class="mr-5">
                                <label for="odd_id">Одделение:</label>
                                        <input name="odd_id" id="odd_id" type="checkbox" class="mr-5">
                                <label for="klasen">Класен раководител:</label>
                                        <input name="klasen" id="klasen" type="checkbox" class="mr-5">
                                <label for="stat">Статус:</label>
                                        <input name="stat" id="stat" type="checkbox" class="mr-5">
                                <label for="zabeleska"> Забелешка:</label>
                                        <input name="zabeleska" id="zabeleska" type="checkbox" class="mr-5">
                            <div class="mt-5">
                                Подреди по:
                            </div>
                                <label
                                        for="odd_id"
                                        class="block text-sm font-medium text-gray-700"
                                >Избери опција</label>
                                <select id="podredi"
                                        name="podredi"
                                        class="mt-1 block rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="id" selected>ID</option>
                                    <option value="bid">Soptveno ID</option>
                                    <option value="ucenikIme">Име</option>
                                    <option value="ucenikPrezime">Презиме</option>
                                    <option value="ucenikEmail">E-mail</option>
                                    <option value="odd_id">Одделение</option>
                                    <option value="klasen">Класен раководител</option>
                                    <option value="stat">Статус</option>
                                </select>
<!--                                <label-->
<!--                                        for="odd_id"-->
<!--                                        class="block text-sm font-medium text-gray-700"-->
<!--                                >Одделение</label>-->
<!--                                    <select id="odd_id"-->
<!--                                            name="odd_id"-->
<!--                                            class="mt-1 block rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">-->
<!--                                        <option>Избери одделение</option>-->
<!--                                        <option value="1" selected>Прво</option>-->
<!--                                        <option value="2">Второ</option>-->
<!--                                        <option value="3">Трето</option>-->
<!--                                        <option value="4">Четврто</option>-->
<!--                                        <option value="5">Петто</option>-->
<!--                                        <option value="6">Шесто</option>-->
<!--                                        <option value="7">Седмо</option>-->
<!--                                        <option value="8">Осмо</option>-->
<!--                                        <option value="9">Деветто</option>-->
<!--                                        <option value="0">Нема</option>-->
<!--                                    </select class="-mr-1">-->

                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="pobaraj" value="1">
                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <button name="pobaraj-exel"
                                type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        >
                            Симни Ексел
                        </button>
                        <button name="pobaraj-word"
                                type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        >
                            Симни Word
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>


<?php require('partials/footer.php') ?>