<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>
    <?php require('partials/sidenav.php') ?>



              <!-- New Table -->
              <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">ID</th>
                      <th class="px-4 py-3">Наслов</th>
                      <th class="px-4 py-3">Автори</th>
                      <th class="px-4 py-3">Година</th>
                      <th class="px-4 py-3">Одделение</th>
                      <th class="px-4 py-3">Статус</th>
                      <th class="px-4 py-3">Опции</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  <?php foreach ($notes as $note) : ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-sm">
                      <?= htmlspecialchars($note['id']) ?>
                    </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                          >
                        <img src="<?= htmlspecialchars($note['slika'])  ?>" alt="<?= htmlspecialchars($note['imeKniga']) ?>">  
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold"><?= htmlspecialchars($note['imeKniga']) ?></p>
                            <!-- <p class="text-xs text-gray-600 dark:text-gray-400">
                            </p> -->
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?= htmlspecialchars($note['avtori']) ?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?= htmlspecialchars($note['godina']) ?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?= htmlspecialchars($note['oddelenie']) ?> одд.
                      </td>

                <td class="px-4 py-3 text-xs">
                   <?php if ($note['stat'] === 0) : ?>
                   <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >нова
                    </span>
                   
                   <?php elseif ($note['stat'] === 1) : ?>
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                    >зачувана</span>
                   
                   <?php elseif ($note['stat'] === 2) : ?>
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >стара</span>
                   
                   <?php elseif ($note['stat'] === 3) : ?>
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >оштетена</span>
                  
                    <?php endif;?>
               </td>
               <td></td>
              </tr>

              <?php endforeach; ?>

                  </tbody>
                </table>
              </div>
            
              </div>


<?php require('partials/footer.php') ?>
