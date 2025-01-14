<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>
<!--<script type="text/javascript">-->
<!--    function getStates(value){-->
<!--        let zborce =  document.getElementById('search_text').value;-->
<!--        $.post("controllers/povrziZadolzi.php?baraj=kniga_id&tabla=knigi&kade=imeKniga&zbor="+zborce, {partialState:value}, function(data){-->
<!--            $("#results").html(data);-->
<!--        });-->
<!--    }-->
<!--</script>-->
<!--<script type="text/javascript">-->
<!--    function getStates2(value){-->
<!--        let zborce2 =  document.getElementById('search_text2').value;-->
<!--        $.post("controllers/povrziUser.php?baraj=ucenikIme&&zbor="+zborce2, {partialState:value}, function(data){-->
<!--            $("#results2").html(data);-->
<!--        });-->
<!--    }-->
<!--</script>-->
<!--    <form method="POST" enctype="multipart/form-data">-->
<!--            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">-->
<!--                <p>Hello. Welcome to the home page.</p>-->
<!--            </div>-->
<!--            <div class="w-max">-->
<!--                <b>Книга: </b>-->
<!--                <input type="text" id="search_text" onkeyup="getStates(this.value)">-->
<!--                <br>-->
<!--                <div id="results"></div>-->
<!--            </div>-->
<!--            <div class="w-max">-->
<!--                <b>Корисник: </b>-->
<!--                <input type="text" id="search_text2" onkeyup="getStates2(this.value)">-->
<!--                <br>-->
<!--                <div id="results2"></div>-->
<!--            </div>-->
<!--            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">-->
<!--                <button-->
<!--                        type="submit"-->
<!--                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"-->
<!--                >-->
<!--                    Задолжи-->
<!--                </button>-->
<!--            </div>-->
<!--    </form>-->
<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <section class="text-gray-700 body-font">
            <div class="container px-5 py-24 mx-auto">

                <div class="flex flex-wrap -m-4 text-center">
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full" onclick="parent.location='<?= realUrl('knigi-data') ?>'">
                        <div class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                            <div class="flex justify-center items-center mb-5 ">
                                <svg width="48px" height="48px" viewBox="-1 0 22 22" id="meteor-icon-kit__regular-books" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M6 3V2C6 0.89543 6.89543 0 8 0H12C13.1046 0 14 0.89543 14 2H18C19.1046 2 20 2.89543 20 4V20C20 21.1046 19.1046 22 18 22H14C13.6357 22 13.2942 21.9026 13 21.7324C12.7058 21.9026 12.3643 22 12 22H8C7.63571 22 7.29417 21.9026 7 21.7324C6.70583 21.9026 6.36429 22 6 22H2C0.89543 22 0 21.1046 0 20V5C0 3.89543 0.89543 3 2 3H6zM6 5H2V20H6V5zM14 20H18V4H14V20zM8 2V20H12V2H8zM3 14C3 13.4477 3.44772 13 4 13C4.55228 13 5 13.4477 5 14V18C5 18.5523 4.55228 19 4 19C3.44772 19 3 18.5523 3 18V14zM9 12C9 11.4477 9.4477 11 10 11C10.5523 11 11 11.4477 11 12V18C11 18.5523 10.5523 19 10 19C9.4477 19 9 18.5523 9 18V12zM15 16C15 15.4477 15.4477 15 16 15C16.5523 15 17 15.4477 17 16V18C17 18.5523 16.5523 19 16 19C15.4477 19 15 18.5523 15 18V16z" fill="#667eea"/></svg>
                            </div>

                            <h2 class="title-font font-medium text-3xl text-gray-900"><?= $brknigi ?></h2>
                            <p class="leading-relaxed">Книги</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full" onclick="parent.location='<?= realUrl('ucenici-data') ?>'">
                        <div class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
                            </svg>
                            <h2 class="title-font font-medium text-3xl text-gray-900"><?= $brucenici ?></h2>
                            <p class="leading-relaxed">Ученици</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full" onclick="parent.location='<?= realUrl('zadolzeni-data') ?>'">
                        <div class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                                <path d="M8 17l4 4 4-4m-4-5v9"></path>
                                <path d="M20.88 18.09A5 5 0 0018 9h-1.26A8 8 0 103 16.29"></path>
                            </svg>
                            <h2 class="title-font font-medium text-3xl text-gray-900"><?= $zadolzeni ?></h2>
                            <p class="leading-relaxed">Задолжени книги</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full" onclick="parent.location='<?= realUrl('banirani-data') ?>'">
                        <div class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                            <h2 class="title-font font-medium text-3xl text-gray-900"><?= $banirani ?></h2>
                            <p class="leading-relaxed">Банирани ученици</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<!--</main>-->

<?php require('partials/footer.php') ?>
