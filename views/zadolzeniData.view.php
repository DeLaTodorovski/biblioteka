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
                                    <label for="imeKniga">Наслов на книга:</label>
                                    <input name="imeKniga" id="imeKniga" type="checkbox" class="mr-5">
                                    <label for="objasnuvanje">Забелешка:</label>
                                    <input name="objasnuvanje" id="objasnuvanje" type="checkbox" class="mr-5">
                                    <label for="slika">Слика:</label>
                                    <input name="slika" id="slika" type="checkbox" class="mr-5">
                                    <label for="tiraz">Тираж:</label>
                                    <input name="tiraz" id="tiraz" type="checkbox" class="mr-5">
                                    <label for="kategorija">Категорија:</label>
                                    <input name="kategorija" id="kategorija" type="checkbox" class="mr-5">
                                    <label for="avtori">Автори:</label>
                                    <input name="avtori" id="avtori" type="checkbox" class="mr-5">
                                    <label for="izdavac">Издавач:</label>
                                    <input name="izdavac" id="izdavac" type="checkbox" class="mr-5">
                                    <label for="godina"> Година:</label>
                                    <input name="godina" id="godina" type="checkbox" class="mr-5">
                                    <label for="oddelenie"> Одделение:</label>
                                    <input name="oddelenie" id="oddelenie" type="checkbox" class="mr-5">
                                    <label for="cena"> Цена:</label>
                                    <input name="cena" id="cena" type="checkbox" class="mr-5">
                                    <label for="stat"> Статус:</label>
                                    <input name="stat" id="stat" type="checkbox" class="mr-5">
                                    <div class="mt-5">
                                        Подреди по:
                                    </div>
                                    <label
                                        for="podredi"
                                        class="block text-sm font-medium text-gray-700"
                                    >Избери опција</label>
                                    <select id="podredi"
                                            name="podredi"
                                            class="mt-1 block rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="id" selected>ID</option>
                                        <option value="imeKniga">Нслов на книга</option>
                                        <option value="objasnuvanje">Забелешка</option>
                                        <option value="tiraz">Тираж</option>
                                        <option value="kategorija">Категорија</option>
                                        <option value="avtori">Автори</option>
                                        <option value="izdavac">Издавач</option>
                                        <option value="godina">Година</option>
                                        <option value="oddelenie">Одделение</option>
                                        <option value="cena">Цена</option>
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