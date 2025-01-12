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
                <?php if (isset($message['errors'])) : ?>
                    <div class="flex justify-center items-center m-1 font-medium py-1 px-2 mb-6 rounded-md text-red-100 bg-red-700 border border-red-700 ">
                        <div slot="avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div class="text-xl font-normal  max-w-full flex-initial">
                            <div class="py-2">Грешка!
                                <div class="text-sm font-base">
                                    <?php

                                    foreach ($message['errors'] as $error){
                                        echo $error;
                                    }

                                    ?>
                                </div>
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
                                        for="ucenikIme"
                                        class="block text-sm font-medium text-gray-700"
                                >Сопствено ID</label>
                                <div class="mt-1">
                                    <input type="text"
                                           id="bid"
                                           name="bid"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                           value="<?= htmlspecialchars($note['bid']) ?>" >

                                    <?php if (isset($errors['bid'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['bid'] ?></p>
                                    <?php endif; ?>
                                    <?php if (isset($errors['empty'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['empty'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <div>
                                <label
                                    for="ucenikIme"
                                    class="block text-sm font-medium text-gray-700"
                                >Име</label>
                                <div class="mt-1">
                                    <input type="text"
                                        id="ucenikIme"
                                        name="ucenikIme"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        value="<?= htmlspecialchars($note['ucenikIme']) ?>" >

                                    <?php if (isset($errors['imeKniga'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['ucenikIme'] ?></p>
                                    <?php endif; ?>
                                    <?php if (isset($errors['empty'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['empty'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div>
                                <label
                                    for="ucenikPrezime"
                                    class="block text-sm font-medium text-gray-700"
                                >Презиме</label>
                                <div class="mt-1">
                                    <input type="text"
                                        id="ucenikPrezime"
                                        name="ucenikPrezime"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        value="<?= htmlspecialchars($note['ucenikPrezime']) ?>" >

                                    <?php if (isset($errors['imeKniga'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['ucenikPrezime'] ?></p>
                                    <?php endif; ?>
                                    <?php if (isset($errors['empty'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['empty'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div>
                                <label
                                    for="ucenikEmail"
                                    class="block text-sm font-medium text-gray-700"
                                >Е-маил</label>
                                <div class="mt-1">
                                    <input type="text"
                                        id="ucenikEmail"
                                        name="ucenikEmail"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        value="<?= htmlspecialchars($note['ucenikEmail']) ?>" >

                                    <?php if (isset($errors['imeKniga'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['ucenikEmail'] ?></p>
                                    <?php endif; ?>
                                    <?php if (isset($errors['empty'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['empty'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                           
                            <div>
                                <label
                                    for="klasen"
                                    class="block text-sm font-medium text-gray-700"
                                >Класен раководител</label>
                                <div class="mt-1">
                                    <input type="text"
                                        id="klasen"
                                        name="klasen"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        value="<?= htmlspecialchars($note['klasen']) ?>" >

                                    <?php if (isset($errors['imeKniga'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['klasen'] ?></p>
                                    <?php endif; ?>
                                    <?php if (isset($errors['empty'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['empty'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div>
                                <label
                                    for="odd_id"
                                    class="block text-sm font-medium text-gray-700"
                                >Одделение</label>
                                <div class="mt-1">
                                    <select id="odd_id"
                                        name="odd_id"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option>Избери одделение</option>
                                            <option value="1" <?= $note['odd_id'] === 1 ? 'selected' : '' ?>>Прво</option>
                                            <option value="2" <?= $note['odd_id'] === 2 ? 'selected' : '' ?>>Второ</option>
                                            <option value="3" <?= $note['odd_id'] === 3 ? 'selected' : '' ?>>Трето</option>
                                            <option value="4" <?= $note['odd_id'] === 4 ? 'selected' : '' ?>>Четврто</option>
                                            <option value="5" <?= $note['odd_id'] === 5 ? 'selected' : '' ?>>Петто</option>
                                            <option value="6" <?= $note['odd_id'] === 5 ? 'selected' : '' ?>>Шесто</option>
                                            <option value="7" <?= $note['odd_id'] === 6 ? 'selected' : '' ?>>Седмо</option>
                                            <option value="8" <?= $note['odd_id'] === 7 ? 'selected' : '' ?>>Осмо</option>
                                            <option value="9" <?= $note['odd_id'] === 8 ? 'selected' : '' ?>>Деветто</option>
                                            <option value="0" <?= $note['odd_id'] === 0 ? 'selected' : '' ?>>Нема</option>
                                    </select>
                                    <?php if (isset($errors['odd_id'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['odd_id'] ?></p>
                                    <?php endif; ?>
                                    <?php if (isset($errors['empty'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['empty'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div>
                                <label
                                    for="zabeleska"
                                    class="block text-sm font-medium text-gray-700"
                                >Објаснување</label>
                                <div class="mt-1">
                                    <textarea
                                        id="zabeleska"
                                        name="zabeleska"
                                        rows="3"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="Here's an idea for a note..."
                                    ><?= htmlspecialchars($note['zabeleska']) ?></textarea>

                                    <?php if (isset($errors['zabeleska'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['zabeleska'] ?></p>
                                    <?php endif; ?>
                                    <?php if (isset($errors['empty'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['empty'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div>
                                <label
                                    for="stat"
                                    class="block tstatext-sm font-medium text-gray-700"
                                >Статус</label>
                                <div class="mt-1">
                                    <select id="stat"
                                        name="stat"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option>Избери статус</option>
                                        
                                            <option value="0" <?= $note['stat'] === 0 ? 'selected' : '' ?>>Активен</option>
                                            <option value="1" <?= $note['stat'] === 1 ? 'selected' : '' ?>>Неактивен</option>
                                            <option value="2" <?= $note['stat'] === 2 ? 'selected' : '' ?>>Баниран</option>
                                        
                                    </select>
                                    <?php if (isset($errors['stat'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['stat'] ?></p>
                                    <?php endif; ?>
                                    <?php if (isset($errors['empty'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['empty'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button
                                type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                Зачувај
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>



<?php require('partials/footer.php') ?>
